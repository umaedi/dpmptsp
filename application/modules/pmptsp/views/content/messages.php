<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<!-- Collapsible lists -->
				<!-- Profile navigation -->
				<div class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
							<i class="icon-menu7 mr-2"></i>
							Profile navigation
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-second">
						<ul class="nav navbar-nav">
							<li class="nav-item">
								<a href="#inbox" class="navbar-nav-link active" data-toggle="tab">
									<i class="icon-drawer-in mr-2"></i>
									Inbox Messages
								</a>
							</li>
							<li class="nav-item">
								<a href="#outbox" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-drawer-out mr-2"></i>
									Outbox Messages
									
								</a>
							</li>
							<li class="nav-item">
								<a onclick="message()" class="navbar-nav-link" data-toggle="tab">
									<i class="icon-compose mr-2"></i>
									Send Message
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /profile navigation -->
				<div class="d-flex align-items-start flex-column flex-md-row mt-2">
				<!-- Left content -->
					<div class="tab-content w-100 overflow-auto order-2 order-md-1">

						<div class="tab-pane fade active show" id="inbox">

							<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Inbox Messages <?php echo $this->session->userdata('name'); ?></h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		 
				                	</div>
			                	</div>
							</div>

							<div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
								
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<a onclick="dropLog()" class="btn bg-danger"><i class="icon-trash mr-2"></i> Drop User Log</a>
								</div>
							</div>
 
							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th class="text-center">No.</th>
											<th class="text-center">Dari Dinas & Pengirim</th>
											<th class="text-center">Messages</th>
										</tr>
									</thead>
									<tbody id="load-In">
									<div class="loader text-center mt-5 mb-5"></div>
										
									</tbody>
								</table>
							</div>
							<div class="card-footer">
							<span class="text-center d-block"><a id="loadIn" onclick="loadinMore()" class="btn btn-light" data-value="" ><i class="icon-sync mr-2"></i> Load More</a></span>
							</div>
						</div>
						

					    </div>

					    <div class="tab-pane fade" id="outbox">

				    		<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Outbox Messages <?php echo $this->session->userdata('name'); ?></h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		 
				                	</div>
			                	</div>
							</div>

							<div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
								
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<a onclick="dropLog()" class="btn bg-danger"><i class="icon-trash mr-2"></i> Drop User Log</a>
								</div>
							</div>
 
							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th class="text-center">No.</th>
											<th class="text-center"> Tujuan Dinas & Pengirim</th>
											<th class="text-center">Messages</th>
										</tr>
									</thead>
									<tbody id="load-Out">
									<div class="loader text-center mt-5 mb-5"></div>
										
									</tbody>
								</table>
							</div>
							<div class="card-footer">
							<span class="text-center d-block"><a id="loadIn" onclick="loadoutMore()" class="btn btn-light" data-value="" ><i class="icon-sync mr-2"></i> Load More</a></span>
							</div>
						</div>
						

				    	</div>
					</div>
				</div>
					<!-- /left content -->
				<div class="row">
					<div class="col-md-12">
						<!-- Support tickets -->

						<!-- /support tickets --> 
						
					</div>
				</div>
				<!-- /collapsible lists -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->
				<div id="modal_message" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Form Message</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-message" action="#">
							<input name="id" type="hidden" placeholder="" value="<?php echo $this->session->userdata('lvl'); ?>" class="form-control">
							 
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> Hi <?php echo $this->session->userdata('name'); ?>
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Nama Instansi</label>
													<select name="object" class="form-control form-control-lg">
													
													</select>
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<textarea name="message" type="text" placeholder="Kirim Pesan ke Dinas SKPD" class="form-control"></textarea>
											</div>
										</div>
							 </div>
							</div>
							<div class="modal-footer">
								<div id="btndelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save</button>
							</div>
							</form>
						</div>
					</div>
				</div>

<?php $this->load->view('footer') ?>
<script>
var id = $('#instansi-id').data("value");
	var data = {"page" : 1, "id" : id};
	var param = 'messages';
	 
	function loadIn(data){
		$.ajax({
					data: data,
					url: ServUrl+"admin/"+param+"/list_in",
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
											'<td class="text-center">'+no+''+
											'</td><td class="text-center"> '+
											'<a href="#" class="text-default font-weight-semibold">Dinas '+v.instansi+'</a>'+
										 
											'</td><td class="text-center"><a href="#" class="text-default">'+
											'<span class="text-muted">'+v.message+'</span></a></td></tr>';
							});
							$('#load-In').append(tbody);
							$('#loadIn').data("value", response.responseJSON._meta.currentPage);
													
                        }else if(response.status == 404){
							$('#loadIn').remove();
						}
						else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadIn(data);
	 
	
	function loadOut(data){
		$.ajax({
					data: data,
					url: ServUrl+"admin/"+param+"/list_out",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 			
                        if(response.status == 200){
							console.log(response.responseJSON.data)
							var tbody = '';
							var no = parseInt(response.responseJSON._meta.currentPage) * parseInt(response.responseJSON._meta.perPage) - 10;
							$.each(response.responseJSON.data, function(k,v){
								if (v.status == 1){ status = '<span class="badge badge-mark border-success"></span>'; }else{ status = '<span class="badge badge-mark border-danger"></span>'; }
								no++;
								tbody += '<tr>'+
											'<td class="text-center">'+no+''+
											'</td><td class="text-center"> '+
											'<a href="#" class="text-default font-weight-semibold">Dinas '+v.instansi+'</a>'+
										 
											'</td><td class="text-center"><a href="#" class="text-default">'+
											'<span class="text-muted">'+v.message+'</span></a></td></tr>';
							});
							$('#load-Out').append(tbody);
							$('#loadOut').data("value", response.responseJSON._meta.currentPage);
													
                        }else if(response.status == 404){
							$('#loadOut').remove();
						}
						else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadOut(data);
	 
	function loadinMore(){
		var page = parseInt($('#loadIn').data("value"))+1;
		var data = {"page" : page, "id" : id};
		loadIn(data);		
	};
	
	function loadoutMore(){
		var page = parseInt($('#loadOut').data("value"))+1;
		var data = {"page" : page, "id" : id};
		loadOut(data);		
	};
	
	function dropLog(){
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
								window.location.reload();
                            }else{
								resolve();
							}
							
                            
                        }, 2000);
                    });
                },
                
            }).then(function (result) {
				if(result.value == '<?php echo $this->session->userdata('password');?>'){
				
				$.ajax({
							data: {"id_instansi" : id},
							url: ServUrl+"admin/messages/drop",
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
										window.location.reload();
										 
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
										window.location.reload();
										 									
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}

            });
	
	}
	
	var param = "messages";
		function message(){
			loadInstansi()
			$('#modal_message').find('#form-message')[0].reset();
			 if (!($('.modal.in').length)) {
				$('.modal-dialog').css({
				  top: 0,
				  left: 0
				});
			  }
			$('#modal_message').modal({
					 
					show: true
				  });
		}

		
		$("#form-message").submit(function(event) {
			event.preventDefault();
			
				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, save it!',
					cancelButtonText: 'No, cancel!',
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					buttonsStyling: false
				}).then(function (result) {
					if(result.value == true){
					$.ajax({
								data: $('#form-message').serialize(),
								url: ServUrl+"admin/"+param+"/send",
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
											$('#load-Out').html("");
											loadOut(data)
											$("#modal_message").modal("hide");
											}
										}); 
								  }else if(response.status == 401){
									e('info','401 server conection error');
								  }else if(response.status == 403){
										swal({
											title: response.status+' Aborted!',
											text: response.responseJSON.message+' : '+response.responseJSON.items.value,
											type:'warning',
											onClose: function () {
											  
											$("#modal_message").modal("hide");										
											}
										}); 
										 
								  }else{
										swal({
											title: response.status+' Aborted!',
											text: response.responseJSON.message,
											type:'warning',
											onClose: function () {
											 $("#modal_message").modal("hide");										
											}
										}); 
										 
								  }
								},
								dataType:'json'
					})
					}
				});
		});
		
			
	function loadInstansi(){
		var param = 'users';
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
							$('select[name=object]').html(toAppend);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	</script>