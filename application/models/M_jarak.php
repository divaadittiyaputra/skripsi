<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jarak extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	public function getLIstJarak(){
		$this->db->select("jarak.*, umkm1.nama_umkm as umkm1, umkm2.nama_umkm as umkm2");
		$this->db->from("jarak");
		$this->db->join('umkm as umkm1', 'umkm1.id_umkm = jarak.id_umkm1', 'left');
		$this->db->join('umkm as umkm2', 'umkm2.id_umkm = jarak.id_umkm2', 'left');
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListJarakId($id){
		$this->db->select("*");
		$this->db->from("jarak");
		$this->db->where("id_jarak",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

}