<?php $this->load->view('header'); ?>
<!-- Knowledge base breadcrumbs -->
		<div class="kb-breadcrumbs pt-90 bg-warning">
		
			<div class="container">
				<div class="kb-breadcrumbs-container">
					<ul>
						<li>
							<a href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li class="active">
							<a href="#"><?php echo $halaman; ?></a>
						</li>
					</ul>
				</div>
			</div>
			<!--/ container -->

			<!-- Sub-header Bottom mask style 2 -->
			<div class="kl-bottommask kl-bottommask--shadow_ud"></div>
			<!--/ Sub-header Bottom mask style 2 -->
		</div>
		<!--/ Knowledge base breadcrumbs -->
<!-- Content section with titles, sub-title & description + Sidebar and custom paddings -->
        <section class="hg_section pt-100 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
							<div class="card">
								<div class="card-body">
									<div class="kl-title-block clearfix text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title pbottom-60">
									<!-- Title -->
										<h4 class="kl-font-alt fw-bold uppercase tcolor">
											<?php echo $halaman; ?>
										</h4>

										<div class="tbk__symbol tcolor">
											<span class="tbg"></span>
										</div>
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
												<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Drop Menu</button>
												<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
													<div class="dropdown-header">Options</div>
													<a href="#" onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
													<a href="#" onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
													 
												</div>
											</div>
										</div>
									</div>
									
									<div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
									<div class="loader text-center mt-5 mb-5"></div>
									<table id="table" class="table table-sm table-bordered table-dark table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center h5" rowspan="2">No.</th>
												<th class="text-center h5" rowspan="2">Uraian</th>
												<th class="text-center h5" id="table-title" colspan="5">Tahun</th>
												<th class="text-center h5" rowspan="2">Rata-Rata<br> Pertumbuhan<br>( % )</th> 
											</tr>
											<tr id="list-year">
												 
											</tr>
											<tr id="list-title">
												
											</tr>
										</thead>
										
										<tbody>
											 
										</tbody>
									</table>
									</div>
					
									
										  
									</div>
								</div>
							</div>	
					</div>
					
					<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
							<div class="card mt-20">
								<div class="card-body">
									<div class="kl-title-block clearfix text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title pbottom-60">
									<!-- Title -->
										   
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chart"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartOne"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartTwo"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartThree"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartFour"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartFive"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartSix"></div>
										<div class="border border-primary shadow mb-60 bg-white rounded" id="chartSeven"></div>
										
									</div>
								</div>
							</div>
					</div>
					<!--/ col-sm-12 col-md-6 col-lg-8 mb-sm-30 -->

					 
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</section>
		<!--/ Content section with titles, sub-title & description + Sidebar and custom paddings -->
<?php $this->load->view('footer'); ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script>
	function my_number(bilangan){
        	return bilangan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
	var today = new Date();
	var param = 'perkembangan_data_makro_kabupaten';
	var sub = "admin/";
	
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
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							console.log(response.responseJSON.data);
							var tbody = '';
							var tbody2 = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="btn list-icons-item " data-id="'+v.id+'" data-name="'+v.uraian+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.uraian+'</td>';
								
								for(var y = end; y <= year; y++){ 
									var item = v.year[y];
									 
									if((item == undefined) || (item.value == 0)){
										id = null;
										tbody += '<td class="text-right"><a class="list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.uraian+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										tbody += '<td class="text-right"><a class="list-icons-item" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.uraian+'">'+my_number(item.value)+'</a></td>';
									
									}
								}
								if(v.avg == 0) v.avg = '';
								tbody += '<td class="text-center avg" data-value="'+v.avg+'">'+v.avg+'</td>';
								tbody += "</tr>";
							
							});
							if(response.responseJSON._meta.pinStatus == true){ 
							var pin = '<i class="icon-check text-success"></i>Show on E-Data';
							$('#alert').html('');
							}else{ 
							var pin = '<i class="icon-pushpin"></i>Pin to E-Data';
							$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
							};
							$('#pin-status').html(pin); 

							$('#table tbody').html(tbody);
                        loadChartOne();
                        }else if(response.status == 401){
							 
						}
                    },
					dataType:'json'
                })
	
	};
	
	loadData();
	$('.years').change(function(){
		loadData();
	});
	
	function loadChartOne(){
	    var year 	= $("select[name=year]").val();
				$.ajax({
					data: {"year" : year},
					url: ServUrl+"report/chart/makro",
                    crossDomain: false,
                    method: 'GET',
					beforeSend: function(){ 
							$('#chartOne').html('');
							},
                    complete: function(response){ 			
                        if(response.status == 200){ 
							renderLine(response.responseJSON.jumlah_penduduk, 'chart');
							renderLine(response.responseJSON.ipm, 'chartOne');
							renderLine(response.responseJSON.ahp, 'chartTwo');
							renderLine(response.responseJSON.harapan_lama_sekolah, 'chartThree');
							renderLine(response.responseJSON.rata_lama_sekolah, 'chartFour');
							renderPie(response.responseJSON.pertumbuhan_ekonomi, 'chartFive');
							render3d(response.responseJSON.inflasi, 'chartSix');
							renderInverted(response.responseJSON.tingkat_kemiskinan, 'chartSeven');
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	}
	loadChartOne();
	
	function render(data, target){
		var chartArt = Highcharts.chart(target, {

			title: {
				text: data.title
			},

			subtitle: {
				text: data.breadcrumb
			},
			
			tooltip: {
				pointFormat: 'Jumlah <b>{point.name}</b> : <b>{point.y:.2f}</b>'
			},
			
			chart: {
					inverted: false,
					polar: false
			},
			yAxis: {
				min: 0,
				title: {
					text: data.title
				}
			},
			
			xAxis: {
				categories: data.categories
			},

			series: [{
				type: 'column',
				colorByPoint: true,
				data: data.series,
				cursor: 'pointer',
				showInLegend: false,
				dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.2f}',
						y: 0, 
						style: {
								fontSize: '10px',
								fontFamily: 'Verdana, sans-serif'
						}
				}
			}]
		});
	$(".highcharts-credits").remove();
	 
	$("#"+target).append('<div class="ib2-style2 ib2-text-color-light-theme ib2-custom" style="background-color: #ffffff;"><div class="ib2-inner"><div class="ib2-content"><div class="ib2-content--text"><p>'+data.deskripsi+'</p></div></div></div></div>');
	}
	
	function renderInverted(data, target){
		var chartArt = Highcharts.chart(target, {

			title: {
				text: data.title
			},

			subtitle: {
				text: data.breadcrumb
			},
			
			tooltip: {
				pointFormat: 'Jumlah <b>{point.name}</b> : <b>{point.y:.2f}</b>'
			},
			
			chart: {
					inverted: true,
					polar: false
			},
			yAxis: {
				min: 0,
				title: {
					text: data.title
				}
			},
			
			xAxis: {
				categories: data.categories
			},

			series: [{
				type: 'column',
				colorByPoint: true,
				data: data.series,
				cursor: 'pointer',
				showInLegend: false,
				dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.2f}',
						y: 0, 
						style: {
								fontSize: '10px',
								fontFamily: 'Verdana, sans-serif'
						}
				}
			}]
		});
	$(".highcharts-credits").remove();
	}
	
	function renderLine(data, target){
		var chartArt = Highcharts.chart(target, {

			title: {
				text: data.title
			},

			subtitle: {
				text: data.breadcrumb
			},
			
			tooltip: {
				pointFormat: 'Jumlah <b>{point.name}</b> : <b>{point.y:.2f}</b>'
			},
			
			chart: {
					inverted: false,
					polar: false
			},
			yAxis: {
				min: 0,
				title: {
					text: data.title
				}
			},
			
			xAxis: {
				categories: data.categories
			},

			series: [{
				type: 'line',
				data: data.series,
				cursor: 'pointer',
				showInLegend: false,
				dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#FFFFFF',
						align: 'right',
						format: '{point.y:.2f}',
						y: 0, 
						style: {
								fontSize: '10px',
								fontFamily: 'Verdana, sans-serif'
						}
				}
			}]
		});
	$(".highcharts-credits").remove();
	$("#"+target).append('<div class="ib2-style2 ib2-text-color-light-theme ib2-custom" style="background-color: #ffffff;"><div class="ib2-inner"><div class="ib2-content"><div class="ib2-content--text"><p>'+data.deskripsi+'</p></div></div></div></div>');
	
	}
	
	function renderPie(data, target){
		var chartArt = Highcharts.chart(target, {

			title: {
				text: data.title
			},

			subtitle: {
				text: data.breadcrumb
			},
			
			tooltip: {
				pointFormat: 'Jumlah <b>{point.name}</b> : <b>{point.y:.2f}</b>'
			},
			
			chart: {
					inverted: false,
					polar: false
			},
			yAxis: {
				min: 0,
				title: {
					text: data.title
				}
			},
			
			xAxis: {
				categories: data.categories
			},

			series: [{
				type: 'pie',
				data: data.series,
				cursor: 'pointer',
				showInLegend: false,
				dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#FFFFFF',
						align: 'right',
						format: '<b>{point.name}</b> : {point.y:.2f}',
						y: 0, 
						style: {
								fontSize: '10px',
								fontFamily: 'Verdana, sans-serif'
						}
				}
			}]
		});
	$(".highcharts-credits").remove();
	}
	
	function render3d(data, target){
		var chartArt = Highcharts.chart(target, {

			chart: {
				type: 'column',
				options3d: {
					enabled: true,
					alpha: 10,
					beta: 25,
					depth: 90
				}
			},
			title: {
				text: data.title
			},
			subtitle: {
				text: data.breadcrumb
			},
			plotOptions: {
				column: {
					depth: 25
				}
			},
			xAxis: {
				categories: data.categories,
				labels: {
					skew3d: true,
					style: {
						fontSize: '16px'
					}
				}
			},
			yAxis: {
				title: {
					text: null
				}
			},
			series: [{
				name: data.title,
				data: data.series,
				colorByPoint: true,
				showInLegend: false,
			}]
		});
	$(".highcharts-credits").remove();
	}
	
	</script>
	<?php $this->load->view('print') ?>