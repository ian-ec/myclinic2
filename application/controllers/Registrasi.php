<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('parameter_m');
		$this->load->model('registrasi_m');
		$this->load->model('rm_m');
		$this->load->model('layanan_m');
		$this->load->model('jaminan_m');
		$this->load->model('karcis_m');
		$this->load->model('billing_m');
		$this->load->model('pegawai_m');
		$this->load->model('bank_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$registrasi = new stdClass();
		$registrasi->fd_tgl_registrasi = date('Y-m-d');
		$registrasi->fs_id_registrasi = null;
		$registrasi->fs_kd_registrasi = null;
		$registrasi->fs_nm_pasien = null;
		$registrasi->fs_nm_kelamin = null;
		$registrasi->fs_kd_rm = null;
		$registrasi->fs_id_rm = null;
		$registrasi->fs_id_layanan = null;
		$registrasi->fs_nm_layanan = null;
		$registrasi->fs_id_pegawai = null;
		$registrasi->fs_nm_pegawai = null;
		$registrasi->fs_id_jaminan = null;
		$registrasi->fs_nm_jaminan = null;
		$registrasi->fn_no_polis = null;
		$registrasi->fs_id_karcis = null;
		$registrasi->fs_nm_karcis = null;
		$registrasi->fn_nilai = null;
		$data = array(
			'page' => 'add',
			'row' => $registrasi,
			'reg' => $this->registrasi_m->get(),
			'debit' => $this->bank_m->get_debit()->result(),
			'credit' => $this->bank_m->get_credit()->result(),
			'no_registrasi' => $this->registrasi_m->no_registrasi(),
			'rm' => $this->rm_m->get_reg(),
			'layanan' => $this->layanan_m->get(),
			'jaminan' => $this->jaminan_m->get(),
			'karcis' => $this->karcis_m->get(),
			'pegawai' => $this->pegawai_m->get_dokter(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'billing/registrasi/registrasi_form', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$registrasi = new stdClass();
		$registrasi->fd_tgl_registrasi = date('Y-m-d');
		$registrasi->fs_id_registrasi = null;
		$registrasi->fs_kd_registrasi = null;
		$registrasi->fs_nm_pasien = null;
		$registrasi->fs_nm_kelamin = null;
		$registrasi->fs_kd_rm = null;
		$registrasi->fs_id_rm = null;
		$registrasi->fs_id_layanan = null;
		$registrasi->fs_nm_layanan = null;
		$registrasi->fs_id_pegawai = null;
		$registrasi->fs_nm_pegawai = null;
		$registrasi->fs_id_jaminan = null;
		$registrasi->fs_nm_jaminan = null;
		$registrasi->fn_no_polis = null;
		$registrasi->fs_id_karcis = null;
		$registrasi->fs_nm_karcis = null;
		$registrasi->fn_nilai = null;
		$data = array(
			'page' => 'add',
			'row' => $registrasi,
			'reg' => $this->registrasi_m->get(),
			'debit' => $this->bank_m->get_debit()->result(),
			'credit' => $this->bank_m->get_credit()->result(),
			'no_registrasi' => $this->registrasi_m->no_registrasi(),
			'rm' => $this->rm_m->get_reg(),
			'layanan' => $this->layanan_m->get(),
			'jaminan' => $this->jaminan_m->get(),
			'karcis' => $this->karcis_m->get(),
			'pegawai' => $this->pegawai_m->get_dokter(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'billing/registrasi/registrasi_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->registrasi_m->get($id);
		if ($query->num_rows() > 0) {
			$registrasi = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $registrasi,
				'reg' => $this->registrasi_m->get(),
				'no_registrasi' => $this->registrasi_m->no_registrasi(),
				'rm' => $this->rm_m->get_reg(),
				'layanan' => $this->layanan_m->get(),
				'pegawai' => $this->pegawai_m->get_dokter(),
				'jaminan' => $this->jaminan_m->get(),
				'karcis' => $this->karcis_m->get(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'billing/registrasi/registrasi_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('registrasi') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['add'])) {
			$registrasi_id = $this->registrasi_m->add($post);
			$this->registrasi_m->update_no();
			$this->registrasi_m->aktif_reg($post);
			$kode_registrasi = $this->registrasi_m->no_registrasi2();
			$this->billing_m->add_registrasi($post, $registrasi_id, $kode_registrasi);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "registrasi_id" => $registrasi_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if (isset($_POST['edit'])) {
			$this->billing_m->edit_registrasi($post);
			$this->registrasi_m->edit($post);
			$registrasi_id = $post['fs_id_registrasi'];
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true, "registrasi_id" => $registrasi_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	public function del($kode, $rm, $id)
	{
		$this->registrasi_m->cek_transaksi($id)->result();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('info', 'Sudah ada transaksi pada registrasi ini, void dibatalkan');
			redirect('registrasi/add');
		} else {
			$this->registrasi_m->del($kode);
			$this->registrasi_m->non_aktif_reg($rm);
			$this->billing_m->del_registrasi($kode);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('danger', 'Data berhasil dihapus');
			}
			redirect('registrasi/add');
		}
	}


	public function cetak($id)
	{
		$data = array(
			'registrasi' => $this->registrasi_m->get($id)->row(),
			'parameter' => $this->parameter_m->get()->row()
		);
		$this->load->view('billing/registrasi/registrasi_cetak', $data);
	}

	public function cetak_pdf($id)
	{
		$data = array(
			'registrasi' => $this->registrasi_m->get($id)->row(),
			'parameter' => $this->parameter_m->get()->row()
		);
		$html = $this->load->view('billing/registrasi/registrasi_cetak_pdf', $data, true);
		$this->fungsi->PdfGenerator($html, 'CET', 'A4', 'potrait');
	}

	function cek($id)
	{
		$cek = $this->registrasi_m->cek_transaksi($id)->result();
		echo json_encode($cek);
	}
}
