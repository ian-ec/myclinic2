<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang_m extends CI_Model
{

    public function get($awal, $akhir, $id)
    {
        $this->db->select('*');
        $this->db->from('t_hutang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_hutang.fs_id_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_hutang.fs_id_distributor');
        $this->db->join('user', 'user.user_id=tb_trs_pembelian.fs_id_user');
        if ($id != 0) {
            $this->db->where('t_hutang.fs_id_distributor', $id);
        }
        $this->db->where('t_hutang.fd_tgl_hutang>=', $awal);
        $this->db->where('t_hutang.fd_tgl_hutang<=', $akhir);
        $this->db->where('tb_trs_pembelian.fd_tgl_void', '0000-00-00');
        $this->db->order_by('tb_trs_pembelian.fs_kd_pembelian', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
