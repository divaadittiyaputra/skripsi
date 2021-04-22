<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getLIstKategori(){
		$this->db->select("*");
		$this->db->from("kategori");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListKategoriId($id){
		$this->db->select("*");
		$this->db->from("kategori");
		$this->db->where("id_kategori",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}