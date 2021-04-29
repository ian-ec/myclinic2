<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_pegawai');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_pegawai.fs_kd_kelamin');
        $this->db->join('t_satgas', 't_satgas.fs_id_satgas  = t_pegawai.fs_id_satgas');
        if ($id != null) {
            $this->db->where('fs_id_pegawai', $id);
        }
        $this->db->where('t_pegawai.fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function get_dokter($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_pegawai');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin = t_pegawai.fs_kd_kelamin');
        $this->db->join('t_satgas', 't_satgas.fs_id_satgas  = t_pegawai.fs_id_satgas');
        if ($id != null) {
            $this->db->where('fs_id_pegawai', $id);
        }
        $this->db->where('t_pegawai.fs_id_satgas', '1');
        $this->db->where('t_pegawai.fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_pegawai()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PG');
        $query = $this->db->get()->row();
        $no = sprintf("%05d", $query->fn_no);
        $no_trs = "PG" . $no;
        return $no_trs;
    }


    public function add($post)
    {
        $params = [
            'fs_kd_pegawai' => $this->no_pegawai(),
            'fs_nm_pegawai' => $post['fs_nm_pegawai'],
            'fs_kd_kelamin' => $post['fs_kd_kelamin'],
            'fd_tgl_lahir' => $post['fd_tgl_lahir'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
            'fs_id_satgas' => $post['fs_id_satgas'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_pegawai', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PG');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_pegawai' => $post['fs_nm_pegawai'],
            'fs_kd_kelamin' => $post['fs_kd_kelamin'],
            'fd_tgl_lahir' => $post['fd_tgl_lahir'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
            'fs_id_satgas' => $post['fs_id_satgas'],
        ];
        $this->db->where('fs_id_pegawai', $post['id']);
        $this->db->update('t_pegawai', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_pegawai', $id);
        $this->db->update('t_pegawai');
    }
}
