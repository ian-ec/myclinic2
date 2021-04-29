<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_pembelian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'pembelian_m',
        ]);
    }
    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'laporan/info_pembelian/info_pembelian_data', $data);
    }

    public function detail($id)
    {
        $pembelian_detail = $this->pembelian_m->get_pembelian_detail($id)->result();
        echo json_encode($pembelian_detail);
    }

    public function update_pembayaran($id)
    {
        $data = array(
            'pembelian' => $this->pembelian_m->get_pembelian($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'laporan/info_pembelian/update_pembayaran', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['update'])) {
            $this->pembelian_m->update_pembelian($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('info_pembelian');
    }

    public function delete($id)
    {
        $this->pembelian_m->del($id);
        $this->pembelian_m->update_stok($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_pembelian');
    }

    function data_pembelian($awal, $akhir)
    {
        $data_pembelian = $this->pembelian_m->filter2($awal, $akhir)->result();
        echo json_encode($data_pembelian);
    }

    function data_pembelian_detail($awal, $akhir)
    {
        $data_pembelian_detail = $this->pembelian_m->filter($awal, $akhir)->result();
        echo json_encode($data_pembelian_detail);
    }
}
