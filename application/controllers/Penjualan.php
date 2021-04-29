<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'registrasi_m',
            'barang_m',
            'penjualan_m',
            'bank_m',
            'billing_m',
            'etiket_m',
            'satuan_m',
            'racik_m'
        ]);
    }

    public function index()
    {

        $barang = $this->barang_m->get_penjualan()->result();
        $cart = $this->penjualan_m->get_cart_penjualan();
        $data = array(
            'registrasi' => $this->registrasi_m->get()->result(),
            'barang' => $barang,
            'cart' => $cart,
            'no_penjualan' => $this->penjualan_m->no_penjualan(),
            'debit' => $this->bank_m->get_debit()->result(),
            'credit' => $this->bank_m->get_credit()->result(),
            'etiket' => $this->etiket_m->get()->result(),
            'satuan' => $this->satuan_m->get()->result(),
            'cart_racik' => $this->racik_m->get_cart_racik(),
            'no_racik' => $this->racik_m->no_racik(),
            'racik' => $this->penjualan_m->get_cart_racik(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/penjualan/penjualan_form', $data);
    }

    function get_barang()
    {
        $fs_kd_barcode = $this->input->post('fs_kd_barcode');
        $barang = $this->barang_m->get_barcode($fs_kd_barcode)->row();

        if ($this->db->affected_rows() > 0) {
            $harga_jual_profit = ($barang->fn_harga_beli * $barang->fn_profit / 100) + $barang->fn_harga_beli;
            $harga_jual = $barang->fn_harga_jual;
            $profit = $barang->fn_profit;
            $params = array("success" => true, "barang" => $barang, "harga_jual" => $profit == 0 ? $harga_jual : $harga_jual_profit);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->penjualan_m->get_cart_penjualan(['tb_trs_cart_penjualan.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->penjualan_m->update_cart_qty($data);
            } else {
                $this->penjualan_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['add_cart_racik'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->racik_m->get_cart_racik(['tb_trs_cart_racik.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->racik_m->update_cart_qty($data);
            } else {
                $this->racik_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->penjualan_m->edit_cart_penjualan($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart'])) {
            $fs_id_cart_penjualan = $this->input->post('fs_id_cart_penjualan');
            $this->penjualan_m->del_cart(['fs_id_cart_penjualan' => $fs_id_cart_penjualan]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_racik'])) {
            $fs_id_racik = $this->input->post('fs_id_racik');
            $this->racik_m->del_racik(['fs_id_racik' => $fs_id_racik]);
            $this->racik_m->del_racik_detail(['fs_id_racik' => $fs_id_racik]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart_racik'])) {
            $fs_id_cart_racik = $this->input->post('fs_id_cart_racik');
            $this->racik_m->del_cart(['fs_id_cart_racik' => $fs_id_cart_racik]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['cancel_payment'])) {
            $this->racik_m->del_racik(['fs_id_user' => $this->session->userdata('userid')]);
            $this->racik_m->del_racik_detail(['fs_id_user' => $this->session->userdata('userid')]);
            $this->penjualan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['batal_racik'])) {
            $this->racik_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['simpan_racik'])) {
            // $this->racik_m->add_cart_penjualan($data);
            $racik_id = $this->racik_m->add_racik($data);
            $cart = $this->racik_m->get_cart_racik()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_racik' => $racik_id,
                    'fs_id_barang' => $value->id_barang_racik,
                    'fs_id_etiket' => $value->id_etiket_racik,
                    'fn_harga_beli' => $value->harga_beli_racik,
                    'fn_harga_jual' => $value->harga_jual_racik,
                    'fn_qty' => $value->fn_qty,
                    'fn_diskon' => $value->fn_diskon,
                    'fn_total' => $value->fn_total,
                    'fs_id_user' => $value->fs_id_user,
                ));
            }
            $this->racik_m->add_racik_detail($row);
            $this->racik_m->update_no();
            $this->racik_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $this->registrasi_m->update_status($data, 3);
            $no_penjualan = $this->penjualan_m->no_penjualan();
            $this->billing_m->add_penjualan($data, $no_penjualan);
            $penjualan_id = $this->penjualan_m->add_penjualan($data);

            $cart = $this->penjualan_m->get_cart_penjualan()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_penjualan' => $penjualan_id,
                    'fs_id_barang' => $value->id_barang,
                    'fs_id_etiket' => $value->id_etiket,
                    'fn_harga_beli' => $value->harga_beli,
                    'fn_harga_jual' => $value->harga_jual,
                    'fn_qty' => $value->fn_qty,
                    'fn_diskon_harga_jual' => $value->fn_diskon,
                    'fn_total_harga_jual' => $value->fn_total,
                ));
            }
            $this->penjualan_m->add_penjualan_detail($row);

            $cart_racik = $this->penjualan_m->get_cart_racik_detail()->result();
            $racik = [];
            foreach ($cart_racik as $rck => $r) {
                array_push($racik, array(
                    'fs_id_penjualan' => $penjualan_id,
                    'fs_id_racik' => $r->fs_id_racik,
                    'fs_id_barang' => $r->id_barang,
                    'fn_harga_beli' => $r->harga_beli,
                    'fn_harga_jual' => $r->harga_jual,
                    'fn_qty' => $r->fn_qty,
                    'fn_total_harga_jual' => $r->fn_total,
                ));
            }
            $this->penjualan_m->add_penjualan_detail_racik($racik);

            $this->racik_m->update_id_penjualan($penjualan_id);
            $this->racik_m->update_id_penjualan_detail($penjualan_id);
            $this->penjualan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);
            $this->penjualan_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "penjualan_id" => $penjualan_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    function cart_data()
    {
        $data = array(
            'cart' =>   $this->penjualan_m->get_cart_penjualan(),
            'racik' =>  $this->penjualan_m->get_cart_racik()
        );

        $this->load->view('farmasi/penjualan/cart_data', $data);
    }

    function cart_data_racik()
    {
        $cart = $this->racik_m->get_cart_racik();
        $data['cart_racik'] = $cart;
        $this->load->view('farmasi/penjualan/cart_data_racik', $data);
    }

    public function racik_detail($id)
    {
        $racik_detail = $this->penjualan_m->get_cart_racik_detail($id)->result();
        echo json_encode($racik_detail);
    }

    public function cetak($id)
    {
        $data = array(
            'penjualan' => $this->penjualan_m->get_penjualan($id)->row(),
            'penjualan_detail' => $this->penjualan_m->get_penjualan_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->load->view('farmasi/penjualan/penjualan_cetak', $data);
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'penjualan' => $this->penjualan_m->get_penjualan($id)->row(),
            'penjualan_detail' => $this->penjualan_m->get_penjualan_detail($id)->result(),
            'racik' => $this->racik_m->get_racik($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('farmasi/penjualan/penjualan_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'INV-' . $data['penjualan']->fs_kd_penjualan, 'A4', 'potrait');
    }
}
