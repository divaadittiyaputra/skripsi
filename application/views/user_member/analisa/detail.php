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
	            <div class="col-xs-12">
	                <h5><b>UMKM YANG DIREKOMENDASIKAN :</b></h5>
						<div style="display:block;">
							<?php 
								
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
				</div>
            </div>
        </div>
    </div>
</div>