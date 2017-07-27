<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class M_karyawan extends CI_Model
{

  public function show_data($perpage,$uri)
  {
    $cari_jabatan = $this->input->post('cari_jabatan');
    $cari_nik = $this->input->post('cari_nik');

    if (empty($cari_jabatan) && empty($cari_nik))
    {
      $this->db->select("*");
      $this->db->from("karyawan");
      $this->db->join('jabatan','jabatan.id_jabatan = karyawan.jabatan_id','inner');
      $this->db->order_by("nama_karyawan","ASC");
    }
    else
    {
      $this->db->select("*");
      $this->db->from("karyawan");
      $this->db->join('jabatan','jabatan.id_jabatan = karyawan.jabatan_id','inner');
      $this->db->where("jabatan_id = '$cari_jabatan' AND nik LIKE '$cari_nik%'");
      $this->db->order_by("nama_karyawan","ASC");
    }
    $query = $this->db->get('',$perpage,$uri);
    return $query->result();
  }

  public function get_master_jabatan()
  {
      $this->db->select('*');
      $this->db->order_by('nama_jabatan','ASC');
      $query = $this->db->get('jabatan')->result();
      return $query;
  }

  public function add_data($nik,$nama_karyawan,$departemen,$jabatan,$grid,$gaji)
  {
      /* kode otomatis */
      /* check data in database */
      $this->db->select(array('nik'));
      $this->db->from('karyawan');
      $this->db->where('nik',$nik);
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

      $data = array(
          'nik' => $nik,
          'nama_karyawan' => $nama_karyawan,
          'departemen' => $departemen,
          'jabatan_id' => $jabatan,
          'grid' => $grid,
          'gaji' => $gaji
      );
      /* insert data in database */
      $this->db->insert('karyawan', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('karyawan', array('md5(sha1(nik))' => $id));
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
    $this->db->from("karyawan");
    $this->db->where("md5(sha1(nik))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_data($id,$nama_karyawan,$departemen,$jabatan,$grid,$gaji)
  {
    /* set array column in tabel nav_menu */
    $data = array(
      'nama_karyawan' => $nama_karyawan,
      'departemen' => $departemen,
      'jabatan_id' => $jabatan,
      'grid' => $grid,
      'gaji' => $gaji
    );
    /* update table nav_menu */
    $this->db->set($data);
    $this->db->where('md5(sha1(nik))', $id);
    $this->db->update('karyawan');
    return true;
  }

  public function delete_data($id)
  {
    $query = $this->db->get_where('karyawan', array('md5(sha1(nik))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(nik))', $id);
      $this->db->delete('karyawan');
      return true;
    }
  }

}
