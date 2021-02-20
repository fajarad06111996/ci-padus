<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {
	function __construct(){
	parent::__construct();
		if($this->session->userdata('id_register') == ""){
			redirect(base_url('app/login'));
		}
		$this->load->model('master'); 
		//date_default_timezone_set("Asia/Jakarta");// meload master model
		//$this->load->library('googlemaps');
		$this->load->helper('tglid'); //tanggalindonesia
		//$desa = $this->master->profil_desa();
		//foreach($desa as $v){
			
			// $this->alamat_desa = $v->alamat_desa;
			//var_dump($db);
		//}	
		$this->load->library('ciqrcode'); 
	}
	public function index()
	{
		$data['judul'] = 'MAHASISWA || HOME';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$this->load->view('mahasiswa/index');
		$this->load->view('mahasiswa/footer');
	}
	public function data_mahasiswa()
	{
		$data['judul'] = 'MAHASISWA || DATA MAHASISWA';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$id_register = $this->session->userdata('id_register');
		$data['id_register'] = $this->session->userdata('id_register');
		$data['npm'] = $this->session->userdata('npm');
		$data['nama'] = $this->session->userdata('nama');
		$data['email'] = $this->session->userdata('email');
		$data['fakultas'] = $this->session->userdata('fakultas');
		$data['jurusan'] = $this->session->userdata('jurusan');
		$data['tampil_register'] = $this->master->tampil_register($id_register);
		$data['tampil_detail_mahasiswa'] = $this->master->tampil_detail_mahasiswa($id_register);
		$data['tampil_gambar_mahasiswa'] = $this->master->tampil_gambar_mahasiswa($id_register);
		$data['cek_data_mahasiswa'] = $this->master->cek_data_mahasiswa($id_register);
		$this->load->view('mahasiswa/data_mahasiswa', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function simpan_gambar_mahasiswa()
	{
		$foto = $this->input->post('foto');
		$npm = $this->session->userdata('npm');
		$nama = $this->session->userdata('nama');
		$id_register = $this->session->userdata('id_register');
		$nmfile = $npm.$nama.time();
					$configfoto['upload_path'] = 'assets/images/';
					$configfoto['allowed_types'] = 'jpg|jpeg|gif|png';
					$configfoto['max_size'] = '100000';
					$configfoto['file_name'] = $nmfile;
					//$configfoto['width'] = 800; //RESIZE UKURAN GAMBAR
				    //$configfoto['height'] = 800;
					$this->load->library('upload');
					$this->upload->initialize($configfoto);
					if($_FILES['foto']['name']){
						if ($this->upload->do_upload('foto')) {
							$gbr = $this->upload->data();
							$gambarakhir = $gbr['file_name'];
							$data = array('gambar' => $gambarakhir);
							$jalan = $this->master->simpan_gambar_mahasiswa($data, $id_register);
							redirect(base_url('mahasiswa/data_mahasiswa'));
						}
						else {
    							$data['errors'] = array("error" => $this->upload->display_errors());
						}
					
					}
	}
	public function tambah_detail_mahasiswa($id_register)
	{
		$hobby = strtoupper($this->input->post('hobby'));
		$prestasi = strtoupper($this->input->post('prestasi'));
		$minat = strtoupper($this->input->post('minat'));
		$data = array('hobby' => $hobby,
						'id_register' => $id_register,
						'prestasi' => $prestasi,
						'minat' => $minat);
		$jalan = $this->master->tambah_detail_mahasiswa($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function ubah_detail_mahasiswa($id_register)
	{
		$hobby = strtoupper($this->input->post('hobby'));
		$prestasi = strtoupper($this->input->post('prestasi'));
		$minat = strtoupper($this->input->post('minat'));
		$data = array('hobby' => $hobby,
						'prestasi' => $prestasi,
						'minat' => $minat);
		$jalan = $this->master->ubah_detail_mahasiswa($data, $id_register);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA BERHASIL DI UBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA GAGAL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
		}
	}
	
	public function ubah_hobi($id_detail_mahasiswa)
	{
		$data['judul'] = 'MAHASISWA || UBAH';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$data['ubah_hobi'] = $this->master->ubah_hobi($id_detail_mahasiswa);
		$this->load->view('mahasiswa/ubah_hobi', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function simpan_hobi($id_detail_mahasiswa)
	{
		$hobby = strtoupper($this->input->post('hobby'));
		$prestasi = strtoupper($this->input->post('prestasi'));
		$minat = strtoupper($this->input->post('minat'));
		$data = array('hobby' => $hobby,
						'prestasi' => $prestasi,
						'minat' => $minat);
		$jalan = $this->master->simpan_hobi($data, $id_detail_mahasiswa);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA BERHASIL DI UBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
			}
		 else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DETAIL MAHASISWA GAGAL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function data_bagian()
	{
		$data['judul'] = 'MAHASISWA || MASTER BAGIAN /UKM';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$this->load->view('mahasiswa/data_bagian', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function data_soal()
	{
		$data['judul'] = 'MAHASISWA || MASTER SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$data['tampil_soal'] = $this->master->tampil_soal();
		$this->load->view('mahasiswa/data_soal', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function buka_soal($id_soal, $kode, $waktu)
	{
	    $id_register = $this->session->userdata('id_register');
		$cek_soal = $this->master->cek_soal($id_soal,$id_register);
		if($cek_soal >= 3){
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Anda Sudah Melebihi Batas Pengerjaan Soal',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/data_soal')."';	
			  } ,2100); 
			 </script>";
		}else{
		$data['judul'] = 'MAHASISWA || BUKA SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$data['id_soal'] = $id_soal;
		$data['kode'] = $kode;
		$data['waktu'] = $waktu;
		$data['id_register'] = $this->session->userdata('id_register');
		$data['tampil_detail_soal'] = $this->master->tampil_detail_soal($kode);
		$this->load->view('mahasiswa/buka_soal', $data);
		$this->load->view('mahasiswa/footer');
		}
	}
	public function simpan_jawaban($id_register, $id_soal, $kode)
	{
		$tanggal_nilai = date('20y-m-d H:i:s');
		$j = $this->input->post('jumlah');
		$jumlah = sizeof($j);
		$totalnilai = 0;
		for($j = 1; $j<= $jumlah; $j++){
			$jwb[] = $this->input->post('jawaban'.$j.'');
		}
		for( $i = 0 ; $i < $jumlah; $i++){
			$jawaban[$i] = $jwb[$i][0];
			$data[$i] = array('id_register' => $id_register,
								'id_soal' => $id_soal,
								'kode' => $kode,
								'no' => $i+1,
								'jawaban' => $jawaban[$i]);
								$this->master->tambah_jawaban($data[$i]);
								$per1jawaban = 100 / $jumlah;
								$no = $i+1;
								$cekbenar[$i] = $this->master->cek_nilai($kode,$no, $jawaban[$i]);
								if($cekbenar[$i] > 0){
									$arr_nilai[$i] = $per1jawaban;
								}else{
									$arr_nilai[$i] = 0;
								}
								$totalnilai = array_sum($arr_nilai);
		}
		$datax = array('id_register' => $id_register,
						'id_soal' => $id_soal,
						'kode' => $kode,
						'nilai' => $totalnilai,
						'tanggal_nilai' => $tanggal_nilai);
// 		echo '<pre>';
// 		var_dump($totalnilai);
// 		echo '</pre>';
// 		die;
		$jalan = $this->master->tambah_nilai($datax);
		$xxxx = $this->db->insert_id($jalan);
		redirect(base_url("/mahasiswa/data_soal"));
		
	}
	public function akun_mahasiswa()
	{
		$data['judul'] = 'MAHASISWA || BUKA SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$id_register = $this->session->userdata('id_register');
		$data['akun_mahasiswa'] = $this->master->akun_mahasiswa($id_register);
		$this->load->view('mahasiswa/akun_mahasiswa', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function hasil()
	{
		$data['judul'] = 'MAHASISWA || HASIL';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$id_register = $this->session->userdata('id_register');
		$data['tampil_hasil'] = $this->master->tampil_hasil_mahasiswa($id_register);
		$this->load->view('mahasiswa/hasil', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function tambahan_formulir($id_nilai)
	{
		$data['judul'] = 'MAHASISWA || TAMBAH FORMULIR';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$data['id_nilai'] = $id_nilai;
		$data['id_register'] = $this->session->userdata('id_register');
		$this->load->view('mahasiswa/tambahan_formulir', $data);
		$this->load->view('mahasiswa/footer');
	}
	public function cetak_hasil($id_nilai)
	{
		$data['alasan'] = $this->input->post('alasan');
		$data['moto'] = $this->input->post('moto');
		$id_register = $this->session->userdata('id_register');
		$data['mahasiswa_cetak_hasil'] = $this->master->mahasiswa_cetak_hasil($id_register);
		$data['cetak_hasil'] = $this->master->cetak_hasil($id_nilai);
		$this->load->view('mahasiswa/cetak_hasil', $data);
	}
	
	public function pengumumman()
	{
		$data['judul'] = 'MAHASISWA || PEMGUMUMMAN';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('mahasiswa/header', $data);
		$id_register = $this->session->userdata('id_register');
		$data['tampil_pengumuman'] = $this->master->tampil_hasil_pengumumman($id_register);
		$this->load->view('mahasiswa/pengumumman', $data);
		$this->load->view('mahasiswa/footer');
	}
}