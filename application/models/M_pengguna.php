<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getPengguna(){
		$this->db->select("*");
		$this->db->from("pengguna");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListPenggunaId($id){
		$this->db->select("*");
		$this->db->from("pengguna");
		$this->db->where("id_pengguna",$id);
		$this->db->join("level as l","u.id_level = k.id_level");
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}