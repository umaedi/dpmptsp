<?php $this->load->view('header'); ?>
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
										<h4 class="kl-font-alt fw-bold uppercase">
											<?php echo $halaman; ?> Kabupaten Tulang Bawang
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
													<a onclick="insert()" class="dropdown-item"><i class="icon-plus3"></i> Insert</a>
													<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
													<a onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
												</div>
											</div>
										</div>
									</div>
									
									<div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
									<div class="loader text-center mt-5 mb-5"></div>
									<table id="table" class="table table-sm table-bordered table-dark table-striped table-hover">
										<thead>
											<tr>
												<th class="text-center h5">No.</th>
												<th class="text-center h5">Tahun</th>
												<th class="text-center h5">Jenis Penghargaan</th>
												<th class="text-center h5" rowspan="2">Keterangan</th>
												 
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
					
					
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
		</section>
		<!--/ Content section with titles, sub-title & description + Sidebar and custom paddings -->
<?php $this->load->view('footer'); ?>

<script>
	var sub 	= "admin/";
	var param = window.location.pathname.split('/').pop();
	function loadData(){
		$('#table tbody').html('');  
		var year 	= $("select[name=year]").val();
		$.ajax({
					data: {"year" : year},
					url: ServUrl+sub+param+"/list",
                    method: 'GET',
                    complete: function(response){  
											
                        if(response.status == 200){
							var tbody = '';
							var no = 0;
							
							$.each(response.responseJSON.data, function(k,v){
								 
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="list-icons-item" data-id="'+v.id+'" data-tahun="'+v.tahun+'" data-jenis="'+v.jenis+'" data-keterangan="'+v.keterangan+'">'+no+'.</a></td>';
								tbody += '<td class="text-left small">'+v.tahun+'</td>';
								tbody += '<td class="text-left small">'+v.jenis+'</td>';
								tbody += '<td class="text-left small">'+v.keterangan+'</td>';
								 
								tbody += "</tr>";
							
							});
							
							if(tbody == '') tbody ='<tr><td colspan="4" class="text-center">No record availabe in '+year+'</td></tr>';
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};

	loadData();
	$('.years').change(function(){
		$('.title').html($(this).val());
		loadData();
	});	
	</script>