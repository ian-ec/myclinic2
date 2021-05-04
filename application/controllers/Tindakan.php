<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('parameter_m');
		$this->load->model('tindakan_m');
		$this->load->model('rm_m');
		$this->load->model('registrasi_m');
		$this->load->model('tarif_m');
		$this->load->model('pegawai_m');
		$this->load->model('layanan_m');
		$this->load->model('billing_m');
	}

	public function index()
	{
		$data = array(
			'page' => 'add',
			'registrasi' => $this->registrasi_m->get()->result(),
			'tarif' => $this->tarif_m->get()->result(),
			'no_tindakan' => $this->tindakan_m->no_tindakan(),
			'cart' => $this->tindakan_m->get_cart(),
			'nilai' => $this->tindakan_m->sum_cart()->row(),
			'pegawai' => $this->pegawai_m->get()->result(),
			'layanan' => $this->layanan_m->get()->result(),
			'parameter' => $this->parameter_m->get()->row()
		);
		$this->template->load('template', 'billing/tindakan_umum/tindakan_form', $data);
	}

	// public function add()
	// {
	// 	$data = array(
	// 		'page' => 'add',
	// 		'registrasi' => $this->registrasi_m->get()->result(),
	// 		'tarif' => $this->tarif_m->get()->result(),
	// 		'no_tindakan' => $this->tindakan_m->no_tindakan(),
	// 		'cart' => $this->tindakan_m->get_cart(),
	// 		'nilai' => $this->tindakan_m->sum_cart()->row(),
	// 		'pegawai' => $this->pegawai_m->get()->result(),
	// 		'layanan' => $this->layanan_m->get()->result(),
	// 		'parameter' => $this->parameter_m->get()->row()
	// 	);
	// 	$this->template->load('template', 'billing/tindakan_umum/tindakan_form', $data);
	// }

	public function edit($id)
	{
		$query = $this->db->query("SELECT * FROM t_trs_tindakan_cart WHERE fs_id_tindakan ='$id'");
		if ($query->num_rows() == 0) {
			$cart = $this->tindakan_m->get_tindakan_detail($id)->result();
			$cart_no = $this->tindakan_m->no_cart();
			$row = [];
			foreach ($cart as $c => $value) {
				array_push($row, array(
					'fs_id_tindakan_cart' => $cart_no++,
					'fs_id_tarif' => $value->fs_id_tarif,
					'fs_id_rekapcetak' => 1,
					'fn_qty' => $value->fn_qty,
					'fn_nilai_tarif' => $value->fn_nilai_tarif,
					'fn_diskon' => $value->fn_diskon,
					'fn_total' => $value->fn_total,
					'fs_id_user' => $this->session->userdata('userid'),
					'fs_id_tindakan' => $id,
				));
			}
			$this->tindakan_m->add_cart_edit($row);

			$query = $this->tindakan_m->get($id);
			if ($query->num_rows() > 0) {
				$tindakan = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $tindakan,
					'registrasi' => $this->registrasi_m->get()->result(),
					'tarif' => $this->tarif_m->get()->result(),
					'no_tindakan' => $this->tindakan_m->no_tindakan(),
					'cart' => $this->tindakan_m->get_cart_edit($id),
					'nilai' => $this->tindakan_m->sum_cart()->row(),
					'pegawai' => $this->pegawai_m->get()->result(),
					'layanan' => $this->layanan_m->get()->result(),
					'parameter' => $this->parameter_m->get()->row()
				);
				$this->template->load('template', 'billing/tindakan_umum/tindakan_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='" . site_url('registrasi') . "'</script>";
			}
		} else {
			$query = $this->tindakan_m->get($id);
			if ($query->num_rows() > 0) {
				$tindakan = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $tindakan,
					'registrasi' => $this->registrasi_m->get()->result(),
					'tarif' => $this->tarif_m->get()->result(),
					'no_tindakan' => $this->tindakan_m->no_tindakan(),
					'cart' => $this->tindakan_m->get_cart_edit($id),
					'nilai' => $this->tindakan_m->sum_cart()->row(),
					'pegawai' => $this->pegawai_m->get()->result(),
					'layanan' => $this->layanan_m->get()->result(),
					'parameter' => $this->parameter_m->get()->row()
				);
				$this->template->load('template', 'billing/tindakan_umum/tindakan_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='" . site_url('registrasi') . "'</script>";
			}
		}
	}

	public function process()
	{
		$data = $this->input->post(null, TRUE);

		if (isset($_POST['add_cart'])) {
			$cart_id = $this->tindakan_m->add_cart($data);
			// $komponen = $this->tarif_m->get_detail($data)->result();
			// $row = [];
			// foreach ($komponen as $c => $value) {
			// 	array_push($row, array(
			// 		'fs_id_tindakan_cart' => $cart_id,
			// 		'fs_id_tarif' => $value->id_tarif,
			// 		'fs_id_komponen' => $value->fs_id_komponen,
			// 		'fn_qty' => $this->input->post('fn_qty'),
			// 		'fn_nilai' => $value->nilai_komponen,
			// 		'fs_id_pegawai' => 0,
			// 		'fn_diskon' => 0,
			// 		'fn_subtotal' => $value->nilai_komponen  * $this->input->post('fn_qty'),
			// 	));
			// }
			// $this->tindakan_m->komponen_cart($row);

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['edit_cart'])) {
			$this->tindakan_m->edit_cart($data);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['del_cart'])) {
			$fs_id_tindakan_cart = $this->input->post('fs_id_tindakan_cart');
			$this->tindakan_m->del_cart(['fs_id_tindakan_cart' => $fs_id_tindakan_cart]);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['batal_tindakan'])) {
			$this->tindakan_m->del_cart();
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['simpan_tindakan'])) {
			$this->registrasi_m->update_status($data, 2);
			$no_tindakan = $this->tindakan_m->no_tindakan();
			$this->billing_m->add_tindakan($data, $no_tindakan);
			$tindakan_id = $this->tindakan_m->add_tindakan($data);
			$cart = $this->tindakan_m->get_cart()->result();
			$row = [];
			foreach ($cart as $c => $value) {
				array_push($row, array(
					'fs_id_tindakan' => $tindakan_id,
					'fs_id_tarif' => $value->fs_id_tarif,
					'fn_qty' => $value->fn_qty,
					'fn_diskon' => $value->fn_diskon,
					'fn_nilai_tarif' => $value->fn_nilai_tarif,
					'fn_total' => $value->fn_total,
				));
			}
			$this->tindakan_m->add_tindakan_detail($row);
			$this->tindakan_m->update_no();
			$this->tindakan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "tindakan_id" => $tindakan_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['simpan_editan'])) {
			$id =  $data['fs_id_tindakan'];
			$no_tindakan = $data['fs_kd_trs_tindakan'];
			$this->tindakan_m->hapus($id);
			$this->tindakan_m->hapus_detail($id);
			$this->billing_m->del_tindakan($no_tindakan);
			$this->billing_m->add_tindakan($data, $no_tindakan);
			$tindakan_id = $this->tindakan_m->edit_tindakan($data);
			$cart = $this->tindakan_m->get_cart_edit($id)->result();
			$row = [];
			foreach ($cart as $c => $value) {
				array_push($row, array(
					'fs_id_tindakan' => $tindakan_id,
					'fs_id_tarif' => $value->fs_id_tarif,
					'fn_qty' => $value->fn_qty,
					'fn_diskon' => $value->fn_diskon,
					'fn_nilai_tarif' => $value->fn_nilai_tarif,
					'fn_total' => $value->fn_total,
				));
			}
			$this->tindakan_m->add_tindakan_detail($row);
			$this->tindakan_m->del_cart(['fs_id_user' => $this->session->userdata('userid')]);

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "tindakan_id" => $tindakan_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	function cart_data()
	{
		$cart = $this->tindakan_m->get_cart();
		$nilai = $this->tindakan_m->sum_cart()->row();
		$data['cart'] = $cart;
		$data['nilai'] = $nilai;
		$this->load->view('billing/tindakan_umum/tindakan_cart', $data);
	}

	function cart_data_edit($id)
	{
		$cart = $this->tindakan_m->get_cart_edit($id);
		$data['cart'] = $cart;
		$this->load->view('billing/tindakan_umum/tindakan_cart', $data);
	}

	function komponen_tarif($id)
	{
		$komponen_tarif = $this->tindakan_m->komponen_tarif($id)->result();
		echo json_encode($komponen_tarif);
	}


	public function del($id)
	{
		$this->tindakan_m->del($id);
		$this->billing_m->del_tindakan($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('tindakan');
	}

	public function cetak($id)
	{
		$data = array(
			'tindakan' => $this->tindakan_m->get($id)->row(),
			'tindakan_detail' => $this->tindakan_m->get_tindakan_detail($id),
			'parameter' => $this->parameter_m->get()->row()
		);
		$this->load->view('billing/tindakan_umum/tindakan_cetak', $data);
	}

	public function cetak_pdf($id)
	{
		$data = array(
			'tindakan' => $this->tindakan_m->get($id)->row(),
			'tindakan_detail' => $this->tindakan_m->get_tindakan_detail($id),
			'parameter' => $this->parameter_m->get()->row()
		);
		$html = $this->load->view('billing/tindakan_umum/tindakan_cetak_pdf', $data, true);
		$this->fungsi->PdfGenerator($html, 'CET', 'A4', 'potrait');
	}

	// function aaa($id)
	// {
	// 	$bbb =  $this->tindakan_m->get($id)->row();
	// 	echo json_encode($bbb);
	// }

	function data_tarif($id)
	{
		$data_tarif = $this->tarif_m->get_layanan($id)->result();
		echo json_encode($data_tarif);
	}
}
