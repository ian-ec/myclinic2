<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rm extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('rm_m');
		$this->load->model('parameter_m');
		$this->load->model('agama_m');
		$this->load->model('kelamin_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->rm_m->get();
		$this->template->load('template', 'master_data_billing/rm/rm_data', $data);
	}


	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$rm = new stdClass();
		$rm->fs_id_rm = null;
		$rm->fs_kd_rm = null;
		$rm->fs_nm_pasien = null;
		$rm->fs_kd_kelamin = null;
		$rm->fs_tmpt_lahir = null;
		$rm->fd_tgl_lahir = null;
		$rm->fs_alamat = null;
		$rm->fs_telp = null;
		$rm->fs_identitas = null;
		$rm->fs_kd_agama = null;
		$rm->fd_tgl_rm = null;
		$data = array(
			'page' => 'add',
			'row' => $rm,
			'agama' => $this->agama_m->get(),
			'kelamin' => $this->kelamin_m->get(),
			'no_rm' => $this->rm_m->no_rm(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/rm/rm_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->rm_m->get($id);
		if ($query->num_rows() > 0) {
			$rm = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $rm,
				'agama' => $this->agama_m->get(),
				'kelamin' => $this->kelamin_m->get(),
				'no_rm' => $this->rm_m->no_rm(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/rm/rm_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('rm') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->rm_m->add($post);
			$this->rm_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->rm_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('rm');
	}

	public function del($id)
	{
		$this->rm_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('rm');
	}
}
