<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_registrasi_keluar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'regout_m',
            'registrasi_m',
            'billing_m',
            'tindakan_m',
            'penjualan_m',
            'racik_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_registrasi_keluar/info_registrasi_keluar_data', $data);
    }

    function data_registrasi_keluar($awal, $akhir)
    {
        $data_registrasi_keluar = $this->regout_m->filter2($awal, $akhir)->result();
        echo json_encode($data_registrasi_keluar);
    }


    public function batal($id, $rm)
    {
        $this->regout_m->cek_order_piutang($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('warning', 'Pasien sudah di buatkan order pelunasan piutang');
        } else {
            $this->regout_m->aktif_reg($rm);
            if ($this->db->affected_rows() > 0) {
                $this->regout_m->del_regout($id);
                $this->regout_m->del_regout2($id);
                $this->regout_m->udpate_tgl_batal($id);
                $this->regout_m->update_status($id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('info', 'Data berhasil batalkan');
                }
                redirect('kasir');
            } else {
                $this->session->set_flashdata('warning', 'Pasien Aktif dengan register lain');
            }
        }
        redirect('info_registrasi_keluar');
    }

    public function billing_rekap($id)
    {
        $rekap = $this->billing_m->get_rekap($id)->result();
        echo json_encode($rekap);
    }

    public function detail_reg($id)
    {
        $detail_reg = $this->billing_m->get_detail_reg($id)->result();
        echo json_encode($detail_reg);
    }

    public function detail_tindakan($id)
    {
        $detail_tindakan = $this->billing_m->get_detail_tindakan($id)->result();
        echo json_encode($detail_tindakan);
    }

    public function data_tindakan($id)
    {
        $data_tindakan = $this->tindakan_m->get_tindakan_detail($id)->result();
        echo json_encode($data_tindakan);
    }

    public function detail_penjualan($id)
    {
        $detail_penjualan = $this->billing_m->get_detail_penjualan($id)->result();
        echo json_encode($detail_penjualan);
    }

    public function data_penjualan($id)
    {
        $data_penjualan = $this->penjualan_m->get_penjualan_detail($id)->result();
        echo json_encode($data_penjualan);
    }

    public function detail_racik($id)
    {
        $detail_racik = $this->racik_m->get_racik($id)->result();
        echo json_encode($detail_racik);
    }

    public function data_racik($id)
    {
        $data_racik = $this->racik_m->get_racik_detail($id)->result();
        echo json_encode($data_racik);
    }

    public function riwayat_pembayaran($id)
    {
        $pembayaran = $this->regout_m->detail_pembayaran($id)->result();
        echo json_encode($pembayaran);
    }
}
