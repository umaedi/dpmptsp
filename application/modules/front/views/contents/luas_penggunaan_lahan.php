<?php $this->load->view('header'); ?>
<script type="text/javascript">var switchTo5x=true;  var __st_loadLate=true;</script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=589337f04b182c0012152edf"></script>
		<div class="kb-breadcrumbs pt-90 bg-danger">
		
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
							<a href="#" style="color: white;"><?php echo $halaman; ?></a>
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
									 <div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
										<div class="loader text-center mt-5 mb-5"></div>
										<table id="table" class="table table-sm table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th class="text-center h5" rowspan="3">No.</th>
													<th class="text-center h4" rowspan="3">Uraian</th>
													<th class="text-center h5" id="table-title" colspan="4">Tahun</th>
													 
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
													<th class="text-center h5" rowspan="2" colspan="2">TOTAL JUMLAH</th>
												</tr>
												<tr id="total">
													
												</tr>
											</tfoot>
										</table>
										
										
									</div>

									<p class="pt-50">CONSUME API :</p>
									<pre class="small text-primary alert alert-primary"><code id="api"></code></pre>
									 
								</div>
								<div class="card-footer">
								<div class="text-muted text-right small mr-2"><i>dipublikasikan  oleh <?php echo $instansi; ?></i></div>
								</div> 
								</div>
								<!--/ .kb-category -->
							</div>
							 
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
<script>

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
		var listTitle = '';
	
		var a		= 0;
		var b		= 0;
		
		for(var i = end; i <= year; i++){
				listYear += "<th class='year text-center h5' colspan='2'>"+i+"</th>";
				a += 1;
				b += 1;
			}
		 
		for(var i = 1; i <= b; i++){
				listTitle += "<th class='year small text-center'>Luas(Ha)</th>";
				listTitle += "<th class='year small text-center'>Persentase</th>";
				
				a += 1;
			}
		 
		$('.title').html(year);  
		$('#table-title').attr('colspan',a);
		$('#list-year').html(listYear);
		$('#list-title').html(listTitle);
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
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item " data-id="'+v.id+'" data-name="'+v.value+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.value+'</td>'; 
								for(var y = end; y <= year; y++){
									var item = v.year[y];
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item luas'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="luas" data-name="'+v.value+'" data-value="'+null+'">&nbsp;</a></span></td>';	
										tbody += '<td class="text-center"><a class="add btn list-icons-item persen'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="persentase" data-name="'+v.value+'" data-value="'+null+'">&nbsp</a></span></td>';	
									}else{ 
										if(item.luas == 0) item.luas = '';
										if(item.persentase == 0) item.persentase = '';
										id = item.id;
										tbody += '<td class="text-center"><a class="add btn list-icons-item luas'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="luas" data-name="'+v.value+'" data-value="'+item.luas+'">'+item.luas+'</a></td>';
										tbody += '<td class="text-center"><a class="add btn list-icons-item persen'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="persentase" data-name="'+v.value+'" data-value="'+item.persentase+'">'+item.persentase+'</a></td>';
									}
								}
								tbody += "</tr>";
							
							});
							

							$('#table tbody').html(tbody);
							$('#chart-art').html('');
							$('#api').html(url+'?year='+year);
							 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadData();
	
	
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