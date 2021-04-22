<div class="main-content">
    <div class="main-content-inner">
    	<!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <style>
				#mapCanvas {
					width: 700px;
					height: 300px;
				}
				#infoPanel {
					float: left;
					margin-left: 10px;
				}
				#infoPanel div {
					margin-bottom: 5px;
				}
				  
				#directions-panel {
					margin-top: 20px;
					background-color: #FFEE77;
					padding: 10px;
				}
				</style>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>
                <li class="active">Data Umkm</li>
            </ul>
        </div>

        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Data Umkm
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
            	<form method="POST" action="<?= base_url('/user_member/analisis/analisaData?'.$query); ?>">
	                <div class="col-xs-12">
	                	<div class="form-group row ">
	                        <div class="col-md-2 col-sm-1">
	                            <input type="hidden" class="form-control" id="latitude" name="lat" placeholder="latitude" value="<?= $_GET['lat'] ?>" readonly="">
	                        </div>
	                        <div class="col-md-2 col-sm-1">
	                            <input type="hidden" class="form-control" id="longitude" name="lng" placeholder="longitude" value="<?= $_GET['lng'] ?>" readonly="">
	                        </div>
	                    </div>
                        <h5><b>MAP DATA :</b></h5>
						<div class="row form-group" style="padding: 10px;">
							<img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"> &nbsp; : LOKASI SAYA
							<img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"> &nbsp; : LOKASI UMKM TUJUAN
							<img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png"> &nbsp; : LOKASI UMKM LAIN
						</div>
						<div class="row form-group" style="padding: 10px;">
	                        <div id="map" style="height: 450px; width: 100%;" class="col-md-12"></div>
	                    </div>

							<h5><b>UMKM YANG DIREKOMENDASIKAN :</b></h5>
							<div style="display:block;">
								<table class="table table-striped table-bordered">
									<?php 
										$getSemuaUMKM = $this->db->query("SELECT
														*
													FROM
														umkm_rekomendasi
													inner join umkm on umkm.nama_umkm = umkm_rekomendasi.umkm
													inner join kategori on kategori.id_kategori = umkm.id_kategori
													inner join pemilik on pemilik.id_pemilik = umkm.id_pemilik

													ORDER BY
														jarak ASC
													")->result();
									?>
									<?php 
										$no = 0;
										foreach($getSemuaUMKM as $vumkm){
											$no++;
									?>
										<tr>
											<td><?php echo $no." .".$vumkm->nama_umkm?></td>
											<td>
												<?php echo round($vumkm->jarak,2)." KM";?>
											</td>
											<td>
												<a class="btn btn-primary" href="<?php echo base_url('user_member/analisis/detail/'.$vumkm->id_umkm)?>">Detail</a>
											</td>
										</tr>
									<?php } ?>
								</table>
							</div>
							<div style="display:none;">
								<?php 
										$getUMKM = $this->db->query("SELECT
														*
													FROM
														umkm_rekomendasi
													inner join umkm on umkm.nama_umkm = umkm_rekomendasi.umkm
													inner join kategori on kategori.id_kategori = umkm.id_kategori
													inner join pemilik on pemilik.id_pemilik = umkm.id_pemilik

													ORDER BY
														jarak ASC
													LIMIT 1")->row(); 
													
													
											
										$url1 = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$getUMKM->lat .",".$getUMKM->long ."&key=AIzaSyD7Mr1SnmpnkqSqZZcFDXOPK0LVGJ1aqV4";
										
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
										}
										
										
									?>
								<div class="col-sm-7" style="padding-bottom:20px; margin-left:-10px;">
									<div id="directions-panel">
										<b>UMKM :</b><br>
										<?php echo $getUMKM->nama_umkm?> <br>
										<b>PETUNJUK ARAH :</b><br>
										<?php echo $response_a['results'][0]['formatted_address']?> <br>
										<b>JARAK :</b><br>
										<?php echo round($getUMKM->jarak,2) ?> KM<br>
									</div>
								</div>
								
								<table class="table table-striped table-bordered">
									
									  
										<tr>
											<td>KATEGORI UMKM</td>
											<td>
												<?php echo $getUMKM->namaKategori?>
											</td>
										</tr>
										<tr>
											<td>PRODUK UMKM</td>
											<td>
												<?php echo $getUMKM->produk?>
											</td>
										</tr>
										<tr>
											<td>PEMILIK UMKM</td>
											<td>
												<?php echo $getUMKM->nama?>
											</td>
										</tr>
										<tr>
											<td>ALAMAT UMKM</td>
											<td>
												<?php echo $getUMKM->alamat?>
											</td>
										</tr>
										<tr>
											<td>NOMOR TELEPON</td>
											<td>
												<?php echo $getUMKM->telepon?>
											</td>
										</tr>
										<tr>
											<td>KECAMATAN</td>
											<td>
												<?php echo $getUMKM->kecamatan?>
											</td>
										</tr>
										<tr>
											<td>KETERANGAN</td>
											<td>
												<?php echo $getUMKM->keterangan?>
											</td>
										</tr>
									<?php //} ?>
								</table>
							</div>
							<div style="display:none;">
								<h5><b>NEIGHTBORS DATA :</b></h5>
								<table class="table table-striped table-bordered">
									<?php 
										foreach ($neighbors as $nbkey => $nbvalue) { 
											foreach($prep as $pkey => $vprep){
												if($pkey == $nbkey){
													$lokasi =  $vprep['name'];
												}
												
												
											}
									?>
										<tr>
											<td><b>POINT</b> <?= $lokasi ?></td>
											<td>
												<?php 
													foreach ($nbvalue as $xdkey => $xdvalue) { 
														foreach($prep as $pkey => $vprep){
															if($pkey == $xdkey){
																$lokasi =  $vprep['name'];
															}
															
															
														}
												?>
													<li><?= $lokasi ?> : <b><?= $xdvalue ." KM"; ?></b></li>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>
								</table>
							</div>
							<div style="display:none;">
								<h5><b>DATA HASIL ANALISA :</b></h5>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Point Ke</th>
											<th>Lewat Point</th>
											<th>Total Jarak</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											//$this->db->truncate("umkm_rekomendasi");
											foreach ($dijkstraHasil as $hkey => $hvalue) { 
												foreach($prep as $pkey => $vprep){
													if($pkey == $hkey){
														$lokasi =  $vprep['name'];
													}
													
													
												}
										?>
											<tr>
												<td>Point <?= $posisi_pencarian." (My Point )"; ?>  -> Point <?= $lokasi; ?></td>
												<td>
													<?php 
													$count = count($hvalue); 
													if ($count <= 1) {
														echo "Langsung";
													}else{
														foreach ($hvalue as $dfkey => $dfvalue) {
															foreach($prep as $pkey => $vprep){
																if($pkey == $dfvalue){
																	$lokasi =  $vprep['name'];
																}
																
																
															}
															if ($dfkey <> 0) {
																echo "<li>"."melewati ".$lokasi."</li>";
															}
															
														}
													}
													?>
												</td>
												<td><?= $hvalue[0]." KM"; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7Mr1SnmpnkqSqZZcFDXOPK0LVGJ1aqV4&libraries=places"></script>
<script type="text/javascript">
	//var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var markers = [
		/* {
			"title": 'Lahore',
			"lat": '31.5546',
			"lng": '74.3572',
			
		}
	, */
		<?php foreach($prep as $key => $value){ ?>
		{
			"title": '<?php echo $key; ?>',
			"lat": '<?php echo $value['lat']; ?>',
			"lng": '<?php echo $value['lng']; ?>',
			"description" : '<?php echo "POINT ".$key."<br>".$value['name'];?>',
			"label" : '<?php echo $key;?>',

		},
		<?php } ?>
	];
	window.onload = function () {
		var mapOptions = {
			center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
			zoom: 10,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		var infoWindow = new google.maps.InfoWindow();
		var lat_lng = new Array();
		var latlngbounds = new google.maps.LatLngBounds();
		var imarker = 0;
		
				
		for (i = 0; i < markers.length; i++) {
			if (i ==  0){
				var urlmarker = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
			}else if (i ==  1){
				var urlmarker = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
			}else{
				var urlmarker = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
			}
		
			var data = markers[i]
			var myLatlng = new google.maps.LatLng(data.lat, data.lng);
			lat_lng.push(myLatlng);
			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: data.title,
				lable : data.lable,
				icon: {url: urlmarker}
				
			});
			latlngbounds.extend(marker.position);
			(function (marker, data) {
				google.maps.event.addListener(marker, "click", function (e) {
					infoWindow.setContent(data.description);
					infoWindow.open(map, marker);
				});
			})(marker, data);
		}
		map.setCenter(latlngbounds.getCenter());
		map.fitBounds(latlngbounds);

		//***********ROUTING****************//

		//Intialize the Path Array
		var path = new google.maps.MVCArray();

		//Intialize the Direction Service
		var service = new google.maps.DirectionsService();

		//Set the Path Stroke Color
		var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

		//Loop and Draw Path Route between the Points on MAP
		for (var i = 0; i < lat_lng.length; i++) {
			if ((i + 1) < lat_lng.length) {
				var src = lat_lng[i];
				var des = lat_lng[i + 1];
				path.push(src);
				poly.setPath(path);
				service.route({
					origin: src,
					destination: des,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				}, function (result, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
							path.push(result.routes[0].overview_path[i]);
						}
					}
				});
			}
		}
	}
</script>
<script type="text/javascript">
    function myFunction(id) {
        var detail = "detail"+id;
        var advances = "advances"+id;
        var dtl = document.getElementById(detail);
        var adv = document.getElementById(advances);
        if (adv.style.display === "none") {
            adv.style.display = "block";
            dtl.style.display = "none";
            
        } else {
            adv.style.display = "none";
            dtl.style.display = "block";
        }
    }
    

    

</script>