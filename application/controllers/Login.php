<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_login');
        
    }
	
	public function index()
	{
        $data['project_name'] = "PENCARIAN RUTE TERDEKAT PELAKU USAHA MIKRO, KECIL DAN MENENGAH DI KABUPATEN MALANG DENGAN MENGGUNAKAN METODE FLOYD WARSHALL";
        $data['established'] ="2020";
        $this->load->view('member/login',$data);
	}
		
	public function doLogin() {
        $dataPost = $this->input->post();
        if ($this->M_login->checkLogin($dataPost['Username'], $dataPost['Password'])) {
            redirect('admin/dashboard');  
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('login');
        }
    }
	
    function logout() {
        $this->session->unset_userdata('loginData');
        redirect('login');
    }
       
}
