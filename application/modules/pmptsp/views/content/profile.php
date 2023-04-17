<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<div class="loader text-center mt-5 mb-5"></div>
<!-- Profile info --> <?php //var_dump($this->session->userdata()); ?>
							<div class="card">
								<div class="card-header bg-dark header-elements-inline">
									<h5 class="card-title">Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#" id="form-profile">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Name</label>
													<input name="id" type="hidden" value="<?php echo $this->session->userdata('id');?>" class="form-control">
													<input name="nama" type="text" value="<?php echo $this->session->userdata('name');?>" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Address</label>
													<input name="alamat" type="text" value="<?php echo $this->session->userdata('alamat');?>" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>E-mail</label>
													<input type="text" value="<?php echo $this->session->userdata('email');?>" class="form-control" readonly>
													<input name="email" type="hidden" value="<?php echo $this->session->userdata('email');?>" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Phone</label>
													<input name="telp" type="text" value="<?php echo $this->session->userdata('telp');?>" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													 
												</div>
												<div class="col-md-4">
													 
												</div>
												<div class="col-md-4">
													 
												</div>
											</div>
										</div>
										<h5 class="card-title">Access information</h5>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Nama Instansi</label>
													<input type="text" readonly="readonly"  value="<?php echo $this->session->userdata('instansi');?>" class="form-control">
												</div>
												<div class="col-md-6">
													<label>User Privilege</label>
													<input type="text" readonly="readonly"  value="<?php echo $this->session->userdata('privilege');?>" class="form-control">
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Token Access</label>
													<input type="text" readonly="readonly"  value="<?php echo $this->session->userdata('token');?>" class="form-control">
												</div>
											</div>
										</div>

				                        <div class="form-group">
				                        	<div class="row">
				                        		<div class="col-md-6">
						                            <label>User Privilege</label>
						                            <select name="privilege" class="form-control form-control-lg">
													 <?php if($this->session->userdata('privilege') == 'admin view'){ ?>
													 <?php }else{ ?>
													 <option value="super admin" <?php if($this->session->userdata('privilege') == 'super admin'){ echo 'selected'; }?>>Super Admin</option> 
						                             <?php } ?>   
														<option value="admin view" <?php if($this->session->userdata('privilege') == 'admin view'){ echo 'selected'; }?>> Admin ( View Only )</option> 
						                            </select>
												</div>
				                        	</div>
				                        </div>
										
										<div class="form-group">
				                        	<div class="row">
				                        		<div class="col-md-6">
						                            <label>Username</label>
						                           <input name="username" type="text" value="<?php echo $this->session->userdata('username');?>" class="form-control">
												</div>
												<div class="col-md-6">
						                            <label>Password</label>
						                           <input name="password" type="password" value="<?php echo $this->session->userdata('password');?>" class="form-control">
												</div>
				                        	</div>
				                        </div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->
			
			</div>	
		</div>	
		
		
		
		
<?php $this->load->view('footer') ?>
<script>
	var param = 'users';
	$("#form-profile").submit(function(event) {
		event.preventDefault();
		
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                input: 'password',
                inputPlaceholder: 'Enter your password',
                inputClass: 'form-control',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: function (password) {
                    return new Promise(function (resolve) {
                        setTimeout(function () {
                            if (password !== '<?php echo $this->session->userdata('password');?>') {
                                swal.showValidationError('This password is wrong.')
								window.location.replace(BaseUrl);
                            }else{
								resolve();
							}
							
                            
                        }, 2000);
                    });
                },
                
            }).then(function (result) {
				if(result.value == '<?php echo $this->session->userdata('password');?>'){
				
				$.ajax({
							data: $('#form-profile').serialize(),
							url: ServUrl+"admin/"+param+"/update",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  console.log(response);
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message+' system need to signout',
										type:'success',
										onClose: function () {
										signOut()
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										window.location.replace(BaseUrl);
										 										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
							onClose: function () {
								
																	
							}
					}); 
                   
                }
            });
	});
	
	$('select[name=privilege]').change(function(){
		
		swal({
                title: 'For your information',
                text: 'By change level you will losing some access',
               
            });
	});
	
	
</script>