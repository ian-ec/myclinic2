<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rekapcetak_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_rekapcetak');
        if ($id != null) {
            $this->db->where('fs_id_rekapcetak', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_rekapcetak()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RC');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "RC" . $no;
        return $no_trs;
    }


    public function add($post)
    {
        $params = [
            'fs_kd_rekapcetak' => $this->no_rekapcetak(),
            'fs_nm_rekapcetak' => $post['fs_nm_rekapcetak'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_rekapcetak', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RC');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_rekapcetak' => $post['fs_nm_rekapcetak'],
        ];
        $this->db->where('fs_id_rekapcetak', $post['id']);
        $this->db->update('t_rekapcetak', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_rekapcetak', $id);
        $this->db->update('t_rekapcetak');
    }
}
