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
								<th class="text-center h4" rowspan="2">Kecamatan</th>
								<th class="text-center h5" id="table-title">Jumlah Penduduk</th>
								<th class="text-center h5" rowspan="2">Rata-Rata<br> Pertumbuhan<br>( % )</th>
							</tr>
							<tr id="list-year">
								 
							</tr>
							 
						</thead>
						<tbody>
							 
						</tbody>
						<tfoot class="bg-info-800">
							<tr id="total">
								
							</tr>
						</tfoot>
					</table>
					</div>
					</div>
					<div class="card-footer">
					<div class="text-muted text-right mr-2"><i>dipublikasikan  oleh <?php echo $instansi; ?></i></div>
				</div>
				</div>
				
				<!-- /basic responsive configuration -->
				
				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header mb-2 header-elements-inline">
						<h5 class="card-title"><i class="icon-chart mr-3 icon-1x"></i> Grafik <?php echo $halaman; ?> <span class="title"></span></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	 
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body mt-2">
							
					<div class="table-responsive">
					<div class="loader text-center mt-5 mb-5"></div>
					<div id="chart"></div>
					</div>
					</div>
					<div class="card-footer">
					<div class="text-muted text-right mr-2"><i>dipublikasikan  oleh <?php echo $instansi; ?></i></div>
				</div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
	
<?php $this->load->view('footer') ?>
<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/visualization/c3/c3.min.js"></script>
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
		$('#table-title').attr('colspan',a);
		$('#list-year').html(listYear);
		 
		
		$.ajax({
					data: {"year" : year},
					url: ServUrl+"admin/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							loadChart(response.responseJSON.data);  
							var tbody = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item " data-id="'+v.id+'" data-name="'+v.kecamatan+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.kecamatan+'</td>';
								 
								for(var y = end; y <= year; y++){ 
									var item = v.year[y]; 
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.kecamatan+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.kecamatan+'">'+item.value+'</a></td>';
									
									}
								}
								if(v.avg == 0) v.avg = '';
								tbody += '<td class="text-center avg" data-value="'+v.avg+'">'+v.avg+'</td>';
								tbody += "</tr>";
							
							});

							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	//add form
	$(document).ajaxStop(function(){
	var year 	= $("select[name=year]").val();
	var end 	= parseInt(year) - 4;		
	var listTotal = "<td class='text-center h5' colspan='2'>TOTAL JUMLAH</td>";
	 
	for(var i = end; i <= year; i++){
		var a = 0;
		$("."+i).each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 a += parseFloat(value);
		});

			listTotal += "<td class='text-center h4'>"+parse(a)+"</td>";
	}
		var b = 0;
		$(".avg").each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 b += parseFloat(value);
		});
		listTotal += "<td class='text-center h4'>"+parse(b)+"</td>";
	$('#total').html(listTotal);

	});
	
	loadData();
	$('.years').change(function(){
		loadData();
	});
	
	function loadChart(data){		
	  var year = [];
	  var modData = [];
	  $.each(data, function(d,i){
		var item = [i.kecamatan];
		 $.each(i.year, function(j,t){
		  year.push(j);
		  item.push(t.value);
		});
		modData.push(item);
	  });
	  
		var grid_lines_element = document.getElementById('chart');
		if(grid_lines_element) {
				$('#chart').html("");
				// Generate chart
				var grid_lines = c3.generate({
					bindto: "#chart",
					size: { height: 400 },
					color: {
						 pattern: ['#1f77b4', '#aec7e8', '#ff7f0e', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5']
					},
					 data: {
						columns: modData	
					},
					axis: {
						x: {
							type: 'category',
							categories: year
					}},
					grid: {
						x: {
							show: true
						},
						y: {
							show: true
						}
					}
				});

				// Resize chart on sidebar width change
				$('.sidebar-control').on('click', function() {
					grid_lines.resize();
				});
			}
	}

</script>
<?php $this->load->view('print') ?>