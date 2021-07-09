<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratorium_m extends CI_Model
{

    public function get($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_lab_antigen');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_lab_antigen.fs_id_rm');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_rm.fs_kd_kelamin');
        $this->db->where('t_lab_antigen.fd_tgl_trs >=', $awal);
        $this->db->where('t_lab_antigen.fd_tgl_trs <=', $akhir);
        $this->db->where('t_lab_antigen.fd_tgl_void', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }

    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('t_lab_antigen');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_lab_antigen.fs_id_rm');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_rm.fs_kd_kelamin');
        $this->db->where('t_lab_antigen.fs_id_trs', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($id)
    {
        $this->db->select('*');
        $this->db->from('t_lab_antigen');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_lab_antigen.fs_id_rm');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_rm.fs_kd_kelamin');
        $this->db->where('t_lab_antigen.fs_id_trs', $id);
        $query = $this->db->get();
        return $query;
    }

    public function add_antigen($post)
    {
        $params = array(
            'fd_tgl_trs' => date('Y-m-d'),
            'fs_id_rm' => $post['fs_id_rm'],
            'fs_tipe_spesimen' => $post['fs_tipe_spesimen'],
            'fn_no_spesimen' => $post['fn_no_spesimen'],
            'fd_tgl_ambil' => $post['fd_tgl_ambil'],
            'fd_tgl_proses' => $post['fd_tgl_proses'],
            'fd_tgl_lapor' => $post['fd_tgl_lapor'],
            'fs_jam_lapor' => $post['fs_jam_lapor'],
            'fs_nm_test' => $post['fs_nm_test'],
            'fn_hasil_test' => $post['fn_hasil_test'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_lab_antigen', $params);
        return $this->db->insert_id();
    }

    public function update_antigen($post)
    {
        $params = array(
            'fs_id_rm' => $post['fs_id_rm'],
            'fs_tipe_spesimen' => $post['fs_tipe_spesimen'],
            'fn_no_spesimen' => $post['fn_no_spesimen'],
            'fd_tgl_ambil' => $post['fd_tgl_ambil'],
            'fd_tgl_proses' => $post['fd_tgl_proses'],
            'fd_tgl_lapor' => $post['fd_tgl_lapor'],
            'fs_jam_lapor' => $post['fs_jam_lapor'],
            'fs_nm_test' => $post['fs_nm_test'],
            'fn_hasil_test' => $post['fn_hasil_test'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->where('fs_id_trs', $post['fs_id_trs']);
        $this->db->update('t_lab_antigen', $params);
    }

    public function del($id)
    {
        $date_now = date('Y-m-d');
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', $date_now);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_trs', $id);
        $this->db->update('t_lab_antigen');
    }
}
