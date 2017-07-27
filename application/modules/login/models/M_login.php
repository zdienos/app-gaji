<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
  {
    //parent::__construct();

  }

  function cekLogin($username,$password)
  {
    $cek = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status = '1'");
    $tes = $cek->num_rows(count($cek));
    if ($tes == 0)
    {
      return false;
    }
    else
    {
      $row = $cek->row();
			$id = $row->id_user;
			$nama = $row->username;
			$jabatan = $row->jabatan;

			$this->session->set_userdata('ses_user_id',$id);
			$this->session->set_userdata('ses_user_nama',$nama);
			$this->session->set_userdata('ses_user_jabatan',$jabatan);
			return true;
    }
  }
}
