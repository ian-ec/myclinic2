<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repack extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('parameter_m');
        $this->load->model('repack_m');
        $this->load->model('barang_m');
    }

    public function index()
    {
        $data = array(
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'master_data_farmasi/repack/repack_data', $data);
    }

    public function add()
    {
        $data = array(
            'no_repack' => $this->repack_m->no_repack(),
            'barang' => $this->barang_m->get()->result(),
            'parameter' => $this->parameter_m->get()->row(),
        );
        $this->template->load('template', 'master_data_farmasi/repack/repack_form', $data);
    }

    // public function edit($id)
    // {
    //     $queryparam = $this->parameter_m->get();
    //     $query = $this->repack_m->get($id);
    //     if ($query->num_rows() > 0) {
    //         $repack = $query->row();
    //         $data = array(
    //             'page' => 'edit',
    //             'row' => $repack,
    //             'no_repack' => $this->repack_m->no_repack(),
    //             'parameter' => $queryparam->row()
    //         );
    //         $this->template->load('template', 'master_data_farmasi/repack/repack_form', $data);
    //     } else {
    //         echo "<script>alert('Data tidak ditemukan');";
    //         echo "window.location='" . site_url('repack') . "'</script>";
    //     }
    // }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['process'])) {
            $this->repack_m->add($data);
            $this->repack_m->update_stok_plus($data);
            $this->repack_m->update_stok_min($data);
            $this->repack_m->update_no();
        } else if (isset($_POST['edit'])) {
            $this->repack_m->edit($data);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('repack');
    }

    public function del($id)
    {
        $this->repack_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('repack');
    }

    function data_repack($awal, $akhir)
    {
        $data_repack = $this->repack_m->filter2($awal, $akhir)->result();
        echo json_encode($data_repack);
    }
}
