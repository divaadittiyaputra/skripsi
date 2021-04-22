<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">

        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            
            <!--
            <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
            </button>

            
            <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
            </button>
            -->    

        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <!--
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
            -->
        </div>
    </div>
    <?php 
	$level  = $this->session->loginData['lvlUser'];
    $cur1 = $this->uri->segment(2);
    ?>
	<?php if ($level == 1 ){?>
    <ul class="nav nav-list">
        <li class="<?php echo ($cur1=="dashboard") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
		<!--
		<li class="<?php echo ($cur1=="petugas") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    Petugas
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/pengguna/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Pengguna
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/pengguna/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Pengguna
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
		-->
		<li class="<?php echo ($cur1=="kategori") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Kategori
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/kategori/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Kategori
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/kategori/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Kategori
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        
        <li class="<?php echo ($cur1=="kecamatan") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Kecamatan
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/kecamatan/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Kecamatan
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/kecamatan/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Kecamatan
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        
        <li class="<?php echo ($cur1=="desa") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Desa
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/desa/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Desa
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/desa/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Desa
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        
		
		<li class="<?php echo ($cur1=="pemilik") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user "></i>
                <span class="menu-text">
                    Data Pemilik UMKM
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/pemilik/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Data Pemilik
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/pemilik/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Pemilik
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
		
		<li class="<?php echo ($cur1=="umkm") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text">
                    UMKM
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/umkm/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Data UMKM
					</a>

                    <b class="arrow fa fa-angle-down"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/umkm/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data UMKM
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
         
        <li class="<?php echo ($cur1=="jarak") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Jarak
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/jarak/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Jarak
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/jarak/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data jarak
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        

        <!--
        <li class="<?php echo ($cur1=="pengguna") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Pengguna
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/pengguna/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Pengguna
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/pengguna/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Pengguna
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        -->

        
        <li class="<?php echo ($cur1=="analisis") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bar-chart "></i>
                <span class="menu-text">
                    Analisis
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/analisis/hasil2') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Hasil Analisis
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
		-->
		
		<!--
	
		<li class="<?php echo ($cur1=="pengunjung") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-male "></i>
                <span class="menu-text">
                    Data Pengunjung
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/pengunjung/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Pengunjung
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/pengunjung/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Pengunjung
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
		-->







<!--SIDE BAR MENU PENGGUNA -->
    </ul><!-- /.nav-list -->
	<?php } else if ($level == 2){?>
	<ul class="nav nav-list">
        <li class="<?php echo ($cur1=="dashboard") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda</span>
            </a>
            <b class="arrow"></b>
        </li>
		
		<li class="<?php echo ($cur1=="umkm") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-building"></i>
                <span class="menu-text">
                    UMKM
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/umkm/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Data UMKM
					</a>

                    <b class="arrow fa fa-angle-down"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/umkm/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data UMKM
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>









		<!--
		<li class="<?php echo ($cur1=="petugas") ? "active" : ""; ?>">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bars "></i>
                <span class="menu-text">
                    Data Pengunjung
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/pengunjung/add') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Tambah Pengunjung
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/pengunjung/daftar') ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Pengunjung
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
		-->
    </ul><!-- /.nav-list -->
	<?php } else {
		
	} ?>
    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
