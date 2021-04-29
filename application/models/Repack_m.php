<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repack_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_repack');
        if ($id != null) {
            $this->db->where('fs_id_repack', $id);
        }
        $this->db->where('fb_aktif', '1');
        $query = $this->db->get();
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*, aa.fs_nm_barang as material, bb.fs_nm_barang as hasil');
        $this->db->from('tb_repack');
        $this->db->join('tb_barang aa', 'tb_repack.fs_id_material = aa.fs_id_barang');
        $this->db->join('tb_barang bb', 'tb_repack.fn_id_hasil = bb.fs_id_barang');
        $this->db->where('fd_tgl_repack >=', $awal);
        $this->db->where('fd_tgl_repack <=', $akhir);
        $this->db->order_by('tb_repack.fs_id_repack', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function no_repack()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RP');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "RP" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_repack' => $this->no_repack(),
            'fs_id_material' => $post['fs_id_material'],
            'fn_qty_material' => $post['fn_qty_material'],
            'fn_total_hpp_material' => $post['fn_total_hpp_material'],
            'fn_id_hasil' => $post['fn_id_hasil'],
            'fn_qty_hasil' => $post['fn_qty_hasil'],
            'fn_hpp_hasil' => $post['fn_hpp_hasil'],
            'fs_keterangan_repack' => $post['fs_keterangan_repack'],
            'fd_tgl_repack' => $post['fd_tgl_repack'],
            'fs_id_user' => $this->session->userdata('userid')
        ];
        $this->db->insert('tb_repack', $params);
    }

    public function update_stok_plus($post)
    {
        $fn_qty_hasil = $post['fn_qty_hasil'];
        $fn_id_hasil = $post['fn_id_hasil'];
        $fn_hpp_hasil = $post['fn_hpp_hasil'];
        $query = "UPDATE tb_barang SET fn_stok = fn_stok + '$fn_qty_hasil', fn_harga_beli = '$fn_hpp_hasil', fn_hna = '$fn_hpp_hasil' WHERE fs_id_barang = '$fn_id_hasil'";
        $this->db->query($query);
    }

    public function update_stok_min($post)
    {
        $fn_qty_material = $post['fn_qty_material'];
        $fs_id_material = $post['fs_id_material'];
        $sql = "UPDATE tb_barang SET fn_stok = fn_stok  -'$fn_qty_material' WHERE fs_id_barang = '$fs_id_material'";
        $this->db->query($sql);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RP');
        $this->db->update('t_no');
    }

    // public function edit($post)
    // {
    //     $params = [
    //         'fs_kd_repack' => $post['fs_kd_repack'],
    //         'fs_nm_repack' => $post['fs_nm_repack'],
    //     ];
    //     $this->db->where('fs_id_repack', $post['id']);
    //     $this->db->update('tb_repack', $params);
    // }
    // public function del($id)
    // {
    //     $this->db->set('fb_aktif', 0);
    //     $this->db->where('fs_id_repack', $id);
    //     $this->db->update('tb_repack');
    // }
}
