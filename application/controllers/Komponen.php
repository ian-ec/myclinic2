<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komponen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('komponen_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->komponen_m->get();
		$this->template->load('template', 'master_data_billing/komponen/komponen_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$komponen = new stdClass();
		$komponen->fs_id_komponen = null;
		$komponen->fs_kd_komponen = null;
		$komponen->fs_nm_komponen = null;
		$komponen->fb_medis = null;
		$data = array(
			'page' => 'add',
			'row' => $komponen,
			'no_komponen' => $this->komponen_m->no_komponen(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/komponen/komponen_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->komponen_m->get($id);
		if ($query->num_rows() > 0) {
			$komponen = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $komponen,
				'no_komponen' => $this->komponen_m->no_komponen(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/komponen/komponen_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('komponen') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->komponen_m->add($post);
			$this->komponen_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->komponen_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('komponen');
	}

	public function del($id)
	{
		$this->komponen_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('komponen');
	}
}
