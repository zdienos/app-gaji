<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class M_gaji_lembur extends CI_Model
{

  function id_otomatis(&$idnya)//membuat id otomatis
	{
		$query=$this->db->query("SELECT id_gaji_lembur FROM gaji_lembur ORDER BY id_gaji_lembur DESC");
		$cek = $query->num_rows(count($query));
		if ($cek == 0)
		{
			$id = 1;
		}
		else
		{
			$row = $query->row();
			$id = $row->id_gaji_lembur+1;
      //((int)$row->id)+1;
		}
		$idnya = $id;
	}

  public function show_data($perpage,$uri)
  {
    $cari_nik = $this->input->post('cari_nik');
		$cari_tahun = $this->input->post('cari_tahun');
		$cari_bulan = $this->input->post('cari_bulan');

    if (empty($cari_tahun) && empty($cari_bulan) && empty($cari_nik))
    {
      //tahun sekarang
      $tahun = date('Y');
      $this->db->select("a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,e.kode_lembur");
      $this->db->from("gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e");
      $this->db->where("b.nik = a.nik_karyawan AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur AND (YEAR(a.tanggal_lembur)='$tahun')");
      $this->db->order_by("a.tanggal_lembur","DESC"); 
    }
    else
    {
      $this->db->select("a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,e.kode_lembur");
      $this->db->from("gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e");
      $this->db->where("b.nik = a.nik_karyawan AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur AND (Month(a.tanggal_lembur)='$cari_bulan') AND (YEAR(a.tanggal_lembur)='$cari_tahun') AND a.nik_karyawan LIKE '%$cari_nik%'");
      $this->db->order_by("a.tanggal_lembur","DESC");
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

  public function get_master_jenis_lembur()
  {
      $this->db->select('*');
      $this->db->order_by('kode_lembur','ASC');
      $query = $this->db->get('detail_lembur')->result();
      return $query;
  }

  public function get_nik($jabatan)
  {
    $query = $this->db->get_where('karyawan', array('jabatan_id' => $jabatan));
    return $query->result();
  }

  public function get_jamlembur($jenis_lembur)
  {
    $query = $this->db->get_where('ket_lembur', array('jenis_lembur_id' => $jenis_lembur));
    return $query->result();
  }

  public function get_ket_lembur($id)
  {
    $data_jenis_lembur = $this->db->query("SELECT a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,d.jenis_lembur_id,e.kode_lembur
       FROM gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e WHERE md5(sha1(a.id_gaji_lembur)) = '$id' AND b.nik = a.nik_karyawan
       AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur")->row();
    $jenis_lembur = $data_jenis_lembur->jenis_lembur_id;
    $query = $this->db->get_where('ket_lembur', array('jenis_lembur_id' => $jenis_lembur));
    return $query->result();
    $this->db->select('*');
    $this->db->where('jenis_lembur_id',$jenis_lembur);
    $this->db->order_by('jam_lembur','ASC');
    $query = $this->db->get('ket_lembur')->result();
    return $query;
  }
  public function cek_lembur($jabatan,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur)
  {
    $data_lembur = $this->db->query("SELECT jam_lembur FROM ket_lembur WHERE id_ket_lembur = '$jam_lembur'")->row();
    $jam_lembur_dt = $data_lembur->jam_lembur;
    $week = date("YW", strtotime($tanggal_lembur));
    $query = $this->db->query("SELECT tanggal_lembur FROM gaji_lembur WHERE YEARWEEK(tanggal_lembur) = '$week'");
    $cek = $query->num_rows(count($query));
    if ($cek != 0) {
      $lembur = $this->db->query("SELECT sum(b.jam_lembur) AS total_jam_lembur FROM gaji_lembur a, ket_lembur b WHERE a.nik_karyawan = '$nik' AND YEARWEEK(a.tanggal_lembur) = '$week' AND a.ket_lembur_id = b.id_ket_lembur")->row();
      $total_jam = $lembur->total_jam_lembur;
      $total_jam_lembur = $total_jam + $jam_lembur_dt;
      if ($total_jam_lembur > 14) {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }
    
  }
  public function add_data($jabatan,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur,$keterangan)
  {
    /* check data in database */
    $this->db->select(array('nik_karyawan','tanggal_lembur'));
    $this->db->from('gaji_lembur');
    $this->db->where('nik_karyawan',$nik);
    $this->db->where('tanggal_lembur',$tanggal_lembur);
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
      /* ambil gaji */
      $data_gaji = $this->db->query("SELECT * FROM karyawan WHERE nik = '$nik'")->row();
      $gaji = $data_gaji->gaji;
      /* ambil upah lembur */
      $data_jam_lembur = $this->db->query("SELECT * FROM ket_lembur WHERE id_ket_lembur = '$jam_lembur'")->row();
      $nilai_lembur = $data_jam_lembur->upah_lembur;
      /* hitung upah lembur */
      $x = $gaji / 173;
      $upah_lembur = round($x * $nilai_lembur);
      /* set array column */
      $data = array(
        'id_gaji_lembur' => $id,
        'nik_karyawan' => $nik,
        'ket_lembur_id' => $jam_lembur,
        'total_upah_lembur' => $upah_lembur,
        'tanggal_lembur' => $tanggal_lembur,
        'keterangan' => $keterangan
      );
      /* insert data in database */
      $this->db->insert('gaji_lembur', $data);
      return true;
    }
  }

  public function cek_detail($id)
  {
    $query = $this->db->get_where('gaji_lembur', array('md5(sha1(id_gaji_lembur))' => $id));
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

    $this->db->select("a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,d.jenis_lembur_id,e.kode_lembur");
    $this->db->from("gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e");
    $this->db->where("b.nik = a.nik_karyawan AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur");
    $this->db->where("md5(sha1(a.id_gaji_lembur))",$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function cek_lembur_detail($id,$nik,$jenis_lembur,$jam_lembur,$tanggal_lembur)
  {
    $data_lembur = $this->db->query("SELECT jam_lembur FROM ket_lembur WHERE id_ket_lembur = '$jam_lembur'")->row();
    $jam_lembur_dt = $data_lembur->jam_lembur;
    $week = date("YW", strtotime($tanggal_lembur));
    $query = $this->db->query("SELECT tanggal_lembur FROM gaji_lembur WHERE YEARWEEK(tanggal_lembur) = '$week' AND md5(sha1(id_gaji_lembur)) != '$id'");
    $cek = $query->num_rows(count($query));

    if ($cek != 0) {
      $lembur = $this->db->query("SELECT sum(b.jam_lembur) AS total_jam_lembur FROM gaji_lembur a, ket_lembur b WHERE a.nik_karyawan = '$nik' AND YEARWEEK(a.tanggal_lembur) = '$week' AND a.ket_lembur_id = b.id_ket_lembur AND md5(sha1(id_gaji_lembur)) != '$id'")->row();
      $total_jam = $lembur->total_jam_lembur;
      return $total_jam;
      $total_jam_lembur = $total_jam + $jam_lembur_dt;
      if ($total_jam_lembur > 14) {
        return false;
      } else {
        return true;
      }
    } else {
      return true;
    }
    
  }

  public function edit_data($id,$nik,$tanggal_lembur,$jenis_lembur,$jam_lembur,$keterangan)
  {
    /* check data in database */
    $this->db->select(array('nik_karyawan','tanggal_lembur'));
    $this->db->from('gaji_lembur');
    $this->db->where('nik_karyawan',$nik);
    $this->db->where('tanggal_lembur',$tanggal_lembur);
    $this->db->where('md5(sha1(id_gaji_lembur)) !=', $id);
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
      /*ambil data jabatan*/
      $data_karyawan = $this->db->query("SELECT * FROM karyawan WHERE nik = '$nik'")->row();
      $gaji = $data_karyawan->gaji;
      /* ambil upah lembur */
      $data_jam_lembur = $this->db->query("SELECT * FROM ket_lembur WHERE id_ket_lembur = '$jam_lembur'")->row();
      $nilai_lembur = $data_jam_lembur->upah_lembur;
      /* hitung upah lembur */
      $x = $gaji / 173;
      $upah_lembur = round($x * $nilai_lembur);
      /* set array column in tabel nav_menu */
      $data = array(
        'ket_lembur_id' => $jam_lembur,
        'total_upah_lembur' => $upah_lembur,
        'tanggal_lembur' => $tanggal_lembur,
        'keterangan' => $keterangan
      );
      /* update table nav_menu */
      $this->db->set($data);
      $this->db->where('md5(sha1(id_gaji_lembur))', $id);
      $this->db->update('gaji_lembur');
      return true;
    }
  }


  public function delete_data($id)
  {
    $query = $this->db->get_where('gaji_lembur', array('md5(sha1(id_gaji_lembur))' => $id));
    $cek = $query->num_rows(count($query));
    if ($cek != 1) {
      return false;
    }
    else {
      $this->db->where('md5(sha1(id_gaji_lembur))', $id);
      $this->db->delete('gaji_lembur');
      return true;
    }
  }
}
