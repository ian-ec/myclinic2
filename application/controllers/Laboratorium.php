<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratorium extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('laboratorium_m');
        $this->load->model('parameter_m');
        $this->load->model('rm_m');
    }

    public function index()
    {
        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'billing/laboratorium/lab_antigen_data', $data);
    }

    public function tambah_antigen()
    {
        $antigen = new stdClass();
        $antigen->fs_id_trs = null;
        $antigen->fs_id_rm = null;
        $antigen->fs_nm_pasien = null;
        $antigen->fd_tgl_lahir = null;
        $antigen->fs_nm_kelamin = null;
        $antigen->fs_kd_rm = null;
        $antigen->fs_identitas = null;
        $antigen->fs_telp = null;
        $antigen->fs_alamat = null;
        $antigen->fs_tipe_spesimen = null;
        $antigen->fs_no_id_lab = null;
        $antigen->fn_no_spesimen = null;
        $antigen->fd_tgl_ambil = null;
        $antigen->fd_tgl_proses = null;
        $antigen->fs_jam_lapor = null;
        $antigen->fs_nm_test = null;
        $antigen->fn_hasil_test = null;
        $data = array(
            'page' => 'add',
            'parameter' =>  $this->parameter_m->get()->row(),
            'rm' =>  $this->rm_m->get()->result(),
            'row' =>  $antigen
        );
        $this->template->load('template', 'billing/laboratorium/lab_antigen_form', $data);
    }

    public function edit_antigen($id)
    {
        $data = array(
            'page' => 'edit',
            'parameter' =>  $this->parameter_m->get()->row(),
            'row' =>  $this->laboratorium_m->get_data($id)->row()
        );
        $this->template->load('template', 'billing/laboratorium/lab_antigen_form', $data);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['simpan'])) {

            $fs_id_lab = $this->laboratorium_m->add_antigen($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "fs_id_lab" => $fs_id_lab);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        $data = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {

            $fs_id_trs = $data['fs_id_trs'];
            $this->laboratorium_m->update_antigen($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "fs_id_lab" => $fs_id_trs);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function data_antigen($awal, $akhir)
    {
        $data_antigen = $this->laboratorium_m->get($awal, $akhir)->result();
        echo json_encode($data_antigen);
    }

    public function detail_antigen($id)
    {
        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'antigen' =>  $this->laboratorium_m->get_detail($id)->row(),
        );
        $this->template->load('template', 'billing/laboratorium/lab_antigen_detail', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'antigen' =>  $this->laboratorium_m->get_detail($id)->row(),
        );
        $this->load->view('billing/laboratorium/lab_antigen_print', $data);
    }

    public function del($id)
    {
        $this->laboratorium_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('laboratorium');
    }
}
