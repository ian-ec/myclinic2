<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'pemesanan_m',
            'layanan_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'distributor' => $this->distributor_m->get()->result(),
            'layanan' => $this->layanan_m->get(),
            'barang' => $this->barang_m->get()->result(),
            'cart' => $this->pemesanan_m->get_cart_pemesanan(),
            'no_pemesanan' => $this->pemesanan_m->no_pemesanan(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/pemesanan/pemesanan_form', $data);
    }

    function cart_data()
    {
        $cart = $this->pemesanan_m->get_cart_pemesanan();
        $data['cart'] = $cart;
        $this->load->view('farmasi/pemesanan/cart_data', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->pemesanan_m->get_cart_pemesanan(['tb_trs_cart_pemesanan.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->pemesanan_m->update_cart_qty($data);
            } else {
                $this->pemesanan_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->pemesanan_m->edit_cart_pemesanan($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart'])) {
            $fs_id_cart_pemesanan = $this->input->post('fs_id_cart_pemesanan');
            $this->pemesanan_m->del_cart(['fs_id_cart_pemesanan' => $fs_id_cart_pemesanan]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['cancel_payment'])) {
            $this->pemesanan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $pemesanan_id = $this->pemesanan_m->add_pemesanan($data);
            $cart = $this->pemesanan_m->get_cart_pemesanan()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_pemesanan' => $pemesanan_id,
                    'fs_id_barang' => $value->id_barang,
                    'fn_hpp' => $value->harga_beli,
                    'fn_qty' => $value->fn_qty,
                    'fn_qty_sisa' => $value->fn_qty,
                    'fn_diskon' => $value->fn_diskon,
                    'fn_ppn' => $value->fn_pajak,
                    'fn_total' => $value->fn_total,
                ));
            }
            $this->pemesanan_m->add_pemesanan_detail($row);
            $this->pemesanan_m->update_no();
            $this->pemesanan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "pemesanan_id" => $pemesanan_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'pemesanan' => $this->pemesanan_m->get_pemesanan($id)->row(),
            'pemesanan_detail' => $this->pemesanan_m->get_pemesanan_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('farmasi/pemesanan/pemesanan_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'PO-' . $data['pemesanan']->fs_kd_pemesanan, 'A4', 'potrait');
    }
}
