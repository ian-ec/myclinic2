<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
		$this->load->model('parameter_m');
		$this->load->library('form_validation');
	}

	public function info($id)
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$query = $this->user_m->get($id);
		if ($query->num_rows() > 0) {
			$data['row'] = $query->row();
			$segment = $this->uri->segment(3);
			$userid = $this->fungsi->user_login()->user_id;
			$this->template->load('template', 'user/profil', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('dashboard') . "'</script>";
		}
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Password Confirm', 'matches[password]', array('matches' => '%s	 tidak sesuai dengan passwod'));
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Confirm', 'matches[password]', array('matches' => '%s	 tidak sesuai dengan passwod'));
		}
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan di isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah ada di database');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='" . site_url('user') . "'</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
			}
			redirect('profile/info/' . $id);
		}
	}
}
