<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>

                
                <li class="active">Data UMKM</li>
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
                    Data UMKM
                
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
                        <div class="table-header">
                            Menampilkan Seluruh Data UMKM
                        </div>

                        <!-- div.table-responsive -->
                        <div class="modal-footer no-margin-top"> 
                            <a href="<?php echo base_url('admin/umkm/add/') ?>">
                                <button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal">
                                    <i class="ace-icon fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </a>    
							<a href="<?php echo base_url('admin/umkm/importData/') ?>" >
								<button type="button" class="btn btn-sm btn-success pull-right" data-dismiss="modal" onclick="return confirm('Anda yakin ingin menambah data UMKM?')">
									<i class="ace-icon fa fa-download"></i>
									Import Data Excel
								</button>
							</a>
							<a href="<?php echo base_url('admin/umkm/truncateUmkm/') ?>" >
								<button type="button" class="btn btn-sm btn-danger pull-right" data-dismiss="modal" style="margin-right:20px;" onclick="return confirm('Anda yakin ingin menghapus semua data UMKM? Jika Ya maka data pemilik UMKM akan terhapus juga')">
									<i class="ace-icon fa fa-trash"></i>
									Hapus Semua Data UMKM
								</button>
							</a>
                        </div>
                        <!-- div.dataTables_borderWrap -->

                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama UMKM</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
										<th>Pengusaha</th>
										<th>Desa</th>
										<th>Kecamatan</th>
										<th>Kategori</th>
										<!--<th>Produk</th>-->
										<!--<th>No Telp</th>-->
										
										<th>Lat</th>
										<th>Lon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                 <?php
                                 $no = 0 ;
                                 foreach($listData as $value){
                                    $no++;
                                    //$koordinat = explode(", ", $value->koordinat);
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $value->nama_umkm; ?></td>
										<td><?php echo $value->alamat; ?></td>
										<td><?php echo $value->rt; ?></td>
										<td><?php echo $value->rw; ?></td>
										<td><?php echo $value->nama?></td>
										<td><?php echo $value->nama_desa?></td>
										<td><?php echo $value->nama_kecamatan?></td>
										<td><?php echo $value->namaKategori; ?></td>
										<!--<td><?php echo $value->produk; ?></td>-->
										<!--<td><?php echo $value->telepon?></td>-->
										<td><?php echo $value->lat; ?></td>
										<td><?php echo $value->long; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/umkm/edit/'.$value->id_umkm) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Lihat/Edit</span></button></a>
                                            <a href="<?php echo base_url('admin/umkm/doDelete/'.$value->id_umkm) ?>"><button class="btn btn-danger btn-sm"   style="margin-left:2px" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')"><i class="fa fa-trash" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Hapus</span></button></a>
                                        </td>

                                    </tr>
                                    <?php 
                                }
                                ?>   
                            </tbody>
                        </table> 
                    </div>

                </div><!-- /.modal-dialog -->
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
