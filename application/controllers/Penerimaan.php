<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model([
            'parameter_m',
            'distributor_m',
            'barang_m',
            'penerimaan_m',
            'pemesanan_m',
            'layanan_m',
            'buku_m',
        ]);
    }

    public function index()
    {
        $data = array(
            'distributor' => $this->distributor_m->get()->result(),
            'layanan' => $this->layanan_m->get(),
            'barang' => $this->barang_m->get()->result(),
            'pemesanan' => $this->pemesanan_m->get_pemesanan()->result(),
            'no_penerimaan' => $this->penerimaan_m->no_penerimaan(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $this->template->load('template', 'farmasi/penerimaan/penerimaan_form', $data);
    }

    function cart_data($id)
    {
        $data_penerimaan = $this->penerimaan_m->get_cart_penerimaan($id)->result();
        echo json_encode($data_penerimaan);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['select_pemesanan'])) {

            $this->penerimaan_m->del_cart();
            $cart = $this->penerimaan_m->get_penerimaan_detail($data)->result();
            $cart_no = $this->penerimaan_m->no_cart();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_cart_penerimaan' => $cart_no++,
                    'fs_id_pemesanan' => $value->fs_id_pemesanan,
                    'fs_id_layanan' => $value->fs_id_layanan,
                    'fs_id_barang' => $value->fs_id_barang,
                    'fn_hpp' => $value->fn_hpp,
                    'fd_tgl_expired' => '3000-01-01',
                    'fn_qty_po' => $value->fn_qty_sisa,
                    'fn_qty_do' => $value->fn_qty_sisa,
                    'fn_diskon' => $value->fn_diskon,
                    'fn_ppn' => $value->fn_ppn,
                    'fn_total' => $value->fn_total,
                    'fs_id_user' => $this->session->userdata('userid'),
                ));
            }
            $this->penerimaan_m->add_cart($row);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {

            $this->penerimaan_m->edit_cart($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['simpan'])) {

            $id = $this->session->userdata('userid');
            $id_pemesanan = $data['fs_id_pemesanan'];
            $fs_kd_penerimaan = $this->penerimaan_m->no_penerimaan();
            $fs_kd_buku = $this->buku_m->no_buku();
            $penerimaan_id = $this->penerimaan_m->add_penerimaan($data);
            $cart = $this->penerimaan_m->get_cart_penerimaan($id)->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'fs_id_penerimaan' => $penerimaan_id,
                    'fs_id_barang' => $value->id_barang,
                    'fd_tgl_expired' => $value->fd_tgl_expired,
                    'fn_hpp' => $value->fn_hpp,
                    'fn_qty_po' => $value->fn_qty_po,
                    'fn_qty_do' => $value->fn_qty_do,
                    'fn_diskon' => $value->fn_diskon,
                    'fn_ppn' => $value->fn_ppn,
                    'fn_total' => $value->fn_total,
                ));
            }
            $this->penerimaan_m->add_penerimaan_detail($row);

            $buku = [];
            foreach ($cart as $c => $value) {
                array_push($buku, array(
                    'fs_kd_jenis_mutasi' => 'DO',
                    'fs_id_barang' => $value->id_barang,
                    'fs_id_layanan' => $value->fs_id_layanan,
                    'fn_hpp' => $value->fn_hpp,
                    'fn_stok_in' => $value->fn_qty_do,
                    'fs_id_pemesanan' => $id_pemesanan,
                    'fs_id_penerimaan' => $penerimaan_id,
                    'fs_kd_mutasi' => $fs_kd_penerimaan,
                    'fd_tgl_expired' => $value->fn_total,
                    'fd_tgl_mutasi' => $value->fn_total,
                ));
            }
            $this->buku_m->add_buku($buku);

            $this->penerimaan_m->del_cart();
            $this->penerimaan_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "penerimaan_id" => $penerimaan_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }
}
