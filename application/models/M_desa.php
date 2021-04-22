<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_desa extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getLIstDesa(){
		$this->db->select("desa.*, kecamatan.*");
		$this->db->from("desa");
		$this->db->join('kecamatan', 'kecamatan.id_kecamatan = desa.id_kecamatan', 'left');
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListDesaId($id){
		$this->db->select("*");
		$this->db->from("desa");
		$this->db->where("id_desa",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}