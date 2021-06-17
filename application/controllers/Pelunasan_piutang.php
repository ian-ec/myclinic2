<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jaminan_m');
        $this->load->model('parameter_m');
        $this->load->model('order_piutang_m');
        $this->load->model('pelunasan_piutang_m');
        $this->load->model('bank_group_m');
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'jaminan' =>  $this->jaminan_m->get()->result(),
            'bank' =>  $this->bank_group_m->get()->result(),
            'no_pelunasan_piutang' =>  $this->pelunasan_piutang_m->no_pelunasan_piutang()
        );
        $this->template->load('template', 'akunting/pelunasan_piutang/pelunasan_piutang_form', $data);
    }

    function data_order($id)
    {
        $data_order = $this->pelunasan_piutang_m->get_order_piutang_jaminan($id)->result();
        echo json_encode($data_order);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['simpan'])) {
            $pelunasan_piutang_id = $this->pelunasan_piutang_m->add_pelunasan_piutang($data);

            $fs_id_piutang = $data['fs_id_piutang'];
            $fs_id_registrasi = $data['fs_id_registrasi'];
            $fn_nilai_pelunasan = $data['fn_nilai_pelunasan'];
            $row = [];
            for ($count = 0; $count < count($fs_id_piutang); $count++) {
                array_push($row, array(
                    'fs_id_pelunasan_piutang' => $pelunasan_piutang_id,
                    'fs_id_piutang' => $fs_id_piutang[$count],
                    'fs_id_registrasi' => $fs_id_registrasi[$count],
                    'fn_nilai_pelunasan' => $fn_nilai_pelunasan[$count]
                ));
            }
            $this->pelunasan_piutang_m->add_pelunasan_piutang_detail($row);
            $this->pelunasan_piutang_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "pelunasan_piutang_id" => $pelunasan_piutang_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }
}
