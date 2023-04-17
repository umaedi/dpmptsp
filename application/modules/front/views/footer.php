
		<footer id="footer" data-footer-style="3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 d-flex justify-content-start">
						<!-- Left side -->
						<div class="d-flex">
							<div class="d-flex mr-30">
								 
							</div>

							<div class="d-flex">
								<p class="mb-0"><?php echo $meta['footer']; ?></p>
							</div>
						</div>
						<!--/ Left side -->
					</div>
					<!--/ col-sm-6 d-flex justify-content-start -->

					<div class="col-sm-6 d-flex justify-content-end">
						<!-- Right side -->
						<div class="d-flex">
							<!-- social-icons -->
							<ul class="social-icons sc--clean clearfix">
							 
								<li><a href="#" target="_self" class="fab fa-facebook-f" title="Facebook"></a></li>
								<li><a href="#" target="_self" class="fab fa-twitter" title="Twitter"></a></li>	
								<li><a href="#" target="_self" class="fab fa-dribbble" title="Dribbble"></a></li>
								<li><a href="#" target="_self" class="fab fa-google-plus-g" title="Google Plus"></a></li>
							</ul>
							<!--/ social-icons -->
						</div>
						<!--/ Right side -->
					</div>
					<!--/ col-sm-6 d-flex justify-content-end -->
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</footer>

	<a href="#" id="totop">TOP</a>
	</div>


	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/kl-plugins.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/plugins/_sliders/slick/slick.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/trigger/kl-slick-slider.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/kl-scripts.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/front'); ?>/js/dp.js"></script>
    <script>
		$(".loader").hide();
	var image = "<?php echo base_url(). 'assets/images/web/loading.gif'; ?>";
	var $loading = $(".loader").html( '<img class="loading-image" src="'+image+'" alt="loading..">');
		jQuery(document).ajaxStart(function () {
				   
					$loading.show();
		});
			
		jQuery(document).ajaxStop(function () {
				 
				$loading.hide();
				
		 
		 });
    </script>
</body>

</html>