<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etiket extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('etiket_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->etiket_m->get();
		$this->template->load('template', 'master_data_farmasi/etiket/etiket_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$etiket = new stdClass();
		$etiket->fs_id_etiket = null;
		$etiket->fs_kd_etiket = null;
		$etiket->fs_nm_etiket = null;
		$data = array(
			'page' => 'add',
			'row' => $etiket,
			'no_etiket' => $this->etiket_m->no_etiket(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/etiket/etiket_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->etiket_m->get($id);
		if ($query->num_rows() > 0) {
			$etiket = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $etiket,
				'no_etiket' => $this->etiket_m->no_etiket(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/etiket/etiket_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('etiket') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->etiket_m->add($post);
			$this->etiket_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->etiket_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('etiket');
	}

	public function del($id)
	{
		$this->etiket_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('etiket');
	}
}
