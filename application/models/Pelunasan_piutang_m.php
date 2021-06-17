<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan_piutang_m extends CI_Model
{

    public function no_pelunasan_piutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PP');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PP" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PP');
        $this->db->update('t_no');
    }

    public function get_order_piutang_jaminan($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_order_piutang.fs_id_jaminan');
        $this->db->join('user', 'user.user_id=t_trs_order_piutang.fs_id_user');
        if ($id != null) {
            $this->db->where('t_trs_order_piutang.fs_id_jaminan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add_pelunasan_piutang($post)
    {
        $params = array(
            'fs_kd_pelunasan_piutang' => $this->no_pelunasan_piutang(),
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fs_id_order_piutang' => $post['fs_id_order_piutang'],
            'fs_id_bank_group' => $post['fs_id_bank_group'],
            'fn_subtotal' => $post['fn_subtotal'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fd_tgl_pelunasan_piutang' => $post['fd_tgl_pelunasan_piutang'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_pelunasan_piutang', $params);
        return $this->db->insert_id();
    }

    function add_pelunasan_piutang_detail($params)
    {
        $this->db->insert_batch('t_trs_pelunasan_piutang_detail', $params);
    }
}
