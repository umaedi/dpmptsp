<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $meta['judul'];?> -  Web Application V.1</title>
	<link rel="icon" type="image/png/vnd.microsoft.icon" href="<?php echo base_url('assets/images/web/'.$meta['logo']); ?>" />

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/components2.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin'); ?>/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url('assets/admin'); ?>/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/noty.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/validation/validate.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/forms/styling/uniform.min.js"></script>
	 
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/prism.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/app.js"></script>
	 
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/navbar_multiple.js"></script>

	<!-- /theme JS files -->
	
	<script>var BaseUrl = '<?php echo base_url(); ?>'; var ServUrl = '<?php echo base_url(); ?>api/';</script>
</head>
<body>
<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		


		<div class="collapse navbar-collapse pl-5" id="navbar-mobile">
			<i class="icon-spinner2 text-danger spinner "></i><span class="ml-md-1 mr-md-auto text-white"><?php echo $meta['judul'];?></span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-info3"></i>
						<span class="d-md-none ml-2">Users</span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">About Us</span>
							 
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									 
									<div class="media-body">
										 
										<span class="d-block text-muted font-size-sm"><?php echo $meta['deskripsi'];?></span>
									</div>
									 
								</li>
							</ul>
						</div>
 
					</div>
				</li>

			</ul>
		</div>
	</div>
	<!-- /main navbar -->