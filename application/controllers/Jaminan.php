<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaminan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('jaminan_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->jaminan_m->get();
		$this->template->load('template', 'master_data_billing/jaminan/jaminan_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$jaminan = new stdClass();
		$jaminan->fs_id_jaminan = null;
		$jaminan->fs_kd_jaminan = null;
		$jaminan->fs_nm_jaminan = null;
		$jaminan->fs_alamat = null;
		$jaminan->fs_telp = null;
		$data = array(
			'page' => 'add',
			'row' => $jaminan,
			'no_jaminan' => $this->jaminan_m->no_jaminan(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/jaminan/jaminan_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->jaminan_m->get($id);
		if ($query->num_rows() > 0) {
			$jaminan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $jaminan,
				'no_jaminan' => $this->jaminan_m->no_jaminan(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/jaminan/jaminan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('jaminan') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->jaminan_m->add($post);
			$this->jaminan_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->jaminan_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('jaminan');
	}

	public function del($id)
	{
		$this->jaminan_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('jaminan');
	}
}
