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
													<th class="text-center" rowspan="2">No.</th>
													<th class="text-center" rowspan="2">Kecamatan</th>
													<th class="text-center" rowspan="2">Ibukota</th>
													<th class="text-center" rowspan="2">Jumlah Kampung</th>
													<th class="text-center" colspan="2">Luas</th>
													 
												</tr>
												<tr>
													<th class="text-center">Km2</th>
													<th class="text-center">Persentase</th>
												</tr>
												 
											</thead>
											<tbody>	 
											</tbody>
											<tfoot class="bg-info-800">
											<tr>
													<td class="text-center h5" rowspan="2" colspan="3">Jumlah Total</td>
													<td class="text-center h5" rowspan="2" id="total-kp"></td>
													<td class="text-center h5" rowspan="2" id="total-km2"></td>
													<td class="text-center h5" rowspan="2" id="total-percent"></td>	 
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
<script>

	 
	var url = window.location.pathname.split('/');
	var param = url.pop();
	 
	 
	function loadData(){
		var url =  ServUrl+"admin/"+param+"/list";
		$.ajax({
					data: "",
					url: url,
   
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var tbody = '';
							var no = 0;
							var totalKp = 0;
							var totalKm = 0;
							var totalPercent = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								totalKp += parseFloat(v.jumlah_kampung); totalKm += parseFloat(v.km2); totalPercent += parseFloat(v.persentase);
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item" data-id="'+v.id+'" data-persentase="'+v.persentase+'" data-km2="'+v.km2+'" data-jumlah_kampung="'+v.jumlah_kampung+'" data-kecamatan="'+v.kecamatan+'" data-ibukota="'+v.ibukota+'">'+no+'.</a></td>';
								tbody += '<td class="text-center">'+v.kecamatan+'</td>';
								tbody += '<td class="text-center">'+v.ibukota+'</td>';
								tbody += '<td class="text-center">'+v.jumlah_kampung+'</td>';
								tbody += '<td class="text-center">'+v.km2+'</td>';
								tbody += '<td class="text-center">'+v.persentase+'</td>';
								tbody += "</tr>";
							
							});
								 
							$('#total-kp').html(totalKp);  
							$('#total-km2').html(totalKm);  
							$('#total-percent').html(parse(totalPercent));  
							$('#table tbody').html(tbody); 
							$('#api').html(url);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	loadData();
	
	
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php $this->load->view('print') ?>