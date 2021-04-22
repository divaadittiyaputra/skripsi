<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_member extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_login');
    }
	
	public function index()
	{
        $data['project_name'] = "APLIKASI PENCARIAN LOKASI UMKM TERDEKAT BERBASIS ANDROID DENGAN MENGGUNAKAN ALGORITMA DJIKTRA";
        $data['established'] = "2018";
        $this->load->view('user_member/Login',$data);
	}
		
	public function doLogin() {
        $dataPost = $this->input->post();
        if ($this->M_login->checkLoginMember($dataPost['Username'], $dataPost['Password'])) {
            redirect('user_member/dashboard');  
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('user_member/login_member');
        }
    }
	
    function logout() {
        $this->session->unset_userdata('loginData');
        redirect('user_member/login_member/');
    }
	
	public function register() {
        $post 		= $this->input->post();
		$cek_username	= $this->db->query("select * from member where username = '".$post['username']."'")->num_rows();
        if ($cek_username == 0) {
			$dataSimpan	= array(
				'nama_member'		=> $post['nama_member'],
				'no_telp'			=> $post['no_telp'],
				'alamat'			=> $post['alamat'],
				'username'			=> $post['username'],
				'password'			=> md5($post['password']),
			);
			$insert	= $this->db->insert("member",$dataSimpan);
			if($insert){
				$this->session->set_flashdata("RegisterBerhasil","Ya");
				redirect('user_member/login_member/');
			}else{
				$this->session->set_flashdata("RegisterGagal","Ya");
				redirect('user_member/login_member/');
			}
            
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('user_member/login_member');
        }
    }
       
}
