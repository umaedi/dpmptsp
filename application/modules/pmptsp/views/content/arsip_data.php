<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
	<style>
.pdfobject-container {
	width: 100%;
	height: 1000px;
	margin: 2em 0;
}

</style>	 
		<div class="content-wrapper">

			 
			<div class="content">
 
				 
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
										<option value="null"> All </option>
											<?php for($i=$end; $i<=$start; $i++) { ?>
											<option value="<?php echo $i; ?>"> <?php echo ucwords($i); ?> </option>
											<?php } ?>
										</select>
									
								</div>

								 
								
								<div class="float-right">
									<div class="btn-group dropleft">
										<button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Drop menu</button>
										<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
											<div class="dropdown-header">Options</div>
											<a onclick="insert()" class="dropdown-item"><i class="icon-plus3"></i> Upload Dokumen</a>
											<a onclick="loadData()" class="dropdown-item"><i class="icon-reload-alt"></i> Reload</a>
											 
											<!-- update ganti-->
											<div class="dropdown-divider"></div>
											<a onclick="edit()" id="menu-edit" class="dropdown-item"><i class="icon-pencil6"></i> Edit Judul</a>
											<a onclick="drop_all()" id="menu-drop" class="dropdown-item"><i class="icon-bin text-danger"></i> Hapus Arsip</a>
											<!-- end update -->
											
										</div>
									</div>
								</div>
							</div>
							
					<!-- update tambah 
					<span class="badge badge-mark border-danger mr-2"></span> <div class="media-chat-item">klik pada <span class="text-danger font-weight-bold">DROP MENU</span> untuk memilih menu</div><br><br>-->
					<hr><div class="badge badge-mark border-info mr-2"></div> <div class="media-chat-item uraian col-lg-11"></div><br><br>
					 
					
					<div class="table-responsive border border-danger shadow p-3 mb-5 bg-white rounded">
					<!-- end update -->
					<div class="loader text-center mt-5 mb-5"></div>
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5" rowspan="2" width="10px">No.</th>
								<th class="text-center h4" rowspan="2">Nama Dokumen</th>
								<th class="text-center h4" rowspan="2">Keterangan</th>
								<th class="text-center h4" rowspan="2">Tahun</th>
								<th class="text-center" style="width: 150px;"><i class="icon-menu"></i></th> 
							</tr>
							 
						</thead>
						<tbody>
							 
						</tbody>
						
					</table>
					<div id="pdf">
								<div class="loader-box" hidden>
								<div class="loader-6"></div>
								</div>
							</div>
					</div>
					
					
					
					</div>
					<!-- update tambah -->
					<div class="card-footer">
					<div class="text-muted text-right mr-2"><i> oleh <?php echo $instansi['instansi']; ?></i></div>
					</div>
					<!-- end update -->
				</div>
				 
			</div>
			 

		</div>
	 
	 
				<div id="modal_open" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span id="title-insert"></span></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							
						</div>
					</div>
				</div> 
				
				<div id="modal_insert" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Form Upload Dokumen</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-insert" action="#">
							<input name="id" type="hidden" placeholder="" class="form-control">
							 
							<div class="modal-body">
							
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="nama_file" type="text" placeholder="Nama Dokumen" class="form-control">
											</div>
										</div>
							 </div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<textarea name="keterangan" type="text" placeholder="Keterangan" class="form-control"></textarea>
											</div>
										</div>
							 </div>
							 <div class="form-group">
								 <?php $start = date('Y') ; $end = 2014; ?> 
									<select name="year" class="years form-control form-control-lg">
									 
										<?php for($i=$end; $i<=$start; $i++) { ?>
										<option value="<?php echo $i; ?>" <?php if($start == $i){ echo 'selected'; } ?>> <?php echo ucwords($i); ?> </option>
										<?php } ?>
									</select>
							</div>
							 <div class="form-group mt-4">
								<div class="row">
                                    <label class="col-sm-4 col-form-label" style="color: #452d3a;">Lampiran</label>
                                    <div class="col-sm-6">
									<input type="file" id="berkaslampiran" name="berkaslampiran" id="berkaslampiran" class="form-control" required=""/>
                                     <span class="form-text text-muted">PDF, WORD, EXCEL, PPT atau JPG maksimal ukuran 15 MB</span> 
                                    </div>
                                    <i class="fa fa-flag" id="flag_nama_pengarang" aria-hidden="true" style="color:red; -webkit-transform: rotate(30deg); display: none; padding-top: 10px;"></i>
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
				<input id="pin" type="hidden">
				<input id="id-title" type="hidden">
				<input id="judul" type="hidden">
				<input id="kategori" type="hidden">
<?php $this->load->view('footer') ?>
<script src="https://unpkg.com/pdfobject@2.2.4/pdfobject.min.js"></script>
<script>
     
	var today 	= new Date();
	var judul 	= getUrlParameter('judul');
	var url		= window.location.pathname.split('/');
	var sub 	= url[url.length-2]+'/';
	var param 	= window.location.pathname.split('/').pop();
		
		function loadData(){
		var judul = getUrlParameter('judul');
		var year 	= $("select[name=year]").val();
	 
		
		$.ajax({
					data: {"year" : year, "judul" : judul},
					url: ServUrl+sub+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(year != 'null'){ 
							var title = response.responseJSON.data.judul+' '+year;
							}else{
							var title = response.responseJSON.data.judul;
							}
							$('#id-title').val(response.responseJSON.data.id);
							$('#judul').val(response.responseJSON.data.judul);
							$('#kategori').val(response.responseJSON.data.kategori);
							$('.uraian').html(response.responseJSON.data.uraian);
							var tbody = '';
							var no = 0;
							$.each(response.responseJSON.data.result, function(k,y){
								if(y.type_file == 'application/pdf'){
								var ico = '<i class="icon-file-pdf mr-3 icon-2x"></i>'; 
								}else if(y.type_file == 'application/vnd.open'){
								var ico = '<i class="icon-file-word mr-3 icon-2x"></i>'; 
								}else if((y.type_file == 'image/jpeg') || (y.type_file == 'image/jpg') || (y.type_file == 'image/png')){
								var ico = '<i class="icon-file-picture mr-3 icon-2x"></i>'; 
								}else if(y.type_file == 'application/vnd.ms-e'){
								var ico = '<i class="icon-file-excel mr-3 icon-2x"></i>'; 
								}else if(y.type_file == 'application/vnd.ms-p'){
								var ico = '<i class="icon-file-presentation mr-3 icon-2x"></i>'; 
								}
								no++;
								tbody +='<tr role="row" class="">';
								tbody +='<td>'+no+'</td>';
								tbody +='<td>'+ico+y.nama_file+'</td>';
								tbody +='<td>'+y.keterangan+'</td>';
								tbody +='<td><a href="'+y.full_url+'" class="embed-link">'+y.tahun+'</a></td>';
								 
								tbody +='<td><a class="btn btn-primary btn-sm mr-2" onClick="downloadLampiran(`'+y.full_url+'`)" href="javascript:void(0)"><i class="icon-cloud-download"></i></a><a class="btn btn-danger btn-sm" onClick="deleteLampiran(`'+y.id+'`)" href="javascript:void(0)"><i class="icon-bin"></i></a></td>';
								tbody +='</tr>';
							
							});
							
							 
							$('.jenis').html(title);							
							 
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 400){
							 window.location.replace(BaseUrl+sub);
						}
                    },
					dataType:'json'
                })
	
	};
	
 
	
	loadData();
	$('.years').change(function(){
		loadData();
	});
	
	function insert(){
		 
		 
		var year 	= $("select[name=year]").val();
		var tbl_data_id 	= $("#id-title").val();
		 
		$("input[name=id]").val(tbl_data_id);
		$("input[name=year]").val(year);
		$('#modal_insert').find('#form-insert')[0].reset();
		$('#title-insert').html('Tambah Dokumen');
		//$('#name-insert').html('Anda akan menambahkan uraian baru');
		$("#modal_insert").modal("show");
		$('#modal_insert').on('shown.bs.modal', function () {
		 
		$('input[name=nama_file]').focus();
		});
		 
	};
	
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
							onClose: function () {
								
									$("#modal_add").modal("hide");										
							}
					}); 
                   
                }
            });
	});
	
	
	
	$("#form-insert").submit(function(event) {
		event.preventDefault();
		var form = $(this)[0]; 
		var data = new FormData(form);
		
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
							data: data,
							url: ServUrl+sub+param+"/insert",
							processData: false,
							contentType: false,
							cache: false,
							timeout: 600000,
							method: 'POST',
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

	var instansi 	= 19;
	 
	 function deleteLampiran(id){
    swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                input: 'password',
                inputPlaceholder: 'Enter your password',
                inputClass: 'form-control',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: function (password) {
                    return new Promise(function (resolve) {
                        setTimeout(function () {
                            if (password !== '<?php echo $this->session->userdata('password');?>') {
                                swal.showValidationError('This password is wrong.')
								window.location.reload();
                            }else{
								resolve();
							}
							
                            
                        }, 2000);
                    });
                },
                
            }).then(function (result) {
				if(result.value == '<?php echo $this->session->userdata('password');?>'){
							$.ajax({
							data: {"id" : id},
							url: ServUrl+sub+param+"/delete_file",
							method: 'GET',
							complete: function(response){                
							  if(response.status == 201){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										button: false,
										timer: 1500
									}); 
									loadData()
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										button: false,
										timer: 1500
									}); 
									loadData()
									 
							  }
							},
							dataType:'json'
				})
				}

            });
	
	}
	function downloadLampiran(url_file){
		 
		window.open(url_file , '_blank');
	}
	 
	
	 
	$( document ).ajaxStop(function() {

		var clickHandler = function (e){

		e.preventDefault();

		var pdfURL = this.getAttribute("href");

		var options = {
			pdfOpenParams: {
				navpanes: 0,
				toolbar: 0,
				statusbar: 0,
				view: "FitV"
			}
		};

		var myPDF = PDFObject.embed(pdfURL, "#pdf", options);
		console.log(myPDF);
		var el = document.querySelector("#results");
		el.setAttribute("class", (myPDF) ? "success" : "fail");
		el.innerHTML = (myPDF) ? "PDFObject successfully embedded '" + pdfURL + "'!" : "Uh-oh, the embed didn't work.";

		};

		var a = document.querySelectorAll(".embed-link");

		for(var i=0; i < a.length; i++){
		a[i].addEventListener("click", clickHandler);
		}
	});
</script>
<input name="title" type="hidden" value="<?php echo $halaman; ?>">
<script src="<?php echo base_url('assets/admin'); ?>/core/pushpin2.js"></script>
<?php $this->load->view('print') ?>