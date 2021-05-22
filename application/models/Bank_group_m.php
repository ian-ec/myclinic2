<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_group_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bank_group');
        if ($id != null) {
            $this->db->where('fs_id_bank_group', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }


    public function no_bank_group()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'BANK');
        $query = $this->db->get()->row();
        $no = sprintf("%06d", $query->fn_no);
        $no_trs = "BANK" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_bank_group' => $this->no_bank_group(),
            'fs_nm_bank_group' => $post['fs_nm_bank_group'],
            'fn_no_rekening' => $post['fn_no_rekening'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_bank_group', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'BANK');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_kd_bank_group' => $post['fs_kd_bank_group'],
            'fs_nm_bank_group' => $post['fs_nm_bank_group'],
            'fn_no_rekening' => $post['fn_no_rekening'],
        ];
        $this->db->where('fs_id_bank_group', $post['id']);
        $this->db->update('tb_bank_group', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_bank_group', $id);
        $this->db->update('tb_bank_group');
    }
}
