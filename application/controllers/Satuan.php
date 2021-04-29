<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('satuan_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->satuan_m->get();
		$this->template->load('template', 'master_data_farmasi/satuan/satuan_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$satuan = new stdClass();
		$satuan->fs_id_satuan = null;
		$satuan->fs_kd_satuan = null;
		$satuan->fs_nm_satuan = null;
		$data = array(
			'page' => 'add',
			'row' => $satuan,
			'no_satuan' => $this->satuan_m->no_satuan(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/satuan/satuan_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->satuan_m->get($id);
		if ($query->num_rows() > 0) {
			$satuan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $satuan,
				'no_satuan' => $this->satuan_m->no_satuan(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/satuan/satuan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('satuan') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->satuan_m->add($post);
			$this->satuan_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->satuan_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('satuan');
	}

	public function del($id)
	{
		$this->satuan_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('satuan');
	}
}
