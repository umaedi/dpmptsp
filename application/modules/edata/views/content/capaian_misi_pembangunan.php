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
									<?php $start = date('Y') ; $end = $start - 4; ?> 
										<select name="year" class="years form-control form-control-lg">
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
									
								</div>
								<div class="d-flex align-items-center mb-3 mb-sm-0 col-lg-3">
									<label class="col-form-label col-lg-4">Periode</label>
									<?php $start = 2016 ; $end = $start + 10; ?> 
										<select name="periode" class="years form-control form-control-lg">
											<?php for($i=$start; $i<=$end; $i+=5) {  if ($i > date('Y')+5) {break;}?>
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
								<th class="text-center h5" rowspan="4">No.</th>
								<th class="text-center h5" colspan="5">Uraian</th>
								<th class="text-center h5" id="table-title" colspan="4">Tahun</th> 
							</tr>	
							<tr>	
								<th class="text-center h6" rowspan="3">Misi</th>
								<th class="text-center h6" rowspan="3">Tujuan</th>
								<th class="text-center h6" rowspan="3">Sasaran</th>
								<th class="text-center h6" rowspan="3">Indikator</th>
								<th class="text-center h6" rowspan="3">Satuan</th>
								
								 
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
<script>
	var param = window.location.pathname.split('/').pop();
	 
	function loadData(){
		var year 	= $("select[name=year]").val();
		var periode 	= $("select[name=periode]").val();
		var end 	= parseInt(year) - 2;
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
				listTitle += "<th class='year small text-center'>Target</th>";
				listTitle += "<th class='year small text-center'>Realisasi</th>";
				
				a += 1;
			}
		$('.title').html(year); 
		$('#table-title').attr('colspan',a);
		$('#list-year').html(listYear);
		$('#list-title').html(listTitle);
		
		
		$.ajax({
					data: {"year" : year, "periode" : periode},
					url: ServUrl+"admin/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var tbody = '';
							var no = 0; 
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-misi="'+v.misi+'" data-tujuan="'+v.tujuan+'" data-sasaran="'+v.sasaran+'" data-indikator="'+v.indikator+'" data-satuan="'+v.satuan+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.misi+'</td>'; 
								tbody += '<td class="text-left">'+v.tujuan+'</td>'; 
								tbody += '<td class="text-left">'+v.sasaran+'</td>'; 
								tbody += '<td class="text-left">'+v.indikator+'</td>'; 
								tbody += '<td class="text-left">'+v.satuan+'</td>';
								for(var y = end; y <= year; y++){
									var item = v.year[y];
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item target'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="target" data-misi="'+v.misi+'" data-tujuan="'+v.tujuan+'" data-sasaran="'+v.sasaran+'" data-indikator="'+v.indikator+'" data-satuan="'+v.satuan+'" data-value="'+null+'">&nbsp;</a></span></td>';	
										tbody += '<td class="text-center"><a class="add btn list-icons-item realisasi'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="realisasi" data-misi="'+v.misi+'" data-tujuan="'+v.tujuan+'" data-sasaran="'+v.sasaran+'" data-indikator="'+v.indikator+'" data-satuan="'+v.satuan+'" data-value="'+null+'">&nbsp</a></span></td>';	
									}else{ 
										if(item.target == 0) item.target = '';
										if(item.realisasi == 0) item.realisasi = '';
										id = item.id;
										tbody += '<td class="text-center"><a class="add btn list-icons-item target'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="target" data-misi="'+v.misi+'" data-tujuan="'+v.tujuan+'" data-sasaran="'+v.sasaran+'" data-indikator="'+v.indikator+'" data-satuan="'+v.satuan+'" data-value="'+item.target+'">'+item.target+'</a></td>';
										tbody += '<td class="text-center"><a class="add btn list-icons-item realisasi'+y+'" data-id="'+id+'" data-year="'+y+'" data-type="realisasi" data-misi="'+v.misi+'" data-tujuan="'+v.tujuan+'" data-sasaran="'+v.sasaran+'" data-indikator="'+v.indikator+'" data-satuan="'+v.satuan+'" data-value="'+item.realisasi+'">'+item.realisasi+'</a></td>';
									}
								}
								tbody += "</tr>";
							
							});
				
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.items.message,
										type:'warning',
										onClose: function () {
										 										
										}
									}); 
									 
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