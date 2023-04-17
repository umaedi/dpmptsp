<?php $this->load->view('header') ?>
<?php $this->load->view('sidebar') ?>
  <style>
	.img
	{
    width: 400px;
    cursor: pointer;
	}
	</style>
			
			<!-- Main content -->
			<div class="content-wrapper">
 
						<div class="row">
							<div class="col-md-8">
									<!-- Profile info -->
									<div class="panel panel-white">
										<div class="panel-heading">
											<h6 class="panel-title">Check E-mail</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		<li><a data-action="reload"></a></li>
							                		<li><a data-action="close"></a></li>
							                	</ul>
						                	</div>
										</div>

										<div class="panel-body">
											<?php echo form_open(site_url('admin/'.$action),'role="form" class="form-horizontal" id="form_showroom" enctype="multipart/form-data"'); ?> 
														<div class="form-group ">
															<label class="col-sm-2 control-label ">E-mail</label>
															<div class="col-sm-5">
																<input name="email" id="email" type="email" placeholder="Email Address" class="input-sm form-control" onChange="cek_email()" required>
															</div>
															<i id="result"></i><div id="loader">Checking <img class="group list-group-image" src="<?php echo base_url();?>images/media-loader.gif" /> </div>
														</div>
														<div class="content-divider">
															<span class="pt-10 pb-10"> </span>
														</div>
									
																<div class="text-left">
																		<a href="<?php echo base_url('admin/member'); ?>" class="btn btn-danger"><i class="icon-arrow-left13 position-left"></i> Cancel </a>
																	 
																</div>
 
													</form>
													</div>
									</div>
									<!-- /profile info -->
							</div>
						</div>
	 
			</div>
			<!-- /main content -->

		
	
	<?php $this->load->view('footer') ?>

	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/dashboard.js"></script>
		<script>
		 function cek_email()
		 {
			 kdprop = document.getElementById("email").value;
			 $.ajax({
				  
				 url:"<?php echo base_url();?>admin/check_emails/"+kdprop+"",
				 beforeSend: function(response){
								$("#loader").show()
								},
								complete: function(response){
								$("#loader").hide()
								 
								},success: function(response){
				 $("#result").html(response);
				 },
				 dataType:"html"
			 });
			 return false;
			 
		 }

		</script>