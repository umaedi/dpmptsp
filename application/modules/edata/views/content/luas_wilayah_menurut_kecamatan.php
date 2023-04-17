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
						<h5 class="card-title"><?php echo $halaman; ?></h5>
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
							<div class="loader text-center mt-5 mb-5"></div>
					<div class="table-responsive">
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="2">No.</th>
								<th class="text-center h5" rowspan="2">Kecamatan</th>
								<th class="text-center h5" rowspan="2">Ibukota</th>
								<th class="text-center h5" rowspan="2">Jumlah Kampung</th>
								<th class="text-center h5" colspan="2">Luas</th>
								 
							</tr>
							<tr>
								<td class="text-center h5">Km2</td>
								<td class="text-center h5">Persentase</td>
							</tr>
							<tr id="list-title">
								
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
				
				<div id="modal_insert" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-insert"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-insert"></span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="kecamatan" type="text" placeholder="kecamatan" class="form-control">
											</div>
										</div>
							 </div>
							  <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="ibukota" type="text" placeholder="ibukota" class="form-control">
											</div>
										</div>
							 </div>
							  <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="jumlah_kampung" type="text" placeholder="jumlah_kampung" class="form-control">
											</div>
										</div>
							 </div>
							  <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="km2" type="text" placeholder="km2" class="form-control">
											</div>
										</div>
							 </div>
							  <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="persentase" type="text" placeholder="persentase" class="form-control">
											</div>
										</div>
							 </div>
							</div>
							<div class="modal-footer">
								<div id="btndelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				
<?php $this->load->view('footer') ?>
<script> 
	var param = 'luas_wilayah_menurut_kecamatan';
	function loadData(){
		$.ajax({
					data: "",
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
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	
	loadData();
</script>
<?php $this->load->view('print') ?>
