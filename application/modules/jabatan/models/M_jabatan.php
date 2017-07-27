<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_jabatan extends CI_Model
{

  function __construct()
  {
    # code...
  }

  /* membuat id otomatis */
  public function id_otomatis(&$idnya)
	{
		$query=$this->db->query("SELECT id_jabatan FROM jabatan ORDER BY id_jabatan DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_jabatan+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  public function show_data()
  {
    $this->db->order_by('nama_jabatan', 'ASC');
    $query = $this->db->get('jabatan');
    return $query->result();
  }

  public function add_data($nama_jabatan)
  {
    /* check data in database */
    $this->db->select(array('nama_jabatan'));
    $this->db->from('jabatan');
    $this->db->where('nama_jabatan',$nama_jabatan);
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
        'id_jabatan' => $id,
        'nama_jabatan' => $nama_jabatan
      );
      /* insert data in database */
      $this->db->insert('jabatan', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('jabatan', array('md5(sha1(id_jabatan))' => $id));
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
    $this->db->from("jabatan");
    $this->db->where("md5(sha1(id_jabatan))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_data($id,$nama_jabatan)
  {
    /* check data in database */
    $this->db->select(array('nama_jabatan'));
    $this->db->from('jabatan');
    $this->db->where('nama_jabatan',$nama_jabatan);
    $this->db->where('md5(sha1(id_jabatan)) !=', $id);
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
        'nama_jabatan' => $nama_jabatan
      );
      /* update table nav_menu */
      $this->db->set($data);
      $this->db->where('md5(sha1(id_jabatan))', $id);
      $this->db->update('jabatan');
      return true;
    }
  }

  public function delete_data($id)
  {
    $query = $this->db->get_where('jabatan', array('md5(sha1(id_jabatan))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(id_jabatan))', $id);
      $this->db->delete('jabatan');
      return true;
    }
  }
}
