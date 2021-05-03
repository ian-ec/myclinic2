<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('parameter_m');
		$this->load->model('registrasi_m');
		$this->load->model('regout_m');
	}


	public function index()
	{

		$data = array(
			'parameter' => $this->parameter_m->get()->row(),
			'layanan' => $this->registrasi_m->reg_layanan()->result(),
			'pendapatan' => $this->regout_m->pendapatan_regout()->result(),
			'penerimaan_kas' => $this->regout_m->penerimaan_kas()->row()
		);
		$this->template->load('template', 'dashboard', $data);
	}
}
