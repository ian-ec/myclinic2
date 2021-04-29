<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_golongan', 'tb_golongan.fs_id_golongan=tb_barang.fs_id_golongan');
        $this->db->join('tb_group', 'tb_group.fs_id_group=tb_barang.fs_id_group');
        $this->db->join('tb_satuan', 'tb_satuan.fs_id_satuan=tb_barang.fs_id_satuan');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak=tb_barang.fs_id_rekapcetak');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket=tb_barang.fs_id_etiket', 'left');
        if ($id != null) {
            $this->db->where('fs_id_barang', $id);
        }
        $this->db->where('tb_barang.fb_aktif', '1');
        $this->db->order_by('tb_barang.fs_id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_penjualan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_golongan', 'tb_golongan.fs_id_golongan=tb_barang.fs_id_golongan');
        $this->db->join('tb_group', 'tb_group.fs_id_group=tb_barang.fs_id_group');
        $this->db->join('tb_satuan', 'tb_satuan.fs_id_satuan=tb_barang.fs_id_satuan');
        $this->db->join('tb_etiket', 'tb_etiket.fs_id_etiket=tb_barang.fs_id_etiket', 'left');
        if ($id != null) {
            $this->db->where('fs_id_barang', $id);
        }
        $this->db->where('tb_barang.fb_aktif', '1');
        $this->db->where('tb_barang.fn_stok !=', 0);
        $this->db->order_by('tb_barang.fs_id_barang', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_barcode($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_golongan', 'tb_golongan.fs_id_golongan=tb_barang.fs_id_golongan');
        $this->db->join('tb_group', 'tb_group.fs_id_group=tb_barang.fs_id_group');
        $this->db->join('tb_satuan', 'tb_satuan.fs_id_satuan=tb_barang.fs_id_satuan');
        if ($id != null) {
            $this->db->where('fs_kd_barcode', $id);
        }
        $this->db->where('tb_barang.fb_aktif', '1');
        $this->db->where('tb_barang.fn_stok <>', '0');
        $query = $this->db->get();
        return $query;
    }

    public function no_barang()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'BR');
        $query = $this->db->get()->row();
        $no = sprintf("%06d", $query->fn_no);
        $no_trs = "BR" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_barang' => $this->no_barang(),
            'fs_kd_barcode' => $post['fs_kd_barcode'],
            'fs_nm_barang' => $post['fs_nm_barang'],
            'fs_id_golongan' => $post['fs_id_golongan'],
            'fs_id_group' => $post['fs_id_group'],
            'fs_id_satuan' => $post['fs_id_satuan'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fs_id_etiket' => $post['fs_id_etiket'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_hna' => $post['fn_harga_beli'],
            'fn_profit' => $post['fn_profit'],
            'fn_harga_jual' => $post['fn_harga_jual'],
            'fn_stok' => 0,
            'fn_stok_min' => $post['fn_stok_min'],
            'fn_stok_max' => $post['fn_stok_max'],
            'fb_aktif' => 1,
        ];
        $this->db->insert('tb_barang', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'BR');
        $this->db->update('t_no');
    }

    public function edit($post)
    {
        $params = [
            'fs_kd_barcode' => $post['fs_kd_barcode'],
            'fs_nm_barang' => $post['fs_nm_barang'],
            'fs_id_golongan' => $post['fs_id_golongan'],
            'fs_id_group' => $post['fs_id_group'],
            'fs_id_satuan' => $post['fs_id_satuan'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fs_id_etiket' => $post['fs_id_etiket'],
            'fn_harga_beli' => $post['fn_harga_beli'],
            'fn_profit' => $post['fn_profit'],
            'fn_harga_jual' => $post['fn_harga_jual'],
            'fn_stok_min' => $post['fn_stok_min'],
            'fn_stok_max' => $post['fn_stok_max'],
        ];
        $this->db->where('fs_id_barang', $post['id']);
        $this->db->update('tb_barang', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_barang', $id);
        $this->db->update('tb_barang');
    }
}
