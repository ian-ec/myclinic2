<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_distributor');
        if ($id != null) {
            $this->db->where('fs_id_distributor', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_distributor', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_distributor()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'DS');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "DS" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_distributor' => $this->no_distributor(),
            'fs_nm_distributor' => $post['fs_nm_distributor'],
            'fs_telp_distributor' => $post['fs_telp_distributor'],
            'fs_alamat_distributor' => $post['fs_alamat_distributor'],
            'fs_deskripsi_distributor' => $post['fs_deskripsi_distributor'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_distributor', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'DS');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_distributor' => $post['fs_nm_distributor'],
            'fs_telp_distributor' => $post['fs_telp_distributor'],
            'fs_alamat_distributor' => $post['fs_alamat_distributor'],
            'fs_deskripsi_distributor' => $post['fs_deskripsi_distributor'],
        ];
        $this->db->where('fs_id_distributor', $post['id']);
        $this->db->update('tb_distributor', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_distributor', $id);
        $this->db->update('tb_distributor');
    }
}
