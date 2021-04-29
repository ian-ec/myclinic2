<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('golongan_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->golongan_m->get();
		$this->template->load('template', 'master_data_farmasi/golongan/golongan_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$golongan = new stdClass();
		$golongan->fs_id_golongan = null;
		$golongan->fs_kd_golongan = null;
		$golongan->fs_nm_golongan = null;
		$data = array(
			'page' => 'add',
			'row' => $golongan,
			'no_golongan' => $this->golongan_m->no_golongan(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/golongan/golongan_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->golongan_m->get($id);
		if ($query->num_rows() > 0) {
			$golongan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $golongan,
				'no_golongan' => $this->golongan_m->no_golongan(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/golongan/golongan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('golongan') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->golongan_m->add($post);
			$this->golongan_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->golongan_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('golongan');
	}

	public function del($id)
	{
		$this->golongan_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('golongan');
	}
}
