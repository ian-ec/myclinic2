<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_penjualan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'registrasi_m',
            'barang_m',
            'penjualan_m',
            'billing_m',
            'racik_m'
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_penjualan/info_penjualan_data', $data);
    }

    public function detail($id)
    {
        $penjualan_detail = $this->penjualan_m->get_penjualan_detail($id)->result();
        echo json_encode($penjualan_detail);
    }

    public function racik($id)
    {
        $racik = $this->racik_m->get_racik($id)->result();
        echo json_encode($racik);
    }

    public function racik_detail($id)
    {
        $racik_detail = $this->racik_m->get_racik_detail($id)->result();
        echo json_encode($racik_detail);
    }

    public function delete($id)
    {
        $this->penjualan_m->del($id);
        $this->penjualan_m->update_stok($id);
        $this->billing_m->del_penjualan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_penjualan');
    }

    function data_penjualan($awal, $akhir)
    {
        $data_penjualan = $this->penjualan_m->filter2($awal, $akhir)->result();
        echo json_encode($data_penjualan);
    }

    function data_penjualan_detail($awal, $akhir)
    {
        $data_penjualan_detail = $this->penjualan_m->filter($awal, $akhir)->result();
        echo json_encode($data_penjualan_detail);
    }
}
