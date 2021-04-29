<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_m extends CI_Model
{

    public function no_regout2()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'DX');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "DX" . $no;
        return $no_trs;
    }

    public function add_regout($post)
    {
        $params = array(
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fn_hutang' => $post['fn_hutang'],
            'fd_tgl_regout' => $post['fd_tgl_regout'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_regout', $params);
        return $this->db->insert_id();
    }

    public function add_regout2($post, $id_regout)
    {
        $params = array(
            'fs_kd_regout2' => $this->no_regout2(),
            'fs_id_regout' => $id_regout,
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fn_cash' => $post['fn_cash'],
            'fs_id_bank_debit' => $post['fs_id_bank_debit'],
            'fn_no_debit' => $post['fn_no_debit'],
            'fn_debit' => $post['fn_debit'],
            'fs_id_bank_credit' => $post['fs_id_bank_credit'],
            'fn_no_credit' => $post['fn_no_credit'],
            'fn_credit' => $post['fn_credit'],
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fn_klaim' => $post['fn_klaim'],
            'fn_diskon_regout' => $post['fn_diskon_regout'],
            'fd_tgl_bayar' => $post['fd_tgl_regout'],
        );
        $this->db->insert('t_trs_regout2', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'DX');
        $this->db->update('t_no');
    }

    public function non_aktif_reg($post)
    {
        $this->db->set('fb_aktif_reg', 0);
        $this->db->where('fs_id_rm', $post['fs_id_rm']);
        $this->db->update('t_rm');
    }

    public function udpate_tgl_keluar($post)
    {
        $this->db->set('fd_tgl_keluar', $post['fd_tgl_regout']);
        $this->db->where('fs_id_registrasi', $post['fs_id_registrasi']);
        $this->db->update('t_trs_registrasi');
    }

    public function update_regout($post)
    {
        $this->db->set('fn_hutang', $post['fn_hutang']);
        $this->db->where('fs_id_regout', $post['fs_id_regout']);
        $this->db->update('t_trs_regout');
    }

    public function update_regout2($post)
    {
        $params = array(
            'fs_kd_regout2' => $this->no_regout2(),
            'fs_id_regout' => $post['fs_id_regout'],
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fn_cash' => $post['fn_cash'],
            'fs_id_bank_debit' => $post['fs_id_bank_debit'],
            'fn_no_debit' => $post['fn_no_debit'],
            'fn_debit' => $post['fn_debit'],
            'fs_id_bank_credit' => $post['fs_id_bank_credit'],
            'fn_no_credit' => $post['fn_no_credit'],
            'fn_credit' => $post['fn_credit'],
            'fn_diskon_regout' => $post['fn_diskon_regout'],
            'fd_tgl_bayar' => $post['fd_tgl_bayar'],
        );
        $this->db->insert('t_trs_regout2', $params);
        return $this->db->insert_id();
    }
}
