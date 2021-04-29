<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'pembelian_m',
        ]);
    }

    public function index()
    {
        $distributor = $this->distributor_m->get()->result();
        $barang = $this->barang_m->get()->result();
        $cart = $this->pembelian_m->get_cart_pembelian();
        $data = array(
            'distributor' => $distributor,
            'barang' => $barang,
            'cart' => $cart,
            'no_pembelian' => $this->pembelian_m->no_pembelian(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/pembelian/pembelian_form', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->pembelian_m->get_cart_pembelian(['tb_trs_cart_pembelian.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->pembelian_m->update_cart_qty($data);
            } else {
                $this->pembelian_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->pembelian_m->edit_cart_pembelian($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart'])) {
            $fs_id_cart_pembelian = $this->input->post('fs_id_cart_pembelian');
            $this->pembelian_m->del_cart(['fs_id_cart_pembelian' => $fs_id_cart_pembelian]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['cancel_payment'])) {
            $this->pembelian_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $pembelian_id = $this->pembelian_m->add_pembelian($data);
            $cart = $this->pembelian_m->get_cart_pembelian()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_pembelian' => $pembelian_id,
                    'fs_id_barang' => $value->id_barang,
                    'fn_harga_beli' => $value->harga_beli,
                    'fn_qty' => $value->fn_qty,
                    'fn_diskon_harga_beli' => $value->fn_diskon,
                    'fn_pajak_beli' => $value->fn_pajak,
                    'fn_hna' => ($value->harga_beli) + ($value->harga_beli) * $value->fn_pajak / 100,
                    'fn_total_harga_beli' => $value->fn_total,
                ));
            }
            $this->pembelian_m->add_pembelian_detail($row);
            $this->pembelian_m->update_no();
            $this->pembelian_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "pembelian_id" => $pembelian_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    function cart_data()
    {
        $cart = $this->pembelian_m->get_cart_pembelian();
        $data['cart'] = $cart;
        $this->load->view('farmasi/pembelian/cart_data', $data);
    }


    public function cetak($id)
    {
        $data = array(
            'pembelian' => $this->pembelian_m->get_pembelian($id)->row(),
            'pembelian_detail' => $this->pembelian_m->get_pembelian_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->load->view('farmasi/pembelian/pembelian_cetak', $data);
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'pembelian' => $this->pembelian_m->get_pembelian($id)->row(),
            'pembelian_detail' => $this->pembelian_m->get_pembelian_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('farmasi/pembelian/pembelian_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'INV-' . $data['pembelian']->fs_kd_pembelian, 'A4', 'potrait');
    }
}
