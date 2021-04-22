<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_kecamatan');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/kecamatan/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_kecamatan->getLIstKecamatan();
		$data['v_content']  = 'member/kecamatan/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_kecamatan->getListKecamatanId($id);
		$data['v_content']  = 'member/kecamatan/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama_kecamatan"		=> $post['nama_kecamatan'],
		);
		$insert = $this->db->insert("kecamatan",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/kecamatan/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/kecamatan/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
			$dataArray = array(
				"nama_kecamatan"		=> $post['nama_kecamatan'],
			);
		
		$update = $this->db->update("kecamatan",$dataArray,array("id_kecamatan" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/kecamatan/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/kecamatan/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("kecamatan",array("id_kecamatan" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/kecamatan/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/kecamatan/daftar'); 
		}
	}
	
}
