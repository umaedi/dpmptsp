<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php if(isset($halaman)){ echo $halaman.' | '.$meta['judul'];}else{ echo $meta['judul'];}?></title>
	
	<meta property="og:url"           content="<?php echo current_url(); ?>" />
	<meta property="og:type"          content="information" />
	<meta property="og:title"         content="<?php if(isset($halaman)){ echo $halaman.' | '.$meta['judul'];}else{ echo $meta['judul'];}?>" />
	<meta property="og:description"   content="<?php if(isset($halaman)){ if($halaman!='') { echo $halaman;}else{ echo $meta['metadesc']; }}else{ echo $meta['metadesc']; }?> Kabupaten Tulang Bawang" />
    <meta property="og:image"         content="<?php echo base_url('assets/images/web/'.$meta['logo']); ?>" />
        
	<link rel="icon" type="image/png/vnd.microsoft.icon" href="<?php echo base_url('assets/front/images/fav.png'); ?>" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!-- ***** Boostrap Custom / Addons Stylesheets ***** -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/bootstrap.css" type="text/css" media="all">

	<!-- Font Awesome icons library -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/fonts/font-awesome/css/font-awesome.min.css" type="text/css" media="all">

	<!-- ***** Main + Knowledgebase styles + Responsive & Base sizing CSS Stylesheet ***** -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/template.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/knowledge.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/responsive.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/base-sizing.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/dp.css" type="text/css" media="all">

	<!-- Required CSS file for Simple Slider(modern style) element -->
	<link rel="stylesheet" href="<?php echo base_url('assets/front'); ?>/css/sliders/simple-slider/simple-slider.css" type="text/css" media="all">

	<!-- LOADING FONTS AND ICONS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400%7CPlayfair+Display:400" rel="stylesheet" property="stylesheet" type="text/css" media="all">


	<!-- Modernizr Library -->
	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/modernizr.min.js"></script>

	<!-- jQuery Library -->
	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/jquery.js"></script>
	
	<script>
	 function parse (data) {
       data = Math.round(data*Math.pow(10,3))/Math.pow(10,3);
       if (data != null) {
            var lastone = data.toString().split('').pop();
            if (lastone != '.') {
                 data = parseFloat(data);
            }
       }
	   if(data == 0) data = '&nbsp;';
       return data;
	};
	</script>	

	<script>var BaseUrl = '<?php echo base_url(); ?>'; var ServUrl = '<?php echo base_url(); ?>api/';</script>
</head>

<body class="knowledge">
	<div id="page_wrapper">
	
	<div id="dp-js-header-helper" style="height:0 !important; display:none !important;"></div>
		
		<header id="header" class="site-header cta_button" data-header-style="7">
		<!-- Header wrapper -->
		<div class="kl-main-header">
			<!-- Header Main container -->
			<div class="siteheader-container container d-flex">
				<!-- Header Left wrapper -->
				<div class="site-header-left-wrapper">
					<!-- Logo container-->
					<div class="logo-container hasInfoCard logosize--yes d-flex align-items-center justify-content-center">
						<!-- Logo -->
						<h1 class="site-logo logo pt-10" id="logo">
							<a href="<?php echo base_url(); ?>" title="">
								<img src="<?php echo base_url('assets'); ?>/images/web/logo.png" class="logo-img" alt="" title="Portal Data">
							</a>
						</h1>
						<!--/ Logo -->

						<!-- InfoCard -->
						<!--<div id="infocard" class="logo-infocard">
							<div class="custom">
								<div class="row">
									<div class="col-sm-6 left-side p-20">
										<div class="align-self-center">
											<div class="infocard-wrapper text-center">
												<img src="<?php echo base_url('assets'); ?>/images/web/2.jpg" width="200px" class="mt-25 " alt="Bupati" title="Bupati">
											</div>
											 
										</div>
										 
									</div>
									 

									<div class="col-sm-6 right-side  p-20">
										<div class="infocard-wrapper text-center">
												<img src="<?php echo base_url('assets'); ?>/images/web/3.jpg" width="200px" class="mt-25" alt="Wakil Bupati" title="Wakil Bupati">
										</div>
									</div>
								 
								</div>
								 
							</div>
							 
						</div>-->
						<!--/ InfoCard -->
					</div>
					<!--/ logo container-->
				</div>
				<!--/ Header Left wrapper -->

				<!-- Header Right wrapper -->
				<div class="site-header-right-wrapper col align-self-center">

					<!-- Header Bottom row -->
					<div class="site-header-row site-header-bottom d-flex flex-row justify-content-between">
						<!-- Main Menu wrapper -->
						<div class="main-menu-wrapper col d-flex justify-content-end align-self-center">
							<!-- Responsive menu trigger -->
							<div id="zn-res-menuwrapper">
								<a href="#" class="zn-res-trigger zn-header-icon"></a>
							</div>
							<!--/ responsive menu trigger -->

							<!-- Main menu -->
							<div id="main-menu" class="main-nav zn_mega_wrapper">
								<ul id="menu-main-menu" class="main-menu zn_mega_menu">
									<li class="menu-item-has-children menu-item-mega-parent <?php if(!$this->uri->segment(1)){ echo'active'; } ?>"><a href="<?php echo site_url(); ?>">HOMEPAGES</a></li>
									<li class="menu-item-has-children menu-item-mega-parent <?php if($this->uri->segment($this->uri->total_segments()) == 'index_data'){ echo'active'; } ?>"><a href="<?php echo site_url("data/index_data"); ?>">Dataset</a></li>
									<li class="menu-item-has-children menu-item-mega-parent <?php if($this->uri->segment($this->uri->total_segments()) == 'data-opd'){ echo'active'; } ?>"><a href="<?php echo site_url("feature/data-opd"); ?>">OPD</a></li>
									<li class="menu-item-has-children menu-item-mega-parent <?php if($this->uri->segment($this->uri->total_segments()) == 'about'){ echo'active'; } ?>"><a href="<?php echo site_url("feature/about"); ?>">Tentang</a></li>
									<li class="menu-item-has-children menu-item-mega-parent <?php if($this->uri->segment($this->uri->total_segments()) == 'contact'){ echo'active'; } ?>"><a href="<?php echo site_url("contact"); ?>">Kontak</a></li>
									<li class="menu-item-has-children menu-item-mega-parent"><a href="<?php echo site_url("root"); ?>"><i class="login-icon fas fa-sign-in-alt visible-xs xs-icon"></i> Login</a></li>
								</ul>
							</div>
							<!--/ Main menu -->
						</div>
						<!--/ .main-menu-wrapper .col .d-flex .justify-content-end-->

						<!-- Call to action ribbon Free Quote (Contact form pop-up element) -->
						<div class="quote-ribbon">
							<a href="http://tulangbawangkab.go.id/" target="_blank"  class="ctabutton  " style="background: #fff;" title="Way Kanan" target="_self">
								<img src="<?php echo base_url('assets/images/web'); ?>/tb.png" width="50px" alt="Kallyas" title="Way Kanan">
								<svg version="1.1" class="trisvg" style="fill: #fff;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" preserveAspectRatio="none" width="14px" height="5px" viewBox="0 0 14 5" enable-background="new 0 0 14 5" xml:space="preserve">
									<polygon fill-rule="nonzero" points="14 0 7 5 0 0"></polygon>
								</svg>
							</a>
						</div>
						<!--/ Call to action ribbon Free Quote (Contact form pop-up element) -->
					</div>
					<!--/ .site-header-row .site-header-bottom -->
				</div>
				<!--/ Header Right wrapper -->
			</div>
			<!--/ Header Main container -->
		</div>
		<!--/ Header wrapper -->
		</header>

	