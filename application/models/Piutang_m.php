<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang_m extends CI_Model
{

    public function get($awal, $akhir, $id)
    {
        $this->db->select('*, t_piutang.fs_id_registrasi as id_registrasi');
        $this->db->from('t_piutang');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_piutang.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_registrasi.fs_id_jaminan');
        $this->db->join('t_trs_regout', 't_trs_regout.fs_id_registrasi=t_trs_registrasi.fs_id_registrasi');
        if ($id != 0) {
            $this->db->where('t_piutang.fs_id_jaminan', $id);
        }
        $this->db->where('t_piutang.fd_tgl_piutang>=', $awal);
        $this->db->where('t_piutang.fd_tgl_piutang<=', $akhir);
        $this->db->where('t_trs_registrasi.fb_aktif', '1');
        $this->db->order_by('t_trs_registrasi.fs_id_registrasi', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
