<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_lembur extends CI_Controller {

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
		 $this->load->model('m_gaji_lembur', '', TRUE);
	}

	public function index()
	{
		/* membuat input pencarian */
		$cari_nik = $this->input->post('cari_nik');
		$cari_tahun = $this->input->post('cari_tahun');
		$cari_bulan = $this->input->post('cari_bulan');
		$this->form_validation->set_rules('cari_tahun');
		$this->form_validation->set_rules('cari_bulan');
		/* query untuk mengambil nilai yg ada di tabel */
		$query = $this->db->query("SELECT * FROM gaji_lembur ORDER BY id_gaji_lembur DESC");
		/* mengisi nilai varibel untuk row pagination */
		$n = $query->num_rows(count($query));
		/* pengaturan pagination */
		$config["base_url"] = base_url() . 'Gaji_lembur/index';
		$config["per_page"] = 25;
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
		if (!empty($cari_tahun) || !empty($cari_bulan) || !empty($cari_nik)) {
				/* atur jumlah data yg tampil saat pencarian */
				$config["per_page"] = '';
				/* pengaturan database untuk memanggil data */
				$data["tampil"] = $this->m_gaji_lembur->show_data($config['per_page'], $id);
		}
		else {
				/* pengaturan database untuk memanggil data */
				$data["tampil"] = $this->m_gaji_lembur->show_data($config['per_page'], $id);
		}
		/* jika validasi pencarian tidak error */
		if ($this->form_validation->run() == TRUE) {
		}
		/* nomer list data di view */
		$data["no"] = $id;
		$data['plugtop'] = 'plugin/plugtop';
		$data['plugbot'] = 'plugin/plugbot';
		$data['content'] = 'v_index';
		$this->load->view('adminLTE/index', $data);
	}

	public function add()
	{
		/* membuat input data */
		$jabatan = $this->input->post('jabatan');
		$nik = $this->input->post('nik');
		$jenis_lembur = $this->input->post('jenis_lembur');
		$jam_lembur = $this->input->post('jam_lembur');
		$tanggal_lembur = $this->input->post('tanggal_lembur');
		$keterangan = $this->input->post('keterangan');
		/* tombol submit */
		$btn_add = $this->input->post('btn_add');
		/* nilai error NULL */
		$data['error'] = "";
		/* jika tombol submit di clik */
		if ($btn_add) {
				/* set validation in form */
				$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
				$this->form_validation->set_rules('nik', 'NIK', 'required');
				$this->form_validation->set_rules('jenis_lembur', 'Jenis Lembur', 'required');
				$this->form_validation->set_rules('jam_lembur', 'Jam Lembur', 'required');
				$this->form_validation->set_rules('tanggal_lembur', 'Tanggal Lembur', 'required');
				$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
				/* set message validation */
				$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
				/* set if validation true */
				if ($this->form_validation->run() == TRUE) {
						/* manipulasi tanggal mulai kerja */ 
						$tgl = explode('/',$tanggal_lembur);
						$tanggal_lembur = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
						$cek_lembur = $this->m_gaji_lembur->cek_lembur($jabatan,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur);
						if ($cek_lembur == true) {
							$simpan = $this->m_gaji_lembur->add_data($jabatan,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur,$keterangan);
							if ($simpan) {
								$this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan.');
								redirect('Gaji_lembur');
							}
							else {
								$data['error'] = "Dalam sehari lembur hanya boleh di lakukan 1 kali";
							}
						}
						else {
							$data['error'] = "Nik ".$nik." telah melibihi batas waktu lembur dalam seminggu";
						}
						
				}
		}
		/* ambil data master jabatan */
		$data['master_jabatan'] = $this->m_gaji_lembur->get_master_jabatan();
		/* ambil data master lembur */
		$data['master_jenis_lembur'] = $this->m_gaji_lembur->get_master_jenis_lembur();
		$data['plugtop'] = 'plugin/plugtop_add';
		$data['plugbot'] = 'plugin/plugbot_add';
		$data['content'] = 'v_add';
		$this->load->view('adminLTE/index', $data);
	}

	public function get_ajax_nik()
	{
		$jabatan = $this->input->post('jabatan');
		//$data = array();
		$get = $this->m_gaji_lembur->get_nik($jabatan);
		$data .= "<option value=''>- Pilih -</option>";
		foreach ($get as $baris)
		{
		$data .= "<option value='$baris->nik'>$baris->nik</option>\n";
		}
		echo $data;
	}

	public function get_ajax_jamlembur()
	{
		$jenis_lembur = $this->input->post('jenis_lembur');
		//$data = array();
		$get = $this->m_gaji_lembur->get_jamlembur($jenis_lembur);
		$data .= "<option value=''>- Pilih -</option>";
		foreach ($get as $baris)
		{
		$data .= "<option value='$baris->id_ket_lembur'>$baris->jam_lembur</option>\n";
		}
		echo $data;
	}

	public function detail()
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		$id = $this->uri->segment(3);
		/* setting input */
		$tanggal_lembur = $this->input->post('tanggal_lembur');
		$jenis_lembur = $this->input->post('jenis_lembur');
		$jam_lembur = $this->input->post('jam_lembur');
		$keterangan = $this->input->post('keterangan');
		$nik = $this->input->post('nik');
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
				$this->form_validation->set_rules('tanggal_lembur', 'Tanggal Lembur', 'required');
				$this->form_validation->set_rules('jenis_lembur', 'Jenis Limbur', 'required');
				$this->form_validation->set_rules('jam_lembur', 'Jam Lembur', 'required');
				$this->form_validation->set_rules('keterangan', 'Ketrangan', 'required');
				/* set message validation */
				$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
				/* set if validation true */
				if ($this->form_validation->run() == TRUE) {
						/* manipulasi tanggal mulai kerja */
						$tgl = explode('/',$tanggal_lembur);
						$tanggal_lembur = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
						$cek_lembur = $this->m_gaji_lembur->cek_lembur_detail($id,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur);
						if ($cek_lembur == true) {
							/* set update database */
							$simpan = $this->m_gaji_lembur->edit_data($id,$nik,$tanggal_lembur,$jenis_lembur,$jam_lembur,$keterangan);
							if ($simpan) {
									$this->session->set_flashdata('message', 'Data Berhasil Di Ubah.');
									redirect('Gaji_lembur');
							} else {
									$data['error'] = "Dalam sehari lembur hanya boleh di lakukan 1 kali";
							}
						}
						else {
							$data['error'] = "Nik ".$nik." telah melibihi batas waktu lembur dalam seminggu";
						}
				}
		}
		/* set if url false */
		$cek = $this->m_gaji_lembur->cek_detail($id);
		if ($cek != 1) {
				redirect('Gaji_lembur');
		}
		/* get data user berdasarkan id */
		$data['detail'] = $this->m_gaji_lembur->detail_data($id);
		/* ambil data master lembur */
		$data['master_jenis_lembur'] = $this->m_gaji_lembur->get_master_jenis_lembur();
		$data['master_ket_lembur'] = $this->m_gaji_lembur->get_ket_lembur($id);
		$data['plugtop'] = 'plugin/plugtop_add';
		$data['plugbot'] = 'plugin/plugbot_add';
		$data['content'] = 'v_edit';
		$this->load->view('adminLTE/index', $data);
	}


	public function delete($id)
	{
		if ($this->session->userdata('ses_user_jabatan') != '1') {
			redirect('error404');
		}
		$sukses = $this->m_gaji_lembur->delete_data($id);
		if ($sukses == 1) {
				$this->session->set_flashdata('message', 'Data Telah Berhasil Di Hapus.');
				redirect('Gaji_lembur');
		} else {
				redirect('Gaji_lembur');
		}
	}

}
