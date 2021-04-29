<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adjustment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'pegawai_m',
            'adjustment_m',
        ]);
    }

    public function index()
    {
        $distributor = $this->distributor_m->get()->result();
        $barang = $this->barang_m->get()->result();
        $cart = $this->adjustment_m->get_cart_adjustment();
        $data = array(
            'distributor' => $distributor,
            'barang' => $barang,
            'pegawai' => $this->pegawai_m->get()->result(),
            'cart' => $cart,
            'no_adjustment' => $this->adjustment_m->no_adjustment(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/adjustment/adjustment_form', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->adjustment_m->get_cart_adjustment(['tb_trs_cart_adjustment.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->adjustment_m->update_cart_qty($data);
            } else {
                $this->adjustment_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->adjustment_m->edit_cart_adjustment($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart'])) {
            $fs_id_cart_adjustment = $this->input->post('fs_id_cart_adjustment');
            $this->adjustment_m->del_cart(['fs_id_cart_adjustment' => $fs_id_cart_adjustment]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['cancel_payment'])) {
            $this->adjustment_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $adjustment_id = $this->adjustment_m->add_adjustment($data);
            $cart = $this->adjustment_m->get_cart_adjustment()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_adjustment' => $adjustment_id,
                    'fs_id_barang' => $value->id_barang,
                    'fn_harga_beli' => $value->harga_beli,
                    'fn_stok_awal' => $value->fn_stok,
                    'fn_qty' => $value->fn_qty,
                    'fn_stok_akhir' => $value->fn_stok_akhir,
                    'fn_total_harga_beli' => $value->fn_total,
                ));
            }
            $this->adjustment_m->add_adjustment_detail($row);
            $this->adjustment_m->update_no();
            $this->adjustment_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "adjustment_id" => $adjustment_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    function cart_data()
    {
        $cart = $this->adjustment_m->get_cart_adjustment();
        $data['cart'] = $cart;
        $this->load->view('farmasi/adjustment/cart_data', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'adjustment' => $this->adjustment_m->get_adjustment($id)->row(),
            'adjustment_detail' => $this->adjustment_m->get_adjustment_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('farmasi/adjustment/adjustment_cetak', $data, true);
        $this->fungsi->PdfGenerator($html, 'INV-' . $data['adjustment']->fs_kd_adjustment, 'A4', 'potrait');
    }
}
