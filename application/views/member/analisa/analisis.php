<?php $this->load->view('member/include/floydwarshall.php') ?>
<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootflat/2.0.4/css/bootflat.css">
			<script>
				try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
			</script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
			 <script>
				  function initMap() {
					var map = new google.maps.Map(document.getElementById('map'), {
					  center: {lat: -2.548926, lng: 118.0148634},
					  zoom: 13
					});
			 
					// Menggunakan fungsi HTML5 geolocation.
					if (navigator.geolocation) {
					  navigator.geolocation.getCurrentPosition(function(position) {
						var pos = {
						  lat: position.coords.latitude,
						  lng: position.coords.longitude
						};
			 
						marker = new google.maps.Marker({
						  position: pos,
						  map: map,
						  icon: 'location.png',
						  title: 'Posisi Kamu',
						  animation: google.maps.Animation.DROP,
						});
			 
						map.setCenter(pos);
			 
						var user_location = position.coords.latitude+","+position.coords.longitude;
						var url = "tampil.php";
						var jarak = 1;
						var info = [];
						$.ajax({
							url: url,
							data: "position="+encodeURI(user_location)+"&jarak="+jarak,
							dataType: 'json',
							cache: true,
							success: function(msg){
							  for(i=0; i < msg.data.kafe.length;i++){
								var point = new google.maps.LatLng(parseFloat(msg.data.kafe[i].latitude),parseFloat(msg.data.kafe[i].longitude));
								tanda = new google.maps.Marker({
									position: point,
									map: map,
									icon: "place.png",
									animation: google.maps.Animation.DROP,
									title: msg.data.kafe[i].nama_kafe
								});
							  }
							}
						});
			 
					  }, function() {
						handleLocationError(true, map.getCenter());
					  });
					} else {
					  handleLocationError(false, map.getCenter());
					}
				  }
			 
				  function showPlaces() {
					var map = new google.maps.Map(document.getElementById('map'), {
					  center: {lat: -2.548926, lng: 118.0148634},
					  zoom: 13
					});
			 
					// Menggunakan fungsi HTML5 geolocation.
					if (navigator.geolocation) {
					  navigator.geolocation.getCurrentPosition(function(position) {
						var pos = {
						  lat: position.coords.latitude,
						  lng: position.coords.longitude
						};
			 
						marker = new google.maps.Marker({
						  position: pos,
						  map: map,
						  icon: 'location.png',
						  title: 'Posisi Kamu',
						  animation: google.maps.Animation.DROP,
						});
			 
						map.setCenter(pos);
						var user_location = position.coords.latitude+","+position.coords.longitude;
						var url = "tampil.php";
						var jarak = document.getElementById("jarak").value;
			 
						$.ajax({
							url: url,
							data: "position="+encodeURI(user_location)+"&jarak="+jarak,
							dataType: 'json',
							cache: true,
							success: function(msg){
							  for(i=0; i < msg.data.kafe.length;i++){
								var point = new google.maps.LatLng(parseFloat(msg.data.kafe[i].latitude),parseFloat(msg.data.kafe[i].longitude));
								tanda = new google.maps.Marker({
									position: point,
									map: map,
									icon: "place.png",
									animation: google.maps.Animation.DROP,
									title: msg.data.kafe[i].nama_kafe
								});
							  }
							}
						});
			 
					  }, function() {
						handleLocationError(true, map.getCenter());
					  });
					} else {
					  handleLocationError(false, map.getCenter());
					}
				  }
				  function handleLocationError(browserHasGeolocation, pos) {
					var map = new google.maps.Map(document.getElementById('map'), {
					  center: {lat: -2.548926, lng: 118.0148634},
					  zoom: 13
					});
					var infoWindow = new google.maps.InfoWindow({map: map});
					infoWindow.setPosition(pos);
					infoWindow.setContent(browserHasGeolocation ?
										  'Error: The Geolocation service failed.' :
										  'Error: Your browser doesn\'t support geolocation.');
				  }
			 
				  google.maps.event.addDomListener(window, 'load', initMap);
				</script>
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>

                
                <li class="active">Data Umkm</li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
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
                <div class="col-xs-12">


                    <!--
                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                    </h4>
                -->

                <div class="row">
                    <div class="col-xs-12">

                        <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                        </div>
                        <div class="container">
							<div class="row">
							  <div class="col-lg-12">
								<legend><h3>Cari Tempat Ngopi</h3></legend>
							  </div>
							</div>
							<div class="row">
							  <div class="col-lg-9">
								<div id="map" style="width:100%; height:600px;"></div>
							  </div>
						 
							  <div class="col-lg-3">
								<form class="form-vertical" method="post" action="#">
								  <div class="form-group">
									<label>Radius / Jarak</label>
									<select id="jarak" name="jarak" class="form-control">
									  <option value="">-- Silahkan Pilih Radius / Jarak --</option>
									  <option value="1">1 KM</option>
									  <option value="2">2 KM</option>
									  <option value="3">3 KM</option>
									  <option value="4">4 KM</option>
									  <option value="5">5 KM</option>
									  <option value="6">6 KM</option>
									  <option value="7">7 KM</option>
									  <option value="8">8 KM</option>
									  <option value="9">9 KM</option>
									  <option value="10">10 KM</option>
									  <option value="11">11 KM</option>
									  <option value="12">12 KM</option>
									  <option value="13">13 KM</option>
									  <option value="14">14 KM</option>
									  <option value="15">15 KM</option>
									  <option value="16">16 KM</option>
									  <option value="17">17 KM</option>
									  <option value="18">18 KM</option>
									  <option value="19">19 KM</option>
									  <option value="20">20 KM</option>
									  <option value="21">21 KM</option>
									  <option value="22">22 KM</option>
									  <option value="23">23 KM</option>
									  <option value="24">24 KM</option>
									  <option value="25">25 KM</option>
									  <option value="26">26 KM</option>
									  <option value="27">27 KM</option>
									  <option value="28">28 KM</option>
									  <option value="29">29 KM</option>
									  <option value="30">30 KM</option>
									</select>
								  </div>
								 
								  <div class="form-group">
									<button id="cari" type="button" class="btn btn-primary" onclick="showPlaces();">Cari Tempat</button>
								  </div>
								</form>
							  </div>
							</div>
							<div class="row">
							  <div class="col-lg-12">
								<hr>
								<footer>
								 <p>&copy; 2015 by <a href="http://elcicko.com">www.elcicko.com.</a></p>
								</footer>
							  </div>
							</div>
						  </div>
						 
						  <!-- Latest compiled and minified JavaScript -->
						  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


					</div><!-- /.modal-dialog -->
				</div>
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->