<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satgas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('satgas_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->satgas_m->get();
		$this->template->load('template', 'master_data_billing/satuan_tugas/satgas_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$satgas = new stdClass();
		$satgas->fs_id_satgas = null;
		$satgas->fs_kd_satgas = null;
		$satgas->fs_nm_satgas = null;
		$data = array(
			'page' => 'add',
			'row' => $satgas,
			'no_satgas' => $this->satgas_m->no_satgas(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/satuan_tugas/satgas_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->satgas_m->get($id);
		if ($query->num_rows() > 0) {
			$satgas = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $satgas,
				'no_satgas' => $this->satgas_m->no_satgas(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/satuan_tugas/satgas_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('satgas') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->satgas_m->add($post);
			$this->satgas_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->satgas_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('satgas');
	}

	public function del($id)
	{
		$this->satgas_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('satgas');
	}
}
