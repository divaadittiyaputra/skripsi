<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengunjung extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getPengunjung(){
		$this->db->select("*");
		$this->db->from("pelanggan");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListPengunjungId($id){
		$this->db->select("*");
		$this->db->from("pelanggan");
		$this->db->where("id_pelanggan",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}