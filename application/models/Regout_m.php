<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regout_m extends CI_Model
{

    public function filter2($awal, $akhir)
    {
        $this->db->select('*, t_trs_regout.fs_id_registrasi as id_reg');
        $this->db->from('t_trs_regout');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_regout.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_pegawai', 't_pegawai.fs_id_pegawai=t_trs_registrasi.fs_id_pegawai', 'left');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_registrasi.fs_id_jaminan');
        $this->db->where('t_trs_registrasi.fb_aktif', '1');
        $this->db->where('fd_tgl_regout >=', $awal);
        $this->db->where('fd_tgl_regout <=', $akhir);
        $this->db->order_by('t_trs_registrasi.fs_id_registrasi', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function piutang_umum($awal, $akhir)
    {
        $this->db->select('*, t_trs_regout.fs_id_registrasi as id_reg');
        $this->db->from('t_trs_regout');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_regout.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_pegawai', 't_pegawai.fs_id_pegawai=t_trs_registrasi.fs_id_pegawai', 'left');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_registrasi.fs_id_jaminan');
        $this->db->where('t_trs_registrasi.fb_aktif', '1');
        $this->db->where('t_trs_regout.fd_tgl_regout >=', $awal);
        $this->db->where('t_trs_regout.fd_tgl_regout <=', $akhir);
        $this->db->where('t_trs_regout.fn_hutang <>', 0);
        $this->db->order_by('t_trs_registrasi.fs_id_registrasi', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function del_regout($id_registrasi)
    {
        $this->db->where('fs_id_registrasi', $id_registrasi);
        $this->db->delete('t_trs_regout');
    }

    public function del_regout2($id_registrasi)
    {
        $this->db->where('fs_id_registrasi', $id_registrasi);
        $this->db->delete('t_trs_regout2');
    }

    public function aktif_reg($id_rm)
    {
        $this->db->set('fb_aktif_reg', 1);
        $this->db->where('fs_id_rm', $id_rm);
        $this->db->update('t_rm');
    }

    public function udpate_tgl_batal($id_registrasi)
    {
        $this->db->set('fd_tgl_keluar', '3000-01-01');
        $this->db->where('fs_id_registrasi', $id_registrasi);
        $this->db->update('t_trs_registrasi');
    }

    public function update_status($id)
    {
        $this->db->set('fs_id_status_pasien', '4');
        $this->db->where('fs_id_registrasi', $id);
        $this->db->update('t_trs_registrasi');
    }

    public function detail_pembayaran($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_regout2');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_regout2.fs_id_jaminan', 'left');
        $this->db->where('fs_id_registrasi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function pendapatan_regout()
    {
        $tahun = date('Y');
        $pendapatan = "SELECT 'Jan' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-01%'
        UNION
        SELECT 'Feb' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-02%'
        UNION
        SELECT 'Mar' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-03%'
        UNION
        SELECT 'Apr' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-04%'
        UNION
        SELECT 'May' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-05%'
        UNION
        SELECT 'Jun' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-06%'
        UNION
        SELECT 'Jul' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-07%'
        UNION
        SELECT 'Aug' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-08%'
        UNION
        SELECT 'Sep' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-09%'
        UNION
        SELECT 'Oct' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-10%'
        UNION
        SELECT 'Nov' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-11%'
        UNION
        SELECT 'Des' AS bulan, SUM(fn_grandtotal) AS nilai
        FROM t_trs_regout
        WHERE fd_tgl_regout LIKE '$tahun-12%'
        ";
        $query = $this->db->query($pendapatan);
        return $query;
    }

    public function get_regout($id = null)
    {
        $this->db->select('*,t_trs_registrasi.fs_id_registrasi as id_registrasi, t_trs_registrasi.fs_id_rm as id_rm, fs_kd_registrasi, fs_kd_rm, fs_nm_pasien,fs_nm_layanan, fs_nm_jaminan, fs_id_status_pasien,t_trs_registrasi.fs_id_jaminan as id_jaminan,SUM(t_trs_billing.fn_subtotal) as subtotal,SUM(t_trs_billing.fn_diskon) as diskon,SUM(t_trs_billing.fn_grandtotal) as grandtotal, t_rm.fs_alamat as alamat_pasien');
        $this->db->from('t_trs_billing');
        $this->db->join('t_trs_regout', 't_trs_regout.fs_id_registrasi = t_trs_billing.fs_id_registrasi');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_billing.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        if ($id != null) {
            $this->db->where('t_trs_billing.fs_id_registrasi', $id);
        }
        $this->db->group_by('id_registrasi, id_rm, fs_kd_registrasi, fs_kd_rm, fs_nm_pasien,fs_nm_layanan, fs_nm_jaminan, fs_id_status_pasien, id_jaminan');
        $query = $this->db->get();
        return $query;
    }

    public function piutang($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_regout2');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_regout2.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->where('fs_id_regout2', $id);
        $query = $this->db->get();
        return $query;
    }

    public function penerimaan_kas()
    {
        $date_now = date('Y-m');
        $this->db->select('SUM(fn_cash) as penerimaan');
        $this->db->from('t_trs_regout2');
        $this->db->like('fd_tgl_bayar', $date_now);
        $query = $this->db->get();
        return $query;
    }
}
