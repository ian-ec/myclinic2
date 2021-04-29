<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_tindakan.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_tindakan.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_trs_tindakan.fs_id_user');
        $this->db->where('t_trs_tindakan.fd_tgl_void', '0000-00-00');
        if ($id != null) {
            $this->db->where('fs_id_trs_tindakan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_tindakan_detail($tindakan_id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan');
        $this->db->join('t_trs_tindakan2', 't_trs_tindakan2.fs_id_tindakan = t_trs_tindakan.fs_id_trs_tindakan');
        $this->db->join('t_tarif', 't_tarif.fs_id_tarif = t_trs_tindakan2.fs_id_tarif');
        if ($tindakan_id != null) {
            $this->db->where('fs_id_tindakan', $tindakan_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan_cart');
        $this->db->join('t_tarif', 't_tarif.fs_id_tarif = t_trs_tindakan_cart.fs_id_tarif');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_trs_tindakan_cart.fs_id_rekapcetak');
        $this->db->where('t_trs_tindakan_cart.fs_id_user', $this->session->userdata('userid'));
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_tindakan', 0);
        $this->db->order_by('fs_id_tindakan_cart', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_cart_edit($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan_cart');
        $this->db->join('t_tarif', 't_tarif.fs_id_tarif = t_trs_tindakan_cart.fs_id_tarif');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_trs_tindakan_cart.fs_id_rekapcetak');
        $this->db->where('t_trs_tindakan_cart.fs_id_user', $this->session->userdata('userid'));
        if ($id != null) {
            $this->db->where('fs_id_tindakan', $id);
        }
        $this->db->order_by('fs_id_tindakan_cart', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function sum_cart()
    {
        $this->db->select('SUM(fn_nilai_tarif) as nilai_tindakan');
        $this->db->from('t_trs_tindakan_cart');
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function no_tindakan()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'TU');
        $query = $this->db->get()->row();
        $no = sprintf("%08d", $query->fn_no);
        $no_trs = "TU" . $no;
        return $no_trs;
    }

    public function no_cart()
    {
        $query = $this->db->query("SELECT MAX(fs_id_tindakan_cart) AS cart_no FROM t_trs_tindakan_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        return $car_no;
    }

    public function cek_cart($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan_cart');
        $this->db->where('fs_id_tindakan', $id);
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_tindakan_cart) AS cart_no FROM t_trs_tindakan_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'fs_id_tindakan_cart' => $car_no,
            'fs_id_tarif' => $post['fs_id_tarif'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fn_qty' => $post['fn_qty'],
            'fn_nilai_tarif' => $post['fn_nilai_tarif'],
            'fn_diskon' => 0,
            'fn_total' => ($post['fn_qty'] * $post['fn_nilai_tarif']),
            'fs_id_user' => $this->session->userdata('userid'),
            'fs_id_tindakan' => $post['fs_id_tindakan']
        );
        $this->db->insert('t_trs_tindakan_cart', $params);
        return  $car_no;
    }

    public function komponen_cart($params)
    {
        $this->db->insert_batch('t_trs_tindakan_cart2', $params);
    }

    public function edit_cart($post)
    {
        $fs_id_tindakan_cart = $post['fs_id_tindakan_cart'];
        $params = array(
            'fn_qty' => $post['fn_qty'],
            'fn_diskon' => $post['fn_diskon'],
            'fn_total' => $post['fn_total'],
        );
        $this->db->set($params);
        $this->db->where('fs_id_tindakan_cart', $fs_id_tindakan_cart);
        $this->db->update('t_trs_tindakan_cart');
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $this->db->delete('t_trs_tindakan_cart');
    }

    public function add_tindakan($post)
    {
        $params = array(
            'fs_kd_trs_tindakan' => $this->no_tindakan(),
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fn_subtotal_tindakan' => $post['fn_subtotal_tindakan'],
            'fn_diskon_tindakan' => $post['fn_diskon_tindakan'],
            'fn_nilai_tindakan' => $post['fn_nilai_tindakan'],
            'fd_tgl_trs' => $post['fd_tgl_trs'],
            'fd_tgl_void' => '0000-00-00',
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_tindakan', $params);
        return $this->db->insert_id();
    }

    public function edit_tindakan($post)
    {
        $params = array(
            'fs_kd_trs_tindakan' => $post['fs_kd_trs_tindakan'],
            'fs_id_registrasi' => $post['fs_id_registrasi'],
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fn_subtotal_tindakan' => $post['fn_subtotal_tindakan'],
            'fn_diskon_tindakan' => $post['fn_diskon_tindakan'],
            'fn_nilai_tindakan' => $post['fn_nilai_tindakan'],
            'fd_tgl_trs' => $post['fd_tgl_trs'],
            'fd_tgl_void' => '0000-00-00',
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_trs_tindakan', $params);
        return $this->db->insert_id();
    }

    function add_tindakan_detail($params)
    {
        $this->db->insert_batch('t_trs_tindakan2', $params);
    }

    function add_cart_edit($params)
    {
        $this->db->insert_batch('t_trs_tindakan_cart', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'TU');
        $this->db->update('t_no');
    }

    public function del($id)
    {
        $user_void = $this->session->userdata('userid');
        $this->db->set('fd_tgl_void', date('Y-m-d'));
        $this->db->set('fs_id_user', $user_void);
        $this->db->where('fs_kd_trs_tindakan', $id);
        $this->db->update('t_trs_tindakan');
    }

    public function hapus($id)
    {
        $this->db->where('fs_id_trs_tindakan', $id);
        $this->db->delete('t_trs_tindakan');
    }

    public function hapus_detail($id)
    {
        $this->db->where('fs_id_tindakan', $id);
        $this->db->delete('t_trs_tindakan2');
    }

    public function komponen_tarif($id)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan_cart2');
        $this->db->join('t_komponen', 't_komponen.fs_id_komponen=t_trs_tindakan_cart2.fs_id_komponen');
        $this->db->where('fs_id_tindakan_cart', $id);
        $query = $this->db->get();
        return $query;
    }

    public function filter($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan');
        $this->db->join('t_trs_tindakan2', 't_trs_tindakan2.fs_id_tindakan = t_trs_tindakan.fs_id_trs_tindakan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_tindakan.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_tindakan.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_trs_tindakan.fs_id_user');
        $this->db->join('t_tarif', 't_tarif.fs_id_tarif = t_trs_tindakan2.fs_id_tarif');
        $this->db->where('t_trs_tindakan.fd_tgl_void', '0000-00-00');
        $this->db->where('t_trs_tindakan.fd_tgl_trs >=', $awal);
        $this->db->where('t_trs_tindakan.fd_tgl_trs <=', $akhir);
        $this->db->order_by('t_trs_tindakan.fs_kd_trs_tindakan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function filter2($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('t_trs_tindakan');
        $this->db->join('t_trs_registrasi', 't_trs_registrasi.fs_id_registrasi = t_trs_tindakan.fs_id_registrasi');
        $this->db->join('t_rm', 't_rm.fs_id_rm = t_trs_registrasi.fs_id_rm');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_trs_tindakan.fs_id_layanan');
        $this->db->join('t_jaminan', 't_jaminan.fs_id_jaminan = t_trs_registrasi.fs_id_jaminan');
        $this->db->join('user', 'user.user_id = t_trs_tindakan.fs_id_user');
        $this->db->where('t_trs_tindakan.fd_tgl_void', '0000-00-00');
        $this->db->where('fd_tgl_trs >=', $awal);
        $this->db->where('fd_tgl_trs <=', $akhir);
        $this->db->order_by('fs_kd_trs_tindakan', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
