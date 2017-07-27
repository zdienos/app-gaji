<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_user extends CI_Model
{

  function __construct()
  {
    # code...
  }

  /* membuat id otomatis */
  public function id_otomatis(&$idnya)
	{
		$query=$this->db->query("SELECT id_user FROM user ORDER BY id_user DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_user+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  public function show_data()
  {
    $this->db->order_by('username', 'ASC');
    $query = $this->db->get('user');
    return $query->result();
  }

  public function add_data($username,$password,$jabatan,$status)
  {
    /* check data in database */
    $this->db->select(array('username'));
    $this->db->from('user');
    $this->db->where('username',$username);
    $query = $this->db->get();
    /* set num row */
    $cek = $query->num_rows(count($query));
    /* set if $cek not zero */
    if ($cek != 0)
    {
      return false;
    }
    else
    {
      /* set id automatic */
      $id = "";
			$this->id_otomatis($id);
      /* set array column from table nav_menu */
      $data = array(
        'id_user' => $id,
        'username' => $username,
        'password' => $password,
        'jabatan' => $jabatan,
        'status' => $status
      );
      /* insert data in database */
      $this->db->insert('user', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('user', array('md5(sha1(id_user))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      return true;
    }
  }

  public function detail_data($id)
  {
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where("md5(sha1(id_user))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_data($id, $username, $password, $jabatan, $status)
  {
    /* check data in database */
    $this->db->select(array('username'));
    $this->db->from('user');
    $this->db->where('username', $username);
    $this->db->where('md5(sha1(id_user)) !=', $id);
    $query = $this->db->get();
    /* set num row */
    $cek = $query->num_rows(count($query));
    /* set if $cek not zero */
    if ($cek != 0)
    {
      return false;
    }
    else
    {
      /* set array column in tabel nav_menu */
      $data = array(
        'username' => $username,
        'password' => $password,
        'jabatan' => $jabatan,
        'status' => $status
      );
      /* update table nav_menu */
      $this->db->set($data);
      $this->db->where('md5(sha1(id_user))', $id);
      $this->db->update('user');
      return true;
    }
  }

  public function delete_data($id)
  {
    $query = $this->db->get_where('user', array('md5(sha1(id_user))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(id_user))', $id);
      $this->db->delete('user');
      return true;
    }
  }
}
