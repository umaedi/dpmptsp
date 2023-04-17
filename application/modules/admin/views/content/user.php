<?php $this->load->view('header') ?>
<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Toolbar -->
				<div class="navbar navbar-default navbar-component navbar-xs">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav element-active-slate-400">
							<li class="active"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> Profile</a></li>
						
							<li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Update Profile</a></li>
						</ul>

						<div class="navbar-right">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i> <span class="visible-xs-inline-block position-right"> Options</span> <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="<?php echo base_url('admin/add_user'); ?>"><i class="icon-user-plus"></i> Add User</a></li>
										<li><a href="#settings" data-toggle="tab"></i><i class="icon-cog5"></i> Update info</a></li>
										<li><a href="<?php echo base_url('admin/signout'); ?>" onClick="return confirm('Sure want signout!')"><i class="icon-exit"></i> Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /toolbar -->


				<!-- User profile -->
				<div class="row">
					<div class="col-lg-9">
						<div class="tabbable">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="activity">

									<!-- Timeline -->
									<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title">Table User Login</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
					

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>No</th>
								
								<th>Nama</th>   
                
								<th>Alamat</th>   
  
							
								<th>Level</th>   
							
								<th>Last login</th> 
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($user as $items) { ?>
							<tr>
								<td><?php echo $number++; ?></td>
								<td><?php echo $items['nama']; ?></td>
								<td><?php echo $items['alamat']; ?></td>

								<td><?php echo $items['lvl']; ?></td>
								<td><?php echo $items['last_login']; ?></td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<?php if($items['nama'] != $admin['admin']){ ?>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="divider"></li>
												<li><a href="<?php echo base_url('admin/edit_user'); ?>/<?php echo $items['idadm'] ?>"><i class="icon-pencil7"></i> Edit task</a></li>
												<li class="divider"></li>
												<li><a href="<?php echo base_url('admin/destroy_user'); ?>/<?php echo $items['idadm'] ?>" onClick="return confirm('Sure want delete!')"><i class="icon-cross2"></i> Remove</a></li>
											</ul>
											<?php } ?>
										</li>
									</ul>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
				</div>
								    <!-- /timeline -->

								</div>

								<div class="tab-pane fade" id="settings">

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
											<form action="<?php echo base_url('admin/save_user/'.$admin['id_adm']) ?>" method="post" enctype="multipart/form-data">
											<input type="hidden" name="photo" class="form-control" value="<?php echo $admin['photo'] ?>"/>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Nama</label>
															<input name="nama" type="text" value="<?php echo $admin['admin']; ?>" class="form-control">
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
																			<input type="text" readonly="readonly" value="<?php echo $admin['email']; ?>" class="form-control">
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
																				<option value="<?php echo $admin['lvl']; ?>" selected>Super Admin</option>
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
													<a href="#activity" data-toggle="tab" class="btn btn-default"><i class="icon-arrow-left13 position-left"></i> Cancel</a>
						                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
						                        </div>
											</form>
										</div>
									</div>
									<!-- /profile info -->


									 
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3">

						<!-- User thumbnail -->
						<div class="thumbnail">
							<div class="thumb thumb-rounded thumb-slide">
							<?php if ($admin['photo'] != '') { ?>
							<img src="<?php echo base_url(); ?>/images/user/<?php echo $admin['photo'] ?>"/>
							<?php } else{ ?>
								<img src="<?php echo base_url('assets/admin'); ?>/images/placeholder.jpg" alt="">
							<?php } ?>
								<div class="caption">
									<span>
									 
									</span>
								</div>
							</div>
						
					    	<div class="caption text-center">
					    		<h6 class="text-semibold no-margin"><?php echo $admin['admin']; ?> <small class="display-block"><?php echo $admin['alamat']; ?></small></h6>
				    			<ul class="icons-list mt-15">
			                    	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
			                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
			                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
		                    	</ul>
					    	</div>
				    	</div>
				    	<!-- /user thumbnail -->


					

						<!-- Share your thoughts -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title">Share your thoughts</h6>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<form action="#">
									<div class="form-group">
										<textarea name="enter-message" class="form-control mb-15" rows="3" cols="1" placeholder="What's on your mind?"></textarea>
									</div>

									<div class="row">
			                    		<div class="col-sm-6">
				                        	<ul class="icons-list icons-list-extended mt-10">
				                                <li><a href="#" data-popup="tooltip" title="Add photo" data-container="body"><i class="icon-images2"></i></a></li>
				                            	<li><a href="#" data-popup="tooltip" title="Add video" data-container="body"><i class="icon-film2"></i></a></li>
				                                <li><a href="#" data-popup="tooltip" title="Add event" data-container="body"><i class="icon-calendar2"></i></a></li>
				                            </ul>
			                    		</div>

			                    		<div class="col-sm-6 text-right">
				                            <button type="button" class="btn btn-primary btn-labeled btn-labeled-right">Share <b><i class="icon-circle-right2"></i></b></button>
			                    		</div>
			                    	</div>
		                    	</form>
	                    	</div>
						</div>
						<!-- /share your thoughts -->
					</div>
				</div>
				<!-- /user profile -->

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