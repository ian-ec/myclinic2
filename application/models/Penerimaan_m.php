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

    public function get_pemesanan($id = null)
    {
        $sql = "SELECT 
                aa.fs_id_pemesanan AS id, 
                aa.fs_kd_pemesanan AS kode, 
                cc.fs_id_distributor AS id_distributor, 
                cc.fs_nm_distributor AS distributor, 
                dd.fs_id_layanan AS id_layanan, 
                dd.fs_nm_layanan AS layanan, 
                SUM(bb.fn_total/bb.fn_qty*bb.fn_qty_sisa) AS total
                FROM  tb_trs_pemesanan aa
                INNER JOIN tb_trs_pemesanan_detail bb ON bb.fs_id_pemesanan = aa.fs_id_pemesanan
                INNER JOIN tb_distributor cc ON cc.fs_id_distributor = aa.fs_id_distributor
                INNER JOIN t_layanan dd ON dd.fs_id_layanan = aa.fs_id_layanan
                INNER JOIN user ee ON ee.user_id = aa.fs_id_user
                WHERE aa.fd_tgl_void = '0000-00-00'
                AND fn_qty_sisa NOT LIKE 0
                GROUP BY kode, distributor,  layanan";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_penerimaan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_penerimaan');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_penerimaan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_penerimaan.fs_id_layanan');
        $this->db->join('user', 'user.user_id = tb_trs_penerimaan.fs_id_user');
        $this->db->where('fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_penerimaan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_penerimaan_detail($post = null)
    {
        $fs_id_pemesanan = $post['fs_id_pemesanan'];

        $this->db->select('*, tb_trs_pemesanan_detail.fn_diskon as fn_diskon, fn_total');
        $this->db->from('tb_trs_pemesanan_detail');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_pemesanan_detail.fs_id_pemesanan');
        $this->db->where('tb_trs_pemesanan_detail.fn_qty_sisa !=', 0);
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
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_distributor' => $post['fs_id_distributor'],
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

    public function update_qty_sisa($id)
    {
        $sql = "UPDATE tb_trs_pemesanan_detail 
       INNER JOIN tb_trs_cart_penerimaan  ON tb_trs_cart_penerimaan.fs_id_pemesanan = tb_trs_pemesanan_detail.fs_id_pemesanan AND tb_trs_cart_penerimaan.fs_id_barang = tb_trs_pemesanan_detail.fs_id_barang
       SET fn_qty_sisa = fn_qty_sisa-tb_trs_cart_penerimaan.fn_qty_do
       WHERE tb_trs_pemesanan_detail.fs_id_pemesanan = $id
       ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function rekap($awal, $akhir)
    {
        $this->db->select('*, tb_trs_penerimaan.fn_subtotal as fn_subtotal, tb_trs_penerimaan.fn_diskon as fn_diskon, tb_trs_penerimaan.fn_grandtotal as fn_grandtotal');
        $this->db->from('tb_trs_penerimaan');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_penerimaan.fs_id_pemesanan');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_penerimaan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_penerimaan.fs_id_layanan');
        $this->db->join('user', 'user.user_id = tb_trs_penerimaan.fs_id_user');
        $this->db->where('tb_trs_penerimaan.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_penerimaan.fd_tgl_penerimaan >=', $awal);
        $this->db->where('tb_trs_penerimaan.fd_tgl_penerimaan <=', $akhir);
        $this->db->order_by('tb_trs_penerimaan.fs_id_penerimaan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function data_penerimaan_detail($penerimaan_id)
    {
        $this->db->select('*, tb_trs_penerimaan_detail.fn_hpp as harga_beli, tb_trs_penerimaan_detail.fn_diskon as diskon');
        $this->db->from('tb_trs_penerimaan_detail');
        $this->db->join('tb_trs_penerimaan', 'tb_trs_penerimaan.fs_id_penerimaan = tb_trs_penerimaan_detail.fs_id_penerimaan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_penerimaan_detail.fs_id_barang');
        if ($penerimaan_id != null) {
            $this->db->where('tb_trs_penerimaan_detail.fs_id_penerimaan', $penerimaan_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($awal, $akhir)
    {
        $this->db->select('*, tb_trs_penerimaan_detail.fn_hpp as hpp, tb_trs_penerimaan.fn_subtotal as fn_subtotal, tb_trs_penerimaan.fn_diskon as fn_diskon, tb_trs_penerimaan.fn_grandtotal as fn_grandtotal');
        $this->db->from('tb_trs_penerimaan_detail');
        $this->db->join('tb_trs_penerimaan', 'tb_trs_penerimaan.fs_id_penerimaan = tb_trs_penerimaan_detail.fs_id_penerimaan');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_trs_penerimaan.fs_id_pemesanan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_trs_penerimaan_detail.fs_id_barang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor = tb_trs_penerimaan.fs_id_distributor');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_trs_penerimaan.fs_id_layanan');
        $this->db->where('tb_trs_penerimaan.fd_tgl_void', '0000-00-00');
        $this->db->where('tb_trs_penerimaan.fd_tgl_penerimaan >=', $awal);
        $this->db->where('tb_trs_penerimaan.fd_tgl_penerimaan <=', $akhir);
        $this->db->order_by('tb_trs_penerimaan.fs_id_penerimaan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_penerimaan', $id);
        $this->db->update('tb_trs_penerimaan');
    }

    public function update_barang($id)
    {
        $sql = "UPDATE tb_barang
        JOIN tb_trs_penerimaan_detail ON tb_trs_penerimaan_detail.fs_id_barang = tb_barang.fs_id_barang
        SET fn_harga_beli = tb_trs_penerimaan_detail.fn_hpp , fn_hna = tb_trs_penerimaan_detail.fn_hna_barang
        WHERE tb_trs_penerimaan_detail.fs_id_penerimaan = $id
        ";

        $query = $this->db->query($sql);
        return $query;
    }

    public function cek_buku($id_penerimaan = null)
    {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->where('fs_id_penerimaan', $id_penerimaan);
        $this->db->where('fs_kd_jenis_mutasi<>', 'DO');
        $query = $this->db->get();
        return $query;
    }
}
