<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_piutang_pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'regout_m',
            'bank_m',
            'kasir_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
            'debit' => $this->bank_m->get_debit()->result(),
            'credit' => $this->bank_m->get_credit()->result(),
        );
        $this->template->load('template', 'laporan/info_piutang_pasien/info_piutang_pasien_data', $data);
    }


    public function update_pembayaran($id)
    {
        $data = array(
            'piutang_pasien' => $this->piutang_pasien_m->get_piutang_pasien($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_piutang_pasien/update_pembayaran', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['process_payment'])) {
            $this->kasir_m->update_regout($data);
            $fs_id_regout2 = $this->kasir_m->update_regout2($data);
            $this->kasir_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "fs_id_regout2" => $fs_id_regout2);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }


    function data_piutang_pasien($awal, $akhir)
    {
        $data_piutang_pasien = $this->regout_m->piutang_umum($awal, $akhir)->result();
        echo json_encode($data_piutang_pasien);
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'piutang' => $this->regout_m->piutang($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('laporan/info_piutang_pasien/kwitansi_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'KW', 'A4', 'potrait');
    }

    function piutang($id)
    {
        $data_piutang_pasien = $this->regout_m->piutang($id)->row();
        echo json_encode($data_piutang_pasien);
    }
}
