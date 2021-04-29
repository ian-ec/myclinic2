<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('bank_m');
        $this->load->model('parameter_m');
    }

    public function index()
    {
        $queryparam = $this->parameter_m->get();
        $data['parameter'] = $queryparam->row();
        $data['row'] = $this->bank_m->get();
        $this->template->load('template', 'master_data_billing/bank/bank_data', $data);
    }

    public function add()
    {
        $queryparam = $this->parameter_m->get();
        $bank = new stdClass();
        $bank->fs_id_bank = null;
        $bank->fs_kd_bank = null;
        $bank->fs_nm_bank = null;
        $bank->fs_kd_jenis_kartu = null;
        $bank->fb_aktif = null;
        $data = array(
            'page' => 'add',
            'row' => $bank,
            'no_bank' => $this->bank_m->no_bank(),
            'parameter' => $queryparam->row()
        );
        $this->template->load('template', 'master_data_billing/bank/bank_form', $data);
    }

    public function edit($id)
    {
        $queryparam = $this->parameter_m->get();
        $query = $this->bank_m->get($id);
        if ($query->num_rows() > 0) {
            $bank = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $bank,
                'no_bank' => $this->bank_m->no_bank(),
                'parameter' => $queryparam->row()
            );
            $this->template->load('template', 'master_data_billing/bank/bank_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('bank') . "'</script>";
        }
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->bank_m->add($data);
            $this->bank_m->update_no();
        } else if (isset($_POST['edit'])) {
            $this->bank_m->edit($data);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('bank');
    }

    public function del($id)
    {
        $this->bank_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('bank');
    }
}
