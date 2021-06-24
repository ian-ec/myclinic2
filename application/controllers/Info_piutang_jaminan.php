<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_piutang_jaminan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'jaminan_m',
            'piutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'jaminan' =>  $this->jaminan_m->get()->result(),
        );
        $this->template->load('template', 'laporan/info_piutang_jaminan/info_piutang_jaminan_data', $data);
    }

    function data_piutang_jaminan($awal, $akhir, $id)
    {
        $data_piutang_jaminan = $this->piutang_m->get($awal, $akhir, $id)->result();
        echo json_encode($data_piutang_jaminan);
    }
}
