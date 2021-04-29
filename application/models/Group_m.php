<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_group');
        if ($id != null) {
            $this->db->where('fs_id_group', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_group', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_group()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'GR');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "GR" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_group' => $this->no_group(),
            'fs_nm_group' => $post['fs_nm_group'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_group', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'GR');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_group' => $post['fs_nm_group'],
        ];
        $this->db->where('fs_id_group', $post['id']);
        $this->db->update('tb_group', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_group', $id);
        $this->db->update('tb_group');
    }
}
