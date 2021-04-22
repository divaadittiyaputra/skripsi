<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_umum');
    }


    public function index()
	{
		// $data['listRemaining'] = $this->M_barang->remainingBarangHabis()->result();
		// die(var_dump($data['listRemaining']));
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'user_member/dashboard/content';
		$this->load->view('user_member/layout',$data);
	}
    
	function decryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return( $qDecoded );
	}
       
}
