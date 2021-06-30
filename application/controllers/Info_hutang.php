<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_hutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'hutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'distributor' =>  $this->distributor_m->get()->result(),
        );
        $this->template->load('template', 'laporan/info_hutang/info_hutang_data', $data);
    }

    function data_hutang($awal, $akhir, $id)
    {
        $data_hutang = $this->hutang_m->get($awal, $akhir, $id)->result();
        echo json_encode($data_hutang);
    }
}
