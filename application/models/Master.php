<?php defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Model{
	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah	
	}
	public function loginmahasiswa($data)
	{
		$jalan = $this->db->get_where('tbl_register', $data);
		return $jalan;
	}
	public function dataloginmahasiswa($npm)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_fakultas, tbl_jurusan where tbl_register.id_fakultas = tbl_fakultas.id_fakultas and tbl_register.id_jurusan = tbl_jurusan.id_jurusan and tbl_register.npm = '$npm'");
		return $jalan->result();
	}
	public function loginadmin($data)
	{
		$jalan = $this->db->get_where('tbl_admin', $data);
		return $jalan;
	}
	public function dataloginadmin($nik)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_admin` where nik = '$nik'");
		return $jalan->result();
	}
	public function tambah_fakultas($data)
	{
		$jalan = $this->db->insert('tbl_fakultas', $data);
		return $jalan;
	}
	public function tampil_fakultas()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_fakultas`");
		return $jalan->result();
	}
	public function edit_fakultas($id_fakultas)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_fakultas` where id_fakultas = '$id_fakultas'");
		return $jalan->result();
	}
	public function simpan_fakultas($data, $id_fakultas)
	{
		$this->db->where('id_fakultas', $id_fakultas);
		$this->db->update('tbl_fakultas', $data);
		return true;
	}
	public function hapus_fakultas($id_fakultas)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_fakultas` where id_fakultas = '$id_fakultas'");
		return $jalan;
	}
	public function tambah_jurusan($data)
	{
		$jalan = $this->db->insert('tbl_jurusan', $data);
		return $jalan;
	}
	
	public function tampil_jurusan()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_jurusan`");
		return $jalan->result();
	}
	public function edit_jurusan($id_jurusan)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_jurusan` where id_jurusan = '$id_jurusan'");
		return $jalan->result();
	}
	public function simpan_jurusan($data, $id_jurusan)
	{
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->update('tbl_jurusan', $data);
		return true;
	}
	public function hapus_jurusan($id_jurusan)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_jurusan` where id_jurusan = '$id_jurusan'");
		return $jalan;
	}
	public function register_mahasiswa($data)
	{
		$jalan = $this->db->insert('tbl_register', $data);
		return $jalan;
	}
	public function tampil_register($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register` where id_register = '$id_register'");
		return $jalan->result();
	}
	public function tampil_register_admin()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_fakultas, tbl_jurusan where tbl_register.id_fakultas = tbl_fakultas.id_fakultas and tbl_register.id_jurusan = tbl_jurusan.id_jurusan order by tbl_register.id_register desc");
		return $jalan->result();
	}
	public function tambah_detail_mahasiswa($data)
	{
		$jalan = $this->db->insert('tbl_detail_mahasiswa', $data);
		return $jalan;
	}
	public function ubah_detail_mahasiswa($data, $id_register)
	{
		$this->db->where('id_register', $id_register);
		$this->db->update('tbl_detail_mahasiswa', $data);
		return true;
	}
	public function tampil_detail_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_detail_mahasiswa` where id_register = '$id_register'");
		return $jalan->result();
	}
	public function tampil_detail_mahasiswa_admin($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_detail_mahasiswa`, tbl_register, tbl_jurusan, tbl_fakultas where tbl_detail_mahasiswa.id_register = tbl_register.id_register and tbl_fakultas.id_fakultas = tbl_register.id_fakultas and tbl_jurusan.id_jurusan = tbl_register.id_jurusan and tbl_detail_mahasiswa.id_register = '$id_register'");
		return $jalan->result();
	}
	public function tambah_ukm($data)
	{
		$jalan = $this->db->insert('tbl_ukm', $data);
		return $jalan;
	}
	public function tampil_ukm()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_ukm` order by id_ukm desc");
		return $jalan->result();
	}
	public function edit_bagian($id_ukm)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_ukm` where id_ukm = '$id_ukm'");
		return $jalan->result();
	}
	public function simpan_ukm($data, $id_ukm)
	{
		$this->db->where('id_ukm', $id_ukm);
		$this->db->update('tbl_ukm', $data);
		return true;
	}
	public function hapus_bagian($id_ukm)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_ukm` where id_ukm = '$id_ukm'");
		return $jalan;
	}
	public function tambah_soal($data)
	{
		$jalan = $this->db->insert('tbl_soal', $data);
		return $jalan;
	}
	public function tampil_soal()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_soal`, tbl_ukm where tbl_soal.id_ukm = tbl_ukm.id_ukm group by tbl_soal.kode");
		return $jalan->result();
	}
	public function hapus_soal($kode)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_soal` where kode = '$kode'");
		return $jalan;
	}
	public function hapus_detail_soal($id_soal)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_soal` where id_soal = '$id_soal'");
		return $jalan;
	}
	public function tampil_detail_soal($kode)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_soal` where kode = '$kode'");
		return $jalan->result();
	}
	public function edit_waktu_soal($kode)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_soal` where kode = '$kode' group by kode asc");
		return $jalan->result();
	}
	public function edit_soal($id_soal)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_soal` where id_soal = '$id_soal'");
		return $jalan->result();
	}
	public function simpan_soal($data, $id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->update('tbl_soal', $data);
		return true;
	}
	public function simpan_waktu_soal($data, $kode)
	{
		$this->db->where('kode', $kode);
		$this->db->update('tbl_soal', $data);
		return true;
	}
	public function tampil_admin()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_admin`");
		return $jalan->result();
	}
	public function edit_admin($id_admin)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_admin` where id_admin = '$id_admin'");
		return $jalan->result();
	}
	public function simpan_admin($data, $id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$this->db->update('tbl_admin', $data);
		return true;
	}
	public function hapus_admin($id_admin)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_admin` where id_admin = '$id_admin'");
		return $jalan;
	}
	public function tambah_admin($data)
	{
		$jalan = $this->db->insert('tbl_admin', $data);
		return $jalan;
	}
	public function akun_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_fakultas, tbl_jurusan where tbl_register.id_fakultas = tbl_fakultas.id_fakultas and tbl_register.id_jurusan = tbl_jurusan.id_jurusan and tbl_register.id_register = '$id_register'");
		return $jalan->result();
	}
	public function tambah_jawaban($data)
	{
		$jalan = $this->db->insert('tbl_jawaban', $data);
		return $jalan;
	}
	public function cek_nilai($kode,$no, $jawaban)
	{
        //$jalan = $this->db->query("SELECT * FROM `tbl_soal`, tbl_jawaban where tbl_soal.kode = '$kode' and tbl_soal.no = tbl_jawaban.no and tbl_soal.jawaban = '$jawaban'");
        $jalan = $this->db->query("SELECT * FROM `tbl_soal` where kode = '$kode' and no = '$no' and jawaban = '$jawaban'");
		return $jalan->num_rows();
	}
	public function tambah_nilai($data)
	{
		$jalan = $this->db->insert('tbl_nilai', $data);
		return $jalan;
	}
	public function tampil_hasil_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai`, tbl_register, tbl_soal where tbl_nilai.id_register = '$id_register' and tbl_nilai.id_soal = tbl_soal.id_soal and tbl_register.id_register = '$id_register' order by tbl_nilai.nilai desc limit 0,5");
		return $jalan->result();
	}
	public function tampil_hasil_pengumumman($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai`, tbl_register, tbl_soal, penempatan_mahasiswa, tbl_penempatan where tbl_nilai.id_register = '$id_register' and tbl_nilai.id_soal = tbl_soal.id_soal and tbl_register.id_register = '$id_register' and penempatan_mahasiswa.id_register = '$id_register' and penempatan_mahasiswa.id_penempatan = tbl_penempatan.id_penempatan order by tbl_nilai.nilai desc limit 0,5");
		return $jalan->result();
	}
	public function tampil_hasil_admin()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_soal, tbl_nilai where tbl_register.id_register = tbl_nilai.id_register and tbl_nilai.kode = tbl_soal.kode and tbl_nilai.nilai > 70 group by tbl_nilai.id_register");
		return $jalan->result();
	}
	public function tampil_penempatan()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_penempatan` order by id_penempatan desc");
		return $jalan->result();
	}
	public function edit_penempatan($id_penempatan)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_penempatan` where id_penempatan = '$id_penempatan'");
		return $jalan->result();
	}
	public function simpan_penempatan($data, $id_penempatan)
	{
		$this->db->where('id_penempatan', $id_penempatan);
		$this->db->update('tbl_penempatan', $data);
		return true;
	}
	public function tambah_penempatan($data)
	{
		$jalan = $this->db->insert('tbl_penempatan', $data);
		return $jalan;
	}
	public function view_mahasiswa_seleksi()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai`, tbl_register, tbl_soal where tbl_nilai.id_register = tbl_register.id_register and tbl_nilai.id_soal = tbl_soal.id_soal and tbl_nilai.nilai > 75 group by tbl_nilai.id_nilai");
		return $jalan->result();
	}
	public function lihat_hasil_seleksi($id_register, $kode)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai`, tbl_soal where tbl_nilai.kode = '$kode' and tbl_nilai.id_soal = tbl_soal.id_soal ");
		return $jalan->result();
	}
	public function simpan_gambar_mahasiswa($data, $id_register)
	{
		$this->db->where('id_register', $id_register);
		$this->db->update('tbl_detail_mahasiswa', $data);
		return true;
	}
	public function tampil_gambar_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_detail_mahasiswa`where id_register = $id_register group by id_register");
		return $jalan->result();
	}
	public function ubah_hobi($id_detail_mahasiswa)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_detail_mahasiswa` where id_detail_mahasiswa = '$id_detail_mahasiswa'");
		return $jalan->result();
	}
	public function simpan_hobi($data, $id_detail_mahasiswa)
	{
		$this->db->where('id_detail_mahasiswa', $id_detail_mahasiswa);
		$this->db->update('tbl_detail_mahasiswa', $data);
		return true;
	}
	public function tampil_keaktifan()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_keaktifan`, tbl_register where tbl_keaktifan.id_register = tbl_register.id_register order by tbl_keaktifan.tanggal_kegiatan desc");
		return $jalan->result();
	}
	public function tambah_keaktifan($data)
	{
		$jalan = $this->db->insert('tbl_keaktifan', $data);
		return $jalan;
	}
	public function tampil_suara()
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_jenissuara` order by jenis_suara desc");
		return $jalan->result();
	}
	public function tambah_jenissuara($data)
	{
		$jalan = $this->db->insert('tbl_jenissuara', $data);
		return $jalan;
	}
	public function laporan_keaktifan($dari, $sampai)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_keaktifan`, tbl_register, tbl_jurusan where tbl_keaktifan.id_register = tbl_register.id_register and tbl_register.id_jurusan = tbl_jurusan.id_jurusan and tbl_keaktifan.tanggal_kegiatan >= '$dari' and tbl_keaktifan.tanggal_kegiatan <= '$sampai' order by tbl_register.nama asc");
		return $jalan->result();
	}
	public function mahasiswa_cetak_hasil($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_detail_mahasiswa, tbl_fakultas, tbl_jurusan where tbl_register.id_register = tbl_detail_mahasiswa.id_register and tbl_register.id_fakultas = tbl_fakultas.id_fakultas and tbl_register.id_jurusan = tbl_jurusan.id_jurusan and tbl_register.id_register = '$id_register'");
		return $jalan->result();
	}
	public function cetak_hasil($id_nilai)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai`, tbl_soal where tbl_nilai.id_soal = tbl_soal.id_soal and tbl_nilai.id_nilai = '$id_nilai'");
		return $jalan->result();
	}
	public function tambah_penempatan_mahasiswa($data)
	{
		$jalan = $this->db->insert('penempatan_mahasiswa', $data);
		return $jalan;
	}
	public function ubah_penempatan_mahasiswa($data, $id_register)
	{
		$this->db->where('id_register', $id_register);
		$this->db->update('penempatan_mahasiswa', $data);
		return true;
	}
	public function ubah_nilai($data, $id_register)
	{
		$this->db->where('id_register', $id_register);
		$this->db->update('tbl_nilai', $data);
		return true;
	}
	public function cek_penempatan_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `penempatan_mahasiswa` where id_register = '$id_register'");
		return $jalan->num_rows();
	}
	public function tampil_penempatan_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `penempatan_mahasiswa`, tbl_penempatan where penempatan_mahasiswa.id_penempatan = tbl_penempatan.id_penempatan and penempatan_mahasiswa.id_register = '$id_register'");
		return $jalan->result();
	}
	public function cek_data_mahasiswa($id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_register`, tbl_detail_mahasiswa where tbl_register.id_register = tbl_detail_mahasiswa.id_register and tbl_detail_mahasiswa.id_register = '$id_register'");
		return $jalan->num_rows();
	}
	public function hapus_mahasiswa($id_register)
	{
		$jalan = $this->db->query("DELETE FROM `tbl_register` where id_register = '$id_register'");
		return $jalan;
	}
	public function cek_soal($id_soal, $id_register)
	{
		$jalan = $this->db->query("SELECT * FROM `tbl_nilai` where id_soal = '$id_soal' and id_register = '$id_register'");
		return $jalan->num_rows();
	}
}

