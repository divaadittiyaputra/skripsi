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

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('user_member/dashboard') ?>">Beranda</a>
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
            	<form method="post" action="<?= base_url('/user_member/analisis/doAnalisa/'); ?>">
	                <div class="col-xs-12">
	                	<div class="form-group row ">
	                        <label class="col-sm-2 col-form-label">Find your addres on map </label>
	                        <div class="col-md-5">

	                            <input class="postcode form-control" id="Postcode" name="Postcode" type="text" value="" placeholder="Type your address name or street">
	                        </div>
	                        <div class="col-md-1">
	                            <button class="btn btn-sm" type="button" id="findbutton">Find</button>
	                        </div>
	                        <div class="col-md-2 col-sm-1">
	                            <input type="hidden" class="form-control" id="latitude" name="lat" placeholder="latitude" value="" readonly="">
	                        </div>
	                        <div class="col-md-2 col-sm-1">
	                            <input type="hidden" class="form-control" id="longitude" name="lng" placeholder="longitude" value="" readonly="">
	                        </div>
	                    </div>
						<div class="row form-group" style="padding: 10px;">
	                       
	                        <div id="map" style="height: 250px; width: 100%;" class="col-md-12"></div>
	                    </div>
	                    <div class="form-group row">
							<div class="col-md-3">
								<select class="form-control selectpicker" name="kategori" data-live-search="true" required="">	
									<option value="">Pilih Kategori Umkm</option>
									<?php foreach ($kategori as $fkey => $value) { ?>
										<option value="<?= $value->id_kategori; ?>" <?= check_selected($kategoriNol, $value->id_kategori); ?> ><?= $value->namaKategori; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<button type="submit" class="btn btn-primary">Go Step 1</button>
							</div>
						</div>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7Mr1SnmpnkqSqZZcFDXOPK0LVGJ1aqV4"></script>
<script type="text/javascript">
$(document).ready(function() {
	okmap();
	$("#findbutton").trigger('click');
});
function okmap(){
    var geocoder = new google.maps.Geocoder();
    var marker = null;
    var map = null;
    initialize();
    $('#findbutton').click(function (e) {
        var address = $("#Postcode").val();
        if(address == ""){
            address = "Surabaya";
        }
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                $(latitude).val(marker.getPosition().lat());
                $(longitude).val(marker.getPosition().lng());
            } else {
                alert("There no such place.");
            }
        });
        e.preventDefault();
    });

    function initialize() {
        var $latitude = document.getElementById('latitude');
        var $longitude = document.getElementById('longitude');
        var latitude = "";
        var longitude = "";
        var zoom = 17;

        var LatLng = new google.maps.LatLng(latitude, longitude);

        var mapOptions = {
            zoom: zoom,
            center: LatLng,
            panControl: false,
            zoomControl: false,
            scaleControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        if (marker && marker.getMap) marker.setMap(map);
        marker = new google.maps.Marker({
            position: LatLng,
            map: map,
            title: 'Drag Me!',
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function(marker) {
            var latLng = marker.latLng;
            $latitude.value = latLng.lat();
            $longitude.value = latLng.lng();
        });
    }
}
</script>