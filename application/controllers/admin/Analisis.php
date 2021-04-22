<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analisis extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_analisis');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/kategori/add';
		$this->load->view('member/layout', $data);
	}
	
	public function hasil2(){
	 
		$data['userLogin']  = $this->session->userdata('loginData');
	 
		$data['v_content']  = 'member/analisa/analisa_form';
		$this->load->view('member/layout', $data);
	}
	function doAnalisa_new(){
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
		
		$data['array_jalur']  = $step;
		$data['html_jalur']  = $step_html;
		
		$data['userLogin']  = $this->session->userdata('loginData');
	 
		$data['v_content']  = 'member/analisa/analisa_new';
		$this->load->view('member/layout', $data);
		
	}
	
	public function hasil(){
		$post	= $this->input->post();
		$get	= $this->input->get();
		$where  = "";
		$kategori = 0;
		if (isset($get['kategori'])) {
			if ($get['kategori'] <> "") {
				$kategori = $get['kategori'];
				$where = " (kt.id_kategori = ".$kategori." and koordinat is not null) ";
			}
			
		}

		$data['userLogin']  = $this->session->userdata('loginData');
		$data['kategori']	= $this->M_analisis->getLIstKategori();
		$data['kategoriNol']= $kategori;
		$data['umkm']		= $this->M_analisis->getUmkm($where);
		$data['v_content']  = 'member/analisa/analisa';
		$this->load->view('member/layout', $data);
	}

	function doAnalisa(){
		$post = $this->input->post();
		$query = http_build_query($post);
		redirect('admin/analisis/analisaData?'.$query);
		//debugCode($post);
		//$where = " (kt.id_kategori = ".$post['kategori'].") ";
		//$umkm  = $this->M_analisis->getUmkm($where);
		
	}

	function analisaData(){
		$get  = $this->input->get();
		$post = $this->input->post();
		
		
		$getData  = $this->M_analisis->getumkmwdistance($get['kategori'], $get['lat'], $get['lng']);
		$alpahbet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$prep['A'] = array(
			"name"	=> "My Point",
			"lat"	=> $get['lat'],
			"lng"	=> $get['lng']
		);

		foreach ($getData as $gkey => $gvalue) {
			$prep[$alpahbet[$gkey+1]] = array(
				"name"	=> $gvalue->nama_umkm,
				"lat"	=> $gvalue->lat,
				"lng"	=> $gvalue->long
			);
		}
		
		$myneighboor   = [];
		$floydwarshallHasil = [];
		$titik_pencarian = "A";
		if (!empty($post)) {
			foreach ($post['data'] as $dtkey => $dtvalue) {
				$keyLat = $prep[$dtkey]['lat'];
				$keyLng = $prep[$dtkey]['lng'];
				
				$hasilNg = [];
				foreach($dtvalue AS $zxkey => $zxvalue){
					if($zxkey == 1){
						continue;
					}
					$vlLat = $prep[$zxvalue]['lat'];
					$vlLng = $prep[$zxvalue]['lng'];
					
					
					$sqlDist = "SELECT (
		    		6371 * acos (
		    		cos ( radians(".$keyLat.") )
					      * cos( radians( ".$vlLat." ) )
					      * cos( radians( ".$vlLng." ) - radians(".$keyLng.") )
		    		+ sin ( radians(".$keyLat.") )
					      * sin( radians( ".$vlLat." ) )
		    		)
		    		) AS distance";
		    		$queryDist = $this->db->query($sqlDist);
					
		    		$resDist = $queryDist->row();
		    		$hasilNg[$zxvalue] = round($resDist->distance, 2);
				}	
		    		//debugCode($resDist);
				$myneighboor[$dtkey] = $hasilNg;
			}
			/// POIN A ADALAH TITIK AWAL(POSISI SEKARANG)
			$floydwarshall      = $this->floydwarshall($myneighboor, $titik_pencarian);
			
			$floydwarshallHasil = $floydwarshall;
			//var_dump($dijkstraHasil );die;
			
			//debugCode($dijkstraHasil);
			//debugCode($post);
		}
		//debugCode($dijkstraHasil);
		$data['posisi_pencarian'] = $titik_pencarian;
		$data['neighbors']     = $myneighboor;
		//var_dump($data['neighbors'] );die;
		$data['floydwarshallHasil'] = $floydwarshallHasil;
		

		$data['query']     = http_build_query($get);
		$data['prep']      = $prep;
		$data['post']      = $get;
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['listData']  = $getData;
		$this->db->truncate("umkm_rekomendasi");
		foreach ($floydwarshallHasil as $hkey => $hvalue) { 
			foreach($prep as $pkey => $vprep){
				if($pkey == $hkey){
					$lokasi =  $vprep['name'];
				}
			}
			
			$dataSimpan = array(
				"poin"	=> $hkey,
				"umkm"	=> $lokasi,
				"jarak"	=> $hvalue[0]
			);
			$this->db->insert("umkm_rekomendasi", $dataSimpan);
		}
		$data['v_content'] = 'member/analisa/analisa2';
		$this->load->view('member/layout', $data);
	}

	function floydwarshall($neighbors, $start) {
	  $closest = $start;
	  while (isset($closest)) {
	    $marked[$closest] = 1;
	    /* loop through each neighbor for this $closest node and 
	     * and store the distance and route in an array */
	    foreach ($neighbors[$closest] as $vertex => $distance) {
	      /* if we already have the route and distance, skip */
	      if (isset($marked[$vertex]))
	        continue;
			
	      /* distance from $closest to $vertex */
	      $dist = (isset($paths[$closest][0]) ? $paths[$closest][0] : 0) + $distance;
	      /* if we dont have a path to $vertex yet, create it. 
	       * If this distance is shorter, override the existing one */
	      if (!isset($paths[$vertex]) || ($dist < $paths[$vertex][0])) {
		  	
	        if (isset($paths[$closest])) {
		  $paths[$vertex]= $paths[$closest];
		  
		}
	        $paths[$vertex][] = $closest;
	        $paths[$vertex][0] = $dist;
	      }
		  
	    }
	    unset($closest);
	    /* Find the next node we should create a path for */
	    foreach ($paths as $vertex => $path) {
	      if (isset($marked[$vertex]))
	        continue;
	      $distance = $path[0];
	      if ((!isset($min) || $distance < $min) || !isset($closest)) {
	        $min = $distance;
	        $closest = $vertex;
	      }
		  
	    }
	  }
	  return $paths;
	}
	
}
