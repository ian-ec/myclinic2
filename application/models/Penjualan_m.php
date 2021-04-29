<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjualan_m extends CI_Model
{

    public function no_penjualan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PJ');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PJ" . $no;
        return $no_trs;
    }

    public function get_cart_penjualan($params = null)
    {
        $this->db->select('*, tb_trs_cart_penjualan.fs_id_barang as id_barang, tb_trs_cart_penjualan.fn_harga_beli as harga_beli, tb_trs_cart_penjualan.fn_harga_jual as harga_jual, tb_trs_cart_penjualan.fs_id_etiket as id_etiket');
        $this->db->from('tb_trs_cart_penjualan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_penjualan.fs_id_barang');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket = tb_trs_cart_penjualan.fs_id_etiket', 'left');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->order_by('fs_id_cart_penjualan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_cart_racik($params = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_racik');
        $this->db->join('tb_satuan', 'tb_satuan.fs_id_satuan = tb_trs_racik.fs_id_satuan');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket = tb_trs_racik.fs_id_etiket');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_penjualan', 0);
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->order_by('fs_id_racik', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_cart_racik_detail($id = null)
    {
        $this->db->select('*, tb_trs_racik_detail.fs_id_barang as id_barang, tb_trs_racik_detail.fn_harga_beli as harga_beli, tb_trs_racik_detail.fn_harga_jual as harga_jual');
        $this->db->from('tb_trs_racik_detail');
        $this->db->join('tb_trs_racik', 'tb_trs_racik.fs_id_racik = tb_trs_racik_detail.fs_id_racik');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_racik_detail.fs_id_barang');
        if ($id != null) {
            $this->db->where('tb_trs_racik_detail.fs_id_racik', $id);
        }
        $this->db->where('tb_trs_racik.fs_id_penjualan', 0);
        $this->db->where('tb_trs_racik_detail.fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
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
            'fs_id_barang' => $post['fs_id_barang'],
            'fs_id_etiket' => $post['fs_id_etiket'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_harga_jual' => $post['fn_harga_jual'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => 0,
            'fn_total' => ($post['fn_harga_jual'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_penjualan', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_penjualan SET fn_harga_jual = '$post[fn_harga_jual]',
                fn_qty = fn_qty + '$post[fn_qty]',
                fn_total = '$post[fn_harga_jual]' * fn_qty
                WHERE fs_id_barang = '$post[fs_id_barang]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tb_trs_cart_penjualan');
    }

    public function edit_cart_penjualan($post)
    {
        $params = array(
            'fs_id_etiket' => $post['fs_id_etiket'],
            'fn_harga_jual' => $post['fn_harga_jual'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_barang', $post['fs_id_barang']);
        $this->db->update('tb_trs_cart_penjualan', $params);
    }

    public function add_penjualan($post)
    {
        $params = array(
            'fs_kd_penjualan' => $this->no_penjualan(),
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fn_nilai_beli' => $post['fn_nilai_beli'],
            'fn_nilai_jual' => $post['fn_nilai_jual'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_total_nilai_jual' => $post['fn_total_nilai_jual'],
            // 'fn_tunai' => $post['fn_tunai'],
            // 'fs_id_bank_debit' => $post['fs_id_bank_debit'],
            // 'fn_debit' => $post['fn_debit'],
            // 'fn_no_debit' => $post['fn_no_debit'],
            // 'fs_id_bank_kredit' => $post['fs_id_bank_kredit'],
            // 'fn_kredit' => $post['fn_kredit'],
            // 'fn_no_kredit' => $post['fn_no_kredit'],
            // 'fn_kembali' => 0,
            // 'fn_hutang' => $post['fn_total_nilai_jual'],
            'fd_tgl_penjualan' => $post['fd_tgl_penjualan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_penjualan', $params);
        return $this->db->insert_id();
    }

    function add_penjualan_detail($params)
    {
        $this->db->insert_batch('tb_trs_penjualan_detail', $params);
    }

    function add_penjualan_detail_racik($params)
    {
        $this->db->insert_batch('tb_trs_penjualan_detail', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PJ');
        $this->db->update('t_no');
    }

    public function get_penjualan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_penjualan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = tb_trs_penjualan.fs_id_registrasi', 'left');
        $this->db->join('user', 'user.user_id = tb_trs_penjualan.fs_id_user');
        $this->db->where('tb_trs_penjualan.fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('tb_trs_penjualan.fs_id_penjualan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_penjualan_detail($penjualan_id = null)
    {
        $this->db->select('*, tb_trs_penjualan_detail.fn_harga_jual as harga_jual');
        $this->db->from('tb_trs_penjualan_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_penjualan_detail.fs_id_barang');
        $this->db->join('tb_trs_penjualan', 'tb_trs_penjualan.fs_id_penjualan = tb_trs_penjualan_detail.fs_id_penjualan');
        if ($penjualan_id != null) {
            $this->db->where('tb_trs_penjualan_detail.fs_id_penjualan', $penjualan_id);
        }
        $this->db->where('tb_trs_penjualan_detail.fs_id_racik', '0');
        $query = $this->db->get();
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_penjualan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = tb_trs_penjualan.fs_id_registrasi', 'left');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm', 'left');
        $this->db->join('user', 'user.user_id = tb_trs_penjualan.fs_id_user');
        $this->db->where('tb_trs_penjualan.fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_penjualan >=', $awal);
        $this->db->where('fd_tgl_penjualan <=', $akhir);
        $this->db->order_by('tb_trs_penjualan.fs_id_penjualan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*,tb_trs_penjualan_detail.fn_harga_beli as hpp, tb_trs_penjualan_detail.fn_harga_jual as harga_jual');
        $this->db->from('tb_trs_penjualan_detail');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_penjualan_detail.fs_id_barang');
        $this->db->join('tb_trs_penjualan', 'tb_trs_penjualan.fs_id_penjualan = tb_trs_penjualan_detail.fs_id_penjualan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = tb_trs_penjualan.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->where('tb_trs_penjualan.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_penjualan.fd_tgl_penjualan >=', $awal);
        $this->db->where('tb_trs_penjualan.fd_tgl_penjualan <=', $akhir);
        $this->db->order_by('tb_trs_penjualan.fs_id_penjualan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_kd_penjualan', $id);
        $this->db->update('tb_trs_penjualan');
    }

    public function update_stok($id)
    {
        $sql =  "UPDATE tb_barang 
        INNER JOIN tb_trs_penjualan_detail ON tb_trs_penjualan_detail.fs_id_barang = tb_barang.fs_id_barang
        SET fn_stok = fn_stok + fn_qty      
        WHERE fs_kd_penjualan = '$id'";

        $this->db->query($sql);
    }

    public function total_penjualan()
    {
        $date_now = date('Y-m-d');
        $this->db->select_sum('fn_total_nilai_jual');
        $this->db->from('tb_trs_penjualan');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_penjualan', $date_now);
        $query = $this->db->get();
        return $query;
    }
}
