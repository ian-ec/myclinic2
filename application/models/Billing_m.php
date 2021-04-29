<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billing_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('t_trs_registrasi.fs_id_registrasi as id_registrasi, t_trs_registrasi.fs_id_rm as id_rm, fs_kd_registrasi, fs_kd_rm, fs_nm_pasien,fs_nm_layanan, fs_nm_jaminan, fs_id_status_pasien,t_trs_registrasi.fs_id_jaminan as id_jaminan,SUM(t_trs_billing.fn_subtotal) as subtotal,SUM(t_trs_billing.fn_diskon) as diskon,SUM(t_trs_billing.fn_grandtotal) as grandtotal, t_rm.fs_alamat as alamat_pasien');
        $this->db->from('t_trs_billing');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_billing.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        if ($id != null) {
            $this->db->where('t_trs_billing.fs_id_registrasi', $id);
        }
        $this->db->where('t_trs_registrasi.fd_tgl_keluar', '3000-01-01');
        $this->db->group_by('id_registrasi, id_rm, fs_kd_registrasi, fs_kd_rm, fs_nm_pasien,fs_nm_layanan, fs_nm_jaminan, fs_id_status_pasien, id_jaminan');
        $query = $this->db->get();
        return $query;
    }

    public function get_rekap($id = null)
    {
        $query = "SELECT dd.fs_nm_rekapcetak AS rekapcetak, aa.fn_subtotal AS subtotal, aa.fn_diskon AS diskon, aa.fn_grandtotal AS grandtotal
                FROM t_trs_billing aa
                JOIN t_trs_registrasi bb ON bb.fs_kd_registrasi = aa.fs_kd_trs
                JOIN t_karcis cc ON cc.fs_id_karcis = bb.fs_id_karcis
                JOIN t_rekapcetak dd ON dd.fs_id_rekapcetak = cc.fs_id_rekapcetak
                WHERE aa.fs_id_registrasi ='$id'
                UNION
                SELECT ee.fs_nm_rekapcetak, SUM(cc.fn_nilai_tarif) , SUM(cc.fn_diskon), SUM(cc.fn_total)
                FROM t_trs_billing aa
                JOIN t_trs_tindakan bb  ON bb.fs_kd_trs_tindakan = aa.fs_kd_trs
                JOIN t_trs_tindakan2 cc  ON cc.fs_id_tindakan = bb.fs_id_trs_tindakan
                JOIN t_tarif dd  ON dd.fs_id_tarif = cc.fs_id_tarif
                JOIN t_rekapcetak ee  ON ee.fs_id_rekapcetak = dd.fs_id_rekapcetak
                WHERE bb.fs_id_registrasi ='$id'
                GROUP BY ee.fs_nm_rekapcetak
                UNION
                SELECT ee.fs_nm_rekapcetak, SUM(cc.fn_harga_jual*cc.fn_qty) , SUM(cc.fn_diskon_harga_jual*cc.fn_qty), SUM(cc.fn_total_harga_jual)
                FROM t_trs_billing aa
                JOIN tb_trs_penjualan bb ON bb.fs_kd_penjualan = aa.fs_kd_trs
                JOIN tb_trs_penjualan_detail cc ON cc.fs_id_penjualan = bb.fs_id_penjualan
                JOIN tb_barang dd ON dd.fs_id_barang = cc.fs_id_barang
                JOIN t_rekapcetak ee ON ee.fs_id_rekapcetak = dd.fs_id_rekapcetak
                WHERE bb.fs_id_registrasi ='$id'
                GROUP BY ee.fs_nm_rekapcetak
                ";
        $hasil = $this->db->query($query);
        return $hasil;
    }

    public function get_detail_reg($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_registrasi');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_karcis', 't_karcis.fs_id_karcis=t_trs_registrasi.fs_id_karcis');
        $this->db->join('t_trs_billing', 't_trs_billing.fs_kd_trs=t_trs_registrasi.fs_kd_registrasi');
        $this->db->where('t_trs_registrasi.fs_id_registrasi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_detail_tindakan($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_tindakan.fs_id_layanan');
        $this->db->where('fs_id_registrasi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_detail_penjualan($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_trs_penjualan');
        $this->db->where('fs_id_registrasi', $id);
        $query = $this->db->get();
        return $query;
    }


    public function add_registrasi($post, $registrasi_id, $kode_registrasi)
    {
        $params = [
            'fs_id_registrasi' => $registrasi_id,
            'fs_kd_trs' => $kode_registrasi,
            'fd_tgl_trs' => $post['fd_tgl_registrasi'],
            'fn_subtotal' => $post['fn_nilai'],
            'fn_diskon' => 0,
            'fn_grandtotal' => $post['fn_nilai'],
        ];
        $this->db->insert('t_trs_billing', $params);
    }

    public function del_registrasi($id)
    {
        $this->db->where('fs_kd_trs', $id);
        $this->db->delete('t_trs_billing');
    }

    public function edit_registrasi($post)
    {
        $params = [
            'fd_tgl_trs' => $post['fd_tgl_registrasi'],
            'fn_subtotal' => $post['fn_nilai'],
            'fn_diskon' => 0,
            'fn_grandtotal' => $post['fn_nilai'],
        ];
        $this->db->where('fs_id_registrasi', $post['fs_id_registrasi']);
        $this->db->where('fs_kd_trs', $post['fs_kd_registrasi']);
        $this->db->update('t_trs_billing', $params);
    }

    public function add_tindakan($post, $no_tindakan)
    {
        $params = [
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fs_kd_trs' => $no_tindakan,
            'fd_tgl_trs' => $post['fd_tgl_trs'],
            'fn_subtotal' => $post['fn_subtotal_tindakan'],
            'fn_diskon' =>  $post['fn_diskon_tindakan'],
            'fn_grandtotal' => $post['fn_nilai_tindakan'],
        ];
        $this->db->insert('t_trs_billing', $params);
    }

    public function del_tindakan($id)
    {
        $this->db->where('fs_kd_trs', $id);
        $this->db->delete('t_trs_billing');
    }

    public function add_penjualan($post, $no_penjualan)
    {
        $params = [
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fs_kd_trs' => $no_penjualan,
            'fd_tgl_trs' => $post['fd_tgl_penjualan'],
            'fn_subtotal' => $post['fn_nilai_jual'],
            'fn_diskon' =>  $post['fn_diskon'],
            'fn_grandtotal' => $post['fn_total_nilai_jual'],
        ];
        $this->db->insert('t_trs_billing', $params);
    }

    public function del_penjualan($id)
    {
        $this->db->where('fs_kd_trs', $id);
        $this->db->delete('t_trs_billing');
    }
}
