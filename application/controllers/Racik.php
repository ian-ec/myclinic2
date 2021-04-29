<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Racik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'barang_m',
            'etiket_m',
            'satuan_m',
            'racik_m',
        ]);
    }

    function cart_data_racik()
    {
        $cart = $this->racik_m->get_cart_racik();
        $data['cart_racik'] = $cart;
        $this->load->view('farmasi/penjualan/cart_data_racik', $data);
    }
}
