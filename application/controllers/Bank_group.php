<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_group extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('bank_group_m');
        $this->load->model('parameter_m');
    }

    public function index()
    {
        $queryparam = $this->parameter_m->get();
        $data['parameter'] = $queryparam->row();
        $data['row'] = $this->bank_group_m->get();
        $this->template->load('template', 'master_data_billing/bank_group/bank_group_data', $data);
    }

    public function add()
    {
        $queryparam = $this->parameter_m->get();
        $bank_group = new stdClass();
        $bank_group->fs_id_bank_group = null;
        $bank_group->fs_kd_bank_group = null;
        $bank_group->fs_nm_bank_group = null;
        $bank_group->fn_no_rekening = null;
        $bank_group->fb_aktif = null;
        $data = array(
            'page' => 'add',
            'row' => $bank_group,
            'no_bank_group' => $this->bank_group_m->no_bank_group(),
            'parameter' => $queryparam->row()
        );
        $this->template->load('template', 'master_data_billing/bank_group/bank_group_form', $data);
    }

    public function edit($id)
    {
        $queryparam = $this->parameter_m->get();
        $query = $this->bank_group_m->get($id);
        if ($query->num_rows() > 0) {
            $bank_group = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $bank_group,
                'no_bank_group' => $this->bank_group_m->no_bank_group(),
                'parameter' => $queryparam->row()
            );
            $this->template->load('template', 'master_data_billing/bank_group/bank_group_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('bank_group') . "'</script>";
        }
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->bank_group_m->add($data);
            $this->bank_group_m->update_no();
        } else if (isset($_POST['edit'])) {
            $this->bank_group_m->edit($data);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('bank_group');
    }

    public function del($id)
    {
        $this->bank_group_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('bank_group');
    }
}
