<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_pelunasan_hutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'pelunasan_hutang_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_pelunasan_hutang/info_pelunasan_hutang_data', $data);
    }

    function data_pelunasan_hutang($awal, $akhir)
    {
        $data_pelunasan_hutang = $this->pelunasan_hutang_m->get($awal, $akhir)->result();
        echo json_encode($data_pelunasan_hutang);
    }

    public function detail($id)
    {
        $pelunasan_hutang_detail = $this->pelunasan_hutang_m->get_pelunasan_hutang_detail($id)->result();
        echo json_encode($pelunasan_hutang_detail);
    }

    function data_pelunasan_hutang_detail($awal, $akhir)
    {
        $data_pelunasan_hutang_detail = $this->pelunasan_hutang_m->get_detail($awal, $akhir)->result();
        echo json_encode($data_pelunasan_hutang_detail);
    }
}
