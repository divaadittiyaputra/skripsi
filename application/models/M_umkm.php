<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_umkm extends CI_Model {
 
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	//alasan kenapa data tidak ada yg relasi karena data hanya di joinkan ke tabel lain
	public function getLIstUmkm(){
	    $latitude           = $this->input->post('lat');
	    $longitude          = $this->input->post('lon');
	    
		$this->db->select("u.*, k.namaKategori, p.nama, kec.*, des.*, round(( 3959 * acos( least(1.0,  
                                cos( radians(".$latitude.") ) 
                                * cos( radians(u.lat) ) 
                                * cos( radians(u.long) - radians(".$longitude.") ) 
                                + sin( radians(".$latitude.") ) 
                                * sin( radians(u.lat) 
                              ) ) ) 
                            ), 1) as distance");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("pemilik as p","u.id_pemilik = p.id_pemilik");
		$this->db->join("kecamatan as kec","kec.id_kecamatan = u.id_kecamatan", 'left');
		$this->db->join("desa as des","des.id_desa = u.id_desa", 'left');
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getLIstUmkmAll(){ 
	    
		$this->db->select("u.*, k.namaKategori, p.nama, kec.*, des.* ");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("pemilik as p","u.id_pemilik = p.id_pemilik");
		$this->db->join("kecamatan as kec","kec.id_kecamatan = u.id_kecamatan", 'left');
		$this->db->join("desa as des","des.id_desa = u.id_desa", 'left');
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getListUmkmId($id){
		$this->db->select("*");
		$this->db->from("umkm");
		$this->db->where("id_umkm",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getPemilik(){
		$this->db->select("*");
		$this->db->from("pemilik");
		$this->db->order_by("nama ASC");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getLIstUmkmPemilik($nama){
		$this->db->select("*");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("pemilik as p","u.id_pemilik = p.id_pemilik");
		$this->db->where("p.nama",$nama);
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getLIstUmkmPemilikById($id){
		$this->db->select("*");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("detailProduk as dp","u.id_umkm = dp.id_produk");
		$this->db->where("dp.id_detailProduk",$id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}
	
	public function getDetailProduk($id){
		$this->db->select("*");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("detailProduk as dp","u.id_umkm = dp.id_produk");
		$this->db->where("u.id_umkm",$id);
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}

}