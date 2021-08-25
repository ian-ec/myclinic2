<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_buku extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'buku_m',
        ]);
    }
    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_buku/info_buku_data', $data);
    }

    function data_buku($awal, $akhir)
    {
        $data_buku = $this->buku_m->rekap($awal, $akhir)->result();
        echo json_encode($data_buku);
    }
}
