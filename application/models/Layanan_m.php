<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_layanan');
        if ($id != null) {
            $this->db->where('fs_id_layanan', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_layanan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_layanan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'LY');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "LY" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_layanan' => $this->no_layanan(),
            'fs_nm_layanan' => $post['fs_nm_layanan'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('t_layanan', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'LY');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_layanan' => $post['fs_nm_layanan'],
        ];
        $this->db->where('fs_id_layanan', $post['id']);
        $this->db->update('t_layanan', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_layanan', $id);
        $this->db->update('t_layanan');
    }
}
