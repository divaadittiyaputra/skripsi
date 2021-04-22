<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_kategori');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/kategori/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_kategori->getLIstKategori();
		$data['v_content']  = 'member/kategori/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_kategori->getListKategoriId($id);
		$data['v_content']  = 'member/kategori/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"namaKategori"		=> $post['kategori'],
		);
		$insert = $this->db->insert("kategori",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/kategori/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/kategori/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
			$dataArray = array(
				"namaKategori"		=> $post['kategori'],
			);
		
		$update = $this->db->update("kategori",$dataArray,array("id_kategori" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/kategori/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/kategori/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("kategori",array("id_kategori" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/kategori/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/kategori/daftar'); 
		}
	}
	
}
