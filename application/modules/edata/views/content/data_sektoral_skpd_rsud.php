<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			<?php $this->load->view('fab') ?>
			<span id="alert"></span>
				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header mb-4 header-elements-inline">
						<h5 class="card-title jenis"><?php echo $halaman; ?> <span class="title"></span></h5>
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
											<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											<a onclick="pdf()" class="dropdown-item"><i class="icon-screen-full"></i> Print</a>
											<a onclick="excel()" class="dropdown-item"><i class="icon-file-excel"></i> Excel</a>
										</div>
									</div>
								</div>
							</div>
					<!-- update tambah -->
					<span class="badge badge-mark border-danger mr-2"></span> <div class="media-chat-item">Data yang ditampilkan dengan warna <span class="text-danger font-weight-bold">merah</span> adalah data yang bersifat rilis sementara, atau arahkan <span class="font-weight-bold"> pointer </span> anda ke kolom data untuk detail informasi</div><br><br>
					
					<div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
					<!-- end update  -->
					<div class="loader text-center mt-5 mb-5"></div>
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="2">No.</th>
								<th class="text-center h4" rowspan="2">Uraian</th>
								<th class="text-center h4" rowspan="2">Satuan</th>
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
								<th class="text-center h5" rowspan="2" colspan="3">TOTAL JUMLAH</th>
							</tr>
							<tr id="total">
								
							</tr>
						</tfoot>
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
	var today = new Date();
	var jenis = getUrlParameter('jenis');
	
	 //update instansi menyesuaikan
	var sub 	= 'rsud/';
	//end update
	var param = window.location.pathname.split('/').pop();
		function loadData(){
		var jenis = getUrlParameter('jenis');
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
					data: {"year" : year, "jenis" : jenis},
					url: ServUrl+sub+"/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(response.responseJSON.data.length == 0){
								window.location.replace(BaseUrl+sub);
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
									}
								}
								 
								tbody += "</tr>";
							
							});
							
							if(response.responseJSON._meta.pinStatus == true){ 
							var pin = '<i class="icon-check text-success"></i>Show on E-Data';
							$('#alert').html('');
							}else{ 
							var pin = '<i class="icon-pushpin"></i>Pin to E-Data';
							$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
							};
							$('.jenis').html(title);							
							$('#pin-status').html(pin); 
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	

	$(document).ajaxStop(function(){
	var year 	= $("select[name=year]").val();
	var end 	= parseInt(year) - 4;		
	var listTotal = '';
	
	//update tambah
	$( ".popup-ajax" ).hover(function() {
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
			"trigger": 'hover',
			"template": '<div class="popover border-teal"><div class="arrow"></div><h3 class="popover-header bg-teal"></h3><div class="popover-body"></div></div>',
			"content": 'Tanggal Rilis : <i>'+$(this).data("tgl_rilis")+'</i> <br> Status Rilis : <i class="'+style+'">'+$(this).data("ket_rilis")+'</i>'
		});
	})
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
	
	$( ".add" ).on( "click", function(event) {
		event.preventDefault();
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		var year = $(this).data("year");
		var value = $(this).data("value");
		var name = $(this).data("name");
		var aspek = $(this).data("aspek");
		var jenis = $(this).data("jenis");
		var satuan = $(this).data("satuan");
		$("input[name=id]").val(id);
		$("input[name=year]").val(year);
		$("input[name=value]").val(value);
		$("input[name=name]").val(name);
		$("input[name=aspek]").val(aspek);
		$("input[name=jenis]").val(jenis);
		$("input[name=satuan]").val(satuan);
		if(value == null){
		$('#title-add').html('Insert Jumlah '+year);
		}else{
		$('#title-add').html('Update Jumlah '+year);		
		}
		$('#name-add').html("Uraian "+name);
		$("#modal_add").modal("show");
	});
		$('#modal_add').on('shown.bs.modal', function () {
			 
			$('input[name=value]').focus();
		})
	 
	
	$( ".opt" ).on( "click", function(event) {
		event.preventDefault();
		$('#modal_insert').find('#form-insert')[0].reset();
		$(this).removeClass("");
		$(this).addClass("btn-outline-primary");
		var id = $(this).data("id");
		console.log(id);
		if(id){
		$('#btndelete').html('<a onclick="remove('+id+')" class="btn bg-transparent text-danger border-danger ml-1"><i class="icon-bin"></i>Remove</a>');		
		}
		var aspek = $(this).data("aspek");
		var jenis = $(this).data("jenis");
		var name = $(this).data("name");
		var satuan = $(this).data("satuan");
		$('#title-insert').html('Update Uraian');
		$('#name-insert').html('Anda akan merubah uraian berikut');
		$("input[name=id]").val(id);
		$("input[name=name]").val(name);
		$("input[name=aspek]").val(aspek);
		$("input[name=jenis]").val(jenis);
		$("input[name=satuan]").val(satuan);
		$("#modal_insert").modal("show");
	});
	
	});
	
	loadData();
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
<?php $this->load->view('print') ?>