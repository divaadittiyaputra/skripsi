<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function list_umkm(){
	    $this->load->model('M_umkm');
	    $data['list_umkm']  =$this->M_umkm->getLIstUmkm();
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
    public function detail_umkm(){
	    $this->load->model('M_umkm');
	    
	    $post = $this->input->post();
	    $id 				= $this->input->post('id');
	    
	    $data['detail_umkm']  =$this->M_umkm->getListUmkmId($id);
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	
	public function list_pemilik(){
	    $this->load->model('M_pemilik');
	    $data['list_pemilik']  = $this->M_pemilik->getPemilik();
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function detail_pemilik(){
	    $this->load->model('M_pemilik');
	    
	    $post = $this->input->post();
	    $id 				= $this->input->post('id');
	    $data['detail_pemilik']  =$this->M_pemilik->getListPemilikId($id);
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function pencarian(){
	    $post   = $this->input->post();
	    $id_kategori        = $this->input->post('id_kategori');
	    $id_kecamatan       = $this->input->post('id_kecamatan');
	    $id_desa            = $this->input->post('id_desa');
	    $latitude           = $this->input->post('lat');
	    $longitude          = $this->input->post('lon');
	    
	    $this->db->select("u.*, k.namaKategori, p.nama, kec.*, des.*,  round(( 3959 * acos( least(1.0,  
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
		$this->db->like("u.id_kategori",$id_kategori);
		$this->db->like("u.id_kecamatan",$id_kecamatan);
		$this->db->like("u.id_desa",$id_desa);
		$query  = $this->db->get();
		$data['list_umkm'] = $query->result();
		
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function pencarian_umkm(){
	    $post   = $this->input->post();
	    $nama   = $this->input->post('nama_umkm'); 
	    
	    $this->db->select("u.*, k.namaKategori, p.nama, kec.*, des.*");
		$this->db->from("umkm as u");
		$this->db->join("kategori as k","u.id_kategori = k.id_kategori");
		$this->db->join("pemilik as p","u.id_pemilik = p.id_pemilik");
		$this->db->join("kecamatan as kec","kec.id_kecamatan = u.id_kecamatan", 'left');
		$this->db->join("desa as des","des.id_desa = u.id_desa", 'left');
		$this->db->like("u.nama_umkm",$nama, 'both'); 
		$query  = $this->db->get();
		$data['list_umkm'] = $query->result();
		
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	
	public function pencarian_kecamatan(){
	    $post               = $this->input->post(); 
	    $id_kecamatan       = $this->input->post('id_kecamatan'); 
	    
	    $this->db->select("*");
		$this->db->from("kecamatan"); 
		if($id_kecamatan!=""){
		$this->db->where("id_kecamatan",$id_kecamatan); 
		}
		$query  = $this->db->get();
		$data['list_data'] = $query->result();
		
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function pencarian_desa(){
	    $post               = $this->input->post(); 
	    $id_kecamatan       = $this->input->post('id_kecamatan'); 
	    
	    $this->db->select("*");
		$this->db->from("desa"); 
		if($id_kecamatan!=""){
		$this->db->where("id_kecamatan",$id_kecamatan); 
		}
		$query  = $this->db->get();
		$data['list_data'] = $query->result();
		
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function pencarian_kategori(){
	    $post               = $this->input->post(); 
	    $id_kategori       = $this->input->post('id_kategori'); 
	    
	    $this->db->select("*");
		$this->db->from("kategori"); 
		if($id_kategori!=""){
		$this->db->where("id_kategori",$id_kategori); 
		}
		$query  = $this->db->get();
		$data['list_data'] = $query->result();
		
       
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
	public function analisa(){
	    $this->load->model('M_umkm');
	    
	    	$post = $this->input->post();
		$dari    = $_POST['dari'];
		$tujuan  = $_POST['tujuan'];
		
		$step = array();
		$step_html="";
		
		$idx=0;
		$result = $this->db->query("select * from jarak where id_umkm2=".$tujuan)->result();
		foreach($result as $par){
		    array_push($step, $par->id_jarak);
		    if($idx>0){
		        $step_html.=",".$par->id_jarak;
		    }else{
		        $step_html.=$par->id_jarak;
		    }
		    
		    
		    $result2 = $this->db->query("select * from jarak where id_umkm2=".$par->id_umkm1)->result();
		    if(count($result2)>0){
        		foreach($result2 as $par2){
        		    array_push($step, $par2->id_jarak);
        		    $step_html.=",".$par2->id_jarak;
        		}
		    }else{
		        $result2 = $this->db->query("select * from jarak where id_umkm1=".$dari." and id_umkm2=".$par->id_umkm1)->result();
		        foreach($result2 as $par2){
        		    array_push($step, $par2->id_jarak);
        		    $step_html.=",".$par2->id_jarak;
        		}
		    }
    		$idx++;
		}
		
		
		$pola = array();
		for($int=count($step)-1; $int>=0; $int--){
            $result = $this->db->query("select jrk.*, umkm1.nama_umkm as umkm1,umkm2.nama_umkm as umkm2 
                                        from jarak as jrk 
                                        left join umkm as umkm1 on umkm1.id_umkm=jrk.id_umkm1
                                        left join umkm as umkm2 on umkm2.id_umkm=jrk.id_umkm2
                                        where id_jarak in(".$step[$int].")");
            foreach($result->result() as $val){
                $array = array('arah'=>$val->umkm1." -> ".$val->umkm2,'value'=>$val->value);
                array_push($pola, $array) ;
            } 
		}
		
        $data['pola'] = $pola;
        $arr = array();
        $arr['status'] = "sukses"; 
        $arr['result'] = $data;
        echo json_encode($arr);
	}
	
}
