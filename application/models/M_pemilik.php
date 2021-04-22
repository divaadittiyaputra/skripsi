<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilik extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getPemilik(){
		$this->db->select("*");
		$this->db->from("pemilik");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListPemilikId($id){
		$this->db->select("*");
		$this->db->from("pemilik");
		$this->db->where("id_pemilik",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}