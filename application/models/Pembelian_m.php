<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    public function no_pembelian()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PB');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PB" . $no;
        return $no_trs;
    }

    public function no_hutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'HT');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "HT" . $no;
        return $no_trs;
    }

    public function get_cart_pembelian($params = null)
    {
        $this->db->select('*, tb_trs_cart_pembelian.fs_id_barang as id_barang, tb_trs_cart_pembelian.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_cart_pembelian');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_pembelian.fs_id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->order_by('tb_trs_cart_pembelian.fs_id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_pembelian) AS cart_no FROM tb_trs_cart_pembelian");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_pembelian' => $car_no,
            'fs_id_barang' => $post['fs_id_barang'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => 0,
            'fn_total' => ($post['fn_harga_beli'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_pembelian', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_pembelian SET fn_harga_beli = '$post[fn_harga_beli]',
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
        $this->db->delete('tb_trs_cart_pembelian');
    }

    public function edit_cart_pembelian($post)
    {
        $params = array(
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_pajak' => $post['fn_pajak'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_barang', $post['fs_id_barang']);
        $this->db->update('tb_trs_cart_pembelian', $params);
    }

    public function add_pembelian($post)
    {
        $params = array(
            'fs_kd_pembelian' => $this->no_pembelian(),
            'fs_id_distributor' => $post['fs_id_distributor'] == "" ? null : $post['fs_id_distributor'],
            'fn_nilai_beli' => $post['fn_nilai_beli'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_total_nilai_beli' => $post['fn_total_nilai_beli'],
            'fn_jenis_bayar' => $post['fn_jenis_bayar'],
            'fd_tgl_bayar' => $post['fd_tgl_bayar'],
            'fd_tgl_pembelian' => $post['fd_tgl_pembelian'],
            'fs_keterangan' => $post['fs_keterangan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_pembelian', $params);
        return $this->db->insert_id();
    }

    public function add_hutang($post, $id)
    {
        $params = array(
            'fs_kd_hutang' => $this->no_hutang(),
            'fd_tgl_hutang' => $post['fd_tgl_pembelian'],
            'fs_id_distributor' => $post['fs_id_distributor'],
            'fs_id_pembelian' => $id,
            'fn_hutang' => $post['fn_total_nilai_beli'],
            'fn_sisa_hutang' => $post['fn_total_nilai_beli']
        );
        $this->db->insert('t_hutang', $params);
    }

    function add_pembelian_detail($params)
    {
        $this->db->insert_batch('tb_trs_pembelian_detail', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PB');
        $this->db->update('t_no');
    }

    public function update_no_hutang()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'HT');
        $this->db->update('t_no');
    }

    public function get_pembelian($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pembelian.fs_id_distributor');
        $this->db->join('user', 'user.user_id = tb_trs_pembelian.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_pembelian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pembelian_detail($pembelian_id = null)
    {
        $this->db->select('*, tb_trs_pembelian_detail.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_pembelian_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_pembelian_detail.fs_id_barang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian = tb_trs_pembelian_detail.fs_id_pembelian');
        if ($pembelian_id != null) {
            $this->db->where('tb_trs_pembelian_detail.fs_id_pembelian', $pembelian_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function update_pembelian($post)
    {
        $params = [
            'fn_jenis_bayar' => $post['fn_jenis_bayar'],
            'fd_tgl_bayar' => $post['fd_tgl_bayar']
        ];
        $this->db->where('fs_id_pembelian', $post['fs_id_pembelian']);
        $this->db->update('tb_trs_pembelian', $params);
    }


    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pembelian.fs_id_distributor');
        $this->db->join('user', 'user.user_id = tb_trs_pembelian.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_pembelian >=', $awal);
        $this->db->where('fd_tgl_pembelian <=', $akhir);
        $this->db->order_by('tb_trs_pembelian.fs_id_pembelian', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*, tb_trs_pembelian_detail.fn_harga_beli as hpp, tb_trs_pembelian_detail.fn_hna as hna');
        $this->db->from('tb_trs_pembelian_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_pembelian_detail.fs_id_barang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian = tb_trs_pembelian_detail.fs_id_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pembelian.fs_id_distributor');
        $this->db->where('tb_trs_pembelian.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_pembelian.fd_tgl_pembelian >=', $awal);
        $this->db->where('tb_trs_pembelian.fd_tgl_pembelian <=', $akhir);
        $this->db->order_by('tb_trs_pembelian.fs_id_pembelian', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_pembelian', $id);
        $this->db->update('tb_trs_pembelian');
    }

    public function update_stok($id)
    {
        $sql =  "UPDATE tb_barang 
        INNER JOIN tb_trs_pembelian_detail ON tb_trs_pembelian_detail.fs_id_barang = tb_barang.fs_id_barang
        SET fn_stok = fn_stok - fn_qty      
        WHERE fs_id_pembelian = '$id'";

        $this->db->query($sql);
    }

    public function total_pembelian()
    {
        $date_now = date('Y-m-d');
        $this->db->select_sum('fn_total_nilai_beli');
        $this->db->from('tb_trs_pembelian');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_pembelian', $date_now);
        $query = $this->db->get();
        return $query;
    }
}
