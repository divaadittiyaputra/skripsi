<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('debugCode')){
	function debugCode($r=array(),$f=TRUE){
	  echo "<pre>";
	  print_r($r);
	  echo "</pre>";

	  if($f==TRUE) 
	     die;
	}
}

if( ! function_exists('getRandomWord')){
	function getRandomWord($len = 10) {
	    $word = array_merge(range('a', 'z'), range('A', 'Z'));
	    shuffle($word);
	    return substr(implode($word), 0, $len);
	}
}
if( ! function_exists('getRandomWord2')){
	function getRandomWord2($len = 6) {
	    $word = array_merge(range('A', 'Z'), range(10, 99));
	    shuffle($word);
	    return substr(implode($word), 0, $len);
	}
}

if( ! function_exists('ai_url')){
	function ai_url($len = 10) {
	    // $url = "http://103.101.224.73:1000";
		$url = "http://api-dev.aipos.co.id";
	    return $url;
	}
}

if( ! function_exists('sKey')){
	function sKey($par = "") {
		if ($par <> "") {
			$keyword = str_replace(" ", "%20", $par);
		}else{
			$keyword = "";
		}
		return $keyword;
	}
}

if ( ! function_exists('okHeader')) {
	function okHeader($dataArray){
		foreach ($dataArray as $key => $value) {
			$hresponse[$key] = $value;
		}
		return $hresponse;
	}
}

if ( ! function_exists('okHeader')) {
	function decodeData($paging){
		$result = json_decode($paging);
		return $result;
	}

}

if ( ! function_exists('status_return')) {
	function status_return($status,$msg){
		return json_encode(array("status" => $status , "msg" => $msg));		
	}
}


if ( ! function_exists('checkSideBar')) {
	function checkSideBar($session,$name = "",$second = ""){
		$side = "";
        $CI =& get_instance();    
		$side = $CI->session->$session;
		
		if (empty($second)) {
			return $side[$name];
		}else{
			return $side[$name][$second];
		}
	}
}

if(!function_exists('add_date')) {
   function add_date($date) {
		$date = date_create($date);
		$date = date_format($date,"Y-m-d");
		return $date;
   }
}

if(!function_exists('dateFormat')) {
   function dateFormat($date) {
		$date = date_create($date);
		$date = date_format($date,"Y/m/d");
		return $date;
   }
}

if(!function_exists('status')) {
   function status($data) {
		if($data == '1'){
			$status = '<label style="color:red;">Inactive</label>';
		}else{
			$status = '<label style="color:green;">Active</label>';
		}
		return $status;
   }
}

if(!function_exists('status_word')) {
   function status_word($data) {
		if($data == 'Active'){
			$status = '<label style="color:green;">Active</label>';
		}else{
			$status = '<label style="color:red;">Inactive</label>';
		}
		return $status;
   }
}

if( ! function_exists('sNominal')){
	function sNominal($par = "") {
		if ($par <> "") {
			$keyword = str_replace(",", "", $par);
		}else{
			$keyword = "";
		}
		return $keyword;
	}
}


if( ! function_exists('chCheck')){
	function chCheck($par1, $par2, $par3, $par4 = "") {
		if ($par1 == $par2) {
			$return = $par3;
		}else{
			if ($par4 <> "") {
				$return = $par4;
			}else{
				$return = "";
			}
		}
		return $return;
	}
}

if( ! function_exists('sNilai')){
	function sNilai($par = "") {
		if ($par <> "") {
			$keyword = str_replace(".", "", $par);
		}else{
			$keyword = "";
		}
		return $keyword;
	}
}

if ( ! function_exists('getLoginData')) {
	function getLoginData($param=null){
		$side = "";
        $CI =& get_instance();    
		$side = $CI->session->sessionData;
		// var_dump($side);
		if($side){
			//debugCode($side);
		if($param==null){
			return $side;
		}else{
			return $side[$param];
		}
		}else{

		return false;
		}
	}
}

if ( ! function_exists('flashdata_check')) {
	function flashdata_check($param=""){
		$side = "";
        $CI =& get_instance();
        $result = $CI->session->flashdata($param);
        return $result;
	}
}

if ( ! function_exists('flashdata_notif')) {
	function flashdata_notif($param = "", $trueparam = "", $costum_message = ""){
		$side = "";
        $CI =& get_instance();
        $result = $CI->session->flashdata($param);
        $html = "";
        if ($result == $trueparam) {
        	if ($costum_message) { // Costum Message
        		$html = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="icon-tick"></i><strong>Berhasil!</strong> '.$costum_message.'
					</div>';
        	}else{
        		$html = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="icon-tick"></i><strong>Berhasil!</strong> Action Success.
					</div>';
        	}
        	$CI->session->flashdata($param);
        }elseif($result == "No" AND $result <> ""){
			$html = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="icon-warning2"></i><strong>Maaf!</strong> Action Failed.
					</div>';
        }elseif($result <> "No" AND $result <> ""){
        	$html = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="icon-warning2"></i><strong>Maaf!</strong> '.$result.'
					</div>';
        }

        return $html;
	}
}

function custom_notif($type = "success",$name="", $message = ""){
	//HOW TO USE BELOW
	//custom_notif("success","Nave of Session Success","Hello");
	//custom_notif("failed","Nave of Session Failed","Hello");

	$CI =& get_instance();
	$html = "";
	if ($type == "success") {
		if ($message <> "") {
			$html = array(
				"type"	=> "Notif",
				"html"	=> '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<i class="icon-tick"></i><strong>Berhasil !</strong> '.$message.'
				</div>'
			);
		}else{
			$html = array(
				"type"	=> "Notif",
				"html"	=> '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<i class="icon-tick"></i><strong>Berhasil !</strong> Action Success.
				</div>'
			);
		}
		$CI->session->set_flashdata($name, $html);
	}elseif($type == "failed"){
		if ($message <> "") {
			$html = array(
				"type" => "Notif",
				"html" => '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<i class="icon-warning2"></i><strong>Maaf !</strong> '.$message.'
				</div>'
			);
		}else{
			$html = array(
				"tyoe" => "Notif",
				"html"	=> '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<i class="icon-warning2"></i><strong>Maaf !</strong> Action Failed.
				</div>'
			);
		}
		$CI->session->set_flashdata($name, $html);
	}
}

function return_custom_notif(){
	$CI =& get_instance();
	$flashData = $CI->session->flashdata();
	$html = "";
	foreach ($flashData as $key => $value) {
		if ($value['type'] == "Notif") {
			$html.=$value['html'];
		}
	}
	return $html;
}

if(!function_exists('encrypt_decrypt')){
	function encrypt_decrypt($action, $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'd9b9f2e4a4abdbeb5987f697c15f9671';
		$secret_iv = 'ae2f0e96fd0f6cb1bda97bb00316b3b0';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
}

function check_selected($par1, $par2){
	if ($par1 == $par2) {
		$return = "selected";
	}else{
		$return = "";
	}
	return $return;
}

function is_checked($par1, $par2){
	if ($par1 == $par2) {
		$return = "checked";
	}else{
		$return = "";
	}
	return $return;	
}

function defaultFormEmail(){
	$email = "event@ticketing.com";
	return $email;
}

function defaultFormName(){
	$email = "Ticketing";
	return $email;
}

function checkMemberLogin(){
	$CI =& get_instance();
	
	if (empty($CI->session->userdata['sessionMember'])) {
		redirect();
	}
}

function orderNumberFormat($date, $idOrder){
	$order = "OD-".date("Ymd",strtotime($date))."-".$idOrder;
	return $order;
}

function stats_order_html($payment_status){
	$status_payment = "";
	if ($payment_status == 0) {
		$status_payment = '<span class="badge badge-bdr badge-warning">Waiting for Payment</span>';
	}elseif($payment_status == 1){
		$status_payment = '<span class="badge badge-bdr badge-info">Waiting Admin to Approve</span>';
	}elseif($payment_status == 2){
		$status_payment = '<span class="badge badge-bdr badge-success">Accepted</span>';
	}else{
		$status_payment = '<span class="badge badge-bdr badge-danger">Rejected</span>';
	}
	return $status_payment;
}

function type_inout_html($type){
	if ($type == 1) {
		$html = '<span class="badge badge-bdr badge-success">IN</span>';
	}else{
		$html = '<span class="badge badge-bdr badge-danger">Out</span>';
	}
	return $html;
}

function generateEticketNumber(){	 
	$rand = getRandomWord2();
	$enum = "E-".rand(100,999).$rand;
	return $enum;

}

function daysByNumber($number){
	if ($number == 1) {
		$days = "Monday";
	}

	if ($number == 2) {
		$days = "Tuesday";
	}

	if ($number == 3) {
		$days = "Wednesday";
	}

	if ($number == 4) {
		$days = "Thursday";
	}

	if ($number == 5) {
		$days = "Friday";
	}

	if ($number == 6) {
		$days = "Saturday";
	}

	if ($number == 7) {
		$days = "Sunday";
	}

	return $days;
}

function jFilerRemoved($files, $removed){
	foreach ($removed as $rkey => $rvalue) {
		$rvalue = str_replace("0://", "", $rvalue);
		$search = array_search($rvalue, $_FILES['files']['name']);
		if (!empty($search)) {

			unset($files['name'][$search]);
			unset($files['type'][$search]);
			unset($files['tmp_name'][$search]);
			unset($files['error'][$search]);
			unset($files['size'][$search]);
		}
	}
	return $files;
}

function latlngDefault(){
	$latlng = array(-6.17511, 106.86503949999997);
	return $latlng;
}

function generateOrderNumber(){
	$CI    =& get_instance();
	$code  = date("dmY").rand(100,999);
	//$code = "123123";
	$exist = 0;
	do{
		$check = $CI->global->checkCampaignTransNumber($code);
		if (empty($check)) {
			$exist = 0;
			break;
		}else{
			$exist = 1;
		}
	}while ( $exist > 0);
	return $code;
}

function expired_setting($param){
	$expired['amount'] = 2;
	$expired['type']   = "hours";

	return $expired;
}

function payment_type_name($type){
	$CI    =& get_instance();
	$payname = $CI->global->getPayTypeName($type);
	return $payname;
}

function fassets($src=null)
{
		$ci=& get_instance();

		if($src==null){
			return $ci->config->base_url('frontend/assets/');
		}else{
			return $ci->config->base_url('frontend/assets/'.$src);
		}
}

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Calculate the distance in degrees
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
	}
	return round($distance, $decimals);
}