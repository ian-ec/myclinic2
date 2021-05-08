<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jaminan_m');
        $this->load->model('parameter_m');
        $this->load->model('order_piutang_m');
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'jaminan' =>  $this->jaminan_m->get()->result(),
            'no_order_piutang' =>  $this->order_piutang_m->no_order_piutang(),
        );
        $this->template->load('template', 'akunting/order_piutang/order_piutang_form', $data);
    }

    public function add_cart_order()
    {
        $data = $this->input->post(null, TRUE);
        $fs_id_registrasi = $this->input->post('fs_id_registrasi');
        $result = $this->order_piutang_m->cek_chart($fs_id_registrasi);

        if ($result->num_rows() < 1) {
            $this->order_piutang_m->add_cart($data);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        } else {
            $fs_id_registrasi = $data['fs_id_registrasi'];
            $this->order_piutang_m->del_cart($fs_id_registrasi);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function data_piutang($id, $awal, $akhir)
    {
        $this->order_piutang_m->del_cart();
        $data_piutang = $this->order_piutang_m->get($id, $awal, $akhir)->result();
        echo json_encode($data_piutang);
    }
}
