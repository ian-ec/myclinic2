<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rm_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_rm');
        $this->db->join('t_agama', 't_agama.fs_kd_agama = t_rm.fs_kd_agama');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_rm.fs_kd_kelamin');
        if ($id != null) {
            $this->db->where('fs_id_rm', $id);
        }
        $this->db->where('t_rm.fb_aktif', '1');
        $this->db->order_by('t_rm.fs_id_rm', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_reg($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_rm');
        $this->db->join('t_agama', 't_agama.fs_kd_agama = t_rm.fs_kd_agama');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_rm.fs_kd_kelamin');
        if ($id != null) {
            $this->db->where('fs_id_rm', $id);
        }
        $this->db->where('t_rm.fb_aktif_reg', '0');
        $this->db->where('t_rm.fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_rm()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RM');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "RM" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_rm' => $this->no_rm(),
            'fs_nm_pasien' => $post['fs_nm_pasien'],
            'fs_kd_kelamin' => $post['fs_kd_kelamin'],
            'fs_tmpt_lahir' => $post['fs_tmpt_lahir'],
            'fd_tgl_lahir' => $post['fd_tgl_lahir'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
            'fs_identitas' => $post['fs_identitas'],
            'fs_kd_agama' => $post['fs_kd_agama'],
            'fd_tgl_rm' => date('Y-m-d'),
            'fb_aktif' => 1,
            'fb_aktif_reg' => '0',
            'fs_kd_user' => $this->session->userdata('userid')
        ];
        $this->db->insert('t_rm', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RM');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_pasien' => $post['fs_nm_pasien'],
            'fs_kd_kelamin' => $post['fs_kd_kelamin'],
            'fs_tmpt_lahir' => $post['fs_tmpt_lahir'],
            'fd_tgl_lahir' => $post['fd_tgl_lahir'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
            'fs_identitas' => $post['fs_identitas'],
            'fs_kd_agama' => $post['fs_kd_agama'],
            'fs_kd_user' => $this->session->userdata('userid'),
            'fd_tgl_update' => date('Y-m-d')
        ];
        $this->db->where('fs_id_rm', $post['id']);
        $this->db->update('t_rm', $params);
    }

    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_rm', $id);
        $this->db->update('t_rm');
    }
}
