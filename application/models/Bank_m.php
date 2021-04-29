<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bank');
        if ($id != null) {
            $this->db->where('fs_id_bank', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function get_debit($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bank');
        if ($id != null) {
            $this->db->where('fs_id_bank', $id);
        }
        $this->db->where('fs_kd_jenis_kartu', '1');
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function get_credit($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bank');
        if ($id != null) {
            $this->db->where('fs_id_bank', $id);
        }
        $this->db->where('fs_kd_jenis_kartu', '2');
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function no_bank()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'BN');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "BN" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_bank' => $this->no_bank(),
            'fs_nm_bank' => $post['fs_nm_bank'],
            'fs_kd_jenis_kartu' => $post['fs_kd_jenis_kartu'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_bank', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'BN');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_kd_bank' => $post['fs_kd_bank'],
            'fs_nm_bank' => $post['fs_nm_bank'],
            'fs_kd_jenis_kartu' => $post['fs_kd_jenis_kartu'],
        ];
        $this->db->where('fs_id_bank', $post['id']);
        $this->db->update('tb_bank', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_bank', $id);
        $this->db->update('tb_bank');
    }
}
