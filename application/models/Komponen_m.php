<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komponen_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_komponen');
        if ($id != null) {
            $this->db->where('fs_id_komponen', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_komponen()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'KP');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "KP" . $no;
        return $no_trs;
    }


    public function add($post)
    {
        $params = [
            'fs_kd_komponen' => $this->no_komponen(),
            'fs_nm_komponen' => $post['fs_nm_komponen'],
            'fb_medis' => $post['fb_medis'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_komponen', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'KP');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_komponen' => $post['fs_nm_komponen'],
            'fb_medis' => $post['fb_medis'],
        ];
        $this->db->where('fs_id_komponen', $post['id']);
        $this->db->update('t_komponen', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_komponen', $id);
        $this->db->update('t_komponen');
    }
}
