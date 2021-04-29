<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        check_not_login();
        $this->load->model('parameter_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
        $queryparam =$this->parameter_m->get();
        $data['parameter'] = $queryparam->row();
		$this->template->load('template','parameter',$data);
    }

    public function update()
	{
        $queryparam =$this->parameter_m->get();
        $data['parameter'] = $queryparam->row();
		$this->template->load('template','parameter_form',$data);
    }

    public function process()
	{
		$post = $this->input->post(null,TRUE);
		if(isset($_POST['update'])) {
            $this->parameter_m->update($post);
        }
		if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success','Data berhasil disimpan');
        }
		redirect('parameter');  
    }
}