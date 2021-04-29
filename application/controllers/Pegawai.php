<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('pegawai_m');
		$this->load->model('satgas_m');
		$this->load->model('kelamin_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->pegawai_m->get();
		$this->template->load('template', 'master_data_billing/pegawai/pegawai_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$pegawai = new stdClass();
		$pegawai->fs_id_pegawai = null;
		$pegawai->fs_kd_pegawai = null;
		$pegawai->fs_nm_pegawai = null;
		$pegawai->fs_kd_kelamin = null;
		$pegawai->fd_tgl_lahir = null;
		$pegawai->fs_alamat = null;
		$pegawai->fs_telp = null;
		$pegawai->fs_id_satgas = null;
		$data = array(
			'page' => 'add',
			'row' => $pegawai,
			'no_pegawai' => $this->pegawai_m->no_pegawai(),
			'kelamin' => $this->kelamin_m->get(),
			'satgas' => $this->satgas_m->get(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/pegawai/pegawai_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->pegawai_m->get($id);
		if ($query->num_rows() > 0) {
			$pegawai = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $pegawai,
				'no_pegawai' => $this->pegawai_m->no_pegawai(),
				'kelamin' => $this->kelamin_m->get(),
				'satgas' => $this->satgas_m->get(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/pegawai/pegawai_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('pegawai') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->pegawai_m->add($post);
			$this->pegawai_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->pegawai_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('pegawai');
	}

	public function del($id)
	{
		$this->pegawai_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('pegawai');
	}
}
