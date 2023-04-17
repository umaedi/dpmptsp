<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">
			<div class="content">
				<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Global Settings</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					

									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link active" href="#left-icon-tab1" data-toggle="tab"><i class="icon-gear position-left mr-2"></i>Web Setting </a></li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane active" id="left-icon-tab1">
											
											
											<form role="form" id="form-settings" action="" method="post" enctype="multipart/form-data">
											<input name="id" type="hidden" class="form-control" value="">
											<input name="logo" type="hidden" class="form-control" value="">
											<table class="detail-view table table-striped table-condensed " id="yw0">
											<tbody>
											<tr class="odd"><th>Judul Website</th><td><input name="judul" type="text" class="form-control" value=""></br></td></tr>
											<tr class="even"><th>Description</br><span class="small"><i class="">In a few words, explain what this site is about.</i></span></th><td><textarea name="deskripsi" type="text" class="form-control"></textarea></td></tr>
											<tr class="odd"><th>Google Code</br><span class="small"><i class="">Paste your Google Analytics code here.</i></span></th><td><textarea name="googlecode" type="text" class="form-control"></textarea></td></tr>
											<tr class="even"><th>Meta Tag</th><td><textarea name="metatag" type="text" class="form-control" value=""></textarea></td></tr>
											<tr class="odd"><th>Meta Description</br><span class="small"><i class="">These setting may be overridden for single posts & pages.</i></span></th><td><textarea name="metadesc" type="text" class="form-control"></textarea></td></tr>
											<tr class="even"><th>Meta Keyword</br><span class="small"><i class="">These setting may be overridden for single posts & pages.</i></span></th><td><textarea name="metakey" type="text" class="form-control"></textarea></td></tr>
											<tr class="odd"><th>Copyright Footer</th><td><input name="footer" type="text" class="form-control" value=""></td></tr>
											<tr class="odd"><th>Alamat</th><td><input name="alamat" type="text" class="form-control" value=""></td></tr>
											<tr class="even"><th>Telepon</th><td><input name="telepon" type="text" class="form-control" value=""></td></tr>
											<tr class="odd"><th>E-mail</th><td><input name="email" type="text" class="form-control" value=""></td></tr>
											<tr class="even"><th>Facebook</th><td><input name="fb" type="text" class="form-control" value=""></td></tr>
											<tr class="odd"><th>Twitter</th><td><input name="twitter" type="text" class="form-control" value=""></td></tr>
											<tr class="even"><th>Linked</th><td><input name="linked" type="text" class="form-control" value=""></td></tr>
											<tr class="even"><th>Logo/Favicon</th><td><input name="userfile" type="file" class="form-control" value=""></td></tr>
											<tr class="even"><th> </th><td id="logo"></td></tr>
											</tbody>
											</table></br>
											<div class="content-divider">
												<span class="pt-10 pb-10"> </span>
											</div>
											<button id="btnSubmit" type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
											</form>
										
										</div>

									</div>
								 
						
					</div>
				<!-- /basic datatable -->
				</div>
				</div>
				</div>
			</div>
			</div>
			<!-- /main content -->

		
	
<?php $this->load->view('footer') ?>
<script>
var param = 'settings';
	var id = window.location.pathname.split('/').pop();
	function loadSetting(){
		$.ajax({
					data: "",
					url: ServUrl+"admin/"+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){ 
					if(response.status == 200){
							console.log(response.responseJSON.data);
							 $("input[name=id]").val(response.responseJSON.data.idset);
							 $("input[name=logo]").val(response.responseJSON.data.logo);
							 $("input[name=judul]").val(response.responseJSON.data.judul);
							 $("textarea[name=deskripsi]").val(response.responseJSON.data.deskripsi);
							 $("textarea[name=googlecode]").val(response.responseJSON.data.googlecode);
							 $("textarea[name=metatag]").val(response.responseJSON.data.metatag);
							 $("input[name=footer]").val(response.responseJSON.data.footer);
							 $("textarea[name=metadesc]").val(response.responseJSON.data.metadesc);
							 $("textarea[name=metakey]").val(response.responseJSON.data.metakey);
							 $("input[name=alamat]").val(response.responseJSON.data.alamat);
							 $("input[name=telepon]").val(response.responseJSON.data.telp);
							 $("input[name=email]").val(response.responseJSON.data.email);
							 $("input[name=fb]").val(response.responseJSON.data.fb);
							 $("input[name=twitter]").val(response.responseJSON.data.twitter);
							 $("input[name=linked]").val(response.responseJSON.data.linked);
							 
							 $("#logo").html('<img class="img-thumbnail" width="80" src="'+BaseUrl+'assets/images/web/'+response.responseJSON.data.logo+'" alt="">');
							 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 404){
							 window.location.replace(BaseUrl+'/admin/setting');
						}
                    },
					dataType:'json'
                })
	
	};
	loadSetting();
	
	$("#form-settings").submit(function(event) {
		event.preventDefault();
		
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
								window.location.replace(BaseUrl);
                            }else{
								resolve();
							}
							
                            
                        }, 2000);
                    });
                },
                
            }).then(function (result) {
				if(result.value == '<?php echo $this->session->userdata('password');?>'){
					var form = $('#form-settings')[0];
					var data = new FormData(form);
					$("#btnSubmit").prop("disabled", true);
				$.ajax({
							data: data,
							url: ServUrl+"admin/"+param+"/save",
							processData: false,
							contentType: false,
							cache: false,
							timeout: 600000,
							type: 'POST',
							complete: function(response){                
							  if(response.status == 201){
								
								  swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										$("#btnSubmit").prop("disabled", false);
										loadSetting();
										}
									}); 
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.items.nama+' '+response.responseJSON.items.username,
										type:'warning',
										onClose: function () {
										$("#btnSubmit").prop("disabled", false); 										
										}
									}); 
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	});
</script>