<?php
defined('BASEPATH') or exit('No direct script access allowed');

class racik_m extends CI_Model
{

    public function no_racik()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RCK');
        $query = $this->db->get()->row();
        $no = sprintf("%07d", $query->fn_no);
        $no_trs = "RCK" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RCK');
        $this->db->update('t_no');
    }

    public function get_cart_racik($params = null)
    {
        $this->db->select('*, tb_trs_cart_racik.fn_harga_jual as harga_jual_racik, tb_trs_cart_racik.fn_harga_beli as harga_beli_racik, tb_trs_cart_racik.fs_id_barang as id_barang_racik, tb_trs_cart_racik.fs_id_etiket as id_etiket_racik');
        $this->db->from('tb_trs_cart_racik');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_racik.fs_id_barang');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket = tb_trs_cart_racik.fs_id_etiket', 'left');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->order_by('fs_id_cart_racik', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_racik($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_racik');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket=tb_trs_racik.fs_id_etiket', 'left');
        if ($id != null) {
            $this->db->where('fs_id_penjualan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_racik_detail($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_racik_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_racik_detail.fs_id_barang');
        if ($id != null) {
            $this->db->where('tb_trs_racik_detail.fs_id_racik', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_racik SET fn_harga_jual = '$post[fn_harga_jual]',
                fn_qty = fn_qty + '$post[fn_qty]',
                fn_total = '$post[fn_harga_jual]' * fn_qty
                WHERE fs_id_barang = '$post[fs_id_barang]'";
        $this->db->query($sql);
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_racik) AS cart_no FROM tb_trs_cart_racik");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_racik' => $car_no,
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_barang' => $post['fs_id_barang'],
            'fs_id_etiket' => 0,
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_harga_jual' => $post['fn_harga_jual'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => 0,
            'fn_total' => ($post['fn_harga_jual'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_racik', $params);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tb_trs_cart_racik');
    }

    public function add_racik($post)
    {
        $params = array(
            'fs_kd_racik' => $this->no_racik(),
            'fs_nm_racik' =>  $post['fs_nm_racik'],
            'fs_id_satuan' =>  $post['fs_id_satuan'],
            'fn_qty_racik' =>  $post['fn_qty_racik'],
            'fs_id_etiket' =>  $post['fs_id_etiket'],
            'fn_nilai_beli_racik' => $post['fn_nilai_beli_racik'],
            'fn_nilai_jual_racik' => $post['fn_nilai_jual_racik'],
            'fd_tgl_racik' => $post['fd_tgl_racik'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_racik', $params);
        return $this->db->insert_id();
    }

    function add_racik_detail($params)
    {
        $this->db->insert_batch('tb_trs_racik_detail', $params);
    }

    public function add_cart_penjualan($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_penjualan) AS cart_no FROM tb_trs_cart_penjualan");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_penjualan' => $car_no,
            'fs_id_barang' => $post['fs_kd_racik'],
            'fs_id_etiket' => $post['fs_id_etiket'],
            'fn_harga_beli' => ($post['fn_nilai_beli_racik'] / $post['fn_qty_racik']),
            'fn_harga_jual' => ($post['fn_nilai_jual_racik'] / $post['fn_qty_racik']),
            'fn_qty' => $post['fn_qty_racik'],
            'fn_diskon' => 0,
            'fn_total' => $post['fn_nilai_jual_racik'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_penjualan', $params);
    }

    public function del_racik($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_penjualan', 0);
        $this->db->delete('tb_trs_racik');
    }

    public function del_racik_detail($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_penjualan', 0);
        $this->db->delete('tb_trs_racik_detail');
    }

    public function update_id_penjualan($id)
    {
        $this->db->set('fs_id_penjualan', $id);
        $this->db->where('fs_id_penjualan =', '0');
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->update('tb_trs_racik');
    }

    public function update_id_penjualan_detail($id)
    {
        $this->db->set('fs_id_penjualan', $id);
        $this->db->where('fs_id_penjualan =', '0');
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->update('tb_trs_racik_detail');
    }
}
