<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Report_lembur extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('ses_user_id') != TRUE) {
            redirect('login');
        }
        $this->load->model('m_report_lembur', '', TRUE);
    }

    public function index()
    {
        $data['plugtop'] = 'plugin/plugtop';
        $data['plugbot'] = 'plugin/plugbot';
        $data['content'] = 'v_index';
        $this->load->view('adminLTE/index', $data);
    }

    public function report_keseluruhan()
    {
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['no'] = 1;
        $data['querys'] = $this->m_report_lembur->report_keseluruhan($data['bulan'],$data['tahun']);
        $this->load->view('v_report_keseluruhan', $data);
    }

    public function report_perorangan()
    {
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['nik'] = $this->input->post('nik');
        $data['no'] = 1;
        $data['karyawan'] = $this->m_report_lembur->ambil_karyawan($data['nik']);
        $data['querys'] = $this->m_report_lembur->report_perorangan($data['bulan'],$data['tahun'],$data['nik']);
        $this->load->view('v_report_perorangan', $data);
    }

    public function report_departemen()
    {
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['departemen'] = $this->input->post('departemen');
        $data['no'] = 1;
        $data['querys'] = $this->m_report_lembur->report_departemen($data['bulan'],$data['tahun'],$data['departemen']);
        $this->load->view('v_report_departemen', $data);
    }

    public function report_grade()
    {
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['grade'] = $this->input->post('grade');
        $data['no'] = 1;
        $data['querys'] = $this->m_report_lembur->report_grade($data['bulan'],$data['tahun'],$data['grade']);
        $this->load->view('v_report_grade', $data);
    }
}
