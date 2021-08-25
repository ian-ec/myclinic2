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

    function add_stok($params)
    {
        $this->db->insert_batch('tb_stok', $params);
    }

    public function rekap($awal, $akhir)
    {
        $this->db->select('*, tb_buku.fn_hpp as fn_hpp, tb_buku.fd_tgl_expired as fd_tgl_expired');
        $this->db->from('tb_buku');
        $this->db->join('tb_trs_pemesanan', 'tb_trs_pemesanan.fs_id_pemesanan = tb_buku.fs_id_pemesanan');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_buku.fs_id_barang');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_buku.fs_id_layanan');
        $this->db->where('tb_buku.fd_tgl_mutasi >=', $awal);
        $this->db->where('tb_buku.fd_tgl_mutasi <=', $akhir);
        $this->db->order_by('tb_buku.fs_id_buku', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function stok($id)
    {
        $this->db->select('t_layanan.fs_nm_layanan as fs_nm_layanan, 
        tb_barang.fs_kd_barang as fs_kd_barang, 
        tb_barang.fs_nm_barang as fs_nm_barang,
        tb_stok.fn_hpp as fn_hpp,
        tb_barang.fn_stok_min as fn_stok_min,
        SUM(tb_stok.fn_qty) as fn_qty,
        ');
        $this->db->from('tb_stok');
        $this->db->join('tb_barang', 'tb_barang.fs_id_barang = tb_stok.fs_id_barang', 'left');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = tb_stok.fs_id_layanan');
        if ($id != 0) {
            $this->db->where('tb_stok.fs_id_layanan', $id);
        }
        $this->db->group_by('fs_nm_layanan');
        $this->db->group_by('fs_kd_barang');
        $this->db->group_by('fs_nm_barang');
        $this->db->group_by('fn_hpp');
        $this->db->group_by('fn_stok_min');
        $this->db->order_by('tb_stok.fs_id_layanan', 'asc');
        $this->db->order_by('tb_stok.fs_id_barang', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function stok_barang($id)
    {
        $sql = "SELECT bb.fs_kd_barang AS fs_kd_barang, 
                       bb.fs_id_barang AS fs_id_barang, 
                       bb.fs_kd_barcode AS fs_kd_barcode, 
                       bb.fs_nm_barang AS fs_nm_barang, 
                       bb.fn_hna AS fn_hna, 
                       bb.fn_profit AS fn_profit, 
                       bb.fn_harga_jual AS fn_harga_jual, 
                       cc.fs_nm_satuan AS fs_nm_satuan, 
                       ff.fs_id_etiket AS fs_id_etiket,
                       ff.fs_nm_etiket AS fs_nm_etiket,
                       aa.fn_hpp AS fn_hpp, 
                       SUM(aa.fn_qty) AS fn_qty
                FROM tb_stok aa
                LEFT JOIN tb_barang bb ON bb.fs_id_barang = aa.fs_id_barang
                JOIN tb_satuan cc ON cc.fs_id_satuan = bb.fs_id_satuan
                JOIN tb_golongan dd ON dd.fs_id_golongan = bb.fs_id_golongan
                JOIN tb_group ee ON ee.fs_id_group = bb.fs_id_group
                LEFT JOIN tb_etiket ff ON ff.fs_id_etiket = bb.fs_id_etiket
                WHERE aa.fs_id_layanan = $id
                AND bb.fb_aktif= 1
                GROUP BY fs_kd_barang, fs_id_barang, fs_kd_barcode ,fs_nm_barang, fn_hna, fn_profit, fn_harga_jual, fs_nm_satuan, fs_id_etiket, fs_nm_etiket, fn_hpp
                UNION
                SELECT aa.fs_kd_barang, 
                       aa.fs_id_barang, 
                       aa.fs_kd_barcode, 
                       aa.fs_nm_barang, 
                       aa.fn_hna, 
                       aa.fn_profit, 
                       aa.fn_harga_jual, 
                       bb.fs_nm_satuan, 
                       ee.fs_id_etiket,
                       ee.fs_nm_etiket,
                       aa.fn_harga_beli,
                       0
                FROM tb_barang aa
                JOIN tb_satuan bb ON bb.fs_id_satuan = aa.fs_id_satuan
                JOIN tb_golongan cc ON cc.fs_id_golongan = aa.fs_id_golongan
                JOIN tb_group dd ON dd.fs_id_group = aa.fs_id_group
                LEFT JOIN tb_etiket ee ON ee.fs_id_etiket = aa.fs_id_etiket
                WHERE aa.fs_id_barang NOT IN (SELECT fs_id_barang FROM tb_stok WHERE fs_id_layanan = $id)
                AND aa.fb_aktif=1
                ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    public function stok_ada($id)
    {
        $sql = "SELECT bb.fs_kd_barang AS fs_kd_barang, 
                       bb.fs_id_barang AS fs_id_barang, 
                       bb.fs_kd_barcode AS fs_kd_barcode, 
                       bb.fs_nm_barang AS fs_nm_barang, 
                       bb.fn_hna AS fn_hna, 
                       bb.fn_profit AS fn_profit, 
                       bb.fn_harga_jual AS fn_harga_jual, 
                       cc.fs_nm_satuan AS fs_nm_satuan, 
                       ff.fs_id_etiket AS fs_id_etiket,
                       ff.fs_nm_etiket AS fs_nm_etiket,
                       aa.fn_hpp AS fn_hpp, 
                       SUM(aa.fn_qty) AS fn_qty
                FROM tb_stok aa
                LEFT JOIN tb_barang bb ON bb.fs_id_barang = aa.fs_id_barang
                JOIN tb_satuan cc ON cc.fs_id_satuan = bb.fs_id_satuan
                JOIN tb_golongan dd ON dd.fs_id_golongan = bb.fs_id_golongan
                JOIN tb_group ee ON ee.fs_id_group = bb.fs_id_group
                LEFT JOIN tb_etiket ff ON ff.fs_id_etiket = bb.fs_id_etiket
                WHERE aa.fs_id_layanan = $id
                AND bb.fb_aktif= 1
                GROUP BY fs_kd_barang, fs_id_barang, fs_kd_barcode ,fs_nm_barang, fn_hna, fn_profit, fn_harga_jual, fs_nm_satuan, fs_id_etiket, fs_nm_etiket, fn_hpp
                ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    public function stok2($id_layanan, $id_barang)
    {
        $sql = "SELECT bb.fs_kd_barang AS fs_kd_barang, 
                       bb.fs_id_barang AS fs_id_barang, 
                       bb.fs_kd_barcode AS fs_kd_barcode, 
                       bb.fs_nm_barang AS fs_nm_barang, 
                       bb.fn_hna AS fn_hna, 
                       bb.fn_profit AS fn_profit, 
                       bb.fn_harga_jual AS fn_harga_jual, 
                       cc.fs_nm_satuan AS fs_nm_satuan, 
                       ff.fs_id_etiket AS fs_id_etiket,
                       ff.fs_nm_etiket AS fs_nm_etiket,
                       aa.fn_hpp AS fn_hpp, 
                       SUM(aa.fn_qty) AS fn_qty
                FROM tb_stok aa
                LEFT JOIN tb_barang bb ON bb.fs_id_barang = aa.fs_id_barang
                JOIN tb_satuan cc ON cc.fs_id_satuan = bb.fs_id_satuan
                JOIN tb_golongan dd ON dd.fs_id_golongan = bb.fs_id_golongan
                JOIN tb_group ee ON ee.fs_id_group = bb.fs_id_group
                LEFT JOIN tb_etiket ff ON ff.fs_id_etiket = bb.fs_id_etiket
                WHERE aa.fs_id_layanan = $id_layanan
                AND aa.fs_id_barang = $id_barang
                AND bb.fb_aktif= 1
                GROUP BY fs_kd_barang, fs_id_barang, fs_kd_barcode ,fs_nm_barang, fn_hna, fn_profit, fn_harga_jual, fs_nm_satuan, fs_id_etiket, fs_nm_etiket, fn_hpp
                ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    public function stok3($id_layanan, $id_barang)
    {
        $sql = "SELECT *, aa.fs_id_barang AS fs_id_barang
                FROM tb_stok aa
                LEFT JOIN tb_barang bb ON bb.fs_id_barang = aa.fs_id_barang
                WHERE aa.fs_id_layanan = $id_layanan
                AND aa.fs_id_barang = $id_barang
                AND bb.fb_aktif= 1
                AND aa.fn_qty > 0
                ORDER BY aa.fs_id_penerimaan ASC
                ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    public function update_stok($stok_update, $id_barang, $fs_id_penerimaan)
    {
        $this->db->set('fn_qty', $stok_update);
        $this->db->where('fs_id_barang', $id_barang);
        $this->db->where('fs_id_penerimaan', $fs_id_penerimaan);
        $this->db->update('tb_stok');
    }

    public function add_stok_out(
        $id_barang,
        $layanan,
        $fn_hpp,
        $fn_qty_buku,
        $fs_id_pemesanan,
        $fs_id_penerimaann,
        $fs_kd_penjualan,
        $fd_tgl_expired
    ) {
        $params = array(
            'fs_kd_jenis_mutasi' => 'DU',
            'fs_id_barang' => $id_barang,
            'fs_id_layanan' => $layanan,
            'fn_hpp' => $fn_hpp,
            'fn_stok_in' => 0,
            'fn_stok_out' => $fn_qty_buku,
            'fs_id_pemesanan' => $fs_id_pemesanan,
            'fs_id_penerimaan' => $fs_id_penerimaann,
            'fs_kd_mutasi' => $fs_kd_penjualan,
            'fd_tgl_expired' => $fd_tgl_expired,
            'fd_tgl_mutasi' => date('Y-m-d'),

        );
        $this->db->insert('tb_buku', $params);
    }

    public function del_stok($id)
    {
        $this->db->where('fs_id_penerimaan', $id);
        $this->db->delete('tb_stok');

        $this->db->where('fs_id_penerimaan', $id);
        $this->db->delete('tb_buku');
    }
}
