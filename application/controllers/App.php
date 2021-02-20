<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('master'); //meload master model	
		date_default_timezone_set("Asia/Jakarta");// set timezone jekardah
		// if($this->session->userdata('id_siswa')==null){
			// redirect(base_url());
		// }
		//$this->load->library('googlemaps');
		
	}
	public function index()
	{
		$this->load->view('login/login');
	}
	public function register_mahasiswa()
	{
		$npm = $this->input->post('npm');
		$nama = strtoupper($this->input->post('nama'));
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$id_fakultas = $this->input->post('id_fakultas');
		$id_jurusan = $this->input->post('id_jurusan');
		$data = array('npm' => $npm,
						'nama' => $nama,
						'email' => $email,
						'password' => $password,
						'id_fakultas' => $id_fakultas,
						'id_jurusan' => $id_jurusan);
		$jalan = $this->master->register_mahasiswa($data);
		if($jalan)
		{
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/sweetalert/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'REGISTER MAHASISWA BERHASIL',
				text: '',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/login')."';	
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
				title: 'REGISTER MAHASISWA GAGAL',
				text: '',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/index')."';	
			  } ,2100); 
			 </script>";
		}
	}
	public function login()
	{
		
		$data['tampil_fakultas'] = $this->master->tampil_fakultas();
		$data['tampil_jurusan'] = $this->master->tampil_jurusan();
		$this->load->view('login/register', $data);
	}

	public function loginmahasiswa()
	{
		$npm = $this->input->post('npm');
		$password = $this->input->post('password');
		//$md5 = md5($password);
		$data = array('npm' => $npm,
						'password' => $password);
		$jalan = $this->master->loginmahasiswa($data);
		if($jalan->num_rows() > 0)
		{
			$data['akun'] = $this->master->dataloginmahasiswa($npm);
			foreach($data['akun'] as $akun){
				//session_start();
				$sesi['id_register'] = $akun->id_register;
				$sesi['npm'] = $npm;
				$sesi['nama'] = $akun->nama;
				$sesi['fakultas'] = $akun->fakultas;
				$sesi['id_fakultas'] = $akun->id_fakultas;
				$sesi['email'] = $akun->email;
				$sesi['jurusan'] = $akun->jurusan;
				$sesi['id_jurusan'] = $akun->id_jurusan;
				$this->session->set_userdata($sesi);
				//var_dump($akun->bagian);
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Sukses',
				text: '	UNIT KEGIATAN MAHASISWA',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('mahasiswa/index')."';	
			  } ,2100); 
			 </script>";
			}
		} else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Gagal Ke UKM',
				text: 'Periksa NPM dan Password Anda Kembali',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/login')."';	
			  } ,2100); 
			 </script>";
		}
	}
	
	public function login_admin()
	{
		$this->load->view('login/login_admin');
	}
	
	public function loginadmin()
	{
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');
		//$md5 = md5($password);
		$data = array('nik' => $nik,
						'password' => $password);
		$jalan = $this->master->loginadmin($data);
		if($jalan->num_rows() > 0)
		{
			$data['akun'] = $this->master->dataloginadmin($nik);
			foreach($data['akun'] as $akun){
				//session_start();
				$sesi['id_admin'] 	= $akun->id_admin;
				$sesi['nik'] 		= $nik;
				$sesi['password']	= $password;
				$sesi['nama'] 		= $akun->nama;
				$sesi['telepon'] 	= $akun->telepon;
				$this->session->set_userdata($sesi);
				//var_dump($akun->bagian);
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Sukses',
				text: '	UNIT KEGIATAN MAHASISWA".$nik."',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('admin/index')."';	
			  } ,2100); 
			 </script>";
			}
		} else {
			echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: 'Login Gagal Ke UKM',
				text: 'Periksa NIK dan Password Anda Kembali',
				type: 'error',
				timer: 10000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/login_admin')."';	
			  } ,2100); 
			 </script>";
		}
	}
    public function logout()
	{
		$this->session->unset_userdata('npm');
		session_destroy();
		echo "
			<link href='".base_url()."/assets/sweetalert/sweetalert.css' rel='stylesheet' />
			<script src='".base_url()."/assets/bsb/plugins/jquery/jquery.min.js'></script>
			<script src='".base_url()."/assets/sweetalert/sweetalert.min.js'></script>
			 <script type='text/javascript'>
			  setTimeout(function () {  
			   swal({
				title: ' Berhasil Keluar !',
				text: 'UNIT KEGIATAN MAHASISWA',
				type: 'success',
				timer: 4000,
				showConfirmButton: false
			   });  
			  },10); 
			  window.setTimeout(function(){ 
			  window.location.href='".base_url('app/login')."';	
			  } ,2100); 
			 </script>";
	}
	
}
