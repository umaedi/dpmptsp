<?php $this->load->view('header'); ?>
<script type="text/javascript">var switchTo5x=true;  var __st_loadLate=true;</script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=589337f04b182c0012152edf"></script>
		<div class="kb-breadcrumbs pt-90 bg-warning">
		
			<div class="container">
				<div class="kb-breadcrumbs-container">
					<ul>
						<li>
							<a href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li>
							<a href="<?php echo site_url('data/index_data'); ?>">Index Dataset</a>
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
<!-- Content section with titles, sub-title & description + Sidebar and custom paddings -->
        <section class="hg_section pt-100 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="card">
								<div class="card-body">
								
								<div class="col-sm-12 col-md-12">
									<div class="kl-title-block clearfix tbk--text-default tbk--center text-center tbk-symbol--border2 tbk-icon-pos--after-title">
										<!-- Title with custom font size and theme color-->
										<h4 class="tbk__title fs-m tcolor">
											<!-- Border helper -->
											<span class="tbk__border-helper">
												<?php echo $halaman; ?> <span class="title"></span>
											</span>
										</h4>
										<!--/ Title with custom font size and theme color-->

										 
									</div>
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
												<button type="button" class="btn-element btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Drop menu</button>
												<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
													<div class="dropdown-header">Options</div>
													<a href="#" onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
													<a href="#" onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
													 
												</div>
											</div>
										</div>
									</div>
									<div class="alert alert-primary alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><p class="pt-10 small">Data yang ditampilkan dengan warna <span class="text-danger font-weight-bold">merah</span> adalah data yang bersifat rilis sementara, atau  <span class="font-weight-bold"> klik </span> pada kolom data untuk detail informasi.</p></div>
									 <div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
										<div class="loader text-center mt-5 mb-5"></div>
										<table id="table" class="table table-sm table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th class="text-center h5" rowspan="2">No.</th>
													<th class="text-center h5" rowspan="2">Uraian</th>
													<th class="text-center h5" rowspan="2">Satuan</th>
													<th class="text-center h5" id="table-title" colspan="4">Tahun <i class="small">( Jumlah )</i></th>
												</tr>
												<tr id="list-year">
													 
												</tr>
												<tr id="list-title">
													
												</tr>
											</thead>
											<tbody>
												 
											</tbody>
											<tfoot class="bg-info-800">
												<tr>
													<th class="text-center h4" rowspan="2" colspan="3">TOTAL JUMLAH</th>
												</tr>
												<tr id="total">
													
												</tr>
											</tfoot>
										</table>
										
									</div>

									<p class="pt-50">CONSUME API :</p>
									<pre class="small text-primary alert alert-primary"><code id="api"></code></pre>
									 
								</div>
								 
								</div>
								<!--/ .kb-category -->
							</div>
							
							<div class="col-md-12 col-sm-12">
								<div class="card mt-20">
								<div class="card-body">

									<div class="border border-danger shadow p-3 mb-5 bg-white rounded" id="chart"></div>
									<?php if($description != ""){ ?>
									<div class="ib2-style2 ib2-text-color-light-theme ib2-custom" style="background-color: #ffffff;">
										<div class="ib2-inner">
											<div class="ib2-content">
												<div class="ib2-content--text">
													<p><?php echo $description; ?></p>
												</div>
											</div>
										</div>
									</div> 
									<?php } ?>
								</div>
								<div class="card-footer">
								<div class="text-muted text-right small mr-2"><i>dipublikasikan  oleh <?php echo $instansi; ?></i></div>
								</div>
								</div>
								<!--/ .kb-category -->
							</div>
							<!--/ col-md-12 col-sm-12 -->

						</div>
						<!--/ row -->
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
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/components_popups.js"></script>
<script>
// Load the fonts
	Highcharts.createElement('link', {
		href: 'https://fonts.googleapis.com/css?family=Signika:400,700',
		rel: 'stylesheet',
		type: 'text/css'
	}, null, document.getElementsByTagName('head')[0]);
	// Add the background image to the container
	Highcharts.addEvent(Highcharts.Chart, 'afterGetContainer', function () {
		// eslint-disable-next-line no-invalid-this
		this.container.style.background =
			'url(https://www.highcharts.com/samples/graphics/sand.png)';
	});
	Highcharts.theme = {
		colors: ['#f45b5b', '#8085e9', '#8d4654', '#7798BF', '#aaeeee',
			'#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
		chart: {
			backgroundColor: null,
			style: {
				fontFamily: 'Signika, serif'
			}
		},
		title: {
			style: {
				color: 'black',
				fontSize: '16px',
				fontWeight: 'bold'
			}
		},
		subtitle: {
			style: {
				color: 'black'
			}
		},
		tooltip: {
			borderWidth: 0
		},
		labels: {
			style: {
				color: '#6e6e70'
			}
		},
		legend: {
			backgroundColor: '#E0E0E8',
			itemStyle: {
				fontWeight: 'bold',
				fontSize: '13px'
			}
		},
		xAxis: {
			labels: {
				style: {
					color: '#6e6e70'
				}
			}
		},
		yAxis: {
			labels: {
				style: {
					color: '#6e6e70'
				}
			}
		},
		plotOptions: {
			series: {
				shadow: true
			},
			candlestick: {
				lineColor: '#404048'
			},
			map: {
				shadow: false
			}
		},
		// Highstock specific
		navigator: {
			xAxis: {
				gridLineColor: '#D0D0D8'
			}
		},
		rangeSelector: {
			buttonTheme: {
				fill: 'white',
				stroke: '#C0C0C8',
				'stroke-width': 1,
				states: {
					select: {
						fill: '#D0D0D8'
					}
				}
			}
		},
		scrollbar: {
			trackBorderColor: '#C0C0C8'
		}
	};
	// Apply the theme
	Highcharts.setOptions(Highcharts.theme);
	
	var today = new Date();
	var jenis = getUrlParameter('jenis');
	var url = window.location.pathname.split('/');
	var param = url.pop();
	var sub = url[parseInt(url.length) - 1];
	 
	
	function loadData(){
		 
		var jenis = getUrlParameter('jenis');
		var year 	= $("select[name=year]").val();
		var end 	= parseInt(year) - 4;
		var listYear = '';
		var a		= 0;
		
		for(var i = end; i <= year; i++){
				listYear += "<th class='year text-center h6'>"+i+"</th>";
				a += 1;
			}
		 
		$('.title').html(year);  
		$('#table-title').attr('colspan',a);
		$('#list-year').html(listYear);
		var url =  ServUrl+sub+'/'+param+"/list", data = 
		
		$.ajax({
					data: {"year" : year, "jenis" : jenis},
					url: url,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(response.responseJSON.data.length == 0){
								window.location.replace(BaseUrl);
							} 
							var title = response.responseJSON.data[0].jenis+' '+year;
							$('#jenis').val(response.responseJSON.data[0].jenis);
							$('#aspek').val(response.responseJSON.data[0].aspek);
							var tbody = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								 
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item " data-id="'+v.id+'" data-name="'+v.uraian+'" data-aspek="'+v.aspek+'" data-jenis="'+v.jenis+'" data-satuan="'+v.satuan+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.uraian+'</td>';
								tbody += '<td class="text-left">'+v.satuan+'</td>';
								 
								for(var y = end; y <= year; y++){ 
									var item = v.year[y]; 
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.uraian+'" data-aspek="'+v.aspek+'" data-jenis="'+v.jenis+'" data-satuan="'+v.satuan+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										//update ganti
										switch(parseInt(item.status_rilis)){
											case 0:
												var style = "";
											break;
											case 1:
												var style = "text-danger";
											break;
										}
										tbody += '<td class="text-center '+style+'"><a class="add popup-ajax btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-tgl_rilis="'+item.tgl_rilis+'" data-status_rilis="'+item.status_rilis+'" data-ket_rilis="'+item.ket_rilis+'" data-name="'+v.uraian+'" data-aspek="'+v.aspek+'" data-jenis="'+v.jenis+'" data-satuan="'+v.satuan+'">'+item.value+'</a></td>';
										
										//end update
										
										//tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.uraian+'" data-aspek="'+v.aspek+'" data-jenis="'+v.jenis+'" data-satuan="'+v.satuan+'">'+item.value+'</a></td>';
									
									}
								}
								 
								tbody += "</tr>";
							
							});
							

							$('#table tbody').html(tbody);
							$('#chart-art').html('');
							$('#api').html(url+'?year='+year+'&jenis='+jenis);
							renders(response.responseJSON.data, "chart");
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadData();
	
	function renders(data, target){
		var jenis = [];
		var year = [];
		 
		var modData = [];
		  $.each(data, function(d,i){
			jenis.push(i.jenis);
			var val = [];
			 $.each(i.year, function(j,t){
				if(t.value != ""){
				  year.push(j);
				}

			});
		  });
		  
			var year = year.filter(function(elem, index, self) {
			  return index === self.indexOf(elem);
			});
		
		  $.each(data, function(d,i){
			jenis.push(i.jenis);
			  
			var val = [];
				$.each(year, function(j,t){  
					var item = checkYear(i.year, t);
					val.push(item);
					 
				});
			 
			
			modData.push({"name":i.uraian, "data": val});
		  });
		 
		var jenis = jenis.filter(function(elem, index, self) {
			  return index === self.indexOf(elem);
		});  
		  
		 
		var chartArt = Highcharts.chart(target, {
			chart: {
					type: 'line'
				},
			title: {
				text: jenis
			},

			subtitle: {
				text: 'source : <a href="'+BaseUrl+'" target="_blank">'+BaseUrl+'</a>'
			},
			
			tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
			 
			xAxis: {categories : year},
			yAxis: {
				min: 0,
				title: {
					text: 'jumlah'
				}
			},
			
			plotOptions: {
				series: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: true
				}
			},
			series: modData
		});
	$(".highcharts-credits").remove();
	}
	
	function checkYear(data, t){
		 var val = 0;
		 $.each(data, function(a,b){
			 
			 if (Number(t)==Number(a)){
				 val +=Number(b.value);
			 }else{
				 val +=Number(0); 
			 }
		 });
		 return val;
	};
	
	//add form
	$(document).ajaxStop(function(){
	var year 	= $("select[name=year]").val();
	var end 	= parseInt(year) - 4;		
	var listTotal = '';
	
	//update tambah
	$( ".popup-ajax" ).mouseover(function() {
		var	status_rilis = $(this).data("status_rilis");
		
		switch(parseInt(status_rilis)){
			case 0:
				var style = "text-success";
			break;
			case 1:
				var style = "text-danger";
			break;
		}
		
		$(this).popover({
			"title": 'Keterangan',
			"html" : true, 
			"trigger": 'click',
			"template": '<div class="popover"><div class="arrow"></div><h3 class="popover-header bg-default"></h3><div class="popover-body"></div></div>',
			"content": 'Tanggal Rilis : <i>'+$(this).data("tgl_rilis")+'</i> <br> Status Rilis : <i class="'+style+'">'+$(this).data("ket_rilis")+'</i>'
		});
	})
	$( ".add" ).on( "click", function(event) {
		if($(this).hasClass("btn-outline-primary")){
			$(this).removeClass("btn-outline-primary");
		}else{
			$(this).addClass("btn-outline-primary");
		}
	});
	 
	//end update
	 
	for(var i = end; i <= year; i++){
		var a = 0;
		$("."+i).each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 a += parseFloat(value);
		});

			listTotal += "<th class='text-center h4'>"+parse(a)+"</th>";
	}

	$('#total').html(listTotal);
	
	
	});
	
	
	$('.years').change(function(){
		loadData();
	});
	
	function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
	 
	 
	
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php $this->load->view('print') ?>