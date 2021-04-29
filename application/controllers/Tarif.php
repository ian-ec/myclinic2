<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('parameter_m');
		$this->load->model('tarif_m');
		$this->load->model('rekapcetak_m');
		$this->load->model('layanan_m');
		$this->load->model('komponen_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->tarif_m->get();
		$data['detail'] = $this->tarif_m->get_detail();
		$this->template->load('template', 'master_data_billing/tarif/tarif_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();

		$data = array(
			'page' => 'add',
			'no_tarif' => $this->tarif_m->no_tarif(),
			'rekapcetak' => $this->rekapcetak_m->get(),
			'layanan' => $this->layanan_m->get()->result(),
			// 'komponen' => $this->komponen_m->get()->result(),
			// 'cart' => $this->tarif_m->get_cart(),
			'cart_layanan' => $this->tarif_m->get_cart_layanan(),
			// 'nilai' => $this->tarif_m->sum_cart()->row(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_billing/tarif/tarif_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->tarif_m->get($id);
		if ($query->num_rows() > 0) {
			$tarif = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $tarif,
				'no_tarif' => $this->tarif_m->no_tarif(),
				'rekapcetak' => $this->rekapcetak_m->get(),
				'layanan' => $this->layanan_m->get()->result(),
				// 'komponen' => $this->komponen_m->get()->result(),
				// 'cart' => $this->tarif_m->tarif_komponen($id),
				'cart_layanan' => $this->tarif_m->tarif_layanan($id),
				// 'nilai' => $this->tarif_m->sum_nilai_tarif($id)->row(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_billing/tarif/tarif_form_edit', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('tarif') . "'</script>";
		}
	}


	public function process()
	{
		$data = $this->input->post(null, TRUE);

		if (isset($_POST['add_cart_layanan'])) {
			$this->tarif_m->add_cart_layanan($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['edit_cart_layanan'])) {
			$fs_id_tarif = $this->input->post('fs_id_tarif');
			$this->tarif_m->edit_cart_layanan($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "fs_id_tarif" => $fs_id_tarif);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['del_cart_layanan'])) {
			$this->tarif_m->del_cart_layanan($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['del_layanan'])) {
			$this->tarif_m->del_layanan($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['simpan_tarif'])) {
			$fs_id_tarif = $this->tarif_m->add($data);

			$cart_layanan = $this->tarif_m->get_cart_layanan()->result();
			$row_layanan = [];
			foreach ($cart_layanan as $c => $value_layanan) {
				array_push($row_layanan, array(
					'fs_id_tarif' => $fs_id_tarif,
					'fs_id_layanan' => $value_layanan->fs_id_layanan,
				));
			}
			$this->tarif_m->add_tarif_layanan($row_layanan);
			$this->tarif_m->del_cart_layanan();

			// $this->tarif_m->add_tarif_nilai_total($data);
			$this->tarif_m->update_no();


			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['simpan_edit_tarif'])) {
			$this->tarif_m->update_tarif($data);
			// $this->tarif_m->update_tarif_nilai_total($data);

			if ($this->db->affected_rows() >= 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	// function cart_data()
	// {
	// 	$cart = $this->tarif_m->get_cart();
	// 	$nilai = $this->tarif_m->sum_cart()->row();
	// 	$data['cart'] = $cart;
	// 	$data['nilai'] = $nilai;
	// 	$this->load->view('master_data_billing/tarif/tarif_cart', $data);
	// }

	// function detail($id)
	// {
	// 	$data = array(
	// 		'parameter' => $this->parameter_m->get()->row(),
	// 		'tarif' => $this->tarif_m->get($id)->row(),
	// 		'komponen' => $this->tarif_m->tarif_komponen($id)->result(),
	// 		'layanan' => $this->tarif_m->tarif_layanan($id)->result(),
	// 	);
	// 	$this->template->load('template', 'master_data_billing/tarif/tarif_detail', $data);
	// }

	function cart_data_layanan()
	{
		$cart_layanan = $this->tarif_m->get_cart_layanan();
		$data['cart_layanan'] = $cart_layanan;
		$this->load->view('master_data_billing/tarif/tarif_cart_layanan', $data);
	}

	function layanan_tarif($id)
	{
		$cart_layanan = $this->tarif_m->tarif_layanan($id);
		$data['cart_layanan'] = $cart_layanan;
		$this->load->view('master_data_billing/tarif/tarif_layanan', $data);
	}

	public function detail_layanan($id)
	{
		$layanan_detail = $this->tarif_m->tarif_layanan($id)->result();
		echo json_encode($layanan_detail);
	}
}
