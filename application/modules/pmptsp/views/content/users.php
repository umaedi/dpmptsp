<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
				<!-- Collapsible lists -->
				<div class="row">
					<div class="col-md-8">

						<!-- Collapsible list -->
						<div class="card" data-animation="fadeIn">
							<div class="card-header header-elements-inline">
								<h5 class="card-title">Users list</h5>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		 
				                	</div>
			                	</div>
							</div>
							<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
								
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<a href="<?php echo base_url('pmptsp/users/create'); ?>" class="btn bg-teal"><i class="icon-user-plus mr-2"></i> Create User</a>
								</div>
							</div>
							<ul id="users" class="media-list media-list-linked">
							<div class="loader text-center mt-5 mb-5"></div>	
							</ul>
							 
							<div class="card-footer">
							<span class="text-muted d-block"><span class="badge badge-mark border-success"></span> On <br><span class="badge badge-mark border-danger"></span> Off</span>
							<div class="text-right"><a onclick="goBack()" class="btn bg-dark legitRipple"><i class="icon-arrow-left15 mr-3"></i> Back</a></div>
							
							
							</div>
							
						</div>
						<!-- /collapsible list -->

					</div>
					<div class="col-sm-4">

								<!-- Available hours -->
								<div class="card text-center">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Users Statistics</h5>
										<div class="header-elements">
											<div class="list-icons">
												<a class="list-icons-item" data-action="collapse"></a>
												 
											</div>
										</div>
									</div>
									<div class="card-body">

					                	<!-- Progress counter -->
										<div class="svg-center position-relative" id="hours-available-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); fill-opacity: 1;"></path></g></svg>
										<h2 class="pt-1 mt-2 mb-1"></h2>
										
										<i class="icon-watch text-pink-400 counter-icon" style="top: 22px"></i>
										<div class="h5 text-info" id="on"></div>
										<div class="text-danger" id="off"></div>
										 
										<!-- /progress counter -->


									</div>
								</div>
								<!-- /available hours -->

							</div>
				</div>
				<!-- /collapsible lists -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->

<?php $this->load->view('footer') ?>
<script>
	var instansi_id = $('#instansi-id').data("value");
	function loadData(){
		var param = 'users/list';
		$.ajax({
					data: "",
					url: ServUrl+"admin/"+param,
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							console.log(response.responseJSON)
							var tbody = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody +='<li class="media font-weight-semibold border-0 py-1 h5 text-success">'+no+'. '+v.instansi+'</li>';
								$.each(v.data, function(x,y){
									if (y.status == 1){ status = '<span class="badge badge-mark border-success"></span>'; }else{ status = '<span class="badge badge-mark border-danger"></span>'; }
									tbody +='<li><a href="#" class="media" data-toggle="collapse" data-target="#as'+y.id+'">'+
										'<div class="mr-2"><i class="icon-user"></i></div><div class="media-body"><div class="media-title font-weight-semibold">'+y.nama+'</div><span class="text-muted">'+y.lvl+'</span>'+
										'</div><div class="align-self-center ml-3">'+status+'</div>'+
										'</a><div class="collapse" id="as'+y.id+'"><div class="card-body bg-light border-top border-bottom"><ul class="list list-unstyled mb-0">'+
												'<li><i class="icon-user-tie mr-2"></i> '+y.alamat+'</li>'+
												'<li><i class="icon-phone mr-2"></i> '+y.telp+'</li>';
									tbody +='<li><i class="icon-mail5 mr-2"></i> <a href="#">'+y.email+'</a></li>';
									if(v.id == instansi_id){
									tbody +='<li><a href="'+BaseUrl+'pmptsp/users/view/'+y.id+'" class="btn btn-link">Open Detail</a></li></ul>';
									}
									tbody +='</div></div></li>';
								});
							});
							$('#users').html(tbody);  
							$('#on').html(response.responseJSON._attr.online+' Users Online');  
							$('#off').html(response.responseJSON._attr.offline+' Users Offline');  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadData();
	
	</script>