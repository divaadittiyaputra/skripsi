<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemilik extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_umum');
		$this->load->model('M_pemilik');
		$this->load->library('Excel.php');
		$this->load->library('PHPExcel/IOFactory.php');
    }
	
	public function add(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/pemilik/add';
		$this->load->view('member/layout', $data);
	}
	
	public function daftar(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['listData']	= $this->M_pemilik->getPemilik();
		$data['v_content']  = 'member/pemilik/daftar';
		$this->load->view('member/layout', $data);
	}
	
	public function edit($id){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['detailData']	= $this->M_pemilik->getListPemilikId($id);
		$data['v_content']  = 'member/pemilik/edit';
		$this->load->view('member/layout', $data);
	}
	
	public function doAdd(){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama"		=> $post['nama'],
		);
		$insert = $this->db->insert("pemilik",$dataArray);
		if($insert){
			$this->M_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/pemilik/daftar');
		}else{
			$this->M_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/pemilik/add'); 
		}
	}
	
	public function doUpdate($id){
		$post = $this->input->post();
		
		$dataArray = array(
			"nama"		=> $post['nama'],
		);
		$update = $this->db->update("pemilik",$dataArray,array("id_pemilik" => $id));
		if($update){
			$this->M_umum->generatePesan("Berhasil update data","berhasil");
			redirect('admin/pemilik/daftar');
		}else{
			$this->M_umum->generatePesan("Gagal update data","gagal");
			redirect('admin/pemilik/daftar'); 
		}
	}
	
	public function doDelete($id){
		$delete = $this->db->delete("pemilik",array("id_pemilik" => $id));
		if($delete){
			$this->M_umum->generatePesan("Berhasil Delete data","berhasil");
			redirect('admin/pemilik/daftar');
		}else{
			$this->M_umum->generatePesan("Gagal Delete data","gagal");
			redirect('admin/pemilik/daftar'); 
		}
	}
	
	public function importData(){
		$data['userLogin']  = $this->session->userdata('loginData');
		$data['v_content']  = 'member/pemilik/uploadExcel';
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
    
		for ($row = 2; $row <= $highestRow; $row++){   //ulang baris sampe baris tertinggi
			$rowData        = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE); //select 
			$tanggalOrder   = $rowData[0][0];
			$pelanggan      = $rowData[0][1];
			$produk         = $rowData[0][2];
			$qty            = $rowData[0][3];
			$totalHarga     = $rowData[0][4];
	 
		
			$cek_pelanggan = $this->M_order->getIdPelanggan($rowData[0][1]);
			
			if(empty($cek_pelanggan)){
			  $dataSubArray = array(
				"namaPelanggan"  => $rowData[0][1],
			  );
			  $insert_pelanggan = $this->db->insert("pelanggan",$dataSubArray);
			  $id_pelanggan = $this->db->insert_id();
			}else{
				$id_pelanggan = $cek_pelanggan->idPelanggan;
			}
			
			
			
			$cek_produk = $this->M_order->getIdProduk($rowData[0][2]);
			
			if(empty($cek_produk)){
				$dataSubArray = array(
				 "namaProduk" => $rowData[0][2],
				);
				 $insert_pelanggan = $this->db->insert("produk",$dataSubArray);
				 $id_produk = $this->db->insert_id();
			}else{
				$id_produk = $cek_produk->idProduk;
			}
			if($rowData[0][0] <> ""){
				$dataToInsert = array(
									"tanggalOrder"   => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($tanggalOrder)),
									"idPelanggan"    => $id_pelanggan,
									"idProduk"       => $id_produk,
									"kuantitas"      => $qty,
									"totalHarga"     => $totalHarga,
								);
				
			 
				$insert = $this->db->insert('order',$dataToInsert);
				if($insert){
					$this->M_umum->generatePesan("Berhasil menambahkan data","berhasil");
				}else{
					$this->M_umum->generatePesan("Gagal menambahkan data","gagal");  
				}
			}
		}
        redirect('admin/order/daftar');
    }
	
}
