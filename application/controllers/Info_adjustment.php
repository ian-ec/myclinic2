<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_adjustment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'adjustment_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_adjustment/info_adjustment_data', $data);
    }


    public function detail($id)
    {
        $adjustment_detail = $this->adjustment_m->get_adjustment_detail($id)->result();
        echo json_encode($adjustment_detail);
    }

    public function update_pembayaran($id)
    {
        $data = array(
            'adjustment' => $this->adjustment_m->get_adjustment($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_adjustment/update_pembayaran', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {
            $this->adjustment_m->update_adjustment($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('info_adjustment');
    }

    public function delete($id)
    {
        $this->adjustment_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_adjustment');
    }

    function data_adjustment($awal, $akhir)
    {
        $data_adjustment = $this->adjustment_m->filter2($awal, $akhir)->result();
        echo json_encode($data_adjustment);
    }

    function data_adjustment_detail($awal, $akhir)
    {
        $data_adjustment_detail = $this->adjustment_m->filter($awal, $akhir)->result();
        echo json_encode($data_adjustment_detail);
    }
}
