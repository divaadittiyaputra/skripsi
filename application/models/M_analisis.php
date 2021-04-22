<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_analisis extends CI_Model {
 
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
	
	public function getLIstHasilUmkm(){
		$this->db->select("*");
		$this->db->from("umkm");
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
	
	function getUmkm($where = ""){
		if ($where <> "") {
            $where = " WHERE ".$where;
        }
        $sql = "SELECT *
				FROM
					umkm as um
				INNER JOIN kategori AS kt ON kt.id_kategori = um.id_kategori
				INNER JOIN pemilik AS pm ON pm.id_pemilik = um.id_pemilik
				".$where."";
		
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    function getumkmwdistance($id_kategori, $lat, $long){
    	$sql = "
    		SELECT 
    		*,
    		(
    		6371 * acos (
    		cos ( radians(".$lat.") )
			      * cos( radians( lat ) )
			      * cos( radians( `long` ) - radians(".$long.") )
    		+ sin ( radians(".$lat.") )
			      * sin( radians( lat ) )
    		)
    		) AS distance
    		FROM 
    			umkm AS um
    		WHERE um.id_kategori = ".$id_kategori."
    		AND um.koordinat <> ''
    		ORDER BY (
    		6371 * acos (
    		cos ( radians(".$lat.") )
			      * cos( radians( lat ) )
			      * cos( radians( `long` ) - radians(".$long.") )
    		+ sin ( radians(".$lat.") )
			      * sin( radians( lat ) )
    		)
    		) ASC
    		LIMIT 5";
    	$query = $this->db->query($sql);
    	$result = $query->result();
        return $result;
    }
	
	function getumkmwdistance1($id_kategori, $lat, $long){
    	$sql = "
    		SELECT 
    		*,
    		(
    		6371 * acos (
    		cos ( radians(".$lat.") )
			      * cos( radians( lat ) )
			      * cos( radians( `long` ) - radians(".$long.") )
    		+ sin ( radians(".$lat.") )
			      * sin( radians( lat ) )
    		)
    		) AS distance
    		FROM 
    			umkm AS um
    		WHERE um.id_kategori = ".$id_kategori."
    		AND um.koordinat <> ''
    		LIMIT 5";
    	$query = $this->db->query($sql);
    	$result = $query->result();
        return $result;
    }

}