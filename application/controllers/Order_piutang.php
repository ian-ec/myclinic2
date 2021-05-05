<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_piutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('jaminan_m');
        $this->load->model('parameter_m');
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'jaminan' =>  $this->jaminan_m->get()->result()
        );
        $this->template->load('template', 'akunting/order_piutang/order_piutang_form', $data);
    }
}
