<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soap_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_soap');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_soap.fs_id_registrasi');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_soap.fs_id_pegawai');
        if ($id != null) {
            $this->db->where('fs_id_soap', $id);
        }
        $this->db->where('t_soap.fb_aktif', 1);
        $this->db->order_by('fs_id_soap', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_soap()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'CT');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "CT" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_soap' => $this->no_soap(),
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fs_id_rm' => $post['fs_id_rm'],
            'fs_subjective' => $post['fs_subjective'],
            'fs_objective' => $post['fs_objective'],
            'fs_assesment' => $post['fs_assesment'],
            'fs_planing' => $post['fs_planing'],
            'fs_id_pegawai' => $this->session->userdata('userid'),
            'fd_tgl_soap' => date('Y-m-d'),
            'fd_tgl_update' => '0000-00-00',
            'fs_id_user' => $this->session->userdata('userid'),
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_soap', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'CT');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_subjective' => $post['fs_subjective'],
            'fs_objective' => $post['fs_objective'],
            'fs_assesment' => $post['fs_assesment'],
            'fs_planing' => $post['fs_planing'],
            'fd_tgl_update' => date('Y-m-d'),
            'fs_id_user' => $this->session->userdata('userid'),
        ];
        $this->db->where('fs_id_soap', $post['fs_id_soap']);
        $this->db->update('t_soap', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->set('fd_tgl_update', date('Y-m-d'));
        $this->db->where('fs_id_soap', $id);
        $this->db->update('t_soap');
    }

    public function get_soap_detail($rm_id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_registrasi');
        $this->db->join('t_soap', 't_soap.fs_id_registrasi = t_trs_registrasi.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_soap.fs_id_pegawai');
        if ($rm_id != null) {
            $this->db->where('t_trs_registrasi.fs_id_rm', $rm_id);
        }
        $this->db->where('t_soap.fb_aktif', 1);
        $this->db->order_by('fs_id_soap', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_soap');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_soap.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_soap.fs_id_user');
        $this->db->where('t_soap.fb_aktif', 1);
        $this->db->where('fd_tgl_soap >=', $awal);
        $this->db->where('fd_tgl_soap <=', $akhir);
        $this->db->order_by('fs_kd_soap', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
