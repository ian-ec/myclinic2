<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelunasan_hutang_m extends CI_Model
{

    public function no_pelunasan_hutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'PH');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "PH" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'PH');
        $this->db->update('t_no');
    }

    public function get($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_hutang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_pelunasan_hutang.fs_id_distributor');
        $this->db->join('t_trs_order_hutang', 't_trs_order_hutang.fs_id_order_hutang=t_trs_pelunasan_hutang.fs_id_order_hutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_hutang.fs_id_bank_group');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_hutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_pelunasan_hutang>=', $awal);
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_pelunasan_hutang<=', $akhir);
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_void', '0000-00-00');
        $this->db->order_by('t_trs_pelunasan_hutang.fs_kd_pelunasan_hutang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_order_hutang_distributor($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_order_hutang.fs_id_distributor');
        $this->db->join('user', 'user.user_id=t_trs_order_hutang.fs_id_user');
        if ($id != null) {
            $this->db->where('t_trs_order_hutang.fs_id_distributor', $id);
        }
        $this->db->where('t_trs_order_hutang.fs_id_pelunasan_hutang', 0);
        $this->db->where('t_trs_order_hutang.fd_tgl_void', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }

    public function get_pelunasan_hutang($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_hutang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_pelunasan_hutang.fs_id_distributor');
        $this->db->join('t_trs_order_hutang', 't_trs_order_hutang.fs_id_order_hutang=t_trs_pelunasan_hutang.fs_id_order_hutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_hutang.fs_id_bank_group');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_hutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_void', '0000-00-00');
        $this->db->where('t_trs_pelunasan_hutang.fs_id_pelunasan_hutang', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_pelunasan_hutang_detail($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_hutang');
        $this->db->join('t_trs_pelunasan_hutang_detail', 't_trs_pelunasan_hutang_detail.fs_id_pelunasan_hutang=t_trs_pelunasan_hutang.fs_id_pelunasan_hutang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_trs_pelunasan_hutang_detail.fs_id_pembelian');
        $this->db->join('t_hutang', 't_hutang.fs_id_hutang=t_trs_pelunasan_hutang_detail.fs_id_hutang');
        $this->db->where('t_trs_pelunasan_hutang_detail.fs_id_pelunasan_hutang', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_pelunasan_hutang');
        $this->db->join('t_trs_pelunasan_hutang_detail', 't_trs_pelunasan_hutang_detail.fs_id_pelunasan_hutang=t_trs_pelunasan_hutang.fs_id_pelunasan_hutang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_trs_pelunasan_hutang_detail.fs_id_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_pelunasan_hutang.fs_id_distributor');
        $this->db->join('t_trs_order_hutang', 't_trs_order_hutang.fs_id_order_hutang=t_trs_pelunasan_hutang.fs_id_order_hutang');
        $this->db->join('tb_bank_group', 'tb_bank_group.fs_id_bank_group=t_trs_pelunasan_hutang.fs_id_bank_group');
        $this->db->join('t_hutang', 't_hutang.fs_id_hutang=t_trs_pelunasan_hutang_detail.fs_id_hutang');
        $this->db->join('user', 'user.user_id=t_trs_pelunasan_hutang.fs_id_user');
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_pelunasan_hutang>=', $awal);
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_pelunasan_hutang<=', $akhir);
        $this->db->where('t_trs_pelunasan_hutang.fd_tgl_void', '0000-00-00');
        $this->db->order_by('t_trs_pelunasan_hutang.fs_kd_pelunasan_hutang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function add_pelunasan_hutang($post)
    {
        $params = array(
            'fs_kd_pelunasan_hutang' => $this->no_pelunasan_hutang(),
            'fs_id_distributor' => $post['fs_id_distributor'],
            'fs_id_order_hutang' => $post['fs_id_order_hutang'],
            'fs_id_bank_group' => $post['fs_id_bank_group'],
            'fn_subtotal' => $post['fn_subtotal'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_grandtotal'],
            'fd_tgl_pelunasan_hutang' => $post['fd_tgl_pelunasan_hutang'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_pelunasan_hutang', $params);
        return $this->db->insert_id();
    }

    function add_pelunasan_hutang_detail($params)
    {
        $this->db->insert_batch('t_trs_pelunasan_hutang_detail', $params);
    }

    public function update_sisa_hutang($id)
    {
        $query  = "UPDATE t_hutang
        INNER JOIN t_trs_pelunasan_hutang_detail ON t_trs_pelunasan_hutang_detail.fs_id_hutang=t_hutang.fs_id_hutang
        SET fn_sisa_hutang = fn_sisa_hutang-fn_nilai_pelunasan
        WHERE fs_id_pelunasan_hutang = '$id'
        AND fn_sisa_hutang NOT LIKE 0";

        $this->db->query($query);
    }

    public function update_id_order($id)
    {
        $query  = "UPDATE t_hutang
        INNER JOIN t_trs_pelunasan_hutang_detail ON t_trs_pelunasan_hutang_detail.fs_id_hutang=t_hutang.fs_id_hutang
        SET fs_id_order_hutang = 0
        WHERE fs_id_pelunasan_hutang = '$id'";

        $this->db->query($query);
    }

    public function update_add_order_hutang($post, $fs_id_pelunasan_hutang)
    {
        $fs_id_order_hutang = $post['fs_id_order_hutang'];

        $this->db->set('fs_id_pelunasan_hutang', $fs_id_pelunasan_hutang, FALSE);
        $this->db->where('fs_id_order_hutang', $fs_id_order_hutang);
        $this->db->update('t_trs_order_hutang');
    }

    public function del($id)
    {
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', date('Y-m-d'));
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_id_pelunasan_hutang', $id);
        $this->db->update('t_trs_pelunasan_hutang');
    }

    public function del_order_hutang($id)
    {
        $this->db->set('fs_id_pelunasan_hutang', '0');
        $this->db->where('fs_id_pelunasan_hutang', $id);
        $this->db->update('t_trs_order_hutang');
    }

    public function update_nilai_hutang($id)
    {
        $query  = "UPDATE t_hutang
        INNER JOIN t_trs_pelunasan_hutang_detail ON t_trs_pelunasan_hutang_detail.fs_id_hutang=t_hutang.fs_id_hutang
        INNER JOIN t_trs_pelunasan_hutang ON t_trs_pelunasan_hutang.fs_id_pelunasan_hutang=t_trs_pelunasan_hutang_detail.fs_id_pelunasan_hutang
        SET t_hutang.fn_sisa_hutang = t_hutang.fn_sisa_hutang+t_trs_pelunasan_hutang_detail.fn_nilai_pelunasan,
        t_hutang.fs_id_order_hutang = t_trs_pelunasan_hutang.fs_id_order_hutang
        WHERE t_trs_pelunasan_hutang_detail.fs_id_pelunasan_hutang = '$id'";

        $this->db->query($query);
    }
}
