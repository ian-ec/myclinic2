<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karcis_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_karcis');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_karcis.fs_id_rekapcetak');
        if ($id != null) {
            $this->db->where('fs_id_karcis', $id);
        }
        $this->db->where('t_karcis.fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_karcis()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'KC');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "KC" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_karcis' => $this->no_karcis(),
            'fs_nm_karcis' => $post['fs_nm_karcis'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fn_nilai' => $post['fn_nilai'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_karcis', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'KC');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_karcis' => $post['fs_nm_karcis'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fn_nilai' => $post['fn_nilai'],
        ];
        $this->db->where('fs_id_karcis', $post['id']);
        $this->db->update('t_karcis', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_karcis', $id);
        $this->db->update('t_karcis');
    }
}
