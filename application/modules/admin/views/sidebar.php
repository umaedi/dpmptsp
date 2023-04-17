		<style>
	.sidebar-user-material .sidebar-user-material-body {
     
    background-size: cover;
	}
	.text-shadow-dark {
    text-shadow: 0 0 0.1875rem rgb(0, 0, 0);
	}
	</style>	 
			<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md align-self-start">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Main sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body card-img-top">
						<div class="card-body text-center">
							<a href="#">
								<img src="#" class="img-fluid rounded-circle shadow-2 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $this->session->userdata('name'); ?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $this->session->userdata('alamat'); ?></span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?php echo base_url('admin/profile'); ?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
									<i class="icon-people"></i>
									<span>Users List</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/pages'); ?>" class="nav-link">
									<i class="icon-file-text2"></i>
									<span>Pages</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/activities'); ?>" class="nav-link">
									<i class="icon-sort-time-asc"></i>
									<span>Users Activities</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/messages'); ?>" class="nav-link">
									<i class="icon-bubbles3"></i>
									<span>Messages</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/setting'); ?>" class="nav-link">
									<i class="icon-cog3"></i>
									<span>Website Setting</span>
								</a>
							</li>
							<li class="nav-item">
								<a onClick="signOut()" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Navigation -->
				<div class="card card-sidebar-mobile">
						<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin'); ?>" class="nav-link <?php if(!$this->uri->segment(2)){ echo "active"; } ?>"><i class="icon-home4"></i><span>Dashboard Home</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url('edata/'); ?>" class="nav-link"><i class="icon-table2"></i><span>Dashboard E-Data</span></a></li>	
						</ul>
						</div>
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary">GAMBARAN UMUM</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin/luas_wilayah_menurut_kecamatan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'luas_wilayah'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Luas Wilayah</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url('admin/luas_penggunaan_lahan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'luas_penggunaan_lahan'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Luas Penggunaan Lahan</a></li> 
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>Jumlah Penduduk</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="<?php echo base_url('admin/jumlah_penduduk_menurut_kecamatan'); ?>" class="nav-link"> <span>Menurut Kecamatan</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/jumlah_penduduk_menurut_jenis_kegiatan'); ?>" class="nav-link"> <span>Menurut Jenis Kegiatan</span></a></li>
								</ul>
							</li>
							<li class="nav-item"><a href="<?php echo base_url('admin/jumlah_pencari_kerja'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'jumlah_pencari_kerja'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Jumlah Pencari Kerja</span></a></li> 
							<!-- /main -->
							<li class="nav-item"><a href="<?php echo base_url('admin/penghargaan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'penghargaan'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Penghargaan</span></a></li> 
						</ul>
					</div>
				</div>
				<!-- /navigation -->
				
				<!-- Navigation -->
				<div class="card card-sidebar-mobile">	
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary text-uppercase">Capaian Misi Pembangunan</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin/capaian_misi_pembangunan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'capaian_misi_pembangunan'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Capaian Misi Pembangunan</span></a></li>
							
						</ul>
					</div>
				</div>
				<!-- /navigation -->

				<!-- Navigation -->
				<div class="card card-sidebar-mobile">
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary">EKONOMI DAN KEUANGAN</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">

							<!-- Layout -->
							<li class="nav-item"><a href="<?php echo base_url('admin/perkembangan_data_makro_kabupaten'); ?>" class="nav-link active"><i class="icon-file-text2"></i> <span>Makro Kabupaten</span></a></li>
							
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>Perkembangan PDRB</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="<?php echo base_url('admin/pdrb_atas_dasar_harga_konstan'); ?>" class="nav-link"><span>Atas Dasar Harga Konstant</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/pdrb_atas_dasar_harga_berlaku'); ?>" class="nav-link"><span>Atas Dasar Harga Berlaku</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/pdrb_harga_berlaku_dan_harga_konstan'); ?>" class="nav-link"><span>PDRB Harga Berlaku & Harga Konstan</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/pdrb_perkapita'); ?>" class="nav-link"><span>PDRB Perkapita</span></a></li>
								</ul>
							</li>
							
							<li class="nav-item"><a href="<?php echo base_url('admin/peranan_pdrb_menurut_lapangan_usaha'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'peranan_pdrb_menurut_lapangan_usaha'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Peranan PDRB Menurut Lapangan Usaha</span></a></li>
							
							<li class="nav-item"><a href="<?php echo base_url('admin/laju_pertumbuhan_riil'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'laju_pertumbuhan_riil'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Laju Pertumbuhan Riil Menurut Lapangan Usaha</span></a></li>
							
							<li class="nav-item"><a href="<?php echo base_url('admin/perkembangan_apbd'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'perkembangan_apbd'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Perkembangan APBD</span></a></li>
						
						</ul>
					</div>
				</div>
				<!-- /navigation -->
				
				<!-- Navigation -->
				<div class="card card-sidebar-mobile">
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary">SOSIAL</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<!-- Layout -->
							<li class="nav-item"><a href="<?php echo base_url('admin/ipm_kabupaten'); ?>" class="nav-link"><i class="icon-file-text2"></i> <span>IPM Kabupaten</span></a></li>
									
							
							<li class="nav-item"><a href="<?php echo base_url('admin/angka_harapan_hidup'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'angka_harapan_hidup'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Angka Harapan Hidup</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url('admin/angka_harapan_lama_sekolah'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'angka_harapan_lama_sekolah'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Angka Harapan Lama Sekolah</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url('admin/rata_rata_lama_sekolah'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'rata_rata_lama_sekolah'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Rata-Rata Lama Sekolah</span></a></li>
							<li class="nav-item"><a href="<?php echo base_url('admin/paritas_daya_beli_kabupaten'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'paritas_daya_beli_kabupaten'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Paritas Daya beli Kabupaten</span></a></li>
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-file-text2"></i> <span>Tingkat Kemiskinan</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="<?php echo base_url('admin/tingkat_kemiskinan_kabupaten'); ?>" class="nav-link"><span>Tingkat Kemiskinan Kabupaten</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/tingkat_kemiskinan_kabupaten_kota'); ?>" class="nav-link"><span>Tingkat Kemiskinan Kabupaten Kota</span></a></li>
									<li class="nav-item"><a href="<?php echo base_url('admin/garis_kemiskinan_kabupaten_kota'); ?>" class="nav-link"><span>Garis Kemiskinan Menurut Kabupaten Kota</span></a></li>
									 
								</ul>
							</li>	
							<li class="nav-item"><a href="<?php echo base_url('admin/ketenagakerjaan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'ketenagakerjaan'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Ketenagakerjaan</span></a></li>
						</ul>
					</div>
				</div>
				<!-- /navigation -->
				
				<!-- Navigation -->
				<div class="card card-sidebar-mobile">	
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary text-uppercase">Tatakelola Pemerintahan</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin/tatakelola_pemerintahan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tatakelola_pemerintahan'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Kondisi Tatakelola Pemerintahan</span></a></li>
							
						</ul>
					</div>
				</div>
				<!-- /navigation -->
				
				<!-- Navigation -->
				<div class="card card-sidebar-mobile">	
					<div class="card-header header-elements-inline">
						<h6 class="card-title text-primary text-uppercase">Infrastruktur</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin/infrastruktur'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'infrastruktur'){ echo "active"; }; ?>"><i class="icon-file-text2"></i> <span>Kondisi Infrastruktur</span></a></li>
							
						</ul>
					</div>
				</div>
				<!-- /navigation -->
			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->

			
			
			 
				
					
			 
			