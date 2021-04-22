<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengunjung extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_pengunjung');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/pengunjung/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_pengunjung->getPengunjung();
		$data['v_content']  = 'member/pengunjung/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_pengunjung->getListPengunjungId($id);
		$data['v_content']  = 'member/pengunjung/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama_pelanggan"	=> $post['nama'],
			"alamat"			=> $post['alamat'],
			"no_telp"			=> $post['no_telp'],
			"koordinat"			=> $post['koordinat']
		);
		$insert = $this->db->insert("pelanggan",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/pengunjung/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/pengunjung/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama_pelanggan"	=> $post['nama'],
			"alamat"			=> $post['alamat'],
			"no_telp"			=> $post['no_telp'],
			"koordinat"			=> $post['koordinat']
		);
		
		$update = $this->db->update("pelanggan",$dataArray,array("id_pelanggan" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/pengunjung/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/pengunjung/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("pelanggan",array("id_pelanggan" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/pengunjung/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/pengunjung/daftar'); 
		}
	}
	
}
