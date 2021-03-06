<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jarak extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_jarak');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/jarak/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_jarak->getLIstJarak();
		$data['v_content']  = 'member/jarak/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_jarak->getListJarakId($id);
		$data['v_content']  = 'member/jarak/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"value"		=> $post['value'],
			"id_umkm1"		=> $post['id_umkm1'],
			"id_umkm2"		=> $post['id_umkm2']
		);
		$insert = $this->db->insert("jarak",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/jarak/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/jarak/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
			$dataArray = array(
				"value"		=> $post['value'],
    			"id_umkm1"		=> $post['id_umkm1'],
    			"id_umkm2"		=> $post['id_umkm2']
			);
		
		$update = $this->db->update("jarak",$dataArray,array("id_jarak" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/jarak/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/jarak/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("jarak",array("id_jarak" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/jarak/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/jarak/daftar'); 
		}
	}
	
}
