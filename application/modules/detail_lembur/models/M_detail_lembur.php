<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_detail_lembur extends CI_Model
{

  function __construct()
  {
    # code...
  }

  /* membuat id otomatis */
  public function id_otomatis(&$idnya)
	{
		$query=$this->db->query("SELECT id_detail_lembur FROM detail_lembur ORDER BY id_detail_lembur DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_detail_lembur+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  public function show_data()
  {
    $this->db->order_by('kode_lembur', 'ASC');
    $query = $this->db->get('detail_lembur');
    return $query->result();
  }

  public function add_data($kode_lembur,$keterangan_lembur)
  {
    /* check data in database */
    $this->db->select(array('kode_lembur'));
    $this->db->from('detail_lembur');
    $this->db->where('kode_lembur',$kode_lembur);
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
        'id_detail_lembur' => $id,
        'kode_lembur' => $kode_lembur,
        'keterangan_lembur' => $keterangan_lembur
      );
      /* insert data in database */
      $this->db->insert('detail_lembur', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('detail_lembur', array('md5(sha1(id_detail_lembur))' => $id));
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
    $this->db->from("detail_lembur");
    $this->db->where("md5(sha1(id_detail_lembur))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_data($id,$kode_lembur,$keterangan_lembur)
  {
    /* check data in database */
    $this->db->select(array('kode_lembur'));
    $this->db->from('detail_lembur');
    $this->db->where('kode_lembur', $kode_lembur);
    $this->db->where('md5(sha1(id_detail_lembur)) !=', $id);
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
        'kode_lembur' => $kode_lembur,
        'keterangan_lembur' => $keterangan_lembur
      );
      /* update table nav_menu */
      $this->db->set($data);
      $this->db->where('md5(sha1(id_detail_lembur))', $id);
      $this->db->update('detail_lembur');
      return true;
    }
  }

  public function delete_data($id)
  {
    $query = $this->db->get_where('detail_lembur', array('md5(sha1(id_detail_lembur))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(id_detail_lembur))', $id);
      $this->db->delete('detail_lembur');
      return true;
    }
  }
}
