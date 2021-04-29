<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('layanan_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->layanan_m->get();
		$this->template->load('template', 'master_data_billing/layanan/layanan_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$layanan = new stdClass();
		$layanan->fs_id_layanan = null;
		$layanan->fs_kd_layanan = null;
		$layanan->fs_nm_layanan = null;
		$data = array(
			'page' => 'add',
			'row' => $layanan,
			'no_layanan' => $this->layanan_m->no_layanan(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/layanan/layanan_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->layanan_m->get($id);
		if ($query->num_rows() > 0) {
			$layanan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $layanan,
				'no_layanan' => $this->layanan_m->no_layanan(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/layanan/layanan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('layanan') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->layanan_m->add($post);
			$this->layanan_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->layanan_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('layanan');
	}

	public function del($id)
	{
		$this->layanan_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('layanan');
	}
}
