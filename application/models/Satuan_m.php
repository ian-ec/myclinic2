<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_satuan');
        if ($id != null) {
            $this->db->where('fs_id_satuan', $id);
        }
        $this->db->where('fb_aktif', '1');
        $this->db->order_by('fs_id_satuan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function no_satuan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'ST');
        $query = $this->db->get()->row();
        $no = sprintf("%04d", $query->fn_no);
        $no_trs = "ST" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_satuan' => $this->no_satuan(),
            'fs_nm_satuan' => $post['fs_nm_satuan'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_satuan', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'ST');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_nm_satuan' => $post['fs_nm_satuan'],
        ];
        $this->db->where('fs_id_satuan', $post['id']);
        $this->db->update('tb_satuan', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_satuan', $id);
        $this->db->update('tb_satuan');
    }
}
