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
									 
								</div>
							
 
							<div class="table-responsive">
								<table class="table text-nowrap table-bordered">
									<thead>
										<tr>
											<th class="text-center">No.</th>
											<th class="text-center">SKPD</th>
											<th class="text-center">Activities Description</th>
										</tr>
									</thead>
									<tbody id="log">
									<div class="loader text-center mt-5 mb-5"></div>
										
									</tbody>
								</table>
							</div>
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
	
	</script>