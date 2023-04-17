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
		                		<a class="list-icons-item" data-action="reload"></a>
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
								<th class="text-center h5" rowspan="2">Tahun</th>
								<th class="text-center h5" colspan="2">PDRB Per Kapita ( Juta Rp. )</th>
								<th class="text-center h5" rowspan="2">Laju Pertumbuhan<br>Persentase</th>
								 
							</tr>
							<tr>
								<th class="text-center h5">Harga Berlaku</th>
								<th class="text-center h5">Harga Konstan</th>
								 
							</tr>
							<tr id="list-title">
								
							</tr>
						</thead>
						<tbody>
							 
						</tbody>
						<tfoot class="bg-info-800">
						<tr>
								<th class="text-center h5" rowspan="2" colspan="4">Jumlah Total</th>
								 
								<th class="text-center h5" rowspan="2" id="total-avg"></th>
							
								 
							</tr>
						</tfoot>
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
	var param = window.location.pathname.split('/').pop();
	function loadData(){
		var year 	= $("select[name=year]").val();
		$('#table tbody').html('');  
		$('.title').html(year);
		$.ajax({
					data: {"year" : year},
					url: ServUrl+"admin/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){  
											
                        if(response.status == 200){
							var tbody = '';
							var no = 0;
							var totalKp = 0;
							var totalKm = 0;
							var totalPercent = 0;
							$.each(response.responseJSON.data, function(k,v){
								totalKp += parseFloat(v.jumlah_kampung);totalKm += parseFloat(v.km2);totalPercent += parseFloat(v.persentase);
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-tahun="'+v.tahun+'" data-harga_berlaku="'+v.harga_berlaku+'" data-harga_konstant="'+v.harga_konstant+'">'+no+'.</a></td>';
								tbody += '<td class="text-center">'+v.tahun+'</td>';
								tbody += '<td class="text-right">'+my_number(v.harga_berlaku)+'</td>';
								tbody += '<td class="text-right">'+my_number(v.harga_konstant)+'</td>';
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
	var a = 0;
	var b = 0;
		$(".avg").each(function() {
		 value = $(this).data("value");
		 if((value != null) && (value != '') && (value != 0)){ a += 1;}
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 b += parseFloat(value);
		});
	c =  parseFloat(b)/parseFloat(a);
		console.log(a)	
		$("#total-avg").html(parse(c))

	});

	loadData();
	$('.years').change(function(){
		loadData();
	});
	
	
</script>
<?php $this->load->view('print') ?>