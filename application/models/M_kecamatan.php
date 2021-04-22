<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kecamatan extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getLIstKecamatan(){
		$this->db->select("*");
		$this->db->from("kecamatan");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListKecamatanId($id){
		$this->db->select("*");
		$this->db->from("kecamatan");
		$this->db->where("id_kecamatan",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}