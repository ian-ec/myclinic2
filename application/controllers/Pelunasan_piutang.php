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
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'jaminan' =>  $this->jaminan_m->get()->result(),
            'no_pelunasan_piutang' =>  $this->pelunasan_piutang_m->no_pelunasan_piutang()
        );
        $this->template->load('template', 'akunting/pelunasan_piutang/pelunasan_piutang_form', $data);
    }

    function data_order($id)
    {
        $data_order = $this->pelunasan_piutang_m->get_order_piutang_jaminan($id)->result();
        echo json_encode($data_order);
    }
}
