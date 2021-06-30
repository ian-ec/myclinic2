<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan_hutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('distributor_m');
        $this->load->model('parameter_m');
        $this->load->model('order_hutang_m');
        $this->load->model('pelunasan_hutang_m');
        $this->load->model('bank_group_m');
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'distributor' =>  $this->distributor_m->get()->result(),
            'bank' =>  $this->bank_group_m->get()->result(),
            'no_pelunasan_hutang' =>  $this->pelunasan_hutang_m->no_pelunasan_hutang()
        );
        $this->template->load('template', 'akunting/pelunasan_hutang/pelunasan_hutang_form', $data);
    }

    function data_order($id)
    {
        $data_order = $this->pelunasan_hutang_m->get_order_hutang_distributor($id)->result();
        echo json_encode($data_order);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['simpan'])) {
            $pelunasan_hutang_id = $this->pelunasan_hutang_m->add_pelunasan_hutang($data);

            $fs_id_hutang = $data['fs_id_hutang'];
            $fs_id_pembelian = $data['fs_id_pembelian'];
            $fn_nilai_pelunasan = $data['fn_nilai_pelunasan'];
            $row = [];
            for ($count = 0; $count < count($fs_id_hutang); $count++) {
                array_push($row, array(
                    'fs_id_pelunasan_hutang' => $pelunasan_hutang_id,
                    'fs_id_hutang' => $fs_id_hutang[$count],
                    'fs_id_pembelian' => $fs_id_pembelian[$count],
                    'fn_nilai_pelunasan' => $fn_nilai_pelunasan[$count]
                ));
            }
            $this->pelunasan_hutang_m->add_pelunasan_hutang_detail($row);
            $this->pelunasan_hutang_m->update_sisa_hutang($pelunasan_hutang_id);
            $this->pelunasan_hutang_m->update_no();
            $this->pelunasan_hutang_m->update_id_order($pelunasan_hutang_id);
            $this->pelunasan_hutang_m->update_add_order_hutang($data, $pelunasan_hutang_id);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "pelunasan_hutang_id" => $pelunasan_hutang_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'pelunasan_hutang' => $this->pelunasan_hutang_m->get_pelunasan_hutang($id)->row(),
            'pelunasan_hutang_detail' => $this->pelunasan_hutang_m->get_pelunasan_hutang_detail($id),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('akunting/pelunasan_hutang/pelunasan_hutang_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'PRINT', 'A4', 'potrait');
    }

    public function del($id)
    {
        $this->pelunasan_hutang_m->del($id);
        $this->pelunasan_hutang_m->del_order_hutang($id);
        $this->pelunasan_hutang_m->update_nilai_hutang($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_pelunasan_hutang');
    }
}
