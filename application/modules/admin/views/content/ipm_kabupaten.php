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
					<div class="card-header mb-2 header-elements-inline">
						<h5 class="card-title"><?php echo $halaman; ?> <span class="title"></span></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	 
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body mt-2">
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
					<div class="table-responsive">
					<div class="loader text-center mt-5 mb-5"></div>
					<table id="table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="2">No.</th>
								<th class="text-center h4" rowspan="2">Uraian</th>
								<th class="text-center h5" id="table-title" colspan="4">Tahun <i class="small"></i></th>
								<th class="text-center h5" rowspan="2">Rata-Rata<br> Pertumbuhan<br>( % )</th> 
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
								<th class="text-center h5" rowspan="2" colspan="2">TOTAL RATA-RATA</th>
							</tr>
							<tr id="total">
								
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
		 <!-- Custom background color -->
				<div id="modal_add" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-add"><span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-add" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<input name="year" type="hidden" placeholder="" class="form-control">
							<input name="type" type="hidden" placeholder="" class="form-control">
							<input name="name" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-info text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-add"><span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="value" type="text" placeholder="" class="form-control">
											</div>
										</div>
							 </div>
							</div>
							
							<div class="modal-footer">
								 
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /custom background color -->
				
				<div id="modal_insert" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-insert"><span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<input name="year" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-insert"><span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="name" type="text" placeholder="" class="form-control">
											</div>
										</div>
							 </div>
							</div>
							<div class="modal-footer">
								<div id="btndelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
<?php $this->load->view('footer') ?>
<script>
	var today = new Date();
	var param = window.location.pathname.split('/').pop();
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
							console.log(response.responseJSON.data);
							var tbody = '';
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-name="'+v.uraian+'">'+no+'.</a></td>';
								tbody += '<td class="text-left">'+v.uraian+'</td>';
								for(var y = end; y <= year; y++){ 
									var item = v.year[y]; 
									if(item == undefined){
										id = null;
										tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+null+'" data-name="'+v.uraian+'">&nbsp;</a></span></td>';	
									
									}else{
										if(item.value == 0) item.value = '';
										id = item.id;
										tbody += '<td class="text-center"><a class="add btn list-icons-item '+y+'" data-id="'+id+'" data-year="'+y+'" data-value="'+item.value+'" data-name="'+v.uraian+'">'+item.value+'</a></td>';
									
									}
								}
								if(v.avg == 0) v.avg = '';
								tbody += '<td class="text-center avg" data-value="'+v.avg+'">'+v.avg+'</td>';
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
	var listTotal = '';
	 
	for(var i = end; i <= year; i++){
		var n = 0;
		var a = 0;
		$("."+i).each(function() {
		 value = $(this).data("value");
		 if((value !== null) && (value !== 0) && (value !== '&nbsp') && (value !== '') && (value !== NaN)){
			 n += 1;
			 a += parseFloat(value);
		 }
		});
		if (a !== 0){
		a = parseFloat(a)/parseFloat(n);
		}else{ a = 0;}
			listTotal += "<th class='text-center h4'>"+parse(a)+"</th>";
	}
		var n = 0;
		var b = 0;
		$(".avg").each(function() {
		 value = $(this).data("value");
		 if((value !== null) && (value !== 0) && (value !== '&nbsp') && (value !== '') && (value !== NaN)){
		 b += parseFloat(value);
		 n += 1;
		 }
		});
		b = parseFloat(b)/parseFloat(n);
		listTotal += "<th class='text-center h4'>"+parse(b)+"</th>";
	$('#total').html(listTotal);
	
	$( ".add" ).on( "click", function(event) {
		event.preventDefault();
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		var year = $(this).data("year");
		var value = $(this).data("value");
		var name = $(this).data("name");
		$("input[name=id]").val(id);
		$("input[name=year]").val(year);
		$("input[name=value]").val(value);
		$("input[name=name]").val(name);
		if(value == null){
		$('#title-add').html('Insert IPM '+year);
		}else{
		$('#title-add').html('Update IPM '+year);		
		}
		$('#name-add').html("IPM "+name);
		$("#modal_add").modal("show");
	});
		$('#modal_add').on('shown.bs.modal', function () {
			 
			$('input[name=value]').focus();
		})
	 
	
	$( ".opt" ).on( "click", function(event) {
		event.preventDefault();
		$('#modal_insert').find('#form-insert')[0].reset();
		$(this).removeClass("btn-outline-warning");
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		if(id){
		$('#btndelete').html('<a onclick="remove('+id+')" class="btn bg-transparent text-danger border-danger ml-1"><i class="icon-bin"></i> Remove</a>');		
		}
		var name = $(this).data("name");
		$('#title-insert').html('Update Uraian');
		$('#name-insert').html('Anda akan merubah uraian '+name);
		$("input[name=id]").val(id);
		$("input[name=name]").val(name);
		$("#modal_insert").modal("show");
	});
	
	});
	
	$("#form-add").submit(function(event) {
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
				$("#modal_add").modal("hide");
				$.ajax({
							data: $('#form-add').serialize(),
							url: ServUrl+"admin/"+param+"/save",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){                
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
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message+' '+response.responseJSON.items.value,
										type:'warning',
										onClose: function () {
										loadData();									
										}
									}); 
									 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
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
	
	function insert(){
		var year 	= $("select[name=year]").val();
		$('#btndelete').html('');
		$("input[name=id]").val('');
		$("input[name=year]").val(year);
		$('#modal_insert').find('#form-insert')[0].reset();
		$('#title-insert').html('Insert Uraian PDRB ADHB');
		$('#name-insert').html('Anda akan menambahkan uraian PDRB ADHB baru');
		$("#modal_insert").modal("show");
		$('#modal_insert').on('shown.bs.modal', function () {
		$('input[name=name]').focus();
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
				
				$.ajax({
							data: {"id" : id},
							url: ServUrl+"admin/"+param+"/delete",
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
							url: ServUrl+"admin/"+param+"/insert",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){						
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
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message+' : '+response.responseJSON.items.name,
										type:'warning',
										onClose: function () {
										loadData();										
										}
									}); 
									 
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
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