<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Umkm extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('m_umum');
		$this->load->model('M_umkm');
		$this->load->model('M_kategori');
		$this->load->library('Excel.php');
		$this->load->library('PHPExcel/IOFactory.php');
    }
    
    public function get_desa(){
	    $post = $this->input->post();
	    	
	    $result = $this->db->query("select * from desa where id_kecamatan=".$post['id_kecamatan']);
	    $html ="";
	    
	    foreach($result->result() as $val){
	        $html.=  "<option value='".$val->id_desa."'>";
	        $html.=  $val->nama_desa;
	        $html.=  "</option>";
	    }
	    echo $html;
	}
	
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['kategori']	= $this->M_kategori->getLIstKategori();
		$data['pemilik']	= $this->M_umkm->getPemilik();
		$data['v_content']  = 'member/umkm/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_umkm->getLIstUmkmAll();
		$data['v_content']  = 'member/umkm/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['kategori']	= $this->M_kategori->getLIstKategori();
		$data['pemilik']	= $this->M_umkm->getPemilik();
		$data['detailData']	= $this->M_umkm->getListUmkmId($id);
		$data['v_content']  = 'member/umkm/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama_umkm"		=> $post['nama_umkm'],
			"id_kategori"	=> $post['id_kategori'],
			"produk"		=> $post['produk'],
			"alamat"		=> $post['Postcode'],
			"koordinat"		=> $post['lat'].",".$post['lng'],
			"id_pemilik"		=> $post['pemilik'],
			"telepon"		=> $post['no_telp'],
			"legalitas"		=> $post['legalitas'],
			"kecamatan"		=> '',
			"keterangan"	=> $post['ket'],
			"lat"			=> $post['lat'],
			"long"			=> $post['lng'],
			"rt"			=> $post['rt'],
			"rw"			=> $post['rw'],
			"id_kecamatan"	=> $post['id_kecamatan'],
			"id_desa"		=> $post['id_desa']
		);
		$insert = $this->db->insert("umkm",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/umkm/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/umkm/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
		$maps = $this->maps($post['lat'],$post['lng']);
		
		$dataArray = array(
			"nama_umkm"		=> $post['nama_umkm'],
			"id_kategori"	=> $post['id_kategori'],
			"produk"		=> $post['produk'],
			"alamat"		=> $post['Postcode'],
			"koordinat"		=> $post['lat'].",".$post['lng'],
			"id_pemilik"	=> $post['pemilik'],
			"telepon"		=> $post['no_telp'],
			"legalitas"		=> $post['legalitas'],
			"kecamatan"		=> '',
			"keterangan"	=> $post['ket'],
			"lat"			=> $post['lat'],
			"long"			=> $post['lng'],
			
			"rt"			=> $post['rt'],
			"rw"			=> $post['rw'],
			"id_kecamatan"	=> $post['id_kecamatan'],
			"id_desa"		=> $post['id_desa']
			//"formated_address_google"	=> $maps['formatted_address']
		);
		
		$update = $this->db->update("umkm",$dataArray,array("id_umkm" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/umkm/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/umkm/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("umkm",array("id_umkm" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/umkm/daftar');
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/umkm/daftar'); 
		}
	}
	
	function maps($lat,$long){
		//110.42622684598996
		$url1 = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&key=AIzaSyD7Mr1SnmpnkqSqZZcFDXOPK0LVGJ1aqV4";
		
		$str_url1 = str_replace(' ','',$url1);

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $str_url1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		if ($err) {
		  echo "cURL Error #:".$err;
		} else {
			$response_a = json_decode($response, true);
		
			$result	= array(
							"formatted_address"	=> $response_a['results'][0]['formatted_address'],
			);
			return $result;
		}
		
		
		
	}
	
	public function daftar_umkm(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_umkm->getLIstUmkmPemilik($this->session->loginData['Username']);
		foreach ($data['listData'] as $value){
			$data['id'] = $value->id_umkm;
		}
		$data['v_content']  = 'member/umkm/list_umkm';
		$this->load->view('member/layout', $data);
	}
	
	public function addDetailProduk($id){
		$data['id'] = $id;
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_umkm->getLIstUmkmPemilik($this->session->loginData['Username']);
		
		$data['v_content']  = 'member/detailProduk/add';
		$this->load->view('member/layout', $data);
	}
	#===================================Detail Produk ====================================#
	public function doAddDetailProduk(){
		$post = $this->input->post();
		
		$upload_path = 'uploads/detailProduk/';
		/*====================================== BEGIN UPLOADING FEATEURE IMAGE ======================================*/
		$feature_image = "";
		if ($_FILES['gambar']['name'] <> "") {
			$ext           = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
			$feature_image = date("dmYHis").rand(100,999).".".$ext;

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'PNG|png|JPG|jpg|JPEG|jpeg';
			$config['file_name']     = $feature_image;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('gambar')){
				$error = 'error: '. $this->upload->display_errors();
				echo $error;
				die();
			}else{
				$feature_image = "uploads/detailProduk/".$feature_image;
			}
		}
		/*====================================== END UPLOADING FEATEURE IMAGE ======================================*/
		$dataArray = array(
			"nama_detail_produk"	=> $post['nama_detail'],
			"harga"					=> $post['harga'],
			"gambar"				=> $feature_image,
			"id_produk"				=> $post['id_produk'],
		);
		$insert = $this->db->insert("detailProduk",$dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/umkm/daftar_umkm');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/umkm/addDetailProduk'); 
		}
	}
	
	public function detailProduk($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['id']			= $id;
		$data['listData']	= $this->M_umkm->getDetailProduk($id);
		$data['v_content']  = 'member/detailProduk/detail';
		$this->load->view('member/layout', $data);
	}
	
	public function editDetailProduk($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_umkm->getLIstUmkmPemilikById($id);
		$data['v_content']  = 'member/detailProduk/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doUpdateDetailProduk($id){
		$post 		= $this->input->post();
		$id_umkm 	= $post['id'];
		$dataArray 	= array(
			"nama_detail_produk"	=> $post['nama_detail'],
			"harga"					=> $post['harga'],
		);
		$upload_path = 'uploads/detailProduk/';
		/*====================================== BEGIN UPLOADING FEATEURE IMAGE ======================================*/
		$feature_image = "";
		if ($_FILES['gambar']['name'] <> "") {
			$ext           = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
			$feature_image = date("dmYHis").rand(100,999).".".$ext;

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'PNG|png|JPG|jpg|JPEG|jpeg';
			$config['file_name']     = $feature_image;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('gambar')){
				$error = 'error: '. $this->upload->display_errors();
				echo $error;
				die();
			}else{
				$feature_image = "uploads/detailProduk/".$feature_image;
				$dataArray['gambar'] = $feature_image;
			}
		}
		/*====================================== END UPLOADING FEATEURE IMAGE ======================================*/
		$update = $this->db->update("detailProduk",$dataArray,array("id_detailProduk" => $id));
		if($update){
			$this->m_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/umkm/detailProduk/'.$id_umkm);
		}else{
			$this->m_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/umkm/detailProduk/'.$id_umkm); 
		}
	}
	
	public function doDeleteDetailProduk($id){
		$get = $this->input->get();
		$id_umkm = $get['id_umkm'];
		
		$delete = $this->db->delete("detailProduk",array("id_detailProduk" => $id));
		if($delete){
			$this->m_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/umkm/detailProduk/'.$id_umkm);
		}else{
			$this->m_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/umkm/detailProduk'.$id_umkm); 
		}
	}
	
	public function importData(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/umkm/uploadExcel';
		$this->load->view('member/layout', $data);
	}
	
	public function doImport(){
		ini_set('max_execution_time', 0); 
		$fileName = $_FILES['file']['name'];
      
		$this->output->enable_profiler(TRUE);
		$config['upload_path']     = './uploads/exceltemp/';
		$config['file_name'] = $fileName;
		$config['allowed_types']   = 'xls|xlsx|csv';
		$config['max_size']        = 100000000;

		$this->load->library('upload',$config);
      
		if(!$this->upload->do_upload('file')){
			echo $this->upload->display_errors(); die;
		}
      
		$media       = $this->upload->data();
    
		$inputFileName   = './uploads/exceltemp/'.$media['file_name'];//load library phpexcel
	 
		$this->load->library('Excel.php'); 
   
		try
		{
			$inputFileType   = IOFactory::identify($inputFileName);
			$objReader       = IOFactory::createReader($inputFileType);
			$objPHPExcel     = $objReader->load($inputFileName);
		}
		catch(Exception $e)
		{
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$sheet           = $objPHPExcel->getSheet(0); //cari sheet
		$highestRow      = $sheet->getHighestRow(); //cari baris maksimal
		$highestColumn   = $sheet->getHighestColumn(); //cari kolom maksimal
    
		for ($row = 4; $row <= $highestRow; $row++){   //ulang baris sampe baris tertinggi
			$rowData        = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE); //select 
			
			$nama_umkm		= $rowData[0][1];
			$pemilik		= $rowData[0][2];
			$alamat			= $rowData[0][3];
			$telepon		= $rowData[0][4];
			$kecamatan		= $rowData[0][5];
			$kategori		= $rowData[0][6];
			$produk			= $rowData[0][7];
			$keterangan		= $rowData[0][8];
			$latlong		= $rowData[0][9];
			$explode		= explode(",",$latlong);
			
			$cek_pemilik = $this->db->query('select * from pemilik where nama = "'.$pemilik.'"')->row();
			$random = mt_rand(100000, 999999);
			if(empty($cek_pemilik)){
				if($pemilik <> ""){
					$dataPemilik = array(
						"nama"		=>	$pemilik,
						"username"	=>	$random,
						"password"	=> md5(123456)
					);
					$insert_pelanggan = $this->db->insert("pemilik",$dataPemilik);
					$id_pemilik = $this->db->insert_id();
				}
			}else{
				$id_pemilik = $cek_pemilik->id_pemilik;
			}
			
			
			
			$cek_kategori = $this->db->query('select * from kategori where namaKategori = "'.$kategori.'"')->row();
			
			if(empty($cek_kategori)){
				if($kategori <> ""){
					$dataKategoriArray = array(
					 "namaKategori" => $kategori,
					);
					$insert_pelanggan = $this->db->insert("kategori",$dataKategoriArray);
					$id_kategori = $this->db->insert_id();
				}
				
			}else{
				$id_kategori = $cek_kategori->id_kategori;
			}
			if($rowData[0][1] <> ""){
				$cek_umkm = $this->db->query('select * from umkm where nama_umkm = "'.str_replace('"','`',$nama_umkm).'"')->row();
				if(empty($cek_umkm)){
					$dataInsert = array(
						"nama_umkm"		=> $nama_umkm,
						"id_pemilik"	=> $id_pemilik,
						"alamat"		=> $alamat,
						"telepon"		=> $telepon,
						"kecamatan"		=> $kecamatan,
						"id_kategori"	=> $id_kategori,
						"produk"		=> $produk,
						"keterangan"	=> $keterangan,
						"koordinat"		=> $latlong,
						"lat"			=> $explode[0],
						"long"			=> $explode[1],
					);
					$insert = $this->db->insert('umkm',$dataInsert);
				}
			}
		}
        redirect('admin/umkm/daftar');
    }
	
	public function truncateUmkm(){
		$this->db->truncate('umkm');
		$this->db->truncate('pemilik');
		$this->db->truncate('umkm_rekomendasi');
		$this->db->truncate('kategori');
		
		$this->m_umum->generatePesan("Berhasil menghapus semua data UMKM","berhasil");
		redirect('admin/umkm/daftar');
		
	}
	
}
