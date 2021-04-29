<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapcetak extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('rekapcetak_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->rekapcetak_m->get();
		$this->template->load('template', 'master_data_billing/rekapcetak/rekapcetak_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$rekapcetak = new stdClass();
		$rekapcetak->fs_id_rekapcetak = null;
		$rekapcetak->fs_kd_rekapcetak = null;
		$rekapcetak->fs_nm_rekapcetak = null;
		$data = array(
			'page' => 'add',
			'row' => $rekapcetak,
			'no_rekapcetak' => $this->rekapcetak_m->no_rekapcetak(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/rekapcetak/rekapcetak_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->rekapcetak_m->get($id);
		if ($query->num_rows() > 0) {
			$rekapcetak = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $rekapcetak,
				'no_rekapcetak' => $this->rekapcetak_m->no_rekapcetak(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/rekapcetak/rekapcetak_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('rekapcetak') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->rekapcetak_m->add($post);
			$this->rekapcetak_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->rekapcetak_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('rekapcetak');
	}

	public function del($id)
	{
		$this->rekapcetak_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('rekapcetak');
	}
}
