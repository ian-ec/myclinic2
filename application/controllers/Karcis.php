<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karcis extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('karcis_m');
		$this->load->model('parameter_m');
		$this->load->model('rekapcetak_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->karcis_m->get();
		$this->template->load('template', 'master_data_billing/karcis/karcis_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$karcis = new stdClass();
		$karcis->fs_id_karcis = null;
		$karcis->fs_kd_karcis = null;
		$karcis->fs_nm_karcis = null;
		$karcis->fs_id_rekapcetak = null;
		$karcis->fn_nilai = null;
		$data = array(
			'page' => 'add',
			'row' => $karcis,
			'no_karcis' => $this->karcis_m->no_karcis(),
			'rekapcetak' => $this->rekapcetak_m->get(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/karcis/karcis_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->karcis_m->get($id);
		if ($query->num_rows() > 0) {
			$karcis = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $karcis,
				'no_karcis' => $this->karcis_m->no_karcis(),
				'rekapcetak' => $this->rekapcetak_m->get(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/karcis/karcis_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('karcis') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->karcis_m->add($post);
			$this->karcis_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->karcis_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('karcis');
	}

	public function del($id)
	{
		$this->karcis_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('karcis');
	}
}
