<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*, t_trs_registrasi.fn_nilai as nilai_karcis, t_rm.fd_tgl_lahir as tanggal_lahir, t_trs_registrasi.fs_id_layanan as idlayanan');
        $this->db->from('t_trs_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm=t_trs_registrasi.fs_id_rm');
        $this->db->join('t_jns_kelamin', 't_jns_kelamin.fs_kd_kelamin=t_rm.fs_kd_kelamin');
        $this->db->join('t_agama', 't_agama.fs_kd_agama=t_rm.fs_kd_agama');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan=t_trs_registrasi.fs_id_layanan');
        $this->db->join('t_pegawai', 't_pegawai.fs_id_pegawai=t_trs_registrasi.fs_id_pegawai', 'left');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan=t_trs_registrasi.fs_id_jaminan');
        $this->db->join('t_karcis', 't_karcis.fs_id_karcis=t_trs_registrasi.fs_id_karcis');
        if ($id != null) {
            $this->db->where('fs_id_registrasi', $id);
        }
        $this->db->where('t_trs_registrasi.fb_aktif', '1');
        $this->db->where('t_trs_registrasi.fd_tgl_keluar', '3000-01-01');
        $this->db->order_by('fs_kd_registrasi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function reg_layanan()
    {
        $jumlah_reg = "SELECT t_layanan.fs_nm_layanan AS nama_layanan, COUNT(t_trs_registrasi.fs_id_registrasi) AS jumlah
        FROM t_trs_registrasi
        JOIN t_layanan ON t_layanan.fs_id_layanan = t_trs_registrasi.fs_id_layanan
        WHERE t_trs_registrasi.fb_aktif = '1'
        AND t_trs_registrasi.fd_tgl_keluar = '3000-01-01'
        GROUP BY t_layanan.fs_nm_layanan
        ORDER BY jumlah DESC";
        $query = $this->db->query($jumlah_reg);
        return $query;
    }

    public function no_registrasi()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RG');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "RG" . $no;
        return $no_trs;
    }

    public function no_registrasi2()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'RG');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no - 1);
        $no_trs = "RG" . $no;
        return $no_trs;
    }

    public function add($post)
    {
        $params = [
            'fs_kd_registrasi' => $this->no_registrasi(),
            'fs_id_rm' => $post['fs_id_rm'],
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_pegawai' => $post['fs_id_pegawai'],
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fn_no_polis' => $post['fn_no_polis'],
            'fs_id_karcis' => $post['fs_id_karcis'],
            'fn_nilai' => $post['fn_nilai'],
            'fs_id_status_pasien' => 1,
            'fd_tgl_registrasi' => $post['fd_tgl_registrasi'],
            'fd_tgl_keluar' => '3000-01-01',
            'fd_tgl_update' => '3000-01-01',
            'fs_id_user' => $this->session->userdata('userid'),
            'fb_aktif' => '1'
        ];
        $this->db->insert('t_trs_registrasi', $params);
        return $this->db->insert_id();
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'RG');
        $this->db->update('t_no');
    }

    public function aktif_reg($post = null)
    {
        $fs_id_rm = $post['fs_id_rm'];
        $this->db->set('fb_aktif_reg', '1');
        $this->db->where('fs_id_rm', $fs_id_rm);
        $this->db->update('t_rm');
    }

    public function non_aktif_reg($id = null)
    {
        $this->db->set('fb_aktif_reg', '0');
        $this->db->where('fs_id_rm', $id);
        $this->db->update('t_rm');
    }

    public function update_status($id, $status)
    {
        $id_reg = $id['fs_id_registrasi'];
        $this->db->set('fs_id_status_pasien', $status);
        $this->db->where('fs_id_registrasi', $id_reg);
        $this->db->update('t_trs_registrasi');
    }

    public function edit($post)
    {
        $params = [
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_pegawai' => $post['fs_id_pegawai'],
            'fs_id_jaminan' => $post['fs_id_jaminan'],
            'fn_no_polis' => $post['fn_no_polis'],
            'fs_id_karcis' => $post['fs_id_karcis'],
            'fn_nilai' => $post['fn_nilai'],
            'fd_tgl_update' => date('Y-m-d'),
            'fs_id_user' => $this->session->userdata('userid'),
        ];
        $this->db->where('fs_id_registrasi', $post['fs_id_registrasi']);
        $this->db->update('t_trs_registrasi', $params);
    }

    public function del($id)
    {
        $user_void = $this->session->userdata('userid');
        $this->db->set('fb_aktif', 0);
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_kd_registrasi', $id);
        $this->db->update('t_trs_registrasi');
    }

    public function cek_transaksi($id)
    {
        $cek = "SELECT *
        FROM t_trs_billing
        WHERE fs_id_registrasi = $id
        AND fs_kd_trs NOT LIKE 'RG%'
        ";
        $query = $this->db->query($cek);
        return $query;
    }
}
