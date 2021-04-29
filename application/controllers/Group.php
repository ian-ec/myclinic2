<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('group_m');
		$this->load->model('parameter_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->group_m->get();
		$this->template->load('template', 'master_data_farmasi/group/group_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$group = new stdClass();
		$group->fs_id_group = null;
		$group->fs_kd_group = null;
		$group->fs_nm_group = null;
		$data = array(
			'page' => 'add',
			'row' => $group,
			'no_group' => $this->group_m->no_group(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/group/group_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->group_m->get($id);
		if ($query->num_rows() > 0) {
			$group = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $group,
				'no_group' => $this->group_m->no_group(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/group/group_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('group') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->group_m->add($post);
			$this->group_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->group_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('group');
	}

	public function del($id)
	{
		$this->group_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('group');
	}
}
