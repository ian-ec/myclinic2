<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('distributor_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->distributor_m->get();
		$this->template->load('template', 'master_data_farmasi/distributor/distributor_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$distributor = new stdClass();
		$distributor->fs_id_distributor = null;
		$distributor->fs_kd_distributor = null;
		$distributor->fs_nm_distributor = null;
		$distributor->fs_telp_distributor = null;
		$distributor->fs_alamat_distributor = null;
		$distributor->fs_deskripsi_distributor = null;
		$data = array(
			'page' => 'add',
			'row' => $distributor,
			'no_distributor' => $this->distributor_m->no_distributor(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/distributor/distributor_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->distributor_m->get($id);
		if ($query->num_rows() > 0) {
			$distributor = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $distributor,
				'no_distributor' => $this->distributor_m->no_distributor(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/distributor/distributor_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('distributor') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->distributor_m->add($post);
			$this->distributor_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->distributor_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('distributor');
	}

	public function del($id)
	{
		$this->distributor_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('distributor');
	}
}
