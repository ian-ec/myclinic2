<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_order_hutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'order_hutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_order_hutang/info_order_hutang_data', $data);
    }

    function data_order_hutang($awal, $akhir)
    {
        $data_order_hutang = $this->order_hutang_m->filter2($awal, $akhir)->result();
        echo json_encode($data_order_hutang);
    }

    public function detail($id)
    {
        $order_hutang_detail = $this->order_hutang_m->get_order_hutang_detail($id)->result();
        echo json_encode($order_hutang_detail);
    }

    function data_order_hutang_detail($awal, $akhir)
    {
        $data_order_hutang_detail = $this->order_hutang_m->filter($awal, $akhir)->result();
        echo json_encode($data_order_hutang_detail);
    }
}
