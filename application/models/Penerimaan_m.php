<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_m extends CI_Model
{

    public function no_penerimaan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'DO');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "DO" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'DO');
        $this->db->update('t_no');
    }

    public function no_cart()
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_penerimaan) AS cart_no FROM tb_trs_cart_penerimaan");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        return $car_no;
    }

    public function del_cart($id = null)
    {
        $fs_id_user = $this->session->userdata('userid');

        if ($id != null) {
            $this->db->where('fs_id_cart_penerimaan', $$id);
        }
        $this->db->where('fs_id_user', $fs_id_user);
        $this->db->delete('tb_trs_cart_penerimaan');
    }

    public function get_penerimaan_detail($post = null)
    {
        $fs_id_pemesanan = $post['fs_id_pemesanan'];

        $this->db->select('*');
        $this->db->from('tb_trs_pemesanan_detail');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_pemesanan_detail.fs_id_pemesanan');
        if ($fs_id_pemesanan != null) {
            $this->db->where('tb_trs_pemesanan_detail.fs_id_pemesanan', $fs_id_pemesanan);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_cart_penerimaan($id)
    {
        $this->db->select('*, tb_trs_cart_penerimaan.fs_id_barang as id_barang');
        $this->db->from('tb_trs_cart_penerimaan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_penerimaan.fs_id_barang');
        $this->db->where('tb_trs_cart_penerimaan.fs_id_user', $id);
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($params)
    {
        $this->db->insert_batch('tb_trs_cart_penerimaan', $params);
    }

    public function edit_cart($post)
    {
        $params = array(
            'fd_tgl_expired' => $post['fd_tgl_expired'],
            'fn_qty_do' => $post['fn_qty_do'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_cart_penerimaan', $post['fs_id_cart_penerimaan']);
        $this->db->update('tb_trs_cart_penerimaan', $params);
    }

    public function add_penerimaan($post)
    {
        $params = array(
            'fs_kd_penerimaan' => $this->no_penerimaan(),
            'fs_id_pemesanan' => $post['fs_id_pemesanan'],
            'fs_keterangan' => $post['fs_keterangan'],
            'fd_tgl_penerimaan' => $post['fd_tgl_penerimaan'],
            'fn_subtotal' => $post['fn_subtotal'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_penerimaan', $params);
        return $this->db->insert_id();
    }

    function add_penerimaan_detail($params)
    {
        $this->db->insert_batch('tb_trs_penerimaan_detail', $params);
    }
}
