<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('billing_m');
        $this->load->model('jaminan_m');
        $this->load->model('parameter_m');
        $this->load->model('bank_m');
        $this->load->model('rm_m');
        $this->load->model('tindakan_m');
        $this->load->model('penjualan_m');
        $this->load->model('racik_m');
        $this->load->model('kasir_m');
        $this->load->model('regout_m');
        $this->load->model('piutang_m');
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'row' => $this->billing_m->get(),
        );
        $this->template->load('template', 'pembayaran/kasir/kasir_data', $data);
    }

    public function bayar($id)
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'billing' => $this->billing_m->get_rekap($id),
            'detail_reg' => $this->billing_m->get_detail_reg($id),
            'detail_tindakan' => $this->billing_m->get_detail_tindakan($id),
            'detail_penjualan' => $this->billing_m->get_detail_penjualan($id),
            'row' => $this->billing_m->get($id)->row(),
            'debit' => $this->bank_m->get_debit()->result(),
            'credit' => $this->bank_m->get_credit()->result(),
            'jaminan' => $this->jaminan_m->get()->result(),
        );
        $this->template->load('template', 'pembayaran/kasir/kasir_detail', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        $fn_klaim = $data['fn_klaim'];

        if (isset($_POST['process_payment'])) {
            $regout = $this->kasir_m->add_regout($data);
            $regout2 = $this->kasir_m->add_regout2($data, $regout);
            if ($fn_klaim != 0) {
                $this->kasir_m->add_piutang($data);
                $this->kasir_m->update_no_piutang();
            }
            $non_aktif_reg = $this->kasir_m->non_aktif_reg($data);
            $udpate_tgl_keluar = $this->kasir_m->udpate_tgl_keluar($data);
            $udpate_tgl_keluar = $this->kasir_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "regout_id" => $regout);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cetak_rekap_pdf($id)
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'billing' => $this->billing_m->get_rekap($id),
            'detail_reg' => $this->billing_m->get_detail_reg($id),
            'detail_tindakan' => $this->billing_m->get_detail_tindakan($id),
            'detail_penjualan' => $this->billing_m->get_detail_penjualan($id),
            'row' => $this->regout_m->get_regout($id)->row(),
        );
        $html = $this->load->view('pembayaran/kasir/kasir_cetak_rekap_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'CET', 'A4', 'potrait');
    }

    public function cetak_detail_pdf($id)
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'billing' => $this->billing_m->get_rekap($id),
            'detail_reg' => $this->billing_m->get_detail_reg($id),
            'detail_tindakan' => $this->billing_m->get_detail_tindakan($id),
            'detail_penjualan' => $this->billing_m->get_detail_penjualan($id),
            'row' => $this->regout_m->get_regout($id)->row(),
        );
        $html = $this->load->view('pembayaran/kasir/kasir_cetak_detail_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'CET', 'A4', 'potrait');
    }

    public function cetak_detail($id)
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'billing' => $this->billing_m->get_rekap($id),
            'detail_reg' => $this->billing_m->get_detail_reg($id),
            'detail_tindakan' => $this->billing_m->get_detail_tindakan($id),
            'detail_penjualan' => $this->billing_m->get_detail_penjualan($id),
            'row' => $this->regout_m->get_regout($id)->row(),
        );
        $this->load->view('pembayaran/kasir/kasir_cetak_detail_pdf', $data);
    }
}
