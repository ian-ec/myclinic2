<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_pelunasan_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'pelunasan_piutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_pelunasan_piutang/info_pelunasan_piutang_data', $data);
    }

    function data_pelunasan_piutang($awal, $akhir)
    {
        $data_pelunasan_piutang = $this->pelunasan_piutang_m->get($awal, $akhir)->result();
        echo json_encode($data_pelunasan_piutang);
    }

    public function detail($id)
    {
        $pelunasan_piutang_detail = $this->pelunasan_piutang_m->get_pelunasan_piutang_detail($id)->result();
        echo json_encode($pelunasan_piutang_detail);
    }

    function data_pelunasan_piutang_detail($awal, $akhir)
    {
        $data_pelunasan_piutang_detail = $this->pelunasan_piutang_m->get_detail($awal, $akhir)->result();
        echo json_encode($data_pelunasan_piutang_detail);
    }
}
