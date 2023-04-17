<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/extensions/jquery_ui/effects.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/jqueryui_components.js"></script>
		<!-- Main content -->
		<div class="content-wrapper">
 
			<!-- Content area -->
			<div class="content">
				<div class="row">
					 
					<div class="col-sm-12 col-xl-12">
						<div class="alert bg-teal text-white alert-styled-left alert-dismissible h6">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									
									<span class="font-weight-semibold">hi <?php echo $this->session->userdata('name'); ?> !</span> sistem mendeteksi progress input data Administrator BAPPEDA <?php echo $complete['total_complete']; ?> % complete dari <?php echo $complete['total_table']; ?> tabel.
									<div class="mb-2 mt-2">
									<div class="ui-progressbar ui-progressbar-striped ui-progressbar-active jui-progressbar" data-fouc="<?php echo $complete['total_complete']; ?>"></div>
									</div>
								</div>
					</div>
					
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body bg-indigo-800 has-bg-image">
							<div class="media">
								<div class="mr-3 align-self-center"> 
									<i class="icon-enter6 icon-3x opacity-75"></i>
									<span class="text-uppercase font-size-xs ml-2">visit E-data</span>
									<a href="<?php echo base_url('edata/index_data'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Dashboard E-data<b><i class="icon-spinner4 spinner"></i></b></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
					<div class="card card-body bg-primary">
						<h3 class="mb-0 font-weight-semibold">
							Urusan Dinas Daerah
						</h3>
						 
					</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pendidikan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Pendidikan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pendidikan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
		
							</div>
						</div>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/sosial.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Sosial</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('sosial/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pupr.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Pekerjaan Umum & Penataan Ruang</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pupr/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
					</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kesehatan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Kesehatan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('kesehatan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				 
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pppa.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas PPPA</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pppa/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/dukcapil.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas DUKCAPIL</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('dukcapil/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/ketahanan_pangan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Ketahanan Pangan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('ketahanan_pangan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kominfo.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-md"><span class="badge badge-mark border-danger"></span> Dinas KOMINFO</span><br>
									<span class="font-size-xs"><br></span>
									<a href="<?php echo base_url('kominfo/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/koperasi_umkm.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Koperasi dan UMKM</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('koperasi_umkm/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/lingkungan_hidup.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Lingkungan Hidup</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('lingkungan_hidup/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perhubungan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perhubungan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perhubungan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perikanan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perikanan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perikanan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perindustrian_perdagangan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perdagangan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perindustrian_perdagangan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<!--<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perkebunan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perkebunan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perkebunan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div> -->
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perpustakaan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perpustakaan dan Kearsipan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perpustakaan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pmk.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas PMK</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pmk/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pmptsp.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas PMPTSP</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pmptsp/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/porapar.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Kepemudaan dan Olahraga</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('porapar/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pp_kb_dalduk.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas PP, KB</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pp_kb_dalduk/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/transmigrasi.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Tenaga Kerja & Transmigrasi</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('transmigrasi/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/tphp.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Pertanian</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('tphp/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/pariwisata.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Pariwisata dan Kebudayaan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('pariwisata/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/perumahan_pemukiman.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Dinas Perumahan Rakyat & Kawasan Pemukiman</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('perumahan_pemukiman/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-12">
					<div class="card card-body bg-primary">
						<h3 class="mb-0 font-weight-semibold">
							Urusan Badan Daerah
						</h3>
						 
					</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kesbangpol.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan KESBANGPOL</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('kesbangpol/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bpbd.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan Penanggulangan Bencana Daerah</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bpbd/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bkd.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan Kepegawaian, Kependidikan & Pelatihan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bkd/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bpkad.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan Pengelola Keuangan & Aset Daerah</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bpkad/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bappeda.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan Perencanaan Pembangunan Daerah</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bappeda/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bpd.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Badan Pendapatan Daerah</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bpd/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-12">
					<div class="card card-body bg-primary">
						<h3 class="mb-0 font-weight-semibold">
							Urusan Sekretariat Daerah
						</h3>
						 
					</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/ekonomi.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Ekonomi</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('ekonomi/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/tapem.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian TAPEM</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('tapem/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kesra.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Kesra</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('kesra/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/baghukum.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Hukum</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('hukum/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kerjasama.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Kerjasama</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('kerjasama/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/admpembangunan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian ADM Pembangunan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('admpembangunan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bpbj.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Pengadaan Barang & Jasa</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bpbj/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bagsda.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Sumber Daya Alam</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bagsda/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bagumum.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Umum</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bagumum/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bagor.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Organisasi</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bagor/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bagprotokol.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Protokol</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bagprotokol/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/bagkeu.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Bagian Keuangan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('bagkeu/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-12">
					<div class="card card-body bg-primary">
						<h3 class="mb-0 font-weight-semibold">
							Urusan Lainya Daerah
						</h3>
						 
					</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/polpp.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Satuan Polisi Pamong Praja</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('polpp/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/inspektorat.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Inspektorat</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('inspektorat/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/rsud.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Rumah Sakit Umum Daerah</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('rsud/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				
				<div class="col-sm-6 col-xl-4">
						<div style="background: url(<?php echo base_url('assets/admin');?>/images/backgrounds/kecamatan.jpg) center center no-repeat; background-size: cover;">
						<div class="card card-body bg-success-400" style="background-color: rgba(14, 27, 33, 0.7);">
							<div class="media">
								<div class="media-body">
									<h3 class="mb-1"></h3>
									<span class="text-uppercase font-size-xs"><span class="badge badge-mark border-danger"></span> Pemerintahan Kecamatan</span><br>
									<span class=" font-size-xs"><br></span>
									<a href="<?php echo base_url('kecamatan/'); ?>" class="btn btn-outline bg-primary-800 border-primary-300 text-light btn-labeled btn-labeled-right ml-auto mt-3">Sign In<b><i class="icon-toggle"></i></b></a>
								</div>
							</div>
						</div>
						</div>
				</div>
				</div>				
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->

<?php $this->load->view('footer') ?>