<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_m extends CI_Model
{

    public function no_pemesanan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PO');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PO" . $no;
        return $no_trs;
    }

    public function get_cart_pemesanan($params = null)
    {
        $this->db->select('*, tb_trs_cart_pemesanan.fs_id_barang as id_barang, tb_trs_cart_pemesanan.fn_harga_beli as harga_beli');
        $this->db->from('tb_trs_cart_pemesanan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_cart_pemesanan.fs_id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->order_by('tb_trs_cart_pemesanan.fs_id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }


    public function get_pemesanan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_pemesanan');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pemesanan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_pemesanan.fs_id_layanan');
        $this->db->join('user', 'user.user_id = tb_trs_pemesanan.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_pemesanan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_pemesanan_detail($pemesanan_id = null)
    {
        $this->db->select('*, tb_trs_pemesanan_detail.fn_hpp as harga_beli, tb_trs_pemesanan_detail.fn_diskon as diskon');
        $this->db->from('tb_trs_pemesanan_detail');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_pemesanan_detail.fs_id_pemesanan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_pemesanan_detail.fs_id_barang');
        if ($pemesanan_id != null) {
            $this->db->where('tb_trs_pemesanan_detail.fs_id_pemesanan', $pemesanan_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_pemesanan) AS cart_no FROM tb_trs_cart_pemesanan");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_pemesanan' => $car_no,
            'fs_id_barang' => $post['fs_id_barang'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => 0,
            'fn_total' => ($post['fn_harga_beli'] * $post['fn_qty']),
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_cart_pemesanan', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_trs_cart_pemesanan SET fn_harga_beli = '$post[fn_harga_beli]',
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
        $this->db->delete('tb_trs_cart_pemesanan');
    }

    public function edit_cart_pemesanan($post)
    {
        $params = array(
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_pajak' => $post['fn_pajak'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->where('fs_id_barang', $post['fs_id_barang']);
        $this->db->update('tb_trs_cart_pemesanan', $params);
    }

    public function add_pemesanan($post)
    {
        $params = array(
            'fs_kd_pemesanan' => $this->no_pemesanan(),
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_distributor' => $post['fs_id_distributor'],
            'fs_keterangan' => $post['fs_keterangan'],
            'fn_subtotal' => $post['fn_subtotal'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fd_tgl_pemesanan' => $post['fd_tgl_pemesanan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('tb_trs_pemesanan', $params);
        return $this->db->insert_id();
    }

    function add_pemesanan_detail($params)
    {
        $this->db->insert_batch('tb_trs_pemesanan_detail', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PO');
        $this->db->update('t_no');
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_pemesanan', $id);
        $this->db->update('tb_trs_pemesanan');
    }

    public function rekap($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_pemesanan');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pemesanan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_pemesanan.fs_id_layanan');
        $this->db->join('user', 'user.user_id = tb_trs_pemesanan.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_pemesanan.fd_tgl_pemesanan >=', $awal);
        $this->db->where('tb_trs_pemesanan.fd_tgl_pemesanan <=', $akhir);
        $this->db->order_by('tb_trs_pemesanan.fs_id_pemesanan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function detail($awal, $akhir)
    {
        $this->db->select('*, tb_trs_pemesanan_detail.fn_hpp as hpp');
        $this->db->from('tb_trs_pemesanan_detail');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_pemesanan_detail.fs_id_pemesanan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_pemesanan_detail.fs_id_barang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_pemesanan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_pemesanan.fs_id_layanan');
        $this->db->where('tb_trs_pemesanan.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_pemesanan.fd_tgl_pemesanan >=', $awal);
        $this->db->where('tb_trs_pemesanan.fd_tgl_pemesanan <=', $akhir);
        $this->db->order_by('tb_trs_pemesanan.fs_id_pemesanan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function cek_penerimaan($id_pemesanan = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_penerimaan');
        $this->db->where('fs_id_pemesanan', $id_pemesanan);
        $this->db->where('fd_tgl_void', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }
}
