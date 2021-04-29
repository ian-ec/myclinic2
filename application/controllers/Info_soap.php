<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_soap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'soap_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_soap/info_soap_data', $data);
    }

    public function detail($id)
    {
        $soap_detail = $this->soap_m->get_soap_detail($id)->result();
        echo json_encode($soap_detail);
    }

    public function update_pembayaran($id)
    {
        $data = array(
            'soap' => $this->soap_m->get_soap($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_soap/update_pembayaran', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {
            $this->soap_m->update_soap($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('info_soap');
    }

    public function delete($id)
    {
        $this->soap_m->del($id);
        $this->billing_m->del_soap($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_soap');
    }

    function data_soap($awal, $akhir)
    {
        $data_soap = $this->soap_m->filter2($awal, $akhir)->result();
        echo json_encode($data_soap);
    }
}
