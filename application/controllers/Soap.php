<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soap extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('soap_m');
        $this->load->model('parameter_m');
        $this->load->model('registrasi_m');
    }

    public function index()
    {
        $queryparam = $this->parameter_m->get();
        $data = array(
            'no_soap' => $this->soap_m->no_soap(),
            'registrasi' => $this->registrasi_m->get()->result(),
            'parameter' => $queryparam->row()
        );
        $this->template->load('template', 'billing/soap/soap_form', $data);
    }

    public function add()
    {
        $queryparam = $this->parameter_m->get();
        $soap = new stdClass();
        $soap->fs_id_soap = null;
        $soap->fs_kd_soap = null;
        $soap->fs_nm_soap = null;
        $data = array(
            'page' => 'add',
            'row' => $soap,
            'no_soap' => $this->soap_m->no_soap(),
            'parameter' => $queryparam->row()
        );
        $this->template->load('template', 'master_data_farmasi/soap/soap_form', $data);
    }

    public function edit($id)
    {
        $queryparam = $this->parameter_m->get();
        $query = $this->soap_m->get($id);
        if ($query->num_rows() > 0) {
            $soap = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $soap,
                'no_soap' => $this->soap_m->no_soap(),
                'parameter' => $queryparam->row()
            );
            $this->template->load('template', 'master_data_farmasi/soap/soap_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('soap') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->soap_m->add($post);
            $this->soap_m->update_no();

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit'])) {
            $this->soap_m->edit($post);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function del($id)
    {
        $this->soap_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('danger', 'Data berhasil dihapus');
        }
        redirect('soap');
    }

    public function detail($id)
    {
        $soap_detail = $this->soap_m->get_soap_detail($id)->result();
        echo json_encode($soap_detail);
    }

    public function cetak_pdf($id)
    {
        $data = array(
            'soap' => $this->soap_m->get($id)->row(),
            'parameter' => $this->parameter_m->get()->row()
        );
        $html = $this->load->view('billing/soap/soap_cetak_pdf', $data, true);
        $this->fungsi->PdfGenerator($html, 'CET', 'A4', 'potrait');
    }

    public function aaa($id)
    {
        $aaa = $this->soap_m->get($id)->result();
        echo json_encode($aaa);
    }
}
