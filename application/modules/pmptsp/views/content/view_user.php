<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			
			<div class="row">
					<div class="col-md-6">
							<div class="card">
								<div class="card-header bg-dark header-elements-inline">
									<h5 class="card-title">User <span class="name"></span></h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body"><div class="loader text-center mt-5 mb-5"></div>
									<form action="#" id="form-user-create" disabled>
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
											<a onclick="remove(<?php echo $this->uri->segment(4); ?>)" class="btn bg-transparent text-danger border-danger ml-1">Remove</a>
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->
			
				</div>	
				<div class="col-md-6">
						<!-- Support tickets -->
						<div class="card">
							<div class="card-header bg-dark header-elements-sm-inline">
								<h6 class="card-title">Log Activities <span class="name"></span></h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		 
				                	</div>
			                	</div>
							</div>

							<div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<span class="status"></span>
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
								
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									 
								</div>
							</div>
 
							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th class="text-center">No.</th>
											 
											<th>Description</th>
										</tr>
									</thead>
									<tbody id="log">
									<div class="loader text-center mt-5 mb-5"></div>
										
									</tbody>
								</table>
							</div>
							<div class="card-footer">
							<span class="text-center d-block"><a id="loadlog" onclick="loadMore()" class="btn btn-light" data-value="" ><i class="icon-sync mr-2"></i> Load More</a></span>
							</div>
						</div>
						<!-- /support tickets --> 
						
					</div>
				
			</div>	
			</div>	
		</div>	
		
		
		
		
<?php $this->load->view('footer') ?>
<script>
	var param = 'users';
	var id = window.location.pathname.split('/').pop();
	var instansi_id = $('#instansi-id').data("value");
	loadInstansi();
	
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
							loadData();
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	function loadData(){
		
		
		$.ajax({
					data: {"id": id},
					url: ServUrl+"admin/"+param+"/view",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
							 if(response.responseJSON.data.instansi_id != instansi_id){
								window.location.replace(BaseUrl+'pmptsp/users');  
							 }else{
							 if (response.responseJSON.data.status.status == 1){ status = '<span class="badge badge-mark border-success"></span> | login status on'; }else{ status = '<span class="badge badge-mark border-danger"></span> | login status off'; }
							 $("input[name=id]").val(response.responseJSON.data.id);
							 $("input[name=nama]").val(response.responseJSON.data.nama);
							 $(".name").html(response.responseJSON.data.nama);
							 $(".status").html(status);
							 $("input[name=email]").val(response.responseJSON.data.email);
							 $("input[name=alamat]").val(response.responseJSON.data.alamat);
							 $("input[name=telp]").val(response.responseJSON.data.telp);
							 $("input[name=username]").val(response.responseJSON.data.username);
							 $("input[name=password]").val(response.responseJSON.data.password);
							 $("select[name=type]").val(response.responseJSON.data.instansi_id);
							 $("select[name=privilege]").val(response.responseJSON.data.privilege);
							 }
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							 window.location.replace(BaseUrl+'pmptsp/users');
						}
                    },
					dataType:'json'
                })
	}
	
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
						};
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
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.items.nama,
										type:'warning',
										onClose: function () {
										 										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	});
	
	function remove(id){
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
							data: {"id" : id},
							url: ServUrl+"admin/"+param+"/delete",
							crossDomain: true,
							headers: header,
							method: 'GET',
							complete: function(response){                
							  if(response.status == 201){
								  
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										window.location.replace(BaseUrl+'pmptsp/users');
										 
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

            });
	
	}
	
	$('select[name=privilege]').change(function(){
		
		swal({
                title: 'For your information',
                text: 'By change level user will losing some access',
               
            });
	});
	
	
</script>

<script>
	var data = {"page" : 1, "id" : id};
	function loadLog(data){
		var param = 'users/log';
		$.ajax({
					data: data,
					url: ServUrl+"admin/"+param,
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 						
                        if(response.status == 200){
							 
							var tbody = '';
							var no = parseInt(response.responseJSON._meta.currentPage) * parseInt(response.responseJSON._meta.perPage) - 10;
							$.each(response.responseJSON.data, function(k,v){
								if (v.status == 1){ status = '<span class="badge badge-mark border-success"></span>'; }else{ status = '<span class="badge badge-mark border-danger"></span>'; }
								no++;
								tbody += '<tr>'+
											'<td class="text-center">'+no+'</td>'+
											'<td><a href="#" class="text-default"><div class="font-weight-semibold">'+v.date+'</div>'+
											'<span class="text-muted">'+v.description+'</span></a></td></tr>';
							});
							$('#log').append(tbody);
							$('#loadlog').data("value", response.responseJSON._meta.currentPage);
													
                        }else if(response.status == 404){
							$('#loadlog').remove();
						}
						else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadLog(data);
	 
	function loadMore(){
		var page = parseInt($('#loadlog').data("value"))+1;
		var id = window.location.pathname.split('/').pop();
		var data = {"page" : page, "id" : id}
		loadLog(data);		
	};
	</script>