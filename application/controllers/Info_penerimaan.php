<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_penerimaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'penerimaan_m',
            'buku_m',
        ]);
    }
    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_penerimaan/info_penerimaan_data', $data);
    }

    public function detail($id)
    {
        $penerimaan_detail = $this->penerimaan_m->data_penerimaan_detail($id)->result();
        echo json_encode($penerimaan_detail);
    }


    public function delete($id)
    {

        $cek = $this->penerimaan_m->cek_buku($id)->result();
        if ($this->db->affected_rows() > 0) {

            $kd = array();
            foreach ($cek as $key => $data) {
                $kd[] = $data->fs_kd_mutasi;
            };
            $kode = implode(", ", $kd);

            $this->session->set_flashdata('info', 'Data sudah terlealisasi dengan Kode: ' . $kode);
        } else {
            $this->penerimaan_m->del($id);
            $this->buku_m->del_stok($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
            } else {
                $this->session->set_flashdata('danger', 'Data gagal dihapus');
            }
        }
        redirect('info_penerimaan');
    }

    function data_penerimaan($awal, $akhir)
    {
        $data_penerimaan = $this->penerimaan_m->rekap($awal, $akhir)->result();
        echo json_encode($data_penerimaan);
    }

    function data_penerimaan_detail($awal, $akhir)
    {
        $data_penerimaan_detail = $this->penerimaan_m->detail($awal, $akhir)->result();
        echo json_encode($data_penerimaan_detail);
    }
}
