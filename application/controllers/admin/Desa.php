<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desa extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_desa');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/desa/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_desa->getLIstDesa();
		$data['v_content']  = 'member/desa/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_desa->getListDesaId($id);
		$data['v_content']  = 'member/desa/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama_desa"		=> $post['nama_desa'],
			"id_kecamatan"		=> $post['id_kecamatan']
		);
		$insert = $this->db->insert("desa",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/desa/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/desa/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
			$dataArray = array(
				"nama_desa"		=> $post['nama_desa'],
				"id_kecamatan"		=> $post['id_kecamatan']
			);
		
		$update = $this->db->update("desa",$dataArray,array("id_desa" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/desa/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/desa/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("desa",array("id_desa" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/desa/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/desa/daftar'); 
		}
	}
	
}
