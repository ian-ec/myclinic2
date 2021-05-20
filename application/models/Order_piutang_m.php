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
        $this->db->where('t_trs_regout2.fs_id_order_piutang =', '0');
        $this->db->order_by('t_trs_registrasi.fs_id_registrasi', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_cart($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang_cart');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_trs_order_piutang_cart.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        if ($id != null) {
            $this->db->where('t_trs_order_piutang_cart.fs_id_order_piutang', $id);
        }
        $this->db->where('t_trs_order_piutang_cart.fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function get_order_piutang($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_order_piutang.fs_id_jaminan');
        $this->db->join('user', 'user.user_id=t_trs_order_piutang.fs_id_user');
        if ($id != null) {
            $this->db->where('t_trs_order_piutang.fs_id_order_piutang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_order_piutang_detail($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang_detail');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_trs_order_piutang_detail.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        if ($id != null) {
            $this->db->where('t_trs_order_piutang_detail.fs_id_order_piutang', $id);
        }
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

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'OP');
        $this->db->update('t_no');
    }

    public function no_cart()
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_order_piutang) AS cart_no FROM t_trs_order_piutang_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        return $car_no;
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

    public function simpan($post)
    {
        $params = array(
            'fs_kd_order_piutang' => $this->no_order_piutang(),
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fn_nilai_order' => $post['fn_nilai_order'],
            'fd_tgl_order_piutang' => $post['fd_tgl_order_piutang'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_order_piutang', $params);
        return $this->db->insert_id();
    }

    public function add_order_piutang_detail($params)
    {
        $this->db->insert_batch('t_trs_order_piutang_detail', $params);
    }

    public function update_data_regout2($fs_id_order_piutang)
    {
        $id_user = $this->session->userdata('userid');

        $data = "UPDATE t_trs_regout2 SET fs_id_order_piutang ='$fs_id_order_piutang'
        WHERE fs_id_registrasi IN (SELECT fs_id_registrasi FROM t_trs_order_piutang_cart WHERE fs_id_user = '$id_user')
        ";

        $query = $this->db->query($data);
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_order_piutang.fs_id_jaminan');
        $this->db->join('user', 'user.user_id=t_trs_order_piutang.fs_id_user');
        $this->db->where('fd_tgl_order_piutang >=', $awal);
        $this->db->where('fd_tgl_order_piutang <=', $akhir);
        $query = $this->db->get();
        return $query;
    }
}
