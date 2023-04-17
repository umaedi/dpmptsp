<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<span id="alert"></span>
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
											<div class="dropdown-header">Options</div>
											<a onclick="insert()" class="dropdown-item"><i class="icon-plus3"></i> Insert</a>
											<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											<a onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
											<div class="dropdown-divider"></div>
											<a onclick="pushPin()" class="dropdown-item" id="pin-status" title="Pin to E-Data or UnPin to remove from E-Data"><i class="icon-pushpin"></i>Show to E-Data</a> 
											<a onclick="pushPublic()" class="dropdown-item" id="pin-public" title="Pin to public or UnPin to remove from public"><i class="icon-pushpin"></i>Show to Public</a> 
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
								<th class="text-center h5">Km2</th>
								<th class="text-center h5">Persentase</th>
							</tr>
							<tr id="list-title">
								
							</tr>
						</thead>
						<tbody>
							 
						</tbody>
						<tfoot class="bg-info-800">
							<tr>
								<th class="text-center h5" rowspan="2" colspan="3">Jumlah Total</th>
								<th class="text-center h5" rowspan="2" id="total-kp"></th>
								<th class="text-center h5" rowspan="2" id="total-km2"></th>
								<th class="text-center h5" rowspan="2" id="total-percent"></th>
							
								 
							</tr>
						</tfoot>
					</table>
					</div>
					</div>
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
								<h5 class="modal-title"><span id="title-insert"><span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-insert"><span>.
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
	var sub 	= "admin/";
	var param = 'luas_wilayah_menurut_kecamatan';
	function loadData(){
		$.ajax({
					data: "",
					url: ServUrl+sub+param+"/list",
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
								totalKp += parseFloat(v.jumlah_kampung); totalKm += parseFloat(v.km2); totalPercent += parseFloat(v.persentase);
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-persentase="'+v.persentase+'" data-km2="'+v.km2+'" data-jumlah_kampung="'+v.jumlah_kampung+'" data-kecamatan="'+v.kecamatan+'" data-ibukota="'+v.ibukota+'">'+no+'.</a></td>';
								tbody += '<td class="">'+v.kecamatan+'</td>';
								tbody += '<td class="">'+v.ibukota+'</td>';
								tbody += '<td class="text-center">'+v.jumlah_kampung+'</td>';
								tbody += '<td class="text-center">'+v.km2+'</td>';
								tbody += '<td class="text-center">'+v.persentase+'</td>';
								tbody += "</tr>";
							
							});
							 
							if(response.responseJSON._meta.pinStatus == true){ 
								var a = '<i class="icon-check text-success"></i>Show on E-Data';
								$('#alert').html('');
								$('#pin-public').show();
								if(response.responseJSON._meta.pinPublicStatus == true){ 
									var b = '<i class="icon-check text-success"></i>Show on public';
								}else{ 
									var b = '<i class="icon-pushpin"></i>Pin to public';
								};
							}else{ 
								var a = '<i class="icon-pushpin"></i>Pin to E-Data';
								$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
								$('#pin-public').hide();
							};							
							
							
							
							$('#pin-status').html(a); 
							$('#pin-public').html(b); 
							
							$('#total-kp').html(totalKp);  
							$('#total-km2').html(parse(totalKm));  
							$('#total-percent').html(parse(totalPercent));  
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
	
	$( ".opt" ).on( "click", function(event) {
		event.preventDefault();
		$('#modal_insert').find('#form-insert')[0].reset();
		$(this).removeClass("btn-outline-warning");
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		if(id){
		$('#btndelete').html('<a onclick="remove('+id+')" class="btn bg-transparent text-danger border-danger ml-1"><i class="icon-bin"></i> Remove</a>');		
		}
		var kecamatan = $(this).data("kecamatan");
		var ibukota = $(this).data("ibukota");
		var jumlah_kampung = $(this).data("jumlah_kampung");
		var km2 = $(this).data("km2");
		var persentase = $(this).data("persentase");
		$('#title-insert').html('Update Uraian');
		$('#name-insert').html('Anda akan merubah uraian berikut');
		$("input[name=id]").val(id);
		$("input[name=kecamatan]").val(kecamatan);
		$("input[name=ibukota]").val(ibukota);
		$("input[name=jumlah_kampung]").val(jumlah_kampung);
		$("input[name=km2]").val(km2);
		$("input[name=persentase]").val(persentase);
		$("#modal_insert").modal("show");
	});
	
	});
	
	function insert(){
		$('#btndelete').html('');
		$("input[name=id]").val('');
		$('#modal_insert').find('#form-insert')[0].reset();
		$('#title-insert').html('Insert Uraian');
		$('#name-insert').html('Anda akan menambahkan uraian baru');
		$("#modal_insert").modal("show");
		$('#modal_insert').on('shown.bs.modal', function () {
		$('input[name=kecamatan]').focus();
		})
	}
	
	function remove(id){
	          swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				$("#modal_insert").modal("hide"); 
				$.ajax({
							data: {"id" : id},
							url: ServUrl+sub+param+"/delete",
							crossDomain: true,
							headers: header,
							method: 'GET',
							complete: function(response){                
							  if(response.status == 201){
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadData();
										$("#modal_insert").modal("hide");
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadData();
										$("#modal_insert").modal("hide");										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
				
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
							onClose: function () {
								
									$("#modal_insert").modal("hide");										
							}
					}); 
                   
                }
            });
	
	}
	
	$("#form-insert").submit(function(event) {
		event.preventDefault();
		
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				$("#modal_insert").modal("hide"); 
				$.ajax({
							data: $('#form-insert').serialize(),
							url: ServUrl+sub+param+"/save",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){
							console.log(response);								
							  if(response.status == 201){
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadData();
										 
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadData();
																				
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
				
				if (result.dismiss == 'cancel') {
					 swal({
							title: ' Cancelled',
							text: 'Your imaginary file is safe :)',
							type:'error',
					}); 
                   
                }
            });
	});
	
	loadData();
	$('.years').change(function(){
		loadData();
	});
	
var instansi 	= 1;
</script>
<input name="title" type="hidden" placeholder="" value="<?php echo $halaman; ?>">
<script src="<?php echo base_url('assets/admin'); ?>/core/pushpin.js"></script>
<?php $this->load->view('print') ?>