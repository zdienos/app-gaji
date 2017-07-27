<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
   	$this->load->model('m_login','',TRUE);
 	}

	public function index()
	{
		$id_user = $this->session->userdata('ses_user_id');
		if ($id_user == TRUE) {
			redirect('Home');
		}
		else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$btn_login = $this->input->post('btn_login');
			$pesan["error"] = "";
			if ($btn_login)
			{
				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_message('required','%s Tidak Boleh Kosong');

				if ($this->form_validation->run() == TRUE)
				{
					$cek = $this->m_login->cekLogin($username,$password);
					//echo print_r($cek);
					//exit;
					if ($cek == TRUE)
					{
						redirect('Home');
					}
					else
					{
						$pesan["error"] = "Username / Password Anda Salah";
					}
				}
			}
			$this->load->view('v_index', $pesan);
		}
	}

	public function logout()
	{
		/* set destroy all session data */
		$this->session->sess_destroy();
		redirect('Login');
	}

}
