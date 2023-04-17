<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<?php $this->load->view('fab') ?>
				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header mb-4 header-elements-inline">
						<h5 class="card-title"><?php echo $halaman; ?> <span class="title"></span></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	 
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
							<div class="card-body row d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<label class="col-form-label col-lg-4">Year</label>
									<?php $start = date('Y') ; $end = 2014; ?> 
										<select name="year" class="years form-control form-control-lg">
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
									
								</div>

								 
								
								<div class="float-right">
									<div class="btn-group dropleft">
										<button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Drop menu</button>
										<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
											<div class="dropdown-header">Option menu</div>
											<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											<a onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
											<a onclick="excel()" class="dropdown-item"><i class="icon-file-excel"></i> Excel</a>
										</div>
									</div>
								</div>
							</div>
					<div class="table-responsive">
					<div class="loader text-center mt-5 mb-5"></div>
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="2">No.</th>
								<th class="text-center h5" rowspan="2">Makro Ekonomi</th>
							</tr>
							<tr id="list-year">
								 
							</tr>
						</thead>
						<tbody id="me">
							 
						</tbody>
						<thead>
							<tr>
								<th class="text-center h5"></th>
								<th class="text-center h5">Tingkat Kesejahteraan Rakyat</th>
								<th class="text-center h5" id="sub-year"></th>
							</tr>
							<tr>
								
							</tr>
							 
						</thead>
						<tbody id="tkr">
							 
						</tbody>
					</table>
					</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-muted text-right mr-2"><i>dipublikasikan  oleh <?php echo $instansi; ?></i></div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
		
<?php $this->load->view('footer') ?>
<script>
	var today = new Date();
	var param = window.location.pathname.split('/').pop();
	function loadData(){
		var year 	= $("select[name=year]").val();
		var end 	= parseInt(year) - 4;
		var listYear = '';
		 
		var a		= 0;

		
		for(var i = end; i <= year; i++){
				listYear += "<th class='year text-center h5'>"+i+"</th>";
				a += 1;
			}
		 
		$('.title').html(year);  
		$('#sub-year').attr('colspan',a);
		$('#list-year').html(listYear);
		 
		
		$.ajax({
					data: {"year" : year},
					url: ServUrl+"admin/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							console.log(response.responseJSON.data2);
							var tbody = '';
							var tbody2 = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item " data-id="'+v.id+'" data-name="'+v.name+'" data-type="'+v.type+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.name+'</td>';
								
								for(var y = end; y <= year; y++){ 
									var item = v.year[y];
									 
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.name+'" data-type="'+v.type+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										tbody += '<td class="text-center"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.name+'" data-type="'+v.type+'">'+item.value+'</a></td>';
									
									}
								}
							 
								tbody += "</tr>";
							
							});

							$('#me').html(tbody);
							var no = 0;
							$.each(response.responseJSON.data2, function(k,v){
								no++;
								tbody2 += '<tr>';
								tbody2 += '<td class="text-center small"><a class="opt btn list-icons-item " data-id="'+v.id+'" data-name="'+v.name+'" data-type="'+v.type+'">'+no+'.</a></td>';
								tbody2 += '<td class="text-left">'+v.name+'</td>';
								for(var y = end; y <= year; y++){ 
									var item = v.year[y]; 
									if(item == undefined){
										id = null;
										tbody2 += '<td class="text-center"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.name+'" data-type="'+v.type+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										tbody2 += '<td class="text-center"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.name+'" data-type="'+v.type+'">'+item.value+'</a></td>';
									
									}
								}
							 
								tbody2 += "</tr>";
							
							});

							$('#tkr').html(tbody2);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	loadData();
	$('.years').change(function(){
		loadData();
	});
</script>
<?php $this->load->view('print') ?>