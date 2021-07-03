<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('parameter_m');
		$this->load->model('golongan_m');
		$this->load->model('barang_m');
		$this->load->model('group_m');
		$this->load->model('satuan_m');
		$this->load->model('rekapcetak_m');
		$this->load->model('etiket_m');
	}

	public function index()
	{
		$queryparam = $this->parameter_m->get();
		$data['parameter'] = $queryparam->row();
		$data['row'] = $this->barang_m->get();
		$this->template->load('template', 'master_data_farmasi/barang/barang_data', $data);
	}

	public function add()
	{
		$queryparam = $this->parameter_m->get();
		$barang = new stdClass();
		$barang->fs_id_barang = null;
		$barang->fs_kd_barang = null;
		$barang->fs_kd_barcode = null;
		$barang->fs_nm_barang = null;
		$barang->fs_id_golongan = null;
		$barang->fs_id_group = null;
		$barang->fs_id_satuan = null;
		$barang->fs_id_rekapcetak = null;
		$barang->fs_id_etiket = null;
		$barang->fn_harga_beli = null;
		$barang->fn_hna = null;
		$barang->fn_profit = null;
		$barang->fn_harga_jual = null;
		$barang->fn_stok = null;
		$barang->fn_stok_min = null;
		$barang->fn_stok_max = null;
		$data = array(
			'page' => 'add',
			'row' => $barang,
			'no_barang' => $this->barang_m->no_barang(),
			'golongan' => $this->golongan_m->get(),
			'group' => $this->group_m->get(),
			'satuan' => $this->satuan_m->get(),
			'rekapcetak' => $this->rekapcetak_m->get(),
			'etiket' => $this->etiket_m->get(),
			'parameter' => $queryparam->row()
		);
		$this->template->load('template', 'master_data_farmasi/barang/barang_form', $data);
	}

	public function edit($id)
	{
		$queryparam = $this->parameter_m->get();
		$query = $this->barang_m->get($id);
		if ($query->num_rows() > 0) {
			$barang = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $barang,
				'no_barang' => $this->barang_m->no_barang(),
				'golongan' => $this->golongan_m->get(),
				'group' => $this->group_m->get(),
				'satuan' => $this->satuan_m->get(),
				'rekapcetak' => $this->rekapcetak_m->get(),
				'etiket' => $this->etiket_m->get(),
				'parameter' => $queryparam->row()
			);
			$this->template->load('template', 'master_data_farmasi/barang/barang_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='" . site_url('barang') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->barang_m->add($post);
			$this->barang_m->update_no();
		} else if (isset($_POST['edit'])) {
			$this->barang_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('barang');
	}

	public function del($id)
	{
		$this->barang_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data berhasil dihapus');
		}
		redirect('barang');
	}

	function barcode($id)
	{
		$data = array(
			'row' => $this->barang_m->get($id)->row(),
			'parameter' => $this->parameter_m->get()->row()
		);

		$this->template->load('template', 'master_data_farmasi/barang/barcode', $data);
	}

	function barcode_print($id)
	{
		$data = array(
			'row' => $this->barang_m->get($id)->row(),
			'parameter' => $this->parameter_m->get()->row()
		);
		$this->load->view('master_data_farmasi/barang/barcode_print', $data);
	}
}
