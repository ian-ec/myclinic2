<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_pemesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'pemesanan_m',
        ]);
    }
    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_pemesanan/info_pemesanan_data', $data);
    }

    public function detail($id)
    {
        $pemesanan_detail = $this->pemesanan_m->get_pemesanan_detail($id)->result();
        echo json_encode($pemesanan_detail); 
    }


    public function delete($id)
    {
        $this->pemesanan_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_pemesanan');
    }

    function data_pemesanan($awal, $akhir)
    {
        $data_pemesanan = $this->pemesanan_m->rekap($awal, $akhir)->result();
        echo json_encode($data_pemesanan);
    }

    function data_pemesanan_detail($awal, $akhir)
    {
        $data_pemesanan_detail = $this->pemesanan_m->detail($awal, $akhir)->result();
        echo json_encode($data_pemesanan_detail);
    }
}
