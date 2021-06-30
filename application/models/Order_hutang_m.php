<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Hutang_m extends CI_Model
{

    public function get($id, $awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_hutang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_hutang.fs_id_pembelian');
        $this->db->where('t_hutang.fd_tgl_hutang>=', $awal);
        $this->db->where('t_hutang.fd_tgl_hutang<=', $akhir);
        $this->db->where('t_hutang.fs_id_distributor', $id);
        $this->db->where('tb_trs_pembelian.fd_tgl_void', '0000-00-00');
        $this->db->where('t_hutang.fn_sisa_hutang <>', '0');
        $this->db->order_by('tb_trs_pembelian.fs_kd_pembelian', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_cart($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang_cart');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_trs_order_hutang_cart.fs_id_pembelian');
        if ($id != null) {
            $this->db->where('t_trs_order_hutang_cart.fs_id_order_hutang', $id);
        }
        $this->db->where('t_trs_order_hutang_cart.fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function get_order_hutang($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_order_hutang.fs_id_distributor');
        $this->db->join('user', 'user.user_id=t_trs_order_hutang.fs_id_user');
        if ($id != null) {
            $this->db->where('t_trs_order_hutang.fs_id_order_hutang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_order_hutang_detail($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang_detail');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_trs_order_hutang_detail.fs_id_pembelian');
        if ($id != null) {
            $this->db->where('t_trs_order_hutang_detail.fs_id_order_hutang', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function no_order_hutang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'OH');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "OH" . $no;
        return $no_trs;
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'OH');
        $this->db->update('t_no');
    }

    public function del_cart($id = null)
    {

        $fs_id_user = $this->session->userdata('userid');
        if ($id != null) {
            $this->db->where('fs_id_pembelian', $id);
        }
        $this->db->where('fs_id_user', $fs_id_user);
        $this->db->delete('t_trs_order_hutang_cart');
    }

    public function cek_chart($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang_cart');
        $this->db->where('fs_id_pembelian', $id);
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {

        $query = $this->db->query("SELECT MAX(fs_id_cart_order_hutang) AS cart_no FROM t_trs_order_hutang_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_cart_order_hutang' => $car_no,
            'fs_id_hutang' => $post['fs_id_hutang'],
            'fs_id_pembelian' => $post['fs_id_pembelian'],
            'fn_nilai_hutang' => $post['fn_sisa_hutang'],
            'fs_id_user' => $this->session->userdata('userid'),
        );
        $this->db->insert('t_trs_order_hutang_cart', $params);
    }

    public function simpan($post)
    {
        $params = array(
            'fs_kd_order_hutang' => $this->no_order_hutang(),
            'fs_id_distributor' => $post['fs_id_distributor'],
            'fn_nilai_order' => $post['fn_nilai_order'],
            'fd_tgl_order_hutang' => $post['fd_tgl_order_hutang'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_order_hutang', $params);
        return $this->db->insert_id();
    }

    public function add_order_hutang_detail($params)
    {
        $this->db->insert_batch('t_trs_order_hutang_detail', $params);
    }

    public function update_data_hutang($fs_id_order_hutang)
    {
        $id_user = $this->session->userdata('userid');

        $data = "UPDATE t_hutang SET fs_id_order_hutang ='$fs_id_order_hutang'
        WHERE fs_id_pembelian IN (SELECT fs_id_pembelian FROM t_trs_order_hutang_cart WHERE fs_id_user = '$id_user')
        ";

        $query = $this->db->query($data);
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=t_trs_order_hutang.fs_id_distributor');
        $this->db->join('user', 'user.user_id=t_trs_order_hutang.fs_id_user');
        $this->db->where('fd_tgl_order_hutang >=', $awal);
        $this->db->where('fd_tgl_order_hutang <=', $akhir);
        $this->db->where('fd_tgl_void =', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_order_hutang_detail');
        $this->db->join('t_trs_order_hutang', 't_trs_order_hutang.fs_id_order_hutang=t_trs_order_hutang_detail.fs_id_order_hutang');
        $this->db->join('tb_trs_pembelian', 'tb_trs_pembelian.fs_id_pembelian=t_trs_order_hutang_detail.fs_id_pembelian');
        $this->db->join('tb_distributor', 'tb_distributor.fs_id_distributor=tb_trs_pembelian.fs_id_distributor');
        $this->db->where('fd_tgl_order_hutang >=', $awal);
        $this->db->where('fd_tgl_order_hutang <=', $akhir);
        $this->db->where('t_trs_order_hutang.fd_tgl_void =', '0000-00-00');
        $query = $this->db->get();
        return $query;
    }
}
