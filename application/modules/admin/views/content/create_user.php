<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			
			<div class="row">
					<div class="col-md-10">
							<div class="card">
								<div class="card-header bg-dark header-elements-inline">
									<h5 class="card-title">Create New User</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body"><div class="loader text-center mt-5 mb-5"></div>
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
													<select name="type" class="form-control form-control-lg">
													
													</select>
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

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->
			
				</div>	
			</div>	
			</div>	
		</div>	
		
		
		
		
<?php $this->load->view('footer') ?>
<script>
	var param = 'users';
	function loadInstansi(){
		$.ajax({
					data: "",
					url: ServUrl+"admin/"+param+"/list_instansi",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 
					var toAppend = '';
					toAppend +='<option></option>';					
                        if(response.status == 200){
							$.each(response.responseJSON.data, function(k,v){
								toAppend +='<option value=' + v.id + '>' + v.instansi.toUpperCase() + '</option>';
							});
							$('select[name=type]').html(toAppend);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	
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
								loadInstansi();
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
								  console.log(response);
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										$('#form-user-create')[0].reset();
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
										window.location.replace(BaseUrl+'admin/users');
										 									
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