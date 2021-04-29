<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_retur extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'retur_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_retur/info_retur_data', $data);
    }

    public function detail($id)
    {
        $retur_detail = $this->retur_m->get_retur_detail($id)->result();
        echo json_encode($retur_detail);
    }

    public function update_pembayaran($id)
    {
        $data = array(
            'retur' => $this->retur_m->get_retur($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_retur/update_pembayaran', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {
            $this->retur_m->update_retur($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('info_retur');
    }

    public function delete($id)
    {
        $this->retur_m->del($id);
        $this->retur_m->update_stok($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_retur');
    }

    function data_retur($awal, $akhir)
    {
        $data_retur = $this->retur_m->filter2($awal, $akhir)->result();
        echo json_encode($data_retur);
    }

    function data_retur_detail($awal, $akhir)
    {
        $data_retur_detail = $this->retur_m->filter($awal, $akhir)->result();
        echo json_encode($data_retur_detail);
    }
}
