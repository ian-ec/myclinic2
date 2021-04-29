<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satgas_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_satgas');
        if ($id != null) {
            $this->db->where('fs_id_satgas', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_satgas()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'SM');
        $query = $this->db->get()->row();
        $no = sprintf("%05d", $query->fn_no);
        $no_trs = "SM" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_satgas' => $this->no_satgas(),
            'fs_nm_satgas' => $post['fs_nm_satgas'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_satgas', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'SM');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_kd_satgas' => $post['fs_kd_satgas'],
            'fs_nm_satgas' => $post['fs_nm_satgas'],
            'fb_aktif' => $post['fb_aktif'],
        ];
        $this->db->where('fs_id_satgas', $post['id']);
        $this->db->update('t_satgas', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_satgas', $id);
        $this->db->update('t_satgas');
    }
}
