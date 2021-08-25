<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_stok extends CI_Controller
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
            'layanan_m',
        ]);
    }
    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'layanan' => $this->layanan_m->get()->result(),
        );
        $this->template->load('template', 'laporan/info_stok/info_stok_data', $data);
    }

    function data_stok($id_layanan)
    {
        $data_stok = $this->buku_m->stok($id_layanan)->result();
        echo json_encode($data_stok);
    }
}
