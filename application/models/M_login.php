<?php

class M_login extends CI_Model {

    function checkLogin($username,$password){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->row();
			$dataArr = array(
				'UserID'    	=> $querycheck->id_pengguna,
				'Username'  	=> $querycheck->username,
				'NamaUser'  	=> $querycheck->namaPengguna,
				'lvlUser'		=> $querycheck->id_level,
				'project_name' 	=> 'Sistem Pencarian Rute Terdekat Menuju Pelaku Usaha UMKM',
				'copyright' 	=> '&copy; 2020'
			);
			$this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
    }
	
	function checkLoginPemilik($username,$password){
        $this->db->select('*');
        $this->db->from('pemilik');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->row();
			$dataArr = array(
				'UserID'    	=> $querycheck->id_pemilik,
				'Username'  	=> $querycheck->username,
				'NamaUser'  	=> $querycheck->namaPengguna,
				'lvlUser'		=> $querycheck->id_level,
				'project_name' 	=> 'Cari UMKM Terdekat',
				'copyright' 	=> '&copy; 2018'
			);
			$this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
    }
	
	function checkLoginMember($username,$password){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->row();
			$dataArr = array(
				'UserID'    	=> $querycheck->id_member,
				'Username'  	=> $querycheck->username,
				'NamaUser'  	=> $querycheck->namaPengguna,
				'project_name' 	=> 'Cari UMKM Terdekat',
				'copyright' 	=> '&copy; 2018'
			);
			$this->session->set_userdata('loginData',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }  
    }
	
	public function checkLoginApps($username,$password){
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	
}
