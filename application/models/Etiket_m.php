<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etiket_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_etiket');
        if ($id != null) {
            $this->db->where('fs_id_etiket', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_etiket', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_etiket()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'ET');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "ET" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_etiket' => $this->no_etiket(),
            'fs_nm_etiket' => $post['fs_nm_etiket'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_etiket', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'ET');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_etiket' => $post['fs_nm_etiket'],
        ];
        $this->db->where('fs_id_etiket', $post['id']);
        $this->db->update('tb_etiket', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_etiket', $id);
        $this->db->update('tb_etiket');
    }
}
