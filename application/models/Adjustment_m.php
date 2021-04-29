<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adjustment_m extends CI_Model
{

    public function no_adjustment()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'AJ');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "AJ" . $no;
        return $no_trs;
    }

    public function get_cart_adjustment($params = null)
    {
        $this->db->select('*, tb_trs_cart_adjustment.fs_id_barang as id_barang, tb_trs_cart_adjustment.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_cart_adjustment');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_adjustment.fs_id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_adjustment) AS cart_no FROM tb_trs_cart_adjustment");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_adjustment' => $car_no,
            'fs_id_barang' => $post['fs_id_barang'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_stok' => $post['fn_stok'],
            'fn_qty' => $post['fn_qty'],
            'fn_stok_akhir' => $post['fn_stok'] + $post['fn_qty'],
            'fn_total' => ($post['fn_harga_beli'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_adjustment', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_adjustment SET fn_harga_beli = '$post[fn_harga_beli]',
                fn_qty = fn_qty + '$post[fn_qty]',
                fn_total = '$post[fn_harga_beli]' * fn_qty
                WHERE fs_id_barang = '$post[fs_id_barang]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tb_trs_cart_adjustment');
    }

    public function edit_cart_adjustment($post)
    {
        $params = array(
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_stok_akhir' => $post['fn_stok_akhir'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_barang', $post['fs_id_barang']);
        $this->db->update('tb_trs_cart_adjustment', $params);
    }

    public function add_adjustment($post)
    {
        $params = array(
            'fs_kd_adjustment' => $this->no_adjustment(),
            'fs_id_pegawai' => $post['fs_id_pegawai'],
            'fn_total_nilai_beli' => $post['fn_total_nilai_beli'],
            'fd_tgl_adjustment' => $post['fd_tgl_adjustment'],
            'fs_keterangan' => $post['fs_keterangan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_adjustment', $params);
        return $this->db->insert_id();
    }

    function add_adjustment_detail($params)
    {
        $this->db->insert_batch('tb_trs_adjustment_detail', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'AJ');
        $this->db->update('t_no');
    }

    public function get_adjustment($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_adjustment');
        $this->db->join('user', 'user.user_id = tb_trs_adjustment.fs_id_user');
        $this->db->join('t_pegawai', 't_pegawai.fs_id_pegawai = tb_trs_adjustment.fs_id_pegawai');
        $this->db->where('fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_adjustment', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_adjustment_detail($adjustment_id = null)
    {
        $this->db->select('*, tb_trs_adjustment_detail.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_adjustment_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_adjustment_detail.fs_id_barang');
        $this->db->join('tb_trs_adjustment', 'tb_trs_adjustment.fs_id_adjustment = tb_trs_adjustment_detail.fs_id_adjustment');
        if ($adjustment_id != null) {
            $this->db->where('tb_trs_adjustment_detail.fs_id_adjustment', $adjustment_id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function update_adjustment($post)
    // {
    //     $params = [
    //         'jns_bayar' => $post['jns_bayar'],
    //         'tgl_bayar' => $post['tgl_bayar']
    //     ];
    //     $this->db->where('adjustment_id', $post['adjustment_id']);
    //     $this->db->update('t_adjustment', $params);
    // }



    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_adjustment');
        $this->db->join('user', 'user.user_id = tb_trs_adjustment.fs_id_user');
        $this->db->join('t_pegawai', 't_pegawai.fs_id_pegawai = tb_trs_adjustment.fs_id_pegawai');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_adjustment >=', $awal);
        $this->db->where('fd_tgl_adjustment <=', $akhir);
        $this->db->order_by('tb_trs_adjustment.fs_id_adjustment', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*, tb_trs_adjustment_detail.fn_harga_beli as hpp');
        $this->db->from('tb_trs_adjustment_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_adjustment_detail.fs_id_barang');
        $this->db->join('tb_trs_adjustment', 'tb_trs_adjustment.fs_id_adjustment = tb_trs_adjustment_detail.fs_id_adjustment');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_adjustment >=', $awal);
        $this->db->where('fd_tgl_adjustment <=', $akhir);
        $this->db->order_by('tb_trs_adjustment.fs_id_adjustment', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    // public function del($id)
    // {
    //     $date_now = date('Y-m-d');
    //     $user_void = $this->session->userdata('userid');
    //     $this->db->set('fd_tgl_void', $date_now);
    //     $this->db->set('fs_id_user', $user_void);
    //     $this->db->where('fs_id_adjustment', $id);
    //     $this->db->update('tb_trs_adjustment');
    // }
}
