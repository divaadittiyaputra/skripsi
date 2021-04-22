<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_umkm');
     
    }
    
    public function list_umkm(){
         
	    $data['list_umkm']  =$this->M_umkm->getLIstUmkm();
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
        
    }

  
//     public function register(){
        
// 		$post = $this->input->post();
	 
 
// 		$data['nama'] 				= $this->input->post('nama');
// 		$data['email'] 				= escape($this->input->post('email'));
// 		$data['password'] 			= md5($post['password']);
// 		$data['tgl_registrasi']	    = date("Y-m-d");
//         $data['foto'] 				= null;
//         $data['no_hp'] 				= $this->input->post('no_hp');

        
//             // INSERT NEW
//         $input = $this->db->insert('member', $data); 
       
//         if($input){     
//             $info =  'success';
//         }else{
//             $info =  'failed';
//         }
        
//         //print_r($data);
       
//         $arr = array();
//         $arr['status'] =$info; 
//         $arr['result'] = $data;
//          echo json_encode($arr);
        
//     }
    
//     public function edit_profile(){
        
// 		$post = $this->input->post();
	    
// 	    $id         = $this->input->post('id_member');
 
// 		$data['nama'] 				= $this->input->post('nama');
// 		$data['email'] 				= escape($this->input->post('email'));
		
// 		if ($post['password'] <> "") {
// 			$data['password'] = md5($post['password']);
// 		} 
 
//         $data['foto'] 				= $this->input->post('foto');
//         $data['no_hp'] 				= $this->input->post('no_hp');
        
//             // INSERT NEW
//         $this->member_model->update($id,$data);
                 
       
          
//             $info =  'success';
         
        
//         //print_r($data);
       
//         $arr = array();
//         $arr['status'] =$info; 
//         $arr['result'] = $data;
//          echo json_encode($arr);
        
//     }
    
//      public function login(){
        
// 		$post = $this->input->post();
	 
  
// 		$email 				= escape($this->input->post('email'));
// 		$password			= md5($post['password']); 
        
//         if($email != "" && $password!=""){
//         $this->db->select('*');
//         $this->db->from('member');
//         $this->db->where('email', $email);
//         $this->db->where('password', $password);
//         $query = $this->db->get();
        
       
        
//         $dataArr = array();
//         if($query->num_rows()>0){
            
            
// 			$querycheck = $query->result();
// 			$dataArr = array(	'jenis'			=> 'member',
// 								'id_pengguna' 	=> $querycheck[0]->id_member,
// 								'logged_in' 	=> TRUE);
// 		    $info =  'success';   
//         }else{
// 		    $info =  'failed';
//         }
//         }else{
//              $info =  'failed';
//         }
       
        
        
//         //print_r($data);
       
//         $arr = array();
//         $arr['status'] =$info; 
//         $arr['result'] = $dataArr;
//         echo json_encode($arr);
        
//     }
    
    
//     public function list_iklan(){
        
// 	     $data['list_iklan'] 		= $this->iklan_model->get_all();
         
       
//         $arr = array();
//         $arr['status'] = "sukses"; 
//         $arr['result'] = $data;
//         echo json_encode($arr);
        
//     }
    
//      public function list_iklan_populer(){
        
// 	    $data['list_iklan_populer'] 		= $this->iklan_model->getPropertyPopuler();

//         $arr = array();
//         $arr['status'] = "sukses"; 
//         $arr['result'] = $data;
//         echo json_encode($arr);
        
//     }
    
//      public function detail_iklan(){
//         $post = $this->input->post();
// 		$id 				= $this->input->post('id');
// 	     $data['detail_iklan'] 		= $this->iklan_model->getIklanByIdIklan($id);

//         $arr = array();
//         $arr['status'] = "sukses"; 
//         $arr['result'] = $data;
//         echo json_encode($arr);
        
//     }
	
//     public function delete($id){
//         $this->member_model->delete($id);
//         redirect(site_url('member'));
//     }
  
}
