<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_tindakan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'tindakan_m',
            'billing_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_tindakan/info_tindakan_data', $data);
    }

    public function detail($id)
    {
        $tindakan_detail = $this->tindakan_m->get_tindakan_detail($id)->result();
        echo json_encode($tindakan_detail);
    }

    public function update_pembayaran($id)
    {
        $data = array(
            'tindakan' => $this->tindakan_m->get_tindakan($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_tindakan/update_pembayaran', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {
            $this->tindakan_m->update_tindakan($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('info_tindakan');
    }

    public function delete($id)
    {
        $this->tindakan_m->del($id);
        $this->billing_m->del_tindakan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_tindakan');
    }

    function data_tindakan($awal, $akhir)
    {
        $data_tindakan = $this->tindakan_m->filter2($awal, $akhir)->result();
        echo json_encode($data_tindakan);
    }

    function data_tindakan_detail($awal, $akhir)
    {
        $data_tindakan_detail = $this->tindakan_m->filter($awal, $akhir)->result();
        echo json_encode($data_tindakan_detail);
    }
}
