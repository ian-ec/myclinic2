<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_golongan');
        if ($id != null) {
            $this->db->where('fs_id_golongan', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_golongan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_golongan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'GL');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "GL" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_golongan' => $this->no_golongan(),
            'fs_nm_golongan' => $post['fs_nm_golongan'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_golongan', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'GL');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_golongan' => $post['fs_nm_golongan'],
        ];
        $this->db->where('fs_id_golongan', $post['id']);
        $this->db->update('tb_golongan', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_golongan', $id);
        $this->db->update('tb_golongan');
    }
}
