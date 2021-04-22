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
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>
                <li class="active">Hasil Analisa</li>
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
                    Hasil Analisa
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-md-12" style="overflow: auto;">
                    <table class="table table-striped table-bordered" >
                        <tr>
                            <td>Jarak dalam KM</td>
                            <?php
                            $result = $this->db->query("select distinct a.* from umkm a, jarak b where a.id_umkm =b.id_umkm2 ");
                            foreach($result->result() as $par){
                                echo "<td>".$par->nama_umkm."</td>";
                            }
                            ?>
                        </tr>
                    <tr>
                        <?php  
                       
                        $result = $this->db->query("select distinct a.* from umkm a, jarak b where a.id_umkm =b.id_umkm1 ");
                        foreach($result->result() as $par){
                                 $idx=0;
                                 echo "<tr>";
                                $result2 = $this->db->query("select distinct a.* from umkm a, jarak b where a.id_umkm =b.id_umkm2 ");
                                foreach($result2->result() as $par2){
                                        //get value
                                        $value = $this->db->query("select * from jarak where id_umkm2=".$par2->id_umkm." and id_umkm1=".$par->id_umkm)->row();
                                        if($idx==0){
                                            
                                            ?>
                                            <td><?php echo $par->nama_umkm?></td>
                                            <td><?php echo $value->value?></td>
                                            <?php 
                                        
                                        }else{
                                            
                                             ?>
                                            <td><?php echo $value->value?></td>
                                            <?php 
                                        }
                                        $idx++;
                                    }
                                    
                                     echo "</tr>";
                                }
                               
                             ?>
                    
                    
                </table>
                </div>
                
                <div class="col-md-12" style="overflow: auto;">
                    <h2>Analisa Jarak </h2>
                    <table class="table table-striped table-bordered" >
                       
                    <tr>
                        <!--<td>No</td>-->
                        <td>Arah</td>
                        <td>Jarak</td>
                    </tr>
                    <?php
                    $no=1;
                    
            		for($int=count($array_jalur)-1; $int>=0; $int--){
            		
                    $result = $this->db->query("select jrk.*, umkm1.nama_umkm as umkm1,umkm2.nama_umkm as umkm2 
                                                from jarak as jrk 
                                                left join umkm as umkm1 on umkm1.id_umkm=jrk.id_umkm1
                                                left join umkm as umkm2 on umkm2.id_umkm=jrk.id_umkm2
                                                where id_jarak in(".$array_jalur[$int].")");
                    foreach($result->result() as $val){
                       echo "<tr>";
                            // echo "<td>".$no."</td>";
                            echo "<td>".$val->umkm1." -> ".$val->umkm2."</td>";
                            echo "<td>".$val->value."</td>";
                       echo "</tr>";
                       $no++; 
                    }
                    // echo "<tr><td colspan='2'></td><td></td></tr>";
            		}
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 