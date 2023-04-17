
<?php $this->load->view('navbar_login'); ?>
<style>
.fixed-bg {
    /* The background image */
    background-image: url("<?php echo base_url(); ?>assets/images/web/bg.gif");
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
<!-- Page content -->
	<div class="page-content fixed-bg">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<div class="float-right">
				<div class="btn-group">
					<a onclick="goBack()" class="btn bg-dark"><i class="icon-arrow-left15 mr-3"></i> Back</a>
				</div>
			</div>
			<div class="d-flex align-items-start flex-column flex-md-row"><div class="w-100 overflow-auto order-2 order-md-1">
						<div class="card mt-5 mx-auto col-lg-6">
						<div class="card-body border-top-orange">
							<div class="text-center">
								<h3 class="m-0 font-weight-semibold"><?php echo $halaman; ?></h3>
								<p class="mb-3 text-muted"><br></p>
							</div>
							We may modify these Terms for any reason—at any time—by posting a new version on Our Website; these changes do not affect rights and obligations that arose prior to such changes. Your continued use of Our Website following the posting of modified Terms will be subject to the Terms in effect at the time of your use. Please review these Terms periodically for changes. If you object to any provision of these Terms or any subsequent modifications to these Terms or become dissatisfied with Our Website in any way, your only recourse is to immediately terminate use of Our Website.
							</div>
						</div>
				
			</div>
			</div>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
<?php $this->load->view('footer'); ?>