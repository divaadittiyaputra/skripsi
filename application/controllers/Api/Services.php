<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Services extends CI_Controller {
	private $signature; 
	function __construct() {
		parent::__construct ();
		
		$uri = $this->uri->segment(1);
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper ( array (
				'url',
				'form',
				'language' 
		) );
		$this->load->model ( array (
									'm_api',
									'm_login',
									'M_kategori',
									) 
							);
	}
	
	function index() {
		header ( "location: " . base_url () );
		die ();
	}
		
	function login(){
		$dataArray = array ( 
				'pic' => 'Rizky Muhammad' 
		);
	
		$param = array(
				'username' =>  $this->input->post('username'),
				'password' =>  $this->input->post('password'),
				
		);
		
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$data = $this->m_login->checkLoginApps($param['username'], $param['password']); 
			
			if($data){
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Login berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );
			}else{
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Username atau password salah";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	////-----------------------REGISTER PENGGUNA------------------------------/////////////
	function register(){
		$dataArray = array ( 
				'pic' => 'Rizky Muhammad' 
		);
		$param = array(
				'nama_member'		=>  $this->input->post('nama_member'),
				'no_telp'			=>  $this->input->post('no_telp'),
				'alamat'			=>  $this->input->post('alamat'),
				'username'			=>  $this->input->post('username'),
				'password'			=>  $this->input->post('password'),
				'id_kota'			=>  $this->input->post('id_kota'),
				'id_provinsi'		=>  $this->input->post('id_provinsi'),

		);
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			$cek_username = $this->db->query("select * from member where username = '".$param['username']."'")->num_rows();
			
			if($cek_username == 0){
				$dataPengguna = array(
					'nama_member'		=> $param['nama_member'],
					'no_telp'			=> $param['no_telp'],
					'alamat'			=> $param['alamat'],
					'username'			=> $param['username'],
					'password'			=> $param['password'],
					'id_kota'			=> $param['id_kota'],
					'id_provinsi'		=> $param['id_provinsi'],
				);
				$insert = $this->db->insert('member',$dataPengguna);
				
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Register berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );  
			}else {
				$dataArray ['results']['status_request'] = "NOT_OK";
				$dataArray ['results']['msg'] = "Register gagal, username sudah terpakai";
				$dataArray ['results']['profile'] = array();
				$this->m_api->sendOutput( $dataArray, 200 ); 
			}
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
	
	function kategoriUMKM(){
		$dataArray = array ( 
				'pic' => 'Rizky Muhammad' 
		);
		$data = $this->M_kategori->getLIstKategori(); 
		
		if($data){
			$dataArray ['results']['status_request'] = "OK";
			$dataArray ['results']['msg'] = "Data Available";
			$dataArray ['results']['profile'] = (array) $data;
			$this->m_api->sendOutput( $dataArray, 200 );
		}else{
			$dataArray ['results']['status_request'] = "NOT_OK";
			$dataArray ['results']['msg'] = "Something went wrong";
			$dataArray ['results']['profile'] = array();
			$this->m_api->sendOutput( $dataArray, 200 ); 
		}
	}
	
	function cariUMKM(){
		$dataArray = array ( 
				'pic' => 'Rizky Muhammad' 
		);
		$param = array(
				'address'			=>  $this->input->post('address'),
				'lat'				=>  $this->input->post('lat'),
				'lng'				=>  $this->input->post('lng'),
				'id_kategori'		=>  $this->input->post('id_kategori'),
		);
		$check_require = $this->m_api->requireValidation( $param );
		if ($check_require ['status'] == true) {
			
				$dataPengguna = array(
					'address'			=> $param['address'],
					'lat'				=> $param['lat'],
					'lng'				=> $param['lng'],
					'id_kategori'		=> $param['id_kategori'],
				);
				$insert = $this->db->insert('member',$dataPengguna);
				
				$dataArray ['results']['status_request'] = "OK";
				$dataArray ['results']['msg'] = "Register berhasil";
				$dataArray ['results']['profile'] = (array) $data;
				$this->m_api->sendOutput( $dataArray, 200 );  
			
		} else {
			$this->m_api->sendOutput ( $dataArray, 402 ); 
		}
	}
}