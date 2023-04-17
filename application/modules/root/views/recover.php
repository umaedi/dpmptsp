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
				<form method="post" action="<?php echo base_url($action); ?>">
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
							<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
						</div>

						<div class="form-group has-feedback">
							<input name="email" type="email" class="form-control" placeholder="Your email">
							<div class="form-control-feedback">
								<i class="icon-mail5 text-muted"></i>
							</div>
						</div>

						<button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2016.
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
