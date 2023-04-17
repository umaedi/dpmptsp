<?php $this->load->view('header'); ?>
<?php if ($this->agent->is_mobile()) { ?>
	<style>
	    .homes {
            background-image: url(<?php echo base_url('assets/images/web/MPP2.jpg'); ?>);
			background-position: center;
            background-size: cover;
        }
	    
	</style>
		<section class="hg_section homes pt-100 pb-50">	
			<div class="container">
					<div class="container align-self-center  mt-50">
						<div class="row">
						
							<div class="col-sm-12 col-md-12">
								<!-- Title element with line symbol -->
								<div class="text-center tbk-symbol--line">
									<!-- Title --><h1 class="agencytitle">TULANG BAWANG</h1>
									<h3 class="tbk__title text-white" style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;">
										Temukan data Pemerintah dengan mudah!
									</h3>

									<!-- Title bottom line symbol -->
									<div class="tbk__symbol">
										<span></span>
									</div>
									<!--/ Title bottom line symbol -->
								</div>
								<!--/ Title element with line symbol -->
							</div>
							<div class="col-sm-12 col-md-12">
								
								<div class="elm-searchbox elm-searchbox--normal elm-searchbox--eff-typing">
									<!-- Search box wrapper -->
									<div class="elm-searchbox__inner">
										<form class="elm-searchbox__form" action="<?php echo base_url('data/index_data');?>" method="get">
											<input name="keyword" maxlength="30" class="elm-searchbox__input" type="text" size="20" value="" placeholder="Cari Data ...">
											<span class="elm-searchbox__input-text"></span>
											<button type="submit" id="searchbox_submit" class="elm-searchbox__submit fas fa-search"></button>

											<div class="clearfix"></div>
										</form>
									</div>
									<!--/ Search box wrapper -->
								</div>
							</div>
							<!--/ .col-sm-12 .col-md-12 -->
						</div>
						<!--/ .row -->
					</div>
					<!--/ .container .align-self-center -->
				 
				<!--/ Sub-Header content wrapper d-flex -->
			</div>
		</section> 
<?php } else { ?>
<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/stylefix.css" type="text/css" media="all">
	<style>
		.banner::before   {
			content : " ";
			width : 100%;
			height : 100%;
			position : absolute;
			z-index : 1;
			background-color: rgb(0 0 0 / 20%);
		}
	    .searchbar {
			padding-top :150px;
			position: absolute;
            z-index : 3; 
           
        }
		.shows {
            background-image: url(<?php echo base_url('assets/images/web/slide-1.jpg'); ?>);
            background-position: right;
            background-size: cover;
           
        }
        .shows::before {
                content: " ";
                width: 100%;
                height: 100%;
                position: absolute;
                background: rgba(12, 24, 36, 0.55);
                right: 0;
                left: 0;
                top: 0;
        }
        .section-video-icons .left-side {
            background-color: #cd2122 !important
        }
        .kl-store form .form-row .input-text, .kl-store-page form .form-row .input-text {
            padding: 5px;
        }
		
	</style>
		<section class="hg_section banner mt-100 pt-0 pb-50">	
		 	
			<div class="container">
					<div class="container align-self-center searchbar ">
						<div class="row justify-content-md-center">
							<div class="col-sm-12 col-md-12">
								<!-- Title element with line symbol -->
								<div class="text-center tbk-symbol--line">
									<!-- Title --><h1 class="agencytitle">TULANG BAWANG</h1>
									<h3 class="tbk__title text-white" style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;">
										Temukan data Pemerintah dengan mudah!
									</h3>
									<!--/ Title -->

									<!-- Title bottom line symbol -->
									<div class="tbk__symbol">
										<br>
									</div>
									<!--/ Title bottom line symbol -->
								</div>
								<!--/ Title element with line symbol -->
							</div>
							<div class="col-sm-12 col-md-8">
								
								<div class="elm-searchbox elm-searchbox--transparent2 elm-searchbox--eff-normal border border-danger shadow">
									<!-- Search box wrapper -->
									<div class="elm-searchbox__inner">
										<form class="elm-searchbox__form" action="<?php echo base_url('data/index_data');?>" method="get">
											<input name="keyword" maxlength="30" class="elm-searchbox__input" type="text" size="20" value="" placeholder="Cari Data ...">
											<span class="elm-searchbox__input-text"></span>
											<button type="submit" id="searchbox_submit" class="elm-searchbox__submit fas fa-search"></button>

											<div class="clearfix"></div>
										</form>
									</div>
									<!--/ Search box wrapper -->
								</div>
							</div>
							<!--/ .col-sm-12 .col-md-12 -->
						</div>
						<!--/ .row -->
					</div>
					<!--/ .container .align-self-center -->
				 
				<!--/ Sub-Header content wrapper d-flex -->
			</div>
		 
		</section> 
		<!-- Hover boxes element section with custom paddings -->
		
<?php } ?>
		<section class="hg_section  pt-50  pb-50">
			<div class="container">
			
				<div class="row">
				
				<div class="col-sm-12">
					<!-- Title with default theme color  -->
					<h3 class="m_title tcolor spp-title">
						Featured Data
					</h3>
				</div>
				<!--/ col-sm-12 col-md-6 col-lg-4 -->
					<div class="col-sm-12 col-md-6 col-lg-4 pt-10">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background color -->
							<a href="<?php echo site_url('feature/gambaran-umum'); ?>" target="_self" style="background-color: #960b0b;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/umum.png" class="hb-img rb-right" alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Gambaran Umum
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background color -->
						</div>
						<!--/ Hover box element -->
					</div>
					<!--/ col-sm-12 col-md-6 col-lg-4 -->

					
					<div class="col-sm-12 col-md-6 col-lg-4 pt-10">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background color -->
							<a href="<?php echo site_url('feature/infografis'); ?>" target="_self" style="background-color: #2b8a00;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/grafis.png" class="hb-img rb-right" alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Infografis
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background color -->
						</div>
						<!--/ Hover box element -->
					</div>
					
					<div class="col-sm-12 col-md-6 col-lg-4 pt-10">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background color-->
							<a href="<?php echo site_url('feature/data-opd'); ?>" target="_self" style="background-color: #008276;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!-- Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/opd.png" class="hb-img rb-right" alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									OPD
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background color -->
						</div>
						<!--/ Hover box element -->
					</div>
					<!--/ col-sm-12 col-md-6 col-lg-4 -->
					
					<div class="col-sm-12 col-md-6 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background color-->
							<a href="<?php echo site_url('feature/data-makro'); ?>" target="_self" style="background-color: #380082;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!-- Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/makro.png" class="hb-img rb-right" alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Data Makro
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background color -->
						</div>
						<!--/ Hover box element -->
					</div>
					<!--/ col-sm-12 col-md-6 col-lg-4 -->

					<div class="col-sm-12 col-md-12 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background image -->
							<a href="<?php echo site_url('feature/penghargaan'); ?>" target="_self" style="background-color: #92006c;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/penghargaan.png" class="hb-img " alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Penghargaan
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background image -->
						</div>
						<!--/ Hover box element -->
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background image -->
							<a href="<?php echo site_url('feature/potensi'); ?>" target="_self" style="background-color: #006adc;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/potensi.png" class="hb-img " alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Potensi Daerah
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background image -->
						</div>
						<!--/ Hover box element -->
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background image -->
							<a href="<?php echo site_url('data/index_data?keyword=kependudukan'); ?>" target="_self" style="background-color: #0b207d;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/kependudukan.png" class="hb-img " alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Kependudukan
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background image -->
						</div>
						<!--/ Hover box element -->
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background image -->
							<a href="<?php echo site_url('data/index_data?keyword=dinas%20kesehatan'); ?>" target="_self" style="background-color: #04c3cc;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/kesehatan.png" class="hb-img " alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Kesehatan
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background image -->
						</div>
						<!--/ Hover box element -->
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-4 pt-20">
						<!-- Hover box element -->
						<div class="hover-box-2">
							<!-- Link box with background image -->
							<a href="<?php echo site_url('data/index_data?keyword=dinas%20sosial'); ?>" target="_self" style="background-color: #8f32b6;" class="hover-box hover-box-2">
								<!-- Hover icon -->
								<span class="hb-circle"></span>
								<!--/ Hover icon -->

								<!-- Image/Icon -->
								<img src="<?php echo base_url('assets/front'); ?>/images/sosial.png" class="hb-img " alt="" title="" />
								<!--/ Image/Icon -->

								<!-- Title -->
								<h3>
									Sosial
								</h3>
								<!--/ Title -->

								<!-- Description -->
								<p>
									Tulang Bawang
								</p>
								<!--/ Description -->
							</a>
							<!--/ Link box with background image -->
						</div>
						<!--/ Hover box element -->
					</div>
					
				</div>
				
				<!--/ row -->
			</div>
			<!--/ container -->
		</section>
		<section class="hg_section--relative">
		
			<!-- Background source -->
			<div class="kl-bg-source">
				<!-- Shadow top -->
				<div class="kl-bg-source__bgimage" style="background-image: url(images/bg-shadow.png); background-repeat: no-repeat; background-attachment: scroll; background-position: center top; background-size: auto;">
				</div>
				<!--/ Shadow top -->
			</div>
			<!--/ Background source -->

			<div class="container stats_box">
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-3">
									<!-- Box #1 -->
									<div class="statbox d-flex">
										<!-- Icon = .icon-noun_65754 -->
										<span class="statbox__fonticon far fa-chart-bar d-inline-flex align-self-center text-primary"></span>
										<a href="<?=base_url("root/");?>">
										<div class="d-flex flex-column">
											<!-- Title -->
											<h4 id="dataset">
												 
											</h4>
											<!--/ Title -->

											<!-- Description -->
											<h6>
												DATASET
											</h6>
											<!--/ Description -->
										</div>
										</a>
										<!--/ .d-flex .flex-column -->
									</div>
									<!--/ Box #1 .statbox .d-flex -->
								</div>
								<!--/ col-sm-6 col-md-6 col-lg-3 -->
								
								<div class="col-sm-6 col-md-6 col-lg-3">
									<!-- Box #1 -->
									<div class="statbox d-flex">
										<!-- Icon = .icon-noun_65754 -->
										<span class="statbox__fonticon fas fa-cloud-download-alt d-inline-flex align-self-center text-success"></span>
										<a href="<?=base_url("data/index_data");?>">
										<div class="d-flex flex-column">
											<!-- Title -->
											<h4 id="available">
												 
											</h4>
											<!--/ Title -->

											<!-- Description -->
											<h6>
												Download Available
											</h6>
											<!--/ Description -->
										</div>
										</a>
										<!--/ .d-flex .flex-column -->
									</div>
									<!--/ Box #1 .statbox .d-flex -->
								</div>
								<!--/ col-sm-6 col-md-6 col-lg-3 -->

								<div class="col-sm-6 col-md-6 col-lg-3">
									<!-- Box #2 -->
									<div class="statbox d-flex">
										<!-- Icon = .icon-noun_61152 -->
										 
										<span class="statbox__fonticon far fa-building d-inline-flex align-self-center text-warning"></span>
										<a href="#">
										<div class="d-flex flex-column">
											<!-- Title -->
											<h4 id="instansi">
												 
											</h4>
											<!--/ Title -->

											<!-- Description -->
											<h6>
												Instansi
											</h6>
											<!--/ Description -->
										</div>
										</a>
										<!--/ .d-flex .flex-column -->
									</div>
									<!--/ Box #2 .statbox .d-flex -->
								</div>
								<!--/ col-sm-6 col-md-6 col-lg-3 -->

								<div class="col-sm-6 col-md-6 col-lg-3">
									<!-- Box #3 -->
									<div class="statbox d-flex">
										<!-- Icon = .icon-gi-ico-10 -->
										<span class="statbox__fonticon far fa-user d-inline-flex align-self-center text-info"></span>
										<a href="#">
										<div class="d-flex flex-column">
											<!-- Title -->
											<h4 id="users">
												 
											</h4>
											<!--/ Title -->

											<!-- Description -->
											<h6>
												User
											</h6>
											<!--/ Description -->
										</div>
										</a>
										<!--/ .d-flex .flex-column -->
									</div>
									<!--/ Box #3 .statbox .d-flex -->
								</div>
								<!--/ col-sm-6 col-md-6 col-lg-3 -->

								
							</div>
							<!--/ row -->
						</div>
			<!--/ container -->

			<!-- Bottom mask style shadow 1 -->
			<div class="kl-bottommask kl-bottommask--shadow">
			</div>
			<!--/ Bottom mask style shadow 1 -->
		</section>
		 
		<!-- Content section with titles, sub-title & description + Sidebar and custom paddings -->
        <section class="hg_section pt-50 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-9 col-lg-9 mb-sm-30">
							<div class="card">
								<div class="card-body">
									<div class="kl-title-block clearfix tbk-symbol--line tbk--colored tbk-icon-pos--after-title pbottom-60">
									<!-- Title -->
										<h4 class="kl-font-alt fw-bold uppercase tcolor">
											Luas Wilayah Menurut Kecamatan
										</h4>

										<div class="tbk__symbol tcolor">
											<span class="tbg"></span>
										</div>
									 
									
									<div class="table-responsive border border-info shadow p-3 mb-5 bg-white rounded">
									<div class="loader text-center mt-5 mb-5"></div>
									<table id="table" class="table table-md table-bordered table-striped table-hover">
										<thead class="bg-info font-weight-bold text-white">
											<tr>
												<th class="text-center" rowspan="2">No.</th>
												<th class="text-center" rowspan="2">Kecamatan</th>
												<th class="text-center" rowspan="2">Ibukota</th>
												<th class="text-center" rowspan="2">Jumlah Kampung</th>
												<th class="text-center">Km2</th>
												<th class="text-center">Persentase</th>
												 
											</tr>
											 
											<tr id="list-title">
												
											</tr>
										</thead>
										<tbody>
											 
										</tbody>
										<tfoot class="bg-info-800">
											<tr>
												<th class="text-center h6" rowspan="2" colspan="3">Jumlah Total</th>
												<th class="text-center h6" rowspan="2" id="total-kp"></th>
												<th class="text-center h6" rowspan="2" id="total-km2"></th>
												<th class="text-center h6" rowspan="2" id="total-percent"></th>
											
												 
											</tr>
										</tfoot>
									</table>
									</div>
					
									
										  
									</div>
								</div>
								
							</div>	
					</div> 
					<div class="col-sm-12 col-md-3 col-lg-3 mb-sm-30">
						<div class="statbox d-flex hover-box" style="background: #1a51a5;">
							<!-- Icon = .icon-gi-ico-10 -->
							 
							<a target="_blank" href="https://tulangbawangkab.bps.go.id/">
							<img style="padding: 10px" src="<?php echo base_url('assets/images/web/'); ?>/bps.png" width="100%" alt="perencanaan-pembangunan">
							</a>
							<!--/ .d-flex .flex-column -->
						</div>
						
						<div id="sidebar-widget" class="sidebar" style="background-color: #f5dcdc85;">
							<div class="widget tabbable tabs_style5">
							  <h3 class="widgettitle font-weight-bold">
									 <span class="icon-noun_65754 mr-5"></span> INFO <span class="tcolor">PENGUMUMAN </span>
							  </h3>
							  
							  <div class="tab-content latest_posts style3">
								<ul id="pengumuman-kab" class="posts active show in">
								  <div class="loader text-center"></div>
								</ul>
								 
							  </div>
							</div>
						</div>
						
						<div id="sidebar-widget" class="sidebar mt-25" style="background-color: #2f2f2f;">
							<div class="widget widget_categories text-white small">
							  <h3 class="widgettitle text-white font-weight-bold">
									 <span class="icon-noun_65754"></span> INFO <span class="tcolor">PENGUNJUNG </span>
							  </h3>
							  
							   
								 <ul class="menu" id="visitor">
									<div class="loader text-center"></div>
									
								</ul>
							   
							</div>
						</div>
						
					</div>
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</section>
		<!--/ Content section with titles, sub-title & description + Sidebar and custom paddings -->
		
		<section class="hg_section--relative p-0 tbg">
		<div class="kl-bg-source">
				<!-- Video background container -->
				<div class="kl-video-container kl-bg-source__video">
					<!-- Video wrapper -->
					<div class="kl-video-wrapper video-grid-overlay">
						<!-- Self Hosted Video Source -->
						<div class="kl-video valign halign" style="width: 100%; height: 100%;" data-setup="{
							&quot;position&quot;: &quot;absolute&quot;,
							&quot;loop&quot;: true,
							&quot;autoplay&quot;: true,
							&quot;muted&quot;: true,
							&quot;mp4&quot;: &quot;videos/headvideo.mp4&quot;,                      
							&quot;poster&quot;: &quot;videos/headvideo.jpg&quot;,
							&quot;video_ratio&quot;: &quot;1.7778&quot;
							}">
						<div id="video_background_video_0" style="z-index: -1; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;"><video width="1349" height="759" autoplay="" loop="" onended="this.play()" style="position: absolute; top: -129px; left: 0px;"><source src="videos/headvideo.mp4" type="video/mp4"></video></div></div>
						<!--/ Self Hosted Video Source -->
					</div>
					<!--/ Video wrapper -->
				</div>
				<!--/ Video background container -->
			</div>
			<div class="container-fluid section-video-icons">

				<!-- Custom min height: 500px (.min-500) -->
				<div class="row gutter-0 min-500">
					<div class="col-sm-12 col-md-12 col-lg-6 d-flex flex-row flex-xs-wrap flex-sm-row-reverse left-side">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 d-flex align-self-center justify-content-center text-center-xs">
							<!-- Icon wrapper -->
							<div class="kl-iconbox__icon-wrapper d-flex justify-content-center">
								<!-- Icon image -->
								<img src="<?php echo base_url('assets/images/web'); ?>/tb.png" width="50px" class="" alt="WE'RE WORLDWIDE" title="">
							</div>
							<!--/ Icon wrapper -->
						</div>
						<!--/ col-xs-12 col-sm-6 col-md-6 col-lg-3 align-self-center justify-content-center text-center-xs -->

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9 align-self-center text-right text-center-xs">
							<!-- Title with kl-font-alt font, custom size, line height, white color and bottom margin  -->
							<h3 class="kl-iconbox__title kl-font-alt fs-xxl white mb-20">
								<?php echo $meta['judul'];?>
							</h3>

							<!-- Description -->
							<p class="kl-iconbox__desc white">
								Temukan data yang tersedia dengan mudah dan cepat, kurang dari satu menit.
							</p>
						</div>
						<!--/ col-xs-12 col-sm-6 col-md-6 col-lg-9 align-self-center text-right text-center-xs -->
					</div>

					<div class="col-sm-12 col-md-12 col-lg-6 d-flex flex-row flex-xs-wrap flex-sm-row right-side shows">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 d-flex align-self-center justify-content-center text-center-xs">
							<!-- Icon wrapper -->
							<div class="kl-iconbox__icon-wrapper d-flex justify-content-center">
								<!-- Image -->
								<img src="<?php echo base_url('assets/images/web');?>/ico-results.svg" class="" alt="INSTANT RESULTS" title="INSTANT RESULTS">
							</div>
							<!--/ Icon wrapper -->
						</div>
						<!--/ col-xs-12 col-sm-6 col-md-6 col-lg-3 align-self-center justify-content-center text-center-xs -->

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9 align-self-center text-left text-center-xs">
							<!-- Title with kl-font-alt font, custom size, line height, white color and bottom margin  -->
							<h3 class="kl-iconbox__title kl-font-alt fs-xxl white mb-20">
								INSTANT RESULTS
							</h3>

							<!-- Description -->
							<p class="kl-iconbox__desc white">
								Menggunakan beberapa strategi untuk memilih data yang layak untuk waktu dan sumber daya yang tersedia.
							</p>
						</div>
						<!--/ col-xs-12 col-sm-6 col-md-6 col-lg-9 align-self-center text-left text-center-xs -->
					</div>
				</div>
				<!--/ row gutter-0 min-500 -->
			</div>
		</section>
		<!-- Main categories section with custom paddings -->
		<!--/ Main categories section with custom paddings -->
		
		<!-- Mod PIHPS -->
			<div class="bubble-box" style="background: rgba(255, 255, 255, 0.8);" data-reveal-at="1000">
			<div class="bb--inner">
			<?php echo $info['content']; ?>
			</div>
			<span class="bb--close"><i class="fas fa-times"></i></span>
		</div>
		
			<!-- Contact form pop-up element content -->
			<div id="contact_panel" class="mfp-hide contact-popup kl-store-page">
				<div class="card">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<!-- Contact form pop-up element -->
								 
								<div class="card-body kl-store pop-up-form mt-50 border border-primary shadow p-3 mb-5 bg-white rounded">
								<form name="search-form" class="main-search-form" id="search-form">
										<!-- Box -->
										<div class="main-search-box">
										<!-- Row With Forms -->
											<div class="row with-forms">
												<!-- Status -->
												<div class="col-md-6 col-sm-6">
												<div class="form-row form-row-wide mt-20">
												<label for="id_kecamatan">Kecamatan <span class="text-danger">*</span></label>
													<select name="id_kecamatan" data-placeholder="Kecamatan" class="input-text" title="Kecamatan" required>
													<option></option>
													<option value="1">No Available</option>
													</select> 
												</div>
												</div>

												<!-- Property Type -->
												<div class="col-md-6 col-sm-6">
													<div class="form-row form-row-wide mt-20">
													<label for="id_pasar">Pasar <span class="text-danger">*</span></label>
														<select name="id_pasar" data-placeholder="Pasar" class="input-text" title="Pasar" required>
														</select>
													</div>
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="form-row form-row-wide mt-20">
													<label for="id_jenis_komoditi">Jenis Komoditi <span class="text-danger">*</span></label>
														<select name="id_jenis_komoditi" data-placeholder="Jenis" class="input-text" title="Jenis" required>
														</select>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-row form-row-wide mt-20">
													<label for="id_variant_komoditi">Variant Komoditi <span class="text-danger">*</span></label>
														<select name="id_variant_komoditi" data-placeholder="Variant" class="input-text" title="Variant" required>
														</select>
													</div>
												</div>
												<!-- Main Search Input -->
												<div class="col-md-12">
													<div class="text-center mt-20">
														<button type="submit" class="button"> Search </button>
													</div>
												</div>
											</div> 
										</div>
									</form>
								</div>
								<div class="card-footer">
								<div class="text-muted text-right small mr-2"><i>Sumber <a href="http://pihp.tulangbawangkab.go.id" target="_blank">http://pihp.tulangbawangkab.go.id</a></i></div>
								</div>
								 
								<!--/ Contact form pop-up element -->
							</div>
							<!--/ col-md-12 col-sm-12 -->
						</div>
						<!--/ .row -->
					</div>
					<!--/ .container -->
				</div>
				<!--/ .contact-popup-panel -->
				<button title="Close (Esc)" type="button" class="mfp-close">×</button>
			</div>
			<!--/ Contact form pop-up element content -->	
		<?php $this->load->view('footer'); ?>
		

<script>
	function loadData(){
		
		$.ajax({
					data: "",
					url:  ServUrl+"report/lists/counter",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
						$("#dataset").html(response.responseJSON.dataset);	 
						$("#available").html(response.responseJSON.available);	 
						$("#instansi").html(response.responseJSON.instansi);	 
						$("#users").html(response.responseJSON.users);	 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	 
	loadData();
	
	var url = "http://pihp.tulangbawangkab.go.id";
	
	Number.prototype.formatMoney = function(c, d, t){
			var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
		   	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		}; 
	
	$("select[name=id_kecamatan]").on('change', function(){	
		var id_kecamatan = $(this).find("option:selected").attr('value');
		$.ajax({
                data: {"id_kecamatan" : id_kecamatan},
                type: "POST",
				datatype: 'json',
                url: url+"/web/home/get_pasar",
                cache: false,
                success: function(getData) { 
					getData = $.parseJSON(getData);
					var toAppend = '';
					if(getData.length){
						$("select[name=id_pasar]").attr('disabled', false);
						
						$.each( getData, function( key, val ) { 
							toAppend +='<option value=' + val.id_pasar + '>' + val.nama_pasar + '</option>';
						});
						$('select[name=id_pasar]').html(toAppend);
					}else{
						$('select[name=id_pasar]').html(toAppend);
					}
				}
				});
	
	});
	
	function loadjenis(){
		$("select[name=id_variant_komoditi]").attr('disabled', true);
		$.ajax({
				data: "",
                type: "POST",
				datatype: 'json',
                url: url+"/web/home/get_jenis",
                cache: false,
                success: function(getData) { 
				getData = $.parseJSON(getData);              
                    
					var toAppend = '<option></option>';
					if(getData.length){
						$("select[name=id_pasar]").attr('disabled', false);
						
						$.each( getData, function( key, val ) { 
							toAppend +='<option value=' + val.id_jenis_komoditi + '>' + val.nama_jenis_komoditi + '</option>';
						});
						$('select[name=id_jenis_komoditi]').html(toAppend);
					}else{
						$('select[name=id_jenis_komoditi]').html(toAppend);
					}
                    }
                });
	
	};
	 
	
	$("select[name=id_jenis_komoditi]").on('change', function(){ 
	 
	var id_jenis =  $(this).find("option:selected").attr('value');
		$.ajax({
                data: {"id_jenis" : id_jenis},
                type: "POST",
				datatype: 'json',
                url: url+"/web/home/get_variant",
                cache: false,
                success: function(getData) { 
				getData = $.parseJSON(getData);
				 
				if(getData.length){
				var toAppend = '';
				$("select[name=id_variant_komoditi]").attr('disabled', false);
                $.each( getData, function( key, val ) {
                    
					toAppend +='<option value=' + val.id_variant_komoditi + '>' + val.nama_variant_komoditi + '</option>';
					$("#satuan").val(function() {
						return this.value + val.satuan_variant_komoditi;
					});
				});
				$('select[name=id_variant_komoditi]').html(toAppend);				
				}else{
					$('select[name=id_variant_komoditi]').html(toAppend);
				}}
				});
	
	});
	
	$("#search-form").submit(function(event) {
		 event.preventDefault();
		 
		 $.ajax({
            type: "post",
            url: url+"/api/search_form",
            data: $(this).serialize(),
            contentType: "application/x-www-form-urlencoded",
            success: function(Data) {
				if(Data.status == 'ok'){
				  if(Data.data.changing_price == 0)
						 {
							var status = 'Stabil';
						 }else{
							var status = Data.data.unit+'.'+Number(Data.data.changing_price).formatMoney(0);
						 }
				 swal({
					 showConfirmButton: false,
					  html:  
							 '<div class="media-container media-container--type-pb h-200 mb-10">'+
								'<div class="kl-bg-source">'+
									'<div class="kl-bg-source__bgimage" style="background-image: url('+url+'/media/images/komoditi/'+Data.data.image+'); background-repeat: repeat; background-attachment :scroll; background-position: center center; background-size: cover;">'+
									'</div>'+
									'<div class="kl-bg-source__overlay" style="background: rgba(10,10,10,0.16); background: -moz-linear-gradient(top,  rgba(10,10,10,0.16) 0%, rgba(20,20,20,0.76) 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(10,10,10,0.16)), color-stop(100%,rgba(20,20,20,0.76))); background: -webkit-linear-gradient(top,  rgba(10,10,10,0.16) 0%,rgba(20,20,20,0.76) 100%); background: -o-linear-gradient(top,  rgba(10,10,10,0.16) 0%,rgba(20,20,20,0.76) 100%); background: -ms-linear-gradient(top,  rgba(10,10,10,0.16) 0%,rgba(20,20,20,0.76) 100%); background: linear-gradient(to bottom,  rgba(10,10,10,0.16) 0%,rgba(20,20,20,0.76) 100%);">'+
									'</div>'+
								'</div>'+
								'<div class="media-container-pb media-container-pb--alg-bottom text-center">'+
									'<div class="row">'+
										'<div class="col-sm-8 col-md-8 col-lg-8 offset-sm-2 offset-md-2 offset-lg-2">'+
											 
											'<div class="kl-title-block text-center pb-10">'+
												'<a href="'+url+'/detail_harga_kecamatan/'+Data.data.url+'_'+Data.data.commodity_id+'/" target="_blank"><h3 class="fw-bold white" style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;">'+Data.data.jenis+' '+Data.data.name+' <i>'+Data.data.unit+'.'+Number(Data.data.price).formatMoney(0)+'</h3></a>'+
											'</div>'+
										'</div>'+
										'<div class="col-sm-12 col-md-12">'+
											'<div class="prt-hover-slidein">'+
												'<div class="kl-title-block text-left white">'+
													'<p>Harga '+Data.data.old_date+' <span>'+Data.data.unit+'.'+Number(Data.data.old_price).formatMoney(0)+'</span></p>'+
													 
													'<p>Lokasi : <span>'+Data.data.nama_pasar+'</span></p>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'
					  
					})
				
				}else{
					swal(
					  'Oops...',
					  'Data yang anda masukan kurang lengkap!',
					  'error'
					);
				}
            },dataType:'json' ,
            error: function(jqXHR, textStatus, errorThrown) {
                swal(
					  'Oops...',
					  'Data yang anda masukan kurang lengkap!',
					  'error'
					);
				 
			}
		 });
	
	});
	
	
	function loadLuasWilayah(){
		$.ajax({
					data: "",
					url: ServUrl+"admin/luas_wilayah_menurut_kecamatan/list",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var tbody = '';
							var no = 0;
							var totalKp = 0;
							var totalKm = 0;
							var totalPercent = 0;
							$.each(response.responseJSON.data, function(k,v){
								totalKp += parseFloat(v.jumlah_kampung); totalKm += parseFloat(v.km2); totalPercent += parseFloat(v.persentase);
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="list-icons-item " data-id="'+v.id+'" data-persentase="'+v.persentase+'" data-km2="'+v.km2+'" data-jumlah_kampung="'+v.jumlah_kampung+'" data-kecamatan="'+v.kecamatan+'" data-ibukota="'+v.ibukota+'">'+no+'.</a></td>';
								tbody += '<td class="text-left small">'+v.kecamatan+'</td>';
								tbody += '<td class="text-left small">'+v.ibukota+'</td>';
								tbody += '<td class="text-center small">'+v.jumlah_kampung+'</td>';
								tbody += '<td class="text-center small">'+v.km2+'</td>';
								tbody += '<td class="text-center small">'+v.persentase+'</td>';
								tbody += "</tr>";
							
							});
							 
							if(response.responseJSON._meta.pinStatus == true){ 
								var a = '<i class="icon-check text-success"></i>Show on E-Data';
								$('#alert').html('');
								$('#pin-public').show();
								if(response.responseJSON._meta.pinPublicStatus == true){ 
									var b = '<i class="icon-check text-success"></i>Show on public';
								}else{ 
									var b = '<i class="icon-pushpin"></i>Pin to public';
								};
							}else{ 
								var a = '<i class="icon-pushpin"></i>Pin to E-Data';
								$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
								$('#pin-public').hide();
							};							
							
							
							
							$('#pin-status').html(a); 
							$('#pin-public').html(b); 
							
							$('#total-kp').html(totalKp);  
							$('#total-km2').html(parse(totalKm));  
							$('#total-percent').html(parse(totalPercent));  
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	var KabUrl = "http://tulangbawangkab.go.id";
	
	function loadPengumuman(){
	$.ajax({
			data: {"render" : "sidebar"},
			url: KabUrl+"/api/news/kategori/pengumuman/list",
			
			method: 'GET',
			complete: function(response){ 				
				if(response.status == 200){
					var content = '';
						
					$.each(response.responseJSON.data.data.slice(0,5), function(k,v){

							  content += '<li class="lp-post">';
								 
									content += '<h4 class="title"><a target="_blank" class="hvr-grow" href="'+KabUrl+'/news/read/'+v.id+'/'+v.slug+'">'+v.judul_artikel.substring(0,21)+'..</a></h4>';
									content += '<div class="lp-post-comments-num"><span class="tcolor">'+v.tanggal+'</span></div>';
								 
							  content += '</li>';
					});

					$('#pengumuman-kab').html(content);
					
				}else if(response.status == 401){
						e('info','401 server conection error');
				}else{
				 
				}
			},
			dataType:'json'
		});
	};
	
	function loadVisitor(){
	$.ajax({
			data: "",
			url: BaseUrl+"/meta/get_visitor",
			method: 'GET',
			complete: function(response){ 				
				if(response.status == 200){
					
					body ='<li class="pt-10"><a class="text-white pb-15" href="#">Pengunjung hari ini </a><span class="float-right">'+response.responseJSON.visitor.pengunjunghariini+'</span></li>'+
									'<li><a class="text-white pb-15" href="#">Pengunjung online </a><span class="float-right">'+response.responseJSON.visitor.pengunjungonline+'</span></li>'+
									'<li><a class="text-white pb-15" href="#">Total hits </a><span class="float-right">'+response.responseJSON.visitor.totalhit.hits+'</span></li>'+
									'<li><a class="text-white" href="#">Total pengunjung </a><span class="float-right" >'+response.responseJSON.visitor.totalpengunjung+'</span></li>';
				
					
					$('#visitor').html(body);
					
				}else if(response.status == 401){
						e('info','401 server conection error');
				}else{
				 
				}
			},
			dataType:'json'
		});
	};
	
	loadLuasWilayah();
	loadPengumuman();
	loadVisitor();
</script>