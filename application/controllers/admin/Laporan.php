<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('m_transaksi');
    }

    public function wizard(){
        $data['userLogin'] = $this->session->userdata('loginData');
        $data['v_content'] = 'member/laporan/wizard';
        $this->load->view('member/layout', $data);

    }
	
	public function daftar($id){
        $data['userLogin'] = $this->session->userdata('loginData');
		$post = $this->input->post();
		$data['listData'] = $this->m_transaksi->getAllTransaksiLaporan($post['txtTgl1'],$post['txtTgl2']);
		$data['tgl1'] = $post['txtTgl1'];
		$data['tgl2'] = $post['txtTgl2'];
		if($id=="transaksi"){
			$this->load->view('member/laporan/transaksi', $data);
		}else{
			$this->load->view('member/laporan/slip', $data);
		}

    }
	
	
	
}