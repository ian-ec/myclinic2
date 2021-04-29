<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur_m extends CI_Model
{

    public function no_retur()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RU');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "RU" . $no;
        return $no_trs;
    }

    public function get_cart_retur($params = null)
    {
        $this->db->select('*, tb_trs_cart_retur.fs_id_barang as id_barang, tb_trs_cart_retur.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_cart_retur');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_retur.fs_id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_retur) AS cart_no FROM tb_trs_cart_retur");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_retur' => $car_no,
            'fs_id_barang' => $post['fs_id_barang'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_total' => ($post['fn_harga_beli'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_retur', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_retur SET fn_harga_beli = '$post[fn_harga_beli]',
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
        $this->db->delete('tb_trs_cart_retur');
    }

    public function edit_cart_retur($post)
    {
        $params = array(
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_barang', $post['fs_id_barang']);
        $this->db->update('tb_trs_cart_retur', $params);
    }

    public function add_retur($post)
    {
        $params = array(
            'fs_kd_retur' => $this->no_retur(),
            'fs_id_distributor' => $post['fs_id_distributor'] == "" ? null : $post['fs_id_distributor'],
            'fn_total_nilai_beli' => $post['fn_total_nilai_beli'],
            'fn_jenis_bayar' => $post['fn_jenis_bayar'],
            'fd_tgl_retur' => $post['fd_tgl_retur'],
            'fs_keterangan' => $post['fs_keterangan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_retur', $params);
        return $this->db->insert_id();
    }

    function add_retur_detail($params)
    {
        $this->db->insert_batch('tb_trs_retur_detail', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RU');
        $this->db->update('t_no');
    }

    public function get_retur($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_retur');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_retur.fs_id_distributor');
        $this->db->join('user', 'user.user_id = tb_trs_retur.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_retur', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_retur_detail($retur_id = null)
    {
        $this->db->select('*, tb_trs_retur_detail.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_retur_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_retur_detail.fs_id_barang');
        $this->db->join('tb_trs_retur', 'tb_trs_retur.fs_id_retur = tb_trs_retur_detail.fs_id_retur');
        if ($retur_id != null) {
            $this->db->where('tb_trs_retur_detail.fs_id_retur', $retur_id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function update_retur($post)
    // {
    //     $params = [
    //         'jns_bayar' => $post['jns_bayar'],
    //         'tgl_bayar' => $post['tgl_bayar']
    //     ];
    //     $this->db->where('retur_id', $post['retur_id']);
    //     $this->db->update('t_retur', $params);
    // }



    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_retur');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_retur.fs_id_distributor');
        $this->db->join('user', 'user.user_id = tb_trs_retur.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_retur >=', $awal);
        $this->db->where('fd_tgl_retur <=', $akhir);
        $this->db->order_by('tb_trs_retur.fs_id_retur', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*, tb_trs_retur_detail.fn_harga_beli as hpp');
        $this->db->from('tb_trs_retur_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_retur_detail.fs_id_barang');
        $this->db->join('tb_trs_retur', 'tb_trs_retur.fs_id_retur = tb_trs_retur_detail.fs_id_retur');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_retur.fs_id_distributor');
        $this->db->where('tb_trs_retur.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_retur.fd_tgl_retur >=', $awal);
        $this->db->where('tb_trs_retur.fd_tgl_retur <=', $akhir);
        $this->db->order_by('tb_trs_retur.fs_id_retur', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_retur', $id);
        $this->db->update('tb_trs_retur');
    }


    public function update_stok($id)
    {
        $sql =  "UPDATE tb_barang 
        INNER JOIN tb_trs_retur_detail ON tb_trs_retur_detail.fs_id_barang = tb_barang.fs_id_barang
        SET fn_stok = fn_stok + fn_qty      
        WHERE fs_id_retur = '$id'";

        $this->db->query($sql);
    }
}
