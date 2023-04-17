	<style>
	.sidebar-user-material .sidebar-user-material-body {
    
    background-size: cover;
	}
	.text-shadow-dark {
    text-shadow: 0 0 0.1875rem rgb(0, 0, 0);
	}
	</style>	

	<div class="page-content pt-0">


		<div class="sidebar sidebar-dark   sidebar-main sidebar-expand-md align-self-start">


			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Main sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>




			<div class="sidebar-content">


				<div class="sidebar-user-material">
				
				<!-- update ganti -->
					<div class="sidebar-user-material-body card-img-top">
						<div class="card-body text-center">
							<a href="#">
								 
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $this->session->userdata('name'); ?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $this->session->userdata('alamat'); ?></span>
						</div>
						<?php if($this->session->userdata('lvl') == $instansi['id']){ ?>							
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
						<?php } else { ?>
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark"><span>Dashboard Data</span></a>
						</div>
						<?php } ?>
					</div>
					<?php if($this->session->userdata('lvl') == $instansi['id']){ ?>
				<!-- end update -->
					
					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?php echo base_url('pmptsp/profile'); ?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('pmptsp/users'); ?>" class="nav-link">
									<i class="icon-people"></i>
									<span>Users List</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('pmptsp/activities'); ?>" class="nav-link">
									<i class="icon-sort-time-asc"></i>
									<span>Users Activities</span>
								</a>
							</li>
							
							<li class="nav-item">
								<a onClick="signOut()" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
					<?php } ?>
				</div>

				<div class="card card-sidebar-mobile">
						<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">
							<li class="nav-item"><a href="<?php echo base_url('admin'); ?>" class="nav-link <?php if(!$this->uri->segment(2)){ echo "active"; } ?>"><i class="icon-home4"></i><span>Dashboard Home</span></a></li>
							<!-- <li class="nav-item"><a href="<?php echo base_url('edata/'); ?>" class="nav-link"><i class="icon-table2"></i><span>Dashboard E-Data</span></a></li>-->	
						</ul>
						</div>
					<div class="card-header header-elements-inline">
						<!-- update ganti -->
						<h6 class="card-title text-uppercase">MAIN MENU</h6>
						<!-- end update -->
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">

					</div>
					<span id="menu"></span>
				</div>
			 
				
			</div>

			
		</div>


		<div id="addNew" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Tambah Judul</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-jenis" action="#">
							<div class="modal-body">
							 <div class="alert bg-danger text-white">
									<span class="font-weight-semibold"></span> <span id="name-addNew"></span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="kategori" type="text" placeholder="Kategori" class="form-control">
											</div>
										</div>
							 </div> 
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="judul" type="text" placeholder="judul" class="form-control">
											</div>
										</div>
							 </div> 
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<textarea name="uraian" type="text" placeholder="Deskripsi Arsip" class="form-control"></textarea>
											</div>
										</div>
							 </div>
							</div>
							<div class="modal-footer">
								<div id="tbldelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
	

		<div id="editTitle" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Judul</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-editTitle" action="#">
							<input name="kategori" type="hidden">
							<input name="id" type="hidden">
							<div class="modal-body">
							  
							  
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="judul" type="text" placeholder="Judul Arsip" class="form-control">
											</div>
											<div class="col-sm-12">
												<label></label>
												<textarea name="uraian" type="text" placeholder="Deskripsi Arsip" class="form-control"></textarea>
											</div>
										</div>
							 </div>
							</div>
							<div class="modal-footer">
								<div id="tbldelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Update</button>
							</div>
							</form>
						</div>
					</div>
		</div>
		
				<!-- update tambah -->
				<div id="editAspek" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ubah Kategori</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-aspek" action="#">
							<input name="old_aspek" type="hidden">
							<div class="modal-body">
							 <div class="alert bg-danger text-white">
									<span class="font-weight-semibold"></span> <span id="name-aspek"></span>.
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<input name="aspek" type="text" placeholder="Aspek" class="form-control">
											</div>
										</div>
							 </div> 
							</div>
							<div class="modal-footer">
								<div id="tbldelete"></div>
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn bg-teal-600">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			<!-- end update -->
		<script>
	
	function loadSidebar(){
		
		$.ajax({
					data: '',
					url: ServUrl+"pmptsp/sidebar/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							$('.default').remove();
							var empety = '<li class="nav-item default"><a href="javascript:void(0)" onclick="addNew()" class="nav-link"><i class="icon-plus2"></i> <span>Add New Table</span></a></li>';
							var aspek = [];
							var no = 0;
							$.each(response.responseJSON.data, function(k,v){
								no++;
								aspek += '<div class="card-header header-elements-inline">';
								aspek += '<h6 class="card-title text-uppercase aspek">'+v.kategori+'</h6>';
								aspek += '<div class="header-elements">';
								//update ganti
								aspek += '<div class="list-icons"><a class="btn btn-outline-light text-white btn-sm" href="javascript:void(0)" onclick="editAspek(`'+v.kategori+'`)"><i class="icon-pencil6"></i></a></div>';
								//end update
								aspek += '</div>';
								aspek += '</div>';
								aspek += '<div class="card-body p-0">';
								aspek += '<ul class="nav nav-sidebar" data-nav-type="accordion">';
								
								 $.each(v.judul, function(a,b){
									 aspek += '<li class="nav-item"><a href="'+BaseUrl+'pmptsp/arsip_data?judul='+b.link+'" class="nav-link"><i class="icon-file-text2"></i> <span>'+b.judul+'</span></a></li>';
								 });
								 
								 
								aspek += '<li class="nav-item"><a href="javascript:void(0)" onclick="addNew(`'+v.kategori+'`)" class="nav-link"><i class="icon-plus2"></i> <span>Tambah Judul</span></a></li>';
								aspek += "</ul>";
							
							});
							//update tambah
							if(response.responseJSON.data.length == 0){
								aspek += '<ul class="nav nav-sidebar" data-nav-type="accordion">';
								aspek += '<li class="nav-item"><a href="javascript:void(0)" onclick="addNew(``)" class="nav-link"><i class="icon-plus2"></i> <span>Tambah Judul</span></a></li>';
								aspek += "</ul>";
							}
							//end update
							
							$('#menu').html(aspek);
							if(response.responseJSON.data.length == 0){
								$('.oneMenu').append(empety);
							};							
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadSidebar();
	
	function addNew(kategori) {
		$('#addNew').find('#form-jenis')[0].reset();
		
		$("#addNew").modal("show");
		$('#addNew').on('shown.bs.modal', function () { 
			$('input[name=kategori]').val(kategori).focus();
			$('input[name=judul]').focus();
			$('#name-addNew').html('Ubah kategori jika ingin menambah kategori baru');
		})
	};
	
	$("#form-jenis").submit(function(event) {
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
				$("#addNew").modal("hide");
				$.ajax({
							data: $('#form-jenis').serialize(),
							url: ServUrl+"pmptsp/sidebar/save",
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
										loadSidebar();
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
										loadSidebar();									
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
            });
	});
	
	function edit(){
		 
		//$('#name-editTitle').html('Anda akan merubah judul tabel berikut');
		$("#editTitle").modal("show");
		$('#editTitle').on('shown.bs.modal', function () {
		$(this).find('#form-editTitle')[0].reset();	
		var judul = $("#judul").val();
		 
		var kategori = $("#kategori").val();
		var id = $("#id-title").val();
		$("input[name=judul]").val(judul).focus();
		$("input[name=kategori]").val(kategori);
		$("input[name=id]").val(id);
		})
		 
	}
	
	$("#form-editTitle").submit(function(event) {
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
				//update ganti editTitle
				$("#editTitle").modal("hide");
				//end update
				$.ajax({
							data: $('#form-editTitle').serialize(),
							url: ServUrl+"pmptsp/sidebar/save",
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
										loadSidebar();
										window.location.replace(BaseUrl+'pmptsp');
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
										loadSidebar();									
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
            });
	});
	
	//update tambah dan ubah pmptsp sesuai instansi
	function drop_all(id){
		if($("#pin").val() == 'true'){
			swal('Please Unpin this table first before delete the table title !');
		}else{
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
				var id = $("#id-title").val();
				$.ajax({
							data: {"id" : id},
							url: ServUrl+"/pmptsp/sidebar/drop_all",
							headers: header,
							method: 'GET',
							complete: function(response){                
							  if(response.status == 201){
								  
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadSidebar();
										window.location.replace(BaseUrl+'pmptsp');
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else if(response.status == 403){
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										lloadSidebar();									
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
		}
	}
	
	function editAspek(aspek) {
		$('#editAspek').find('#form-aspek')[0].reset();
		var old_aspek = aspek;
		$("#editAspek").modal("show");
		$('#editAspek').on('shown.bs.modal', function () { 
			$("input[name=old_aspek]").val(old_aspek);
			$('input[name=aspek]').val(aspek).focus();
			$('#name-aspek').html('Anda Akan Merubah Aspek '+aspek);
			
		})
	};
	
	$("#form-aspek").submit(function(event) {
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
				$("#editAspek").modal("hide");
				$.ajax({
							data: $('#form-aspek').serialize(),
							url: ServUrl+"pmptsp/sidebar/update_aspek",
							headers: header,
							method: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								  
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										loadSidebar();
										window.location.replace(BaseUrl+'pmptsp');
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
										loadSidebar();									
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
            });
	});
	//end update
	
	</script>