<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_order_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'order_piutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_order_piutang/info_order_piutang_data', $data);
    }

    function data_order_piutang($awal, $akhir)
    {
        $data_order_piutang = $this->order_piutang_m->filter2($awal, $akhir)->result();
        echo json_encode($data_order_piutang);
    }

    public function detail($id)
    {
        $order_piutang_detail = $this->order_piutang_m->get_order_piutang_detail($id)->result();
        echo json_encode($order_piutang_detail);
    }
}
