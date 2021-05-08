<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_piutang_m extends CI_Model
{

    public function get($id, $awal, $akhir)
    {
        $this->db->select('*, t_trs_regout2.fs_id_registrasi as id_registrasi');
        $this->db->from('t_trs_regout2');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_trs_regout2.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        $this->db->where('t_trs_regout2.fs_id_jaminan', $id);
        $this->db->where('t_trs_regout2.fd_tgl_bayar>=', $awal);
        $this->db->where('t_trs_regout2.fd_tgl_bayar<=', $akhir);
        $this->db->where('t_trs_registrasi.fb_aktif', '1');
        $this->db->where('t_trs_regout2.fn_klaim <>', '0');
        $this->db->order_by('t_trs_registrasi.fs_id_registrasi', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_order_piutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'OP');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "OP" . $no;
        return $no_trs;
    }

    public function cek_chart($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang_cart');
        $this->db->where('fs_id_registrasi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {

        $query = $this->db->query("SELECT MAX(fs_id_cart_order_piutang) AS cart_no FROM t_trs_order_piutang_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_order_piutang' => $car_no,
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fn_nilai_piutang' => $post['fn_klaim'],
            'fs_id_user' => $this->session->userdata('userid'),
        );
        $this->db->insert('t_trs_order_piutang_cart', $params);
    }

    public function del_cart($id = null)
    {

        $fs_id_user = $this->session->userdata('userid');
        if ($id != null) {
            $this->db->where('fs_id_registrasi', $id);
        }
        $this->db->where('fs_id_user', $fs_id_user);
        $this->db->delete('t_trs_order_piutang_cart');
    }
}
