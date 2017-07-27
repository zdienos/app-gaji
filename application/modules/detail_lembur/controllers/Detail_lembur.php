<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_lembur extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
 	{
 		parent::__construct();
 		if ($this->session->userdata('ses_user_id') != TRUE) {
       redirect('Login');
     }
		 $this->load->model('m_detail_lembur', '', TRUE);
 	}

	public function index()
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		$data['shows'] = $this->m_detail_lembur->show_data();
		$data['plugtop'] = 'plugin/plugtop';
		$data['plugbot'] = 'plugin/plugbot';
		$data['content'] = 'v_index';
		$this->load->view('adminLTE/index', $data);
	}

	public function add()
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		/* setting input */
		$kode_lembur = strtoupper($this->input->post('kode_lembur'));
		$keterangan_lembur = $this->input->post('keterangan_lembur');
		$btn_add = $this->input->post('btn_add');
		$data['error'] = '';
		if ($btn_add) {
			$this->form_validation->set_rules('kode_lembur','Kode Lembur','required');
			$this->form_validation->set_rules('keterangan_lembur','Keterangan Lembur','required');
			$this->form_validation->set_message('required','%s Tidak Boleh Kosong');
			if ($this->form_validation->run() == TRUE) {
				$simpan = $this->m_detail_lembur->add_data($kode_lembur,$keterangan_lembur);
				if ($simpan) {
					$this->session->set_flashdata('message', 'Data Telah Berhasil Ditambah');
					redirect('Detail_lembur');
				}
				else {
					$data['error'] = "Data Sudah Pernah Tersimpan";
				}
			}
		}
		$data['plugtop'] = 'plugin/plugtop';
		$data['plugbot'] = 'plugin/plugbot';
		$data['content'] = 'v_add';
		$this->load->view('adminLTE/index', $data);
	}

	public function detail()
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		$id = $this->uri->segment(3);
		/* setting input */
		$kode_lembur = strtoupper($this->input->post('kode_lembur'));
		$keterangan_lembur = $this->input->post('keterangan_lembur');
		/* button submit */
		$btn_edit = $this->input->post('btn_edit');
		/* setting error NULL */
		$data['error'] = "";
		/* setting action NULL */
		$data['act'] = "0";
		if ($btn_edit) {
				/* setting action value */
				$data['act'] = "1";
				/* set validation in form */
				$this->form_validation->set_rules('kode_lembur','Kode Lembur','required');
				$this->form_validation->set_rules('keterangan_lembur','Keterangan Lembur','required');
				/* set message validation */
				$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
				/* set if validation true */
				if ($this->form_validation->run() == TRUE) {
						/* set update database */
						$simpan = $this->m_detail_lembur->edit_data($id, $kode_lembur, $keterangan_lembur);
						if ($simpan) {
								$this->session->set_flashdata('message', 'Data Berhasil Di Ubah.');
								redirect('Detail_lembur');
						} else {
								$data['error'] = "Data Sudah Pernah Tersimpan";
						}
				}
		}
		/* set if url false */
		$cek = $this->m_detail_lembur->cek_detail($id);
		if ($cek != 1) {
				redirect('Detail_lembur');
		}
		/* get data user berdasarkan id */
		$data['detail'] = $this->m_detail_lembur->detail_data($id);
		$data['plugtop'] = 'plugin/plugtop';
		$data['plugbot'] = 'plugin/plugbot';
		$data['content'] = 'v_edit';
		$this->load->view('adminLTE/index', $data);
	}

	public function delete($id)
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		$sukses = $this->m_detail_lembur->delete_data($id);
		if ($sukses == 1) {
				$this->session->set_flashdata('message', 'Data Telah Berhasil Di Hapus.');
				redirect('Detail_lembur');
		} else {
				redirect('Detail_lembur');
		}
	}
}
