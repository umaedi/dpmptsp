<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<!-- Collapsible lists -->
				<div class="row">
					<div class="col-md-12">
						<!-- Support tickets -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Log Activities SKPD</h6>
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
								<table class="table text-nowrap table-bordered">
									<thead>
										<tr>
											<th class="text-center">No.</th>
											<th class="text-center">SKPD</th>
											<th class="text-center">Description</th>
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
				<!-- /collapsible lists -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->

<?php $this->load->view('footer') ?>
<script>
	var data = {"page" : 1};
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
											'<td class="text-center">'+no+''+
											'</td><td> '+
											'<a href="#" class="text-default font-weight-semibold">Dinas '+v.instansi+'</a>'+
											'<div class="text-muted font-size-sm">'+status+' &nbsp;'+v.nama+'</div>'+
											'</td><td><a href="#" class="text-default"><div class="font-weight-semibold">'+v.date+'</div>'+
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
		var data = {"page" : page};
		loadLog(data);		
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
							data: "",
							url: ServUrl+"admin/users/drop_log",
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
	</script>