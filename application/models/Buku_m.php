<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_m extends CI_Model
{

    public function no_buku()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'BK');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "BK" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'BK');
        $this->db->update('t_no');
    }

    function add_buku($params)
    {
        $this->db->insert_batch('tb_buku', $params);
    }
}
