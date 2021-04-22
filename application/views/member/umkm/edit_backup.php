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
			</style>
			<script type="text/javascript">
			
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
				
				var geocoder;
				var map;
				var marker;

				codeAddress = function () {
					geocoder = new google.maps.Geocoder();
				  
					var input = document.getElementById('info2').value;
					var latlngStr = input.split(',', 2);
					var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
					geocoder.geocode( { 'location':latlng }, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
					map = new google.maps.Map(document.getElementById('mapCanvas'), {
					zoom: 15,
						streetViewControl: false,
						mapTypeControlOptions: {
						style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
						mapTypeIds:[google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.ROADMAP] 
					},
					center: results[0].geometry.location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  });
					  map.setCenter(results[0].geometry.location);
					  marker = new google.maps.Marker({
						  map: map,
						  position: results[0].geometry.location,
						  draggable: true,
						  title: 'My Title'
					  });
					  updateMarkerPosition(results[0].geometry.location);
					  geocodePosition(results[0].geometry.location);
						
					  // Add dragging event listeners.
				  google.maps.event.addListener(marker, 'dragstart', function() {
					updateMarkerAddress('Dragging...');
				  });
					  
				  google.maps.event.addListener(marker, 'drag', function() {
					updateMarkerStatus('Dragging...');
					updateMarkerPosition(marker.getPosition());
				  });
				  
				  google.maps.event.addListener(marker, 'dragend', function() {
					updateMarkerStatus('Drag ended');
					geocodePosition(marker.getPosition());
					  map.panTo(marker.getPosition()); 
				  });
				  
				  google.maps.event.addListener(map, 'click', function(e) {
					updateMarkerPosition(e.latLng);
					geocodePosition(marker.getPosition());
					marker.setPosition(e.latLng);
				  map.panTo(marker.getPosition()); 
				  }); 
				  
					} else {
					  alert('Geocode was not successful for the following reason: ' + status);
					}
				  });
				}

				function geocodePosition(pos) {
				  geocoder.geocode({
					latLng: pos
				  }, function(responses) {
					if (responses && responses.length > 0) {
					  updateMarkerAddress(responses[0].formatted_address);
					} else {
					  updateMarkerAddress('Cannot determine address at this location.');
					}
				  });
				}

				function updateMarkerStatus(str) {
				  document.getElementById('markerStatus').innerHTML = str;
				}

				function updateMarkerPosition(latLng) {
				  document.getElementById('info').text = [
					latLng.lat(),
					latLng.lng()
				  ].join(', ');
				  $('#info2').val([
					latLng.lat(),
					latLng.lng()
				  ].join(', '));
				}

				function updateMarkerAddress(str) {
				  document.getElementById('address').innerHTML = str;
				}

				window.onload = function() {
				  codeAddress();
				};
            </script>
 
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/umkm/daftar') ?>">UMKM</a>
                </li>
                
                
                <li class="active">Edit UMKM</li>
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
                    Form Edit UMKM
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url('admin/umkm/doUpdate/').$this->uri->segment(4); ?>" role="form"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                            Harap isi isian di bawah ini:
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Kategori</label>
                            <div class="col-sm-6">
                                <input type="text" id="form-field-1" name="nama_umkm" value="<?php echo $detailData->nama_umkm ?>" placeholder="Isi Nama Pengguna" class="form-control" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kategori</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="id_kategori">
									<?php foreach($kategori as $value){ ?>
										<option value="<?php echo $value->id_kategori ?>"  <?php if($value->id_kategori == $detailData->id_kategori){ echo "SELECTED"; } ?> ><?php echo $value->namaKategori; ?></option>
									<?php } ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Produk</label>
                            <div class="col-sm-6">
                                <input type="text" id="form-field-1" name="produk" value="<?= $detailData->produk?>" placeholder="Isi Nama Produk" class="form-control" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Pemilik</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="pemilik">
									<?php foreach($pemilik as $value){ ?>
										<option value="<?php echo $value->id_pemilik ?>"  <?php if($value->id_pemilik == $detailData->pemilik){ echo "SELECTED"; } ?> ><?php echo $value->nama; ?></option>
									<?php } ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>
                            <div class="col-sm-6">
                                <input type="text" id="form-field-1" name="alamat" value="<?= $detailData->alamat?>" placeholder="Isi Alamat" class="form-control" required/>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Koordinat</label>
                            <div class="col-sm-6">
                               <input type="text" name="koordinat" id="info2" value="<?php echo $detailData->koordinat ?>" required class="form-control" placeholder="Masukan Koordinat Lokasi"/>
							<div id="panel" style="visibility: hidden;">
									<input id="city_country" type="textbox" value="Pontianak Tenggara">
									<!-- <input type="button" value="Geocode" onclick="codeAddress()"> -->
								</div>  
							
								<div id="infoPanel" style="visibility:hidden; height:1px;">
									<b>Marker status:</b>
									<div id="markerStatus"><i>Click and drag the marker.</i></div>
									<b>Current position:</b>
									<div id="info"></div>
									<b>Cl
								</div> 
							  <div id="mapCanvas"></div>
							</div>
						</div>
						
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Update
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAimmxpez6ejTwZ0EZYNEgQmfHco7NJ0RQ">
</script>