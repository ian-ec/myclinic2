<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tarif_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_tarif');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_tarif.fs_id_rekapcetak');
        // $this->db->join('t_tarif_nilai_hdr', 't_tarif_nilai_hdr.fs_kd_tarif = t_tarif.fs_kd_tarif');
        if ($id != null) {
            $this->db->where('fs_id_tarif', $id);
        }
        $this->db->where('t_tarif.fb_aktif', '1');
        $this->db->order_by('t_tarif.fs_kd_tarif', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_layanan($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_tarif');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_tarif.fs_id_rekapcetak');
        $this->db->join('t_tarif_layanan', 't_tarif_layanan.fs_id_tarif = t_tarif.fs_id_tarif');
        if ($id != null) {
            $this->db->where('t_tarif_layanan.fs_id_layanan', $id);
        }
        $this->db->where('t_tarif.fb_aktif', '1');
        $this->db->order_by('t_tarif.fs_kd_tarif', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_detail($post = null)
    {
        $this->db->select('*, t_tarif.fs_id_tarif as id_tarif, t_tarif_nilai_dtl.fn_nilai as nilai_komponen');
        $this->db->from('t_tarif');
        $this->db->join('t_rekapcetak', 't_rekapcetak.fs_id_rekapcetak = t_tarif.fs_id_rekapcetak');
        $this->db->join('t_tarif_nilai_dtl', 't_tarif_nilai_dtl.fs_id_tarif = t_tarif.fs_id_tarif');
        $this->db->join('t_komponen', 't_komponen.fs_id_komponen = t_tarif_nilai_dtl.fs_id_komponen');
        $this->db->where('t_tarif.fs_id_tarif',  $post['fs_id_tarif']);
        $this->db->where('t_tarif.fb_aktif', '1');
        $this->db->order_by('t_tarif.fs_kd_tarif', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    // public function get_cart()
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_tarif_cart');
    //     $this->db->join('t_komponen', 't_komponen.fs_id_komponen = t_tarif_cart.fs_id_komponen');
    //     $this->db->where('fs_id_user', $this->session->userdata('userid'));
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function tarif_komponen($id = NULL)
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_tarif_nilai_dtl');
    //     $this->db->join('t_komponen', 't_komponen.fs_id_komponen = t_tarif_nilai_dtl.fs_id_komponen');
    //     if ($id != null) {
    //         $this->db->where('fs_id_tarif', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get_cart_layanan()
    {
        $this->db->select('*');
        $this->db->from('t_tarif_cart_layanan');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_tarif_cart_layanan.fs_id_layanan');
        $this->db->where('fs_id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function tarif_layanan($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('t_tarif_layanan');
        $this->db->join('t_layanan', 't_layanan.fs_id_layanan = t_tarif_layanan.fs_id_layanan');
        if ($id != null) {
            $this->db->where('fs_id_tarif', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function sum_cart()
    // {
    //     $this->db->select('SUM(fn_nilai) as nilai_tarif');
    //     $this->db->from('t_tarif_cart');
    //     $this->db->where('fs_id_user', $this->session->userdata('userid'));
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function sum_nilai_tarif($id)
    // {
    //     $this->db->select('SUM(fn_nilai) as nilai_tarif');
    //     $this->db->from('t_tarif_nilai_dtl');
    //     if ($id != null) {
    //         $this->db->where('fs_id_tarif', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function no_tarif()
    {
        $this->db->from('t_no');
        $this->db->where('fs_trs', 'TM');
        $query = $this->db->get()->row();
        $no = sprintf("%06d", $query->fn_no);
        $no_trs = "TM" . $no;
        return $no_trs;
    }

    // public function add_cart($post)
    // {
    //     $query = $this->db->query("SELECT MAX(fs_id_cart) AS cart_no FROM t_tarif_cart");
    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $car_no = ((int)$row->cart_no) + 1;
    //     } else {
    //         $car_no = "1";
    //     }

    //     $params = array(
    //         'fs_id_cart' => $car_no,
    //         'fs_id_komponen' => $post['fs_id_komponen'],
    //         'fn_nilai' => $post['fn_nilai'],
    //         'fs_id_user' => $this->session->userdata('userid')
    //     );
    //     $this->db->insert('t_tarif_cart', $params);
    // }

    // public function edit_cart($post)
    // {

    //     $params = array(
    //         'fs_id_tarif' => $post['fs_id_tarif'],
    //         'fs_id_komponen' => $post['fs_id_komponen'],
    //         'fn_nilai' => $post['fn_nilai'],
    //     );
    //     $this->db->insert('t_tarif_nilai_dtl', $params);
    // }

    public function add_cart_layanan($post)
    {
        $query = $this->db->query("SELECT MAX(fs_id_cart_layanan) AS cart_no_layanan FROM t_tarif_cart_layanan");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no_layanan = ((int)$row->cart_no_layanan) + 1;
        } else {
            $car_no_layanan = "1";
        }

        $params = array(
            'fs_id_cart_layanan' => $car_no_layanan,
            'fs_id_layanan' => $post['fs_id_layanan'],
            'fs_id_user' => $this->session->userdata('userid')
        );
        $this->db->insert('t_tarif_cart_layanan', $params);
    }

    public function edit_cart_layanan($post = null)
    {

        $params = array(
            'fs_id_tarif' => $post['fs_id_tarif'],
            'fs_id_layanan' => $post['fs_id_layanan']
        );
        $this->db->insert('t_tarif_layanan', $params);
    }

    public function del_cart_layanan($post = null)
    {
        $fs_id_cart_layanan = $post['cart_id_layanan'];
        $fs_id_user = $this->session->userdata('userid');
        if ($post != null) {
            $this->db->where('fs_id_cart_layanan', $fs_id_cart_layanan);
        }
        $this->db->where('fs_id_user', $fs_id_user);
        $this->db->delete('t_tarif_cart_layanan');
    }

    public function del_layanan($post = null)
    {
        $fs_id_tarif = $post['fs_id_tarif'];
        $fs_id_tarif_layanan = $post['fs_id_tarif_layanan'];
        if ($post != null) {
            $this->db->where('fs_id_tarif', $fs_id_tarif);
        }
        $this->db->where('fs_id_tarif_layanan', $fs_id_tarif_layanan);
        $this->db->delete('t_tarif_layanan');
    }

    public function add($post)
    {
        $params = [
            'fs_kd_tarif' => $this->no_tarif(),
            'fs_nm_tarif' => $post['fs_nm_tarif'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fn_nilai_tarif' => $post['fn_nilai_tarif'],
            'fb_aktif' => '1',
        ];
        $this->db->insert('t_tarif', $params);
        return $this->db->insert_id();
    }

    function add_tarif_layanan($params)
    {
        $this->db->insert_batch('t_tarif_layanan', $params);
    }

    public function update_no()
    {
        $this->db->set('fn_no', 'fn_no+1', FALSE);
        $this->db->where('fs_trs', 'TM');
        $this->db->update('t_no');
    }

    public function update_tarif($post)
    {
        $params = [
            'fs_nm_tarif' => $post['fs_nm_tarif'],
            'fs_id_rekapcetak' => $post['fs_id_rekapcetak'],
            'fn_nilai_tarif' => $post['fn_nilai_tarif'],
        ];
        $this->db->where('fs_kd_tarif', $post['fs_kd_tarif']);
        $this->db->update('t_tarif', $params);
    }
    public function del($id)
    {
        $this->db->set('fb_aktif', 0);
        $this->db->where('fs_id_tarif', $id);
        $this->db->update('t_tarif');
    }
}
