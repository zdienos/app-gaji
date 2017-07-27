<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class M_ket_lembur extends CI_Model
{
  /* membuat id otomatis */
  public function id_otomatis(&$idnya)
	{
		$query=$this->db->query("SELECT id_ket_lembur FROM ket_lembur ORDER BY id_ket_lembur DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_ket_lembur+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  public function show_data($perpage,$uri)
  {
    $cari_jenis_lembur = $this->input->post('cari_jenis_lembur');

    if (empty($cari_jenis_lembur))
    {
      $this->db->select("*");
      $this->db->from("ket_lembur");
      $this->db->join('detail_lembur','detail_lembur.id_detail_lembur = ket_lembur.jenis_lembur_id','inner');
      $this->db->order_by("kode_lembur","ASC");
    }
    else
    {
      $this->db->select("*");
      $this->db->from("ket_lembur");
      $this->db->join('detail_lembur','detail_lembur.id_detail_lembur = ket_lembur.jenis_lembur_id','inner');
      $this->db->where("jenis_lembur_id = '$cari_jenis_lembur'");
      $this->db->order_by("kode_lembur","ASC");
    }
    $query = $this->db->get('',$perpage,$uri);
    return $query->result();
  }

  public function get_master_detail_lembur()
  {
      $this->db->select('*');
      $this->db->order_by('kode_lembur','ASC');
      $query = $this->db->get('detail_lembur')->result();
      return $query;
  }

  public function add_data($jenis_lembur, $jam_lembur, $upah_lembur)
  {
      /* kode otomatis */
      /* check data in database */
      $this->db->select(array('jenis_lembur_id','jam_lembur'));
      $this->db->from('ket_lembur');
      $this->db->where('jenis_lembur_id',$jenis_lembur);
      $this->db->where('jam_lembur',$jam_lembur);
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
      $data = array(
          'id_ket_lembur' => $id,
          'jenis_lembur_id' => $jenis_lembur,
          'jam_lembur' => $jam_lembur,
          'upah_lembur' => $upah_lembur
      );
      /* insert data in database */
      $this->db->insert('ket_lembur', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('ket_lembur', array('md5(sha1(id_ket_lembur))' => $id));
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
    $this->db->from("ket_lembur");
    $this->db->where("md5(sha1(id_ket_lembur))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_data($id,$jenis_lembur, $jam_lembur, $upah_lembur)
  {
    /* check data in database */
    $this->db->select(array('jenis_lembur_id','jam_lembur'));
    $this->db->from('ket_lembur');
    $this->db->where('jenis_lembur_id', $jenis_lembur);
    $this->db->where('jam_lembur',$jam_lembur);
    $this->db->where('md5(sha1(id_ket_lembur)) !=', $id);
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
        'jenis_lembur_id' => $jenis_lembur,
        'jam_lembur' => $jam_lembur,
        'upah_lembur' => $upah_lembur
      );
      /* update table nav_menu */
      $this->db->set($data);
      $this->db->where('md5(sha1(id_ket_lembur))', $id);
      $this->db->update('ket_lembur');
      return true;
    }
  }

  public function delete_data($id)
  {
    $query = $this->db->get_where('ket_lembur', array('md5(sha1(id_ket_lembur))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(id_ket_lembur))', $id);
      $this->db->delete('ket_lembur');
      return true;
    }
  }

}
