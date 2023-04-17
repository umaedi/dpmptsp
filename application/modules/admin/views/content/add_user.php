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
 

									<!-- Profile info -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Profile information</h6>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		<li><a data-action="reload"></a></li>
							                		<li><a data-action="close"></a></li>
							                	</ul>
						                	</div>
										</div>

										<div class="panel-body">
											<form action="<?php echo base_url('admin/' . $action) ?>" method="post" enctype="multipart/form-data">
											<input type="hidden" name="photo" class="form-control" value="<?php echo $admin['photo'] ?>"/>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Nama</label>
															<input name="nama" type="text" value="<?php echo $admin['nama']; ?>" class="form-control">
															<?php echo form_error('nama');?>
														</div>
														<div class="col-md-6">
															<label>Telepon</label>
															<input name="telp" type="text" value="<?php echo $admin['telp']; ?>" class="form-control">
															<?php echo form_error('telp');?>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Alamat</label>
															<input name="alamat" type="text" value="<?php echo $admin['alamat']; ?>" class="form-control">
															<?php echo form_error('alamat');?>
														</div>
														<div class="col-md-6">
															<label>BBM</label>
															<input name="bbm" type="text" value="<?php echo $admin['bbm']; ?>" class="form-control">
															<?php echo form_error('bbm');?>
														</div>
													</div>
												</div>
												
												 

												<div class="row">
														<div class="col-md-6">
																<div class="form-group">
																	 
																			<label>Email</label>
																			<input type="text"   value="<?php echo $admin['email']; ?>" class="form-control">
																			<input name="email" type="hidden" value="<?php echo $admin['email']; ?>" class="form-control">
																			<?php echo form_error('email');?>
																</div>
																
																<div class="form-group">
																	 
																			<label>Username</label>
																			<input name="username" type="text" value="<?php echo $admin['username']; ?>" class="form-control">
																			<?php echo form_error('username');?>
																</div>
																
																<div class="form-group">
																	 
																			<label>Password</label>
																			<input name="password" type="password" value="<?php echo $admin['password']; ?>" class="form-control">
																			 <?php echo form_error('password');?>
																</div>
																 
														
																<div class="form-group">
																	 
																			<label>Level</label>
																			<select name="lvl" data-placeholder="Select Kategori" class="select">
																				<option></option>
																				<optgroup label="Pilih Level">
																				<option value="superadmin" <?php if($admin['lvl']=='superadmin') {echo 'selected'; }?>>Super Admin</option>
																				<option value="admin" <?php if($admin['lvl']=='superadmin') {echo 'selected'; }?>>Admin</option>
																				</optgroup>
																			</select>
																			 
																</div>
														</div>
														<div class="col-md-6">
																<div class="form-group">	 
																	<div class="col-lg-5">
																	<label for="img">
																	<?php if ($admin['photo'] != '') { ?>
																		<img class="img-thumbnail img" id="view" src="<?php echo base_url(); ?>/images/user/<?php echo $admin['photo'] ?>"/>
																		<?php } else{ ?>
																		<img class="img-thumbnail img " id="view" src="<?php echo base_url(); ?>/images/upload.jpg"/>
																	<?php } ?>
																	<input type="file" name="userfile" id="img" class="file-styled">
																	</label>
																	</div>
																	
																	<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
																</div>
														</div> 
												</div>
												 

						                        <div class="text-right">
													<a href="<?php echo base_url('admin/user'); ?>" class="btn btn-warning"><i class="icon-arrow-left13 position-left"></i> Cancel</a>
						                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
						                        </div>
											</form>
										</div>
									</div>
									<!-- /profile info -->


	 
			</div>
			<!-- /main content -->

		
	
	<?php $this->load->view('footer') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/dashboard.js"></script>
	<script>
	$('.select').select2();
	function readURL(input,img) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$(input).prev('img').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
			}
		
		$("#img").change(function(){
			readURL(this);
		});
		
	</script>  