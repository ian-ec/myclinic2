<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaminan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_jaminan');
        if ($id != null) {
            $this->db->where('fs_id_jaminan', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_jaminan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_jaminan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'JM');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "JM" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_jaminan' => $this->no_jaminan(),
            'fs_nm_jaminan' => $post['fs_nm_jaminan'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_jaminan', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'JM');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_jaminan' => $post['fs_nm_jaminan'],
            'fs_alamat' => $post['fs_alamat'],
            'fs_telp' => $post['fs_telp'],
        ];
        $this->db->where('fs_id_jaminan', $post['id']);
        $this->db->update('t_jaminan', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_jaminan', $id);
        $this->db->update('t_jaminan');
    }
}
