<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan_piutang_m extends CI_Model
{

    public function no_pelunasan_piutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PP');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PP" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PP');
        $this->db->update('t_no');
    }

    public function get($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_pelunasan_piutang.fs_id_jaminan');
        $this->db->join('t_trs_order_piutang', 't_trs_order_piutang.fs_id_order_piutang=t_trs_pelunasan_piutang.fs_id_order_piutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_piutang.fs_id_bank_group');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_piutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_pelunasan_piutang>=', $awal);
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_pelunasan_piutang<=', $akhir);
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_void', '0000-00-00');
        $this->db->order_by('t_trs_pelunasan_piutang.fs_kd_pelunasan_piutang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_pelunasan_piutang($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_pelunasan_piutang.fs_id_jaminan');
        $this->db->join('t_trs_order_piutang', 't_trs_order_piutang.fs_id_order_piutang=t_trs_pelunasan_piutang.fs_id_order_piutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_piutang.fs_id_bank_group');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_piutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_void', '0000-00-00');
        $this->db->where('t_trs_pelunasan_piutang.fs_id_pelunasan_piutang', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_pelunasan_piutang_detail($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_piutang');
        $this->db->join('t_trs_pelunasan_piutang_detail', 't_trs_pelunasan_piutang_detail.fs_id_pelunasan_piutang=t_trs_pelunasan_piutang.fs_id_pelunasan_piutang');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_trs_pelunasan_piutang_detail.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        $this->db->join('t_piutang', 't_piutang.fs_id_piutang=t_trs_pelunasan_piutang_detail.fs_id_piutang');
        $this->db->where('t_trs_pelunasan_piutang_detail.fs_id_pelunasan_piutang', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_piutang');
        $this->db->join('t_trs_pelunasan_piutang_detail', 't_trs_pelunasan_piutang_detail.fs_id_pelunasan_piutang=t_trs_pelunasan_piutang.fs_id_pelunasan_piutang');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi=t_trs_pelunasan_piutang_detail.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_pelunasan_piutang.fs_id_jaminan');
        $this->db->join('t_trs_order_piutang', 't_trs_order_piutang.fs_id_order_piutang=t_trs_pelunasan_piutang.fs_id_order_piutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_piutang.fs_id_bank_group');
        $this->db->join('t_piutang', 't_piutang.fs_id_piutang=t_trs_pelunasan_piutang_detail.fs_id_piutang');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_piutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_pelunasan_piutang>=', $awal);
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_pelunasan_piutang<=', $akhir);
        $this->db->where('t_trs_pelunasan_piutang.fd_tgl_void', '0000-00-00');
        $this->db->order_by('t_trs_pelunasan_piutang.fs_kd_pelunasan_piutang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_order_piutang_jaminan($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_piutang');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_order_piutang.fs_id_jaminan');
        $this->db->join('user', 'user.user_id=t_trs_order_piutang.fs_id_user');
        if ($id != null) {
            $this->db->where('t_trs_order_piutang.fs_id_jaminan', $id);
        }
        $this->db->where('t_trs_order_piutang.fs_id_pelunasan_piutang', 0);
        $this->db->where('t_trs_order_piutang.fd_tgl_void', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }

    public function add_pelunasan_piutang($post)
    {
        $params = array(
            'fs_kd_pelunasan_piutang' => $this->no_pelunasan_piutang(),
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fs_id_order_piutang' => $post['fs_id_order_piutang'],
            'fs_id_bank_group' => $post['fs_id_bank_group'],
            'fn_subtotal' => $post['fn_subtotal'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fd_tgl_pelunasan_piutang' => $post['fd_tgl_pelunasan_piutang'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_pelunasan_piutang', $params);
        return $this->db->insert_id();
    }

    function add_pelunasan_piutang_detail($params)
    {
        $this->db->insert_batch('t_trs_pelunasan_piutang_detail', $params);
    }

    public function update_sisa_piutang($id)
    {
        $query  = "UPDATE t_piutang
        INNER JOIN t_trs_pelunasan_piutang_detail ON t_trs_pelunasan_piutang_detail.fs_id_piutang=t_piutang.fs_id_piutang
        SET fn_sisa_piutang = fn_sisa_piutang-fn_nilai_pelunasan
        WHERE fs_id_pelunasan_piutang = '$id'
        AND fn_sisa_piutang NOT LIKE 0";

        $this->db->query($query);
    }

    public function update_id_order($id)
    {
        $query  = "UPDATE t_piutang
        INNER JOIN t_trs_pelunasan_piutang_detail ON t_trs_pelunasan_piutang_detail.fs_id_piutang=t_piutang.fs_id_piutang
        SET fs_id_order_piutang = 0
        WHERE fs_id_pelunasan_piutang = '$id'";

        $this->db->query($query);
    }

    public function update_add_order_piutang($post, $fs_id_pelunasan_piutang)
    {
        $fs_id_order_piutang = $post['fs_id_order_piutang'];

        $this->db->set('fs_id_pelunasan_piutang', $fs_id_pelunasan_piutang, FALSE);
        $this->db->where('fs_id_order_piutang', $fs_id_order_piutang);
        $this->db->update('t_trs_order_piutang');
    }

    public function del($id)
    {
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', date('Y-m-d'));
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_pelunasan_piutang', $id);
        $this->db->update('t_trs_pelunasan_piutang');
    }

    public function del_order_piutang($id)
    {
        $this->db->set('fs_id_pelunasan_piutang', '0');
        $this->db->where('fs_id_pelunasan_piutang', $id);
        $this->db->update('t_trs_order_piutang');
    }

    public function update_nilai_piutang($id)
    {
        $query  = "UPDATE t_piutang
        INNER JOIN t_trs_pelunasan_piutang_detail ON t_trs_pelunasan_piutang_detail.fs_id_piutang=t_piutang.fs_id_piutang
        INNER JOIN t_trs_pelunasan_piutang ON t_trs_pelunasan_piutang.fs_id_pelunasan_piutang=t_trs_pelunasan_piutang_detail.fs_id_pelunasan_piutang
        SET t_piutang.fn_sisa_piutang = t_piutang.fn_sisa_piutang+t_trs_pelunasan_piutang_detail.fn_nilai_pelunasan,
        t_piutang.fs_id_order_piutang = t_trs_pelunasan_piutang.fs_id_order_piutang
        WHERE t_trs_pelunasan_piutang_detail.fs_id_pelunasan_piutang = '$id'";

        $this->db->query($query);
    }
}
