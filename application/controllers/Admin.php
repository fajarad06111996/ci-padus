<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
	parent::__construct();
		// if($this->session->userdata('id_admin') == ""){
		// 	redirect(base_url('app/login'));
		// }
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
		$data['judul'] = 'ADMIN || HOME';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}
	public function data_mahasiswa()
	{
		$data['judul'] = 'ADMIN || DATA PENDAFTARAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_register'] = $this->master->tampil_register_admin();
		$this->load->view('admin/data_mahasiswa', $data);
		$this->load->view('admin/footer');
	}
	public function detail_mahasiswa($id_register)
	{
		$data['judul'] = 'ADMIN || DETAIL PENDAFTARAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['id_register'] = $id_register;
		$data['tampil_detail_mahasiswa'] = $this->master->tampil_detail_mahasiswa_admin($id_register);
		$data['tampil_gambar_mahasiswa'] = $this->master->tampil_gambar_mahasiswa($id_register);
		$this->load->view('admin/detail_mahasiswa', $data);
		$this->load->view('admin/footer');
	}
	public function hapus_mahasiswa($id_register)
	{
		$jalan = $this->master->hapus_mahasiswa($id_register);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA MAHASISA BERHASIL DI HAPUS',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_mahasiswa')."';	
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
				title: 'DATA MAHASISWA GAGAL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_mahasiswa')."';	
			  } ,2100); 
			 </script>";
		}
		
	}
	public function master_fakultas()
	{
		$data['judul'] = 'ADMIN || MASTER FAKULTAS';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_fakultas'] = $this->master->tampil_fakultas();
		$this->load->view('admin/master_fakultas', $data);
		$this->load->view('admin/footer');
	}
	public function edit_fakultas($id_fakultas)
	{
		$data['judul'] = 'ADMIN || MASTER FAKULTAS';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_fakultas'] = $this->master->edit_fakultas($id_fakultas);
		$this->load->view('admin/ubah_fakultas', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_fakultas()
	{
		$fakultas = strtoupper($this->input->post('fakultas'));
		$data = array('fakultas' => $fakultas);
		$jalan = $this->master->tambah_fakultas($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER FAKULTAS BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
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
				title: 'MASTER FAKULTAS GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_fakultas($id_fakultas)
	{
		$fakultas = strtoupper($this->input->post('fakultas'));
		$data = array('fakultas' => $fakultas);
		$jalan = $this->master->simpan_fakultas($data, $id_fakultas);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER FAKULTAS BERHASIL DI SIMPAN',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
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
				title: 'MASTER FAKULTAS GAGAL DI SIMPAN',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_fakultas($id_fakultas)
	{
		$jalan = $this->master->hapus_fakultas($id_fakultas);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER FAKULTAS BERHASIL DI HAPUS',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
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
				title: 'MASTER FAKULTAS GAGAL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_fakultas')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_jurusan()
	{
		$data['judul'] = 'ADMIN || MASTER JURUSAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_jurusan'] = $this->master->tampil_jurusan();
		$this->load->view('admin/master_jurusan', $data);
		$this->load->view('admin/footer');
	}
	public function edit_jurusan($id_jurusan)
	{
		$data['judul'] = 'ADMIN || EDIT MASTER JURUSAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_jurusan'] = $this->master->edit_jurusan($id_jurusan);
		$this->load->view('admin/edit_jurusan', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_jurusan()
	{
		$jurusan = strtoupper($this->input->post('jurusan'));
		$data = array('jurusan' => $jurusan);
		$jalan = $this->master->tambah_jurusan($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER JURUSAN BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
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
				title: 'MASTER JURUSAN GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_jurusan($id_jurusan)
	{
		$jurusan = strtoupper($this->input->post('jurusan'));
		$data = array('jurusan' => $jurusan);
		$jalan = $this->master->simpan_jurusan($data, $id_jurusan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER JURUSAN BERHASIL DI SIMPAN',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
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
				title: 'MASTER JURUSAN GAGAL DI SIMPAN',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_jurusan($id_jurusan)
	{
		$jalan = $this->master->hapus_jurusan($id_jurusan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER JURUSAN BERHASIL DI HAPUS',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
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
				title: 'MASTER JURUSAN GAGAL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_jurusan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function data_bagian()
	{
		$data['judul'] = 'ADMIN || MASTER BAGIAN /UKM';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$this->load->view('admin/data_bagian', $data);
		$this->load->view('admin/footer');
	}
	public function edit_bagian($id_ukm)
	{
		$data['judul'] = 'ADMIN || MASTER BAGIAN /UKM';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_bagian'] = $this->master->edit_bagian($id_ukm);
		$this->load->view('admin/edit_ukm', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_ukm()
	{
		$ukm = strtoupper($this->input->post('ukm'));
		$data = array('ukm' => $ukm);
		$jalan = $this->master->tambah_ukm($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA BAGIAN/UKM BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
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
				title: 'DATA BAGIAN/UKM GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_ukm($id_ukm)
	{
		$ukm = strtoupper($this->input->post('ukm'));
		$data = array('ukm' => $ukm);
		$jalan = $this->master->simpan_ukm($data, $id_ukm);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA BAGIAN/UKM BERHASIL DI UBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
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
				title: 'DATA BAGIAN/UKM GAGAL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_bagian($id_ukm)
	{
		$jalan = $this->master->hapus_bagian($id_ukm);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA BAGIAN/UKM BERHASIL DI HAPUS',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
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
				title: 'DATA BAGIAN/UKM GAGAL DI HAPUS',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_bagian')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_penempatan()
	{
		$data['judul'] = 'ADMIN || MASTER PENEMPATAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_penempatan'] = $this->master->tampil_penempatan();
		$this->load->view('admin/master_penempatan', $data);
		$this->load->view('admin/footer');
	}
	public function edit_penempatan($id_penempatan)
	{
		$data['judul'] = 'ADMIN || EDIT PENEMPATAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_penempatan'] = $this->master->edit_penempatan($id_penempatan);
		$this->load->view('admin/edit_penempatan', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_penempatan()
	{
		$penempatan = strtoupper($this->input->post('penempatan'));
		$data = array('penempatan' => $penempatan);
		$jalan = $this->master->tambah_penempatan($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER PENEMPATAN BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_penempatan')."';	
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
				title: 'MASTER PENEMPATAN GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_penempatan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_penempatan($id_penempatan)
	{
		$penempatan = strtoupper($this->input->post('penempatan'));
		$data = array('penempatan' => $penempatan);
		$jalan = $this->master->simpan_penempatan($data, $id_penempatan);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER PENEMPATAN BERHASIL DI UBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_penempatan')."';	
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
				title: 'MASTER PENEMPATAN GAGAL DI UBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_penempatan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function data_soal()
	{
		$data['judul'] = 'ADMIN || MASTER SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$data['tampil_soal'] = $this->master->tampil_soal();
		$this->load->view('admin/data_soal', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_soal()
	{
		function kode_acak($n = 6) {
     	$aKod = NULL;
     	$kode = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakAngka = rand(1, strlen($kode));
     		$aKod .= substr($kode, $acakAngka, 1);
  			}
  			return $aKod;
  		}
		
		function p1($n = 6) {
     	$aKod1 = NULL;
     	$kode1 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp1 = rand(1, strlen($kode1));
     		$aKod1 .= substr($kode1, $acakp1, 1);
  			}
  			return $aKod1;
  		}
		
		function p2($n = 6) {
     	$aKod2 = NULL;
     	$kode2 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp2 = rand(1, strlen($kode2));
     		$aKod2 .= substr($kode2, $acakp2, 1);
  			}
  			return $aKod2;
  		}
		
		function p3($n = 6) {
     	$aKod3 = NULL;
     	$kode3 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp3 = rand(1, strlen($kode3));
     		$aKod3 .= substr($kode3, $acakp3, 1);
  			}
  			return $aKod3;
  		}
		
		function p4($n = 6) {
     	$aKod4 = NULL;
     	$kode4 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp4 = rand(1, strlen($kode4));
     		$aKod4 .= substr($kode4, $acakp4, 1);
  			}
  			return $aKod4;
  		}
  
  			//memanggil fungsi
     	$kode = kode_acak($n = 6);
     	$p1 = p1($n = 6);
     	$p2 = p2($n = 6);
     	$p3 = p3($n = 6);
     	$p4 = p4($n = 6);
		$id_ukm = $this->input->post('id_ukm');
		$judul_soal = $this->input->post('judul_soal');
		$waktu = 60 * $this->input->post('waktu');
		$pertanyaan = $this->input->post('pertanyaan');
		$pilihan1 = $this->input->post('pilihan1');
		$pilihan2 = $this->input->post('pilihan2');
		$pilihan3 = $this->input->post('pilihan3');
		$pilihan4 = $this->input->post('pilihan4');
		$jawaban = $this->input->post('jawaban');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_akhir = $this->input->post('waktu_akhir');
		$tanggal = date('20y-m-d H:i:s');
		$jumlah = sizeof($pertanyaan);
		for( $i = 0; $i < $jumlah; $i++){ 
		$data[$i] = array('id_ukm' => $id_ukm,
							'waktu_mulai' => $waktu_mulai,
							'waktu_akhir' => $waktu_akhir,
							'kode' => $kode,
							'no' => $i + 1,
							'judul_soal' => $judul_soal,
							'waktu' => $waktu,
							'pertanyaan' => $pertanyaan[$i],
							'pilihan1' => $pilihan1[$i],
							'p1' => $i + $p1,
							'pilihan2' => $pilihan2[$i],
							'p2' => $i + $p2,
							'pilihan3' => $pilihan3[$i],
							'p3' => $i + $p3,
							'pilihan4' => $pilihan4[$i],
							'p4' => $i + $p4,
							'jawaban' => $jawaban[$i],
							'tanggal' => $tanggal);
		$jalan = $this->master->tambah_soal($data[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA SOAL BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_soal')."';	
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
				title: 'DATA SOAL GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_soal')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function penambahan_soal($kode)
	{
		function p1($n = 6) {
     	$aKod1 = NULL;
     	$kode1 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp1 = rand(1, strlen($kode1));
     		$aKod1 .= substr($kode1, $acakp1, 1);
  			}
  			return $aKod1;
  		}
		
		function p2($n = 6) {
     	$aKod2 = NULL;
     	$kode2 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp2 = rand(1, strlen($kode2));
     		$aKod2 .= substr($kode2, $acakp2, 1);
  			}
  			return $aKod2;
  		}
		
		function p3($n = 6) {
     	$aKod3 = NULL;
     	$kode3 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp3 = rand(1, strlen($kode3));
     		$aKod3 .= substr($kode3, $acakp3, 1);
  			}
  			return $aKod3;
  		}
		
		function p4($n = 6) {
     	$aKod4 = NULL;
     	$kode4 = "0123456789"; //jumlah kode = 63
  
  		for ($i=0; $i<$n; $i++) {
     		$acakp4 = rand(1, strlen($kode4));
     		$aKod4 .= substr($kode4, $acakp4, 1);
  			}
  			return $aKod4;
  		}
  
  			//memanggil fungsi
     	$kode = $kode;
     	$p1 = p1($n = 6);
     	$p2 = p2($n = 6);
     	$p3 = p3($n = 6);
     	$p4 = p4($n = 6);
		$id_ukm = $this->input->post('id_ukm');
		$judul_soal = $this->input->post('judul_soal');
		$pertanyaan = $this->input->post('pertanyaan');
		$pilihan1 = $this->input->post('pilihan1');
		$pilihan2 = $this->input->post('pilihan2');
		$pilihan3 = $this->input->post('pilihan3');
		$pilihan4 = $this->input->post('pilihan4');
		$jawaban = $this->input->post('jawaban');
		$tanggal = date('20y-m-d H:i:s');
		$no = $this->input->post('no');
		$jumlah = sizeof($pertanyaan);
		for( $i = 0; $i < $jumlah; $i++){ 
		$data[$i] = array('id_ukm' => $id_ukm,
							'kode' => $kode,
							'no' => $i + ($no + 1),
							'judul_soal' => $judul_soal,
							'pertanyaan' => $pertanyaan[$i],
							'pilihan1' => $pilihan1[$i],
							'p1' => $i + $p1,
							'pilihan2' => $pilihan2[$i],
							'p2' => $i + $p2,
							'pilihan3' => $pilihan3[$i],
							'p3' => $i + $p3,
							'pilihan4' => $pilihan4[$i],
							'p4' => $i + $p4,
							'jawaban' => $jawaban[$i],
							'tanggal' => $tanggal);
		$jalan = $this->master->tambah_soal($data[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA SOAL BERHASIL DI TAMBAH',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
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
				title: 'DATA SOAL GAGAL DI TAMBAH',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function buka_soal($kode)
	{
		$data['judul'] = 'ADMIN || BUKA SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['kode'] = $kode;
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$data['tampil_detail_soal'] = $this->master->tampil_detail_soal($kode);
		$this->load->view('admin/buka_soal', $data);
		$this->load->view('admin/footer');
	}
	public function edit_waktu_soal($kode)
	{
		$data['judul'] = 'ADMIN || EDIT WAKTU SOAL SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['kode'] = $kode;
		$data['tampil_ukm'] = $this->master->tampil_ukm();
		$data['edit_waktu_soal'] = $this->master->edit_waktu_soal($kode);
		$this->load->view('admin/edit_waktu_soal', $data);
		$this->load->view('admin/footer');
	}
	public function edit_soal($id_soal)
	{
		$data['judul'] = 'ADMIN || EDIT SOAL';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_soal'] = $this->master->edit_soal($id_soal);
		$this->load->view('admin/edit_soal', $data);
		$this->load->view('admin/footer');
	}
	public function simpan_soal($id_soal, $kode)
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$pilihan1 = $this->input->post('pilihan1');
		$pilihan2 = $this->input->post('pilihan2');
		$pilihan3 = $this->input->post('pilihan3');
		$pilihan4 = $this->input->post('pilihan4');
		$jawaban = $this->input->post('jawaban');
		$data = array('pertanyaan' => $pertanyaan,
						'pilihan1' => $pilihan1,
						'pilihan2' => $pilihan2,
						'pilihan3' => $pilihan3,
						'pilihan4' => $pilihan4,
						'jawaban' => $jawaban);
		$jalan = $this->master->simpan_soal($data, $id_soal);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Soal Berhasil Ubah',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
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
				title: 'Soal Gagal Ubah',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
			  } ,2100); 
			 </script>";
		}
	}public function simpan_waktu_soal($kode)
	{
		$waktu_mulai = $this->input->post('waktu_mulai');
		$waktu_akhir = $this->input->post('waktu_akhir');
		$data = array('waktu_mulai' => $waktu_mulai,
						'waktu_akhir' => $waktu_akhir);
		$jalan = $this->master->simpan_waktu_soal($data, $kode);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Waktu Berhasil Ubah',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/data_soal")."';	
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
				title: 'Waktu Gagal Ubah',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/data_soal")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_detail_soal($id_soal, $kode)
	{
		$jalan = $this->master->hapus_detail_soal($id_soal);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Soal Berhasil hapus',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
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
				title: 'Soal Gagal Hapus',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
			  } ,2100); 
			 </script>";
		}
	}public function hapus_soal($kode)
	{
		$jalan = $this->master->hapus_soal($kode);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Soal Berhasil hapus',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
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
				title: 'Soal Gagal Hapus',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url("admin/buka_soal/$kode")."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function input_data()
	{
		$data['judul'] = 'ADMIN || INPUT DATA';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/input_data');
		$this->load->view('admin/footer');
	}
	public function master_admin()
	{
		$data['judul'] = 'ADMIN || MASTER ADMIN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_admin'] = $this->master->tampil_admin();
		$this->load->view('admin/master_admin', $data);
		$this->load->view('admin/footer');
	}
	public function edit_admin($id_admin)
	{
		$data['judul'] = 'ADMIN || MASTER ADMIN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['edit_admin'] = $this->master->edit_admin($id_admin);
		$this->load->view('admin/edit_admin', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_admin()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$password = $this->input->post('password');
		$data = array('nik' => $nik,
						'nama' => $nama,
						'telepon' => $telepon,
						'password' => $password);
		$jalan = $this->master->tambah_admin($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
					title: 'Admin Berhasil Di Tambah',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
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
				title: 'Admin Gagal Di Tambah',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function simpan_admin($id_admin)
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$password = $this->input->post('password');
		$data = array('nik' => $nik,
						'nama' => $nama,
						'telepon' => $telepon,
						'password' => $password);
		$jalan = $this->master->simpan_admin($data, $id_admin);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
					title: 'Admin Berhasil Di Hapus',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
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
				title: 'Admin Gagal Di Hapus',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hapus_admin($id_admin)
	{
		$jalan = $this->master->hapus_admin($id_admin);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
					title: 'Admin Berhasil Di Hapus',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
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
				title: 'Admin Gagal Di Hapus',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_admin')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function hasil()
	{
		$data['judul'] = 'ADMIN || HASIL';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_hasil_admin'] = $this->master->tampil_hasil_admin();
		$this->load->view('admin/hasil', $data);
		$this->load->view('admin/footer');
	}
	public function data_penempatan()
	{
		$data['judul'] = 'ADMIN || DATA PENEMPATAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['view_mahasiswa_seleksi'] = $this->master->view_mahasiswa_seleksi();
		$this->load->view('admin/data_penempatan', $data);
		$this->load->view('admin/footer');
	}
	public function lihat_detail_seleksi($id_register, $kode)
	{
		$data['judul'] = 'ADMIN || DETAIL SELEKSI';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['id_register'] = $id_register;
		$data['tampil_detail_mahasiswa'] = $this->master->tampil_detail_mahasiswa_admin($id_register);
		$data['lihat_hasil_seleksi'] = $this->master->lihat_hasil_seleksi($id_register, $kode);
		$data['tampil_penempatan'] = $this->master->tampil_penempatan();
		$data['tampil_suara'] = $this->master->tampil_suara();
		$data['cek_penempatan_mahasiswa'] = $this->master->cek_penempatan_mahasiswa($id_register);
		$data['tampil_penempatan_mahasiswa'] = $this->master->tampil_penempatan_mahasiswa($id_register);
		$this->load->view('admin/lihat_detail_seleksi', $data);
		$this->load->view('admin/footer');
	}
	public function ubah_seleksi_penempatan($id_register, $kode)
	{
		$data['judul'] = 'ADMIN || DETAIL SELEKSI';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['id_register'] = $id_register;
		$data['tampil_detail_mahasiswa'] = $this->master->tampil_detail_mahasiswa_admin($id_register);
		$data['lihat_hasil_seleksi'] = $this->master->lihat_hasil_seleksi($id_register, $kode);
		$data['tampil_penempatan'] = $this->master->tampil_penempatan();
		$data['tampil_suara'] = $this->master->tampil_suara();
		$data['cek_penempatan_mahasiswa'] = $this->master->cek_penempatan_mahasiswa($id_register);
		$data['tampil_penempatan_mahasiswa'] = $this->master->tampil_penempatan_mahasiswa($id_register);
		$this->load->view('admin/ubah_seleksi_penempatan', $data);
		$this->load->view('admin/footer');
	}
	public function data_keaktifan()
	{
		$data['judul'] = 'ADMIN || DATA KEAKTIFAN';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_register'] = $this->master->tampil_register_admin();
		$data['tampil_keaktifan'] = $this->master->tampil_keaktifan();
		$this->load->view('admin/data_keaktifan', $data);
		$this->load->view('admin/footer');
	}
	public function laporan_keaktifan()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$data['laporan_keaktifan'] = $this->master->laporan_keaktifan($dari, $sampai);
		$this->load->view('admin/laporan_keaktifan', $data);
	}
	public function tambah_keaktifan()
	{
		$id_register = $this->input->post('id_register');
		$kegiatan = $this->input->post('kegiatan');
		$tanggal_kegiatan = $this->input->post('tanggal_kegiatan');
		$jumlah = sizeof($id_register);
		for( $i = 0; $i < $jumlah; $i++){ 
		$data[$i] = array('id_register' => $id_register[$i],
						'kegiatan' => $kegiatan,
						'tanggal_kegiatan' => $tanggal_kegiatan);
		$jalan = $this->master->tambah_keaktifan($data[$i]);
		}
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA KEAKTIFAN BERHASIL DI TAMBAH',
				text: 'KEGIATAN : ".$kegiatan."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_keaktifan')."';	
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
				title: 'DATA KEAKTIFAN GAGAL DI TAMBAH',
				text: 'KEGIATAN : ".$kegiatan."',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_keaktifan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_penempatan_mahasiswa($id_register)
	{
		$id_penempatan = $this->input->post('id_penempatan');
		$id_register = $id_register;
		$hasil = $this->input->post('hasil');
		$data = array('id_penempatan' => $id_penempatan,
						'id_register' => $id_register);
		$datax = array('hasil' => $hasil);
		$jalan = $this->master->tambah_penempatan_mahasiswa($data);
		$run = $this->master->ubah_nilai($datax, $id_register);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA PENEMPATAN BERHASIL DI SIMPAN',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_penempatan')."';	
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
				title: 'DATA PENEMPATAN GAGAL DI SIMPAN',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_penempatan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function ubah_penempatan_mahasiswa($id_register)
	{
		$id_penempatan = $this->input->post('id_penempatan');
		$hasil = $this->input->post('hasil');
		//$id_register = $id_register;
		$data = array('id_penempatan' => $id_penempatan);
		$datax = array('hasil' => $hasil);
		$jalan = $this->master->ubah_penempatan_mahasiswa($data, $id_register);
		$run = $this->master->ubah_nilai($datax, $id_register);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'DATA PENEMPATAN BERHASIL DI UBAH',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_penempatan')."';	
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
				title: 'DATA PENEMPATAN GAGAL DI UBAH',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/data_penempatan')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function master_suara()
	{
		$data['judul'] = 'ADMIN || MASTER SUARA';
		$data['nama'] = $this->session->userdata('nama');
		$data['nik'] = $this->session->userdata('nik');
		$data['id_admin'] = $this->session->userdata('id_admin');
		$this->load->view('admin/header', $data);
		$data['tampil_suara'] = $this->master->tampil_suara();
		$this->load->view('admin/master_suara', $data);
		$this->load->view('admin/footer');
	}
	public function tambah_jenissuara()
	{
		$jenis_suara = strtoupper($this->input->post('jenis_suara'));
		$data = array('jenis_suara' => $jenis_suara);
		$jalan = $this->master->tambah_jenissuara($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'MASTER SUARA BERHASIL DI TAMBAH ',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_suara')."';	
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
				title: 'MASTER SUARA GAGAL DI TAMBAH',
				text: 'tes',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_suara')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function tambah_tes()
	{
		$id = $this->input->post('id');
		$tes1 = $this->input->post('tes1');
		$tes2 = $this->input->post('tes2');
		$data = array('id' => $id,
						'tes1' => $tes1,
						'tes2' => $tes2);
		$jalan = $this->master->tambah_tes($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Data Berhasil ',
				text: 'tes',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
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
				title: 'Data Gagal',
				text: 'tes',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/master_vendor')."';	
			  } ,2100); 
			 </script>";
		}
	}
}