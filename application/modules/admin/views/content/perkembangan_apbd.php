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
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="3">No.</th>
								<th class="text-center h5" rowspan="3">Uraian</th>
								<th class="text-center h5" id="table-title" colspan="3">Tahun</th>
							</tr>
							<tr id="list-year">
								 
							</tr>
						</thead>
						<thead class="bg-info-800">
							<tr>
								<th class="text-center h6" rowspan="2">A</th>
								<th class="text-center h6" rowspan="2">PENDAPATAN DAERAH</th>
							</tr>
							<tr id="total-pd">
								
							</tr>
							 
						</thead>
						<tbody id="pd">
							 
						</tbody>
						<thead class="bg-info-800">
							<tr>
								<th class="text-center h6" rowspan="2">B</th>
								<th class="text-center h6" rowspan="2">BELANJA DAERAH</th>
							</tr>
							<tr id="total-bd">
								
							</tr>
							 
						</thead>
						<tbody id="bd">
							 
						</tbody>
						<thead class="bg-info-800">
							<tr>
								<th class="text-center h6" rowspan="2">C</th>
								<th class="text-center h6" rowspan="2">SURPLUS DEFISIT</th>
							</tr>
							<tr id="total-sd">
								
							</tr>
							 
						</thead>
						<thead class="bg-info-800">
							<tr>
								<th class="text-center h6" rowspan="2">D</th>
								<th class="text-center h6" rowspan="2">PEMBIAYAAN</th>
							</tr>
							<tr id="total-pm">
								
							</tr>
							 
						</thead>
						<tbody id="pb">
							 
						</tbody>
						
						<thead class="bg-info-800">
							<tr>
								<th class="text-center h6" rowspan="2">E</th>
								<th class="text-center h6" rowspan="2">SISA LEBIH PEMBIAYAAN ANGGARAN TAHUN BERKENAAN (SILPA)</th>
							</tr>
							<tr id="total-sl">
								
							</tr>
						</thead>
						
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
								<h5 class="modal-title"><span id="title-insert"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<input name="year" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> <span id="name-insert"></span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<select name="type" class="form-control form-control-lg">
													<option value="makro ekonomi"> Makro Ekonomi </option>
													<option value="tingkat kesejahteraan rakyat"> Tingkat Kesejahteraan Rakyat </option>
												</select>
											</div>
										</div>
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
				
				<div id="modal_insert2" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-insert2"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert2" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
							<span class="font-weight-semibold"></span> <span id="name-insert2"></span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="type" type="text" placeholder="" class="form-control">
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
	function romanize(num) {
	  var lookup = {M:1000,CM:900,D:500,CD:400,C:100,XC:90,L:50,XL:40,X:10,IX:9,V:5,IV:4,I:1},roman = '',i;
	  for ( i in lookup ) {
		while ( num >= lookup[i] ) {
		  roman += i;
		  num -= lookup[i];
		}
	  }
	  return roman;
	}
	
	var today = new Date();
	var param = window.location.pathname.split('/').pop();
	var sub = "admin/";
	function loadData(){
		var year 	= $("select[name=year]").val();
		var end 	= parseInt(year) - 2;
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
					url: ServUrl+sub+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var b = ''; var c = ''; var d = ''; var roman = 0;
							$.each(response.responseJSON.data, function(x,y){ 
								
								if((y.id == 1) || (y.id == 2) || (y.id == 3) || (y.id == 4)){
									roman ++;
									b += '<tr class="bg-info-600">';
									b += '<td class="text-center h6">'+romanize(roman)+'</td><td class="text-center h6"><a class="opk btn list-icons-item" data-id="'+y.id+'" data-type="'+y.type+'">'+y.type.toUpperCase()+'</a></td>';
									for(var q = end; q<= year; q++){ 
										var item = y.value[q]; 
											if(item.value == 0) item.value = '';
											b += '<td class="text-right h6 pd'+q+'" data-value="'+item.value+'">'+my_number(parse(item.value))+'</td>';
									}
									b += '</tr>';
									 
								var no = 0;
								$.each(y.data, function(k,v){
									no++;
									b += '<tr>';
									b += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+no+'.</a></td>';
									b += '<td class="text-left">'+v.uraian+'</td>';
									
									for(var z = end; z <= year; z++){ 
										var item = v.year[z]; 
									if((item == undefined) || (item.value == 0)){
											id = null;
											b += '<td class="text-right"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+z+'" data-value="'+null+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">&nbsp;</a></span></td>';	
										
										}else{
											if(item.value == 0) item.value = '';
											id = item.id;
											b += '<td class="text-right"><a href="#" class="add text-dark pl-4" data-id="'+id+'" data-year="'+z+'" data-value="'+item.value+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+my_number(parse(item.value))+'</a></td>';
										
										}
									}
								 
									b += "</tr>";
								})
								}
							});
							var roman = 0;
							$.each(response.responseJSON.data, function(x,y){ 
								
								if((y.id == 5) || (y.id == 6)){
									roman ++;
									c += '<tr class="bg-info-600">';
									c += '<td class="text-center h6">'+romanize(roman)+'</td><td class="text-center h6"><a class="opk btn list-icons-item" data-id="'+y.id+'" data-type="'+y.type+'">'+y.type.toUpperCase()+'</a></td>';
									for(var q = end; q<= year; q++){ 
										var item = y.value[q]; 
											if(item.value == 0) item.value = '';
											c += '<td class="text-right h6 bd'+q+'" data-value="'+item.value+'">'+my_number(parse(item.value))+'</td>';
									}
									c += '</tr>';
									 
								var no = 0;
								$.each(y.data, function(k,v){
									no++;
									c += '<tr>';
									c += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+no+'.</a></td>';
									c += '<td class="text-left">'+v.uraian+'</td>';
									
									for(var z = end; z <= year; z++){ 
										var item = v.year[z]; 
									if((item == undefined) || (item.value == 0)){
											id = null;
											c += '<td class="text-right"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+z+'" data-value="'+null+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">&nbsp;</a></span></td>';	
										
										}else{
											if(item.value == 0) item.value = '';
											id = item.id;
											c += '<td class="text-right"><a href="#" class="add text-dark pl-4" data-id="'+id+'" data-year="'+z+'" data-value="'+item.value+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+my_number(parse(item.value))+'</a></td>';
										
										}
									}
								 
									c += "</tr>";
								})
								}
							});
							
							var roman = 0;
							$.each(response.responseJSON.data, function(x,y){ 
								
								if((y.id == 7) || (y.id == 8)){
									roman ++;
									d += '<tr class="bg-info-600">';
									d += '<td class="text-center h6">'+romanize(roman)+'</td><td class="text-center h6"><a class="opk btn list-icons-item" data-id="'+y.id+'" data-type="'+y.type+'">'+y.type.toUpperCase()+'</a></td>';
									for(var q = end; q<= year; q++){
										if (y.id ==7) { var pm = "pm_plus";}else{var pm = "pm_minus";};
										var item = y.value[q]; 
											if(item.value == 0) item.value = '';
											d += '<td class="text-right h6 '+pm+q+'" data-value="'+item.value+'">'+my_number(parse(item.value))+'</td>';
									}
									d += '</tr>';
									 
								var no = 0;
								$.each(y.data, function(k,v){
									no++;
									d += '<tr>';
									d += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+no+'.</a></td>';
									d += '<td class="text-left">'+v.uraian+'</td>';
									
									for(var z = end; z <= year; z++){ 
										var item = v.year[z]; 
										if((item == undefined) || (item.value == 0)){
											id = null;
											d += '<td class="text-right"><a class="add btn list-icons-item" data-id="'+id+'" data-year="'+z+'" data-value="'+null+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">&nbsp;</a></span></td>';	
										
										}else{
											if(item.value == 0) item.value = '';
											id = item.id;
											d += '<td class="text-right"><a href="#" class="add text-dark pl-4" data-id="'+id+'" data-year="'+z+'" data-value="'+item.value+'" data-name="'+v.uraian+'" data-type="'+v.type+'" data-typename="'+y.type+'">'+my_number(parse(item.value))+'</a></td>';
										
										}
									}
								 
									d += "</tr>";
								})
								}
							});
							
							$('#pd').html(b);
							$('#bd').html(c);
							$('#pb').html(d);
							
							if(response.responseJSON._meta.pinStatus == true){ 
								var s = '<i class="icon-check text-success"></i>Show on E-Data';
								$('#alert').html('');
								$('#pin-public').show();
								if(response.responseJSON._meta.pinPublicStatus == true){ 
									var f = '<i class="icon-check text-success"></i>Show on public';
								}else{ 
									var f = '<i class="icon-pushpin"></i>Pin to public';
								};
							}else{ 
								var s = '<i class="icon-pushpin"></i>Pin to E-Data';
								$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
								$('#pin-public').hide();
							};							
							
							
							
							$('#pin-status').html(s); 
							$('#pin-public').html(f);   
							var arr = response.responseJSON.data
							arr = jQuery.grep(arr, function( n ) {
								  return ( n !== 'data' && n !=='value' );
								});
							append(arr)  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	//select
	function append(data){
			var toAppend = '';
			toAppend +='<option></option>';
			$.each( data, function( key, val ) {
					toAppend +='<option value=' + val.id + '>' + val.type.toUpperCase() + '</option>';
			});
		$('select[name=type]').html(toAppend);
	}	
	//add form
	$(document).ajaxStop(function(){ 
	var year 	= $("select[name=year]").val();
	var end 	= parseInt(year) - 2;		
	var pd = '';
	var bd = '';
	var sd = '';
	var sl = '';
	var pm = '';
	var pm_plus = '';
	var pm_minus = '';
	var z = 1; 
	
	for(var i = end; i <= year; i++){
		var sumpd = 0;
		$(".pd"+i).each(function() {
		 value = $(this).data("value");
		 	
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 if(value == '&nbsp;') value = 0;
		  if(isNaN(value)) value = 0;
		 sumpd += parseFloat(value);
		});
		var sumbd = 0;
		$(".bd"+i).each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 if(value == '&nbsp;') value = 0;
		 sumbd += parseFloat(value);
		});
		var sumsd = parseFloat(sumpd).toFixed(2) - parseFloat(sumbd).toFixed(2);
		
		var sumpm_plus = 0;
		$(".pm_plus"+i).each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 if(value == '&nbsp;') value = 0;
		 sumpm_plus += parseFloat(value);
		});
		
		var sumpm_minus = 0;
		$(".pm_minus"+i).each(function() {
		 value = $(this).data("value");
		 if(value == null) value = 0;
		 if(value == '') value = 0;
		 if(value == '&nbsp;') value = 0;
		 sumpm_minus += parseFloat(value);
		});
		
		var sumpm = parseFloat(sumpm_plus).toFixed(2) - parseFloat(sumpm_minus).toFixed(2);
		var sumsl = parseFloat(sumsd) + parseFloat(sumpm);
		if(sumsl == 0) sumsl = sumsl; else sumsl = my_number(parse(sumsl));
			pd += "<th class='text-right h6'>"+my_number(parse(sumpd))+"</th>";
			bd += "<th class='text-right h6'>"+my_number(parse(sumbd))+"</th>";
			pm += "<th class='text-right h6'>"+my_number(parse(sumpm))+"</th>";
			
			sd += "<th class='text-right h6'>"+my_number(parse(sumsd))+"</th>";
			sl += "<th class='text-right h6'>"+sumsl+"</th>";
	}
	$('#total-pd').html(pd);			
	$('#total-bd').html(bd);			
	$('#total-sd').html(sd);			
	$('#total-pm').html(pm);			
	$('#total-sl').html(sl);			
	
	$( ".add" ).on( "click", function(event) {
		event.preventDefault();
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		var year = $(this).data("year");
		var value = $(this).data("value");
		var name = $(this).data("name");
		var type = $(this).data("type");
		var typename = $(this).data("typename");
		$("input[name=id]").val(id);
		$("input[name=year]").val(year);
		$("input[name=value]").val(value);
		$("input[name=name]").val(name);
		$("input[name=type]").val(type);
		if(value == null){
		$('#title-add').html('INSERT '+typename.toUpperCase()+' '+year);
		}else{
		$('#title-add').html('UPDATE '+typename.toUpperCase()+' '+year);		
		}
		$('#name-add').html(name);
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
		var type = $(this).data("type");
		var typename = $(this).data("typename");
		$('#title-insert').html('UPDATE '+typename.toUpperCase()+' ');
		$('#name-insert').html('Anda akan merubah '+name+' berikut');
		$("input[name=id]").val(id);
		$("input[name=name]").val(name);
		$("select[name=type]").val(type);
		$("#modal_insert").modal("show");
	});
	
	$( ".opk" ).on( "click", function(event) {
		event.preventDefault();
		$('#modal_insert2').find('#form-insert2')[0].reset();
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		var type = $(this).data("type");
		$('#title-insert2').html('UPDATE KATEGORI');
		$('#name-insert2').html('Anda akan merubah '+type.toUpperCase()+'');
		$("input[name=id]").val(id);
		$("input[name=type]").val(type);
		$("#modal_insert2").modal("show");
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
							url: ServUrl+sub+param+"/save",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  console.log(response);
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
	
	$("#form-insert2").submit(function(event) {
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
				$("#modal_insert2").modal("hide");
				$.ajax({
							data: $('#form-insert2').serialize(),
							url: ServUrl+sub+param+"/save_type",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  console.log(response);
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
										text: response.responseJSON.message+' : '+response.responseJSON.items.value,
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
		$('#title-insert').html('Insert Uraian');
		$('#name-insert').html('Anda akan menambahkan uraian baru');
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
							url: ServUrl+sub+param+"/insert",
							crossDomain: true,
							headers: header,
							method: 'POST',
							complete: function(response){						
							  if(response.status == 201){
								  console.log(response);
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