<?php defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class M_report_lembur extends CI_Model
 {
     
     public function report_keseluruhan($bulan,$tahun)
     {
         $query = $this->db->query("SELECT * ,sum(a.total_upah_lembur) AS total, b.*, sum(c.jam_lembur) AS jam, d.nama_jabatan FROM gaji_lembur a, karyawan b, ket_lembur c, jabatan d WHERE a.nik_karyawan = b.nik AND a.ket_lembur_id = c.id_ket_lembur AND d.id_jabatan = b.jabatan_id AND MONTH(a.tanggal_lembur) = '$bulan' AND YEAR(a.tanggal_lembur) = '$tahun' GROUP BY a.nik_karyawan")->result();
         return $query;
     }

     public function ambil_karyawan($nik)
     {
        $this->db->select("*");
        $this->db->from("karyawan");
        $this->db->join('jabatan','jabatan.id_jabatan = karyawan.jabatan_id','inner');
        $this->db->where("nik",$nik);
        $query = $this->db->get();
        return $query->row();
     }

     public function report_perorangan($bulan,$tahun,$nik)
     {
        $this->db->select("a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,e.kode_lembur");
        $this->db->from("gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e");
        $this->db->where("b.nik = a.nik_karyawan AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur AND (Month(a.tanggal_lembur)='$bulan') AND (YEAR(a.tanggal_lembur)='$tahun') AND a.nik_karyawan = '$nik'");
        $this->db->order_by("a.tanggal_lembur","ASC");
        $query = $this->db->get();
        return $query->result();
     }

     public function report_departemen($bulan,$tahun,$departemen)
     {
		$this->db->select("a.*,b.nama_karyawan,b.grid,b.gaji,c.nama_jabatan,d.jam_lembur,d.upah_lembur,e.kode_lembur");
		$this->db->from("gaji_lembur a, karyawan b, jabatan c, ket_lembur d, detail_lembur e");
		$this->db->where("b.nik = a.nik_karyawan AND c.id_jabatan = b.jabatan_id AND d.id_ket_lembur = a.ket_lembur_id AND d.jenis_lembur_id = e.id_detail_lembur AND (Month(a.tanggal_lembur)='$bulan') AND (YEAR(a.tanggal_lembur)='$tahun') AND b.departemen = '$departemen'");
		$this->db->order_by("a.nik_karyawan","ASC");
		$this->db->order_by("a.tanggal_lembur","ASC");
		$query = $this->db->get();
		return $query->result();
     }

     public function report_grade($bulan,$tahun,$grade)
     {
         $query = $this->db->query("SELECT * ,sum(a.total_upah_lembur) AS total, b.*, sum(c.jam_lembur) AS jam, d.nama_jabatan FROM gaji_lembur a, karyawan b, ket_lembur c, jabatan d WHERE a.nik_karyawan = b.nik AND a.ket_lembur_id = c.id_ket_lembur AND d.id_jabatan = b.jabatan_id AND MONTH(a.tanggal_lembur) = '$bulan' AND YEAR(a.tanggal_lembur) = '$tahun' AND b.grid = '$grade' GROUP BY a.nik_karyawan")->result();
         return $query;
     }
 }
 