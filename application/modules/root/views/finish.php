<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?php echo base_url('assets/admin'); ?>/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				 
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-success text-success"><i class="icon-checkmark4"></i></div>
							<h5 class="content-group">Success Send <small class="display-block  bg-success">Password recovery has been send to you e-mail account please check your email</small></h5>
						</div>

					 

						<a href="<?php echo site_url(); ?>" class="btn bg-blue btn-block">Homepage<i class="icon-arrow-right14 position-right"></i></a> 
					</div>
			 
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2016. <a href="#">Andrastuff Web App Kit</a> by <a href="#" target="_blank">Andra</a>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->

</body>
</html>

	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/components_notifications_pnotify.js"></script>
	<script type="text/javascript">
	 <?php if (isset($alert)){ echo $alert;}?>
	</script>	
