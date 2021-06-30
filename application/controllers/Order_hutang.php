<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_hutang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('distributor_m');
        $this->load->model('parameter_m');
        $this->load->model('order_hutang_m');
    }

    public function index()
    {

        $data = array(
            'parameter' =>  $this->parameter_m->get()->row(),
            'distributor' =>  $this->distributor_m->get()->result(),
            'no_order_hutang' =>  $this->order_hutang_m->no_order_hutang(),
        );
        $this->template->load('template', 'akunting/order_hutang/order_hutang_form', $data);
    }

    public function data_hutang($id, $awal, $akhir)
    {
        $this->order_hutang_m->del_cart();
        $data_hutang = $this->order_hutang_m->get($id, $awal, $akhir)->result();
        echo json_encode($data_hutang);
    }

    public function add_cart_order()
    {
        $data = $this->input->post(null, TRUE);
        $fs_id_pembelian = $this->input->post('fs_id_pembelian');
        $result = $this->order_hutang_m->cek_chart($fs_id_pembelian);

        if ($result->num_rows() < 1) {
            $this->order_hutang_m->add_cart($data);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        } else {
            $fs_id_pembelian = $data['fs_id_pembelian'];
            $this->order_hutang_m->del_cart($fs_id_pembelian);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['simpan'])) {
            $order_hutang_id = $this->order_hutang_m->simpan($data);
            $cart = $this->order_hutang_m->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_order_hutang' => $order_hutang_id,
                    'fs_id_hutang' => $value->fs_id_hutang,
                    'fs_id_pembelian' => $value->fs_id_pembelian,
                    'fn_nilai_hutang' => $value->fn_nilai_hutang,
                ));
            }
            $this->order_hutang_m->add_order_hutang_detail($row);
            $this->order_hutang_m->update_no();
            $this->order_hutang_m->update_data_hutang($order_hutang_id);
            $this->order_hutang_m->del_cart();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "fs_id_order_hutang" => $order_hutang_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'order_hutang' => $this->order_hutang_m->get_order_hutang($id)->row(),
            'order_hutang_detail' => $this->order_hutang_m->get_order_hutang_detail($id),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('akunting/order_hutang/order_hutang_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'PRINT', 'A4', 'potrait');
    }

    public function del($id)
    {
        $this->order_hutang_m->del($id);
        $this->order_hutang_m->del_hutang($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('info_order_hutang');
    }
}
