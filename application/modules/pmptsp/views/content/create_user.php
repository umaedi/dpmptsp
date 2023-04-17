<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			
			<div class="row">
					<div class="col-md-8">
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Create New User</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body mt-2"><div class="loader text-center mt-5 mb-5"></div>
									<form action="#" id="form-user-create">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>E-mail</label>
													<input name="email" type="email" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Name</label>
													<input name="id" type="hidden" value="" class="form-control">
													<input name="nama" type="text" value="" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Address</label>
													<input name="alamat" type="text" value="" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Phone</label>
													<input name="telp" type="text" value="" class="form-control">
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
													<input name="type" type="hidden" value="<?php echo $this->session->userdata('lvl');?>" class="form-control">
													<input type="text" readonly="readonly"  value="<?php echo $this->session->userdata('instansi');?>" class="form-control">
												</div>
												<div class="col-md-6">
													<label>User Privilege</label>
													<select name="privilege" class="form-control form-control-lg">
						                                <option value="super admin">Super Admin</option> 
						                                <option value="admin view"> Admin ( View Only )</option> 
						                            </select>
												</div>
											</div>
										</div>
										
										
										<div class="form-group">
				                        	<div class="row">
				                        		<div class="col-md-6">
						                            <label>Username</label>
						                           <input name="username" type="text" value="" class="form-control">
												</div>
												<div class="col-md-6">
						                            <label>Password</label>
						                           <input name="password" type="password" value="" class="form-control">
												</div>
				                        	</div>
				                        </div>

				                        <div class="text-right mt-5">
										<a onclick="goBack()" class="btn bg-dark legitRipple"><i class="icon-arrow-left15 mr-3"></i> Back</a>
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->
			
				</div>	
					<div class="col-sm-4">

								<!-- Available hours -->
								<div class="card bg-warning text-center">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Note</h5>
										<div class="header-elements">
											<div class="list-icons">
												<a class="list-icons-item" data-action="collapse"></a>
												 
											</div>
										</div>
									</div>
									<div class="card-body">
					                	 <p class="text-left mt-2 h6">
										 1. Instansi hanya dapat melakukan registrasi untuk login ke instansi terkait.<br><br> 2. Setiap akun yang terdaftar, maka sistem akan otomatis mencatat setiap aktifitas user untuk menghindari hal-hal yang tidak diinginkan
										 </p>
									</div>
								</div>
								<!-- /available hours -->

							</div>
				</div>
				
			</div>	
			</div>	
		</div>	
		
		
		
		
<?php $this->load->view('footer') ?>
<script>
	var param = 'users';
		
	$( "input[name=email]" ).change(function() {
	  var email =$(this).val()
	  
	  $.ajax({
					data: {"email": email},
					url: ServUrl+"admin/"+param+"/check_email",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 			
                        if(response.status == 200){
							if(response.responseJSON.data.result == false){
							swal({ title: 'Email Already Registrated',  text: "please use another email",});
							$("input[name=email]").val("");
							$('select[name=type]').html("");							
							}else{
								
							}
							
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										 $("input[name=email]").val("");										
										}
									}); 
									 
						}
                    },
					dataType:'json'
                })
	});
		
	$("#form-user-create").submit(function(event) {
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
							data: $('#form-user-create').serialize(),
							url: ServUrl+"admin/"+param+"/save",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								   
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										 
										window.location.replace(BaseUrl+'pmptsp/users');
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.items.nama+' '+response.responseJSON.items.username,
										type:'warning',
										onClose: function () {
										 										
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
										window.location.replace(BaseUrl+'pmptsp/users');
										 									
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
	
	$('select[name=lvl]').change(function(){
		
		swal({
                title: 'For your information',
                text: 'By change level you will losing some access',
               
            });
	});
	
	
</script>