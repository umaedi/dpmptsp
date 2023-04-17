<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $meta['judul'];?> -  Web Application V.3</title>
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
	
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/picker_date.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/components_popups.js"></script>

	<!-- /theme JS files -->

	<script>var BaseUrl = '<?php echo base_url(); ?>'; var ServUrl = '<?php echo base_url(); ?>api/';</script>
</head>
<style>
.fixed-bg {
    /* The background image */
    background-image: url("<?php echo base_url('assets/images/web/MPP2.jpg'); ?>"); 
    /* Set a specified height, or the minimum height for the background image */
    min-height: 500px;
    /* Set background image to fixed (don't scroll along with the page) */
    background-attachment: fixed;
    /* Center the background image */
    background-position: center;
    /* Set the background image to no repeat */
    background-repeat: no-repeat;
    /* Scale the background image to be as large as possible */
    background-size: cover;
	 
	
}

</style>
</style>
<body class="navbar-top navbar-bottom fixed-bg" style="padding-right: 0 !important;">
<script>
	Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
		
	function e(type, text){
		 new Noty({
						text: text,
						type: type,
						modal: true
					}).show();
					signOut()
	}
	 var setCustomDefaults = function() {
            swal.setDefaults({
                buttonsStyling: false,
				allowOutsideClick: false,
				reverseButtons: true,
				background: '#fff url(<?php echo base_url('assets/admin'); ?>/images/backgrounds/seamless.png) repeat',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
        }
        setCustomDefaults();
		var header = "";
		
		
</script>
