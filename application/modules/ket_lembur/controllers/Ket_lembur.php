<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ket_lembur extends CI_Controller {

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
		 $this->load->model('m_ket_lembur', '', TRUE);
	}

	public function index()
	{
		/* membuat input pencarian */
		$cari_jenis_lembur = $this->input->post('cari_jenis_lembur');
		/* query untuk mengambil nilai yg ada di tabel */
		$query = $this->db->query("SELECT * FROM ket_lembur ORDER BY id_ket_lembur DESC");
		/* mengisi nilai varibel untuk row pagination */
		$n = $query->num_rows(count($query));
		/* pengaturan pagination */
		$config["base_url"] = base_url() . 'Ket_lembur/index';
		$config["per_page"] = 10;
		$config["total_rows"] = $n;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href=''>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		/* mengaktifkan pagination */
		$this->pagination->initialize($config);
		/* memanggil pagination di view */
		$data['halaman'] = $this->pagination->create_links();
		/* atur jika pagination tidak Kosong */
		if ($data['halaman'] == TRUE) {
				$id = $this->uri->segment(3);
		}
		else {
				$id = '';
		}
		/* jika pencarian kosong */
		if (!empty($cari_jenis_lembur)) {
				/* atur jumlah data yg tampil saat pencarian */
				$config["per_page"] = '';
				/* pengaturan database untuk memanggil data */
				$data["tampil"] = $this->m_ket_lembur->show_data($config['per_page'], $id);
		}
		else {
				/* pengaturan database untuk memanggil data */
				$data["tampil"] = $this->m_ket_lembur->show_data($config['per_page'], $id);
		}
		/* jika validasi pencarian tidak error */
		if ($this->form_validation->run() == TRUE) {
		}
		/* nomer list data di view */
		$data["no"] = $id;
		$data["detail_lembur"] = $this->m_ket_lembur->get_master_detail_lembur();
		$data['plugtop'] = 'plugin/plugtop';
		$data['plugbot'] = 'plugin/plugbot';
		$data['content'] = 'v_index';
		$this->load->view('adminLTE/index', $data);
	}

	public function add()
	{
		/* membuat input data */
		$jenis_lembur = $this->input->post('jenis_lembur');
		$jam_lembur = $this->input->post('jam_lembur');
		$upah_lembur = $this->input->post('upah_lembur');
		/* tombol submit */
		$btn_add = $this->input->post('btn_add');
		/* nilai error NULL */
		$data['error'] = "";
		/* jika tombol submit di clik */
		if ($btn_add) {
				/* set validation in form */
				$this->form_validation->set_rules('jenis_lembur', 'Jenis Lembur', 'required');
				$this->form_validation->set_rules('jam_lembur', 'Jam Lembur', 'required');
				$this->form_validation->set_rules('upah_lembur', 'Upah Lembur', 'required');
				/* set message validation */
				$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
				/* set if validation true */
				if ($this->form_validation->run() == TRUE) {
						/* set input database */
						$simpan = $this->m_ket_lembur->add_data($jenis_lembur, $jam_lembur, $upah_lembur);
						if ($simpan) {
								$this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan.');
								redirect('Ket_lembur');
						}
						else {
								$data['error'] = "Data Sudah Pernah Tersimpan";
						}
				}
		}
		/* ambil data master gudang radiologi */
		$data["detail_lembur"] = $this->m_ket_lembur->get_master_detail_lembur();
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
		$jenis_lembur = $this->input->post('jenis_lembur');
		$jam_lembur = $this->input->post('jam_lembur');
		$upah_lembur = $this->input->post('upah_lembur');
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
				$this->form_validation->set_rules('jenis_lembur', 'Jenis Lembur', 'required');
				$this->form_validation->set_rules('jam_lembur', 'Jam Lembur', 'required');
				$this->form_validation->set_rules('upah_lembur', 'Upah Lembur', 'required');
				/* set message validation */
				$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
				/* set if validation true */
				if ($this->form_validation->run() == TRUE) {
						/* set update database */
						$simpan = $this->m_ket_lembur->edit_data($id,$jenis_lembur, $jam_lembur, $upah_lembur);
						if ($simpan) {
								$this->session->set_flashdata('message', 'Data Berhasil Di Ubah.');
								redirect('Ket_lembur');
						} else {
								$data['error'] = "Data Sudah Pernah Tersimpan";
						}
				}
		}
		/* set if url false */
		$cek = $this->m_ket_lembur->cek_detail($id);
		if ($cek != 1) {
				redirect('Ket_lembur');
		}
		/* get data user berdasarkan id */
		$data['detail'] = $this->m_ket_lembur->detail_data($id);
		$data["detail_lembur"] = $this->m_ket_lembur->get_master_detail_lembur();
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
		$sukses = $this->m_ket_lembur->delete_data($id);
		if ($sukses == 1) {
				$this->session->set_flashdata('message', 'Data Telah Berhasil Di Hapus.');
				redirect('Ket_lembur');
		} else {
				redirect('Ket_lembur');
		}
	}

}
