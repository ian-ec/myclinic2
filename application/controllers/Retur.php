<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'retur_m',
        ]);
    }

    public function index()
    {
        $distributor = $this->distributor_m->get()->result();
        $barang = $this->barang_m->get()->result();
        $cart = $this->retur_m->get_cart_retur();
        $data = array(
            'distributor' => $distributor,
            'barang' => $barang,
            'cart' => $cart,
            'no_retur' => $this->retur_m->no_retur(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/retur/retur_form', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $fs_id_barang = $this->input->post('fs_id_barang');
            $check_cart = $this->retur_m->get_cart_retur(['tb_trs_cart_retur.fs_id_barang' => $fs_id_barang])->num_rows();
            if ($check_cart > 0) {
                $this->retur_m->update_cart_qty($data);
            } else {
                $this->retur_m->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->retur_m->edit_cart_retur($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['del_cart'])) {
            $fs_id_cart_retur = $this->input->post('fs_id_cart_retur');
            $this->retur_m->del_cart(['fs_id_cart_retur' => $fs_id_cart_retur]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['cancel_payment'])) {
            $this->retur_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $retur_id = $this->retur_m->add_retur($data);
            $cart = $this->retur_m->get_cart_retur()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_retur' => $retur_id,
                    'fs_id_barang' => $value->id_barang,
                    'fn_harga_beli' => $value->harga_beli,
                    'fn_qty' => $value->fn_qty,
                    'fn_total_harga_beli' => $value->fn_total,
                ));
            }
            $this->retur_m->add_retur_detail($row);
            $this->retur_m->update_no();
            $this->retur_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "retur_id" => $retur_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    function cart_data()
    {
        $cart = $this->retur_m->get_cart_retur();
        $data['cart'] = $cart;
        $this->load->view('farmasi/retur/cart_data', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'retur' => $this->retur_m->get_retur($id)->row(),
            'retur_detail' => $this->retur_m->get_retur_detail($id)->result(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('farmasi/retur/retur_cetak', $data, true);
        $this->fungsi->PdfGenerator($html, 'INV-' . $data['retur']->fs_kd_retur, 'A4', 'potrait');
    }
}
