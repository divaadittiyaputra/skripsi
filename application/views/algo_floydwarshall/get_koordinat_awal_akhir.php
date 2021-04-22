<?php
class Get_koordinat_awal_akhir extends DistanceTo{

	public $koneksi = "";
	
	function __construct(){
		$k = new Koneksi();
		$this->koneksi = $k->connect();
	}	
	
	//--------------------------------------------------------------------------------------------------------------------------
		
	
		// CARI JARAK
		// LOOPING SEMUA RECORD
		$obj = new stdClass();
		
		for($index_obj = 0; $kolom = mysqli_fetch_array($selectRow, MYSQLI_ASSOC); $index_obj++){


			$jarakUserKeKoordinatSimpul = array();

			$json = $kolom['jalur'];

			// decode JSON	
			$jsonOneRoute = json_decode($json, true);

			// data json
			$dataNode		= $jsonOneRoute['nodes'][0];
			$nodeSplit		= explode('-', $dataNode);
			$node0			= $nodeSplit[0];
			$node1			= $nodeSplit[1];
			$dataBobot		= $jsonOneRoute['distance_metres'][0];
			$countCoordinate= (count($jsonOneRoute['coordinates']) - 1); 
			
			foreach($jsonOneRoute['coordinates'] as $coordinate){
				$json_lat 	= $coordinate[0];
				$json_lng 	= $coordinate[1];
				
				$jarak 		= $this->distanceTo($user_lat, $user_lng, $json_lat, $json_lng);				
				array_push($jarakUserKeKoordinatSimpul, $jarak);
			}

			// CARI bobot yg paling kecil yang nantinya akan di tampilkan di halaman android
			$index_koordinatSimpul = 0;
			for($m = 0; $m < count($jarakUserKeKoordinatSimpul); $m++)
			{				
				if($jarakUserKeKoordinatSimpul[$m] <= $jarakUserKeKoordinatSimpul[0])
				{
					$jarakUserKeKoordinatSimpul[0] = $jarakUserKeKoordinatSimpul[$m];
					
					$index_koordinatSimpul = $m;
				}			
			}
			$row_id = $kolom['id'];
		
			$list = array();
			$list['row_id'] 		= (int)$row_id;
			$list['index'] 			= $index_koordinatSimpul;
			$list['bobot'] 			= $jarakUserKeKoordinatSimpul[0];
			$list['nodes']			= $dataNode;
			$list['count_koordinat']= $countCoordinate;

			$obj->$index_obj = [$list];
			
		}//end looping baris DB

		$x = 0;
		$y = 0;
		$stdCount = count((array)$obj);
		
		// cari bobot terkecil dari JSON
		for($s = 0; $s < $stdCount; $s++){
			
			if($s == 0){				
				// std Object
				$x 					= $obj->{$s}[0]['bobot'];
				$rowId 				= $obj->{$s}[0]['row_id'];
				$indexCoordinate 	= $obj->{$s}[0]['index'];
				$countCoordinate 	= $obj->{$s}[0]['count_koordinat'];
				$nodes			 	= $obj->{$s}[0]['nodes'];				
			}else
			{
				$y 	= $obj->{$s}[0]['bobot'];				
				// dapatkan value terkecil (bobot)
				if($y <= $x){
					$x = $y;					
					// std Object
					$rowId 				= $obj->{$s}[0]['row_id'];
					$indexCoordinate 	= $obj->{$s}[0]['index'];
					$countCoordinate 	= $obj->{$s}[0]['count_koordinat'];
					$nodes			 	= $obj->{$s}[0]['nodes'];				
				}
			}	
		}	
		
//--------------------------------------------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------------------------------------------

		// JSON
		$jadi_json['row_id'] 				= $rowId;
		$jadi_json['node_simpul_awal0'] 	= $field_simpul_awal;
		$jadi_json['node_simpul_awal1'] 	= $field_simpul_tujuan;
		$jadi_json['index_coordinate_json'] = $indexCoordinate;


		return json_encode($jadi_json);

//--------------------------------------------------------------------------------------------------------------------------
	}//public
}
?>