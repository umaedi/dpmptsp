<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/ui/fab.min.js"></script>
				<div id="modal_message" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Form Kritik & Saran</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="form-message" action="#">
							<input name="id" type="hidden" placeholder="" value="<?php echo $this->session->userdata('lvl'); ?>" class="form-control">
							<input name="object" type="hidden" placeholder="" value="1" class="form-control">
							<div class="modal-body">
							<div class="alert bg-danger text-white">
									 
									<span class="font-weight-semibold"></span> Hi <?php echo $this->session->userdata('name'); ?>
							</div>
							 <div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label></label>
												<textarea name="message" type="text" placeholder="Usulkan kritik dan saran ke administrator" class="form-control"></textarea>
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

				<ul class="fab-menu fab-menu-fixed fab-menu-top-left" data-fab-toggle="click">
					<li>
						<a class="fab-menu-btn btn bg-pink-300 btn-float rounded-round btn-icon">
							<i class="fab-icon-open icon-grid3"></i>
							<i class="fab-icon-close icon-cross2"></i>
						</a>

						<ul class="fab-menu-inner">
							<li>
								<div class="fab-label-visible" data-fab-label="Dashboard Home">
									<a href="<?php echo base_url('admin'); ?>" class="btn btn-light rounded-round btn-icon btn-float">
										<i class="icon-home4"></i>
									</a>
								</div>
							</li>
							<li>
								<div class="fab-label-visible" data-fab-label="Dashboard E-Data">
									<a href="<?php echo base_url('edata/index_data'); ?>" class="btn btn-light rounded-round btn-icon btn-float">
										<i class="icon-table2"></i>
									</a>
								</div>
							</li>
							 
							<li>
								<div class="fab-label-visible" data-fab-label="Search Data">
									<a onclick="search_data()" class="btn btn-light rounded-round btn-icon btn-float">
										<i class="icon-search4"></i>
									</a>
								</div>
							</li>
							<li>
								<div class="fab-label-visible" data-fab-label="Usulkan tabel baru ke Administrator BAPPEDA">
									<a onclick="message()" class="btn btn-light rounded-round btn-icon btn-float">
										<i class="icon-bubbles3"></i>
									</a>
									 
								</div>
							</li>
							
						</ul>
					</li>
				</ul>
				<script>
	var param = "messages";
		function resul_page(){
			new Noty({
					layout: 'bottomRight',
					text: '<p class="text-justify">Ups, sorry this feature is underconstructed..!</p>',
					type: 'warning',
					modal: false,
					timeout: 2500,
					progressBar : false,
				}).show();
			
		}
		
		function message(){
			$('#modal_message').find('#form-message')[0].reset();
			 if (!($('.modal.in').length)) {
				$('.modal-dialog').css({
				  top: 0,
				  left: 0
				});
			  }
			$('#modal_message').modal({
					backdrop: false,
					show: true
				  });
		}
		
		function search_data(){
			    swal({
				html: '<p class="h4 text-primary">Sophia</p><p>What your\'re looking for ?</p>',
                allowOutsideClick: true,
                input: 'text',
                inputPlaceholder: 'type your keyword here..!',
                showCancelButton: false,
				confirmButtonText: 'Search',
                inputClass: 'form-control',
                inputValidator: function (value) {
                    window.location.replace(BaseUrl+'edata/index_data');
                }
            }).then(function (result) {
                if (result.value) {
					window.location.replace(BaseUrl+'edata/index_data?keyword='+result.value);
                     
                }
            });
		}

		
		$("#form-message").submit(function(event) {
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
					$.ajax({
								data: $('#form-message').serialize(),
								url: ServUrl+"admin/"+param+"/send",
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
											 
											$("#modal_message").modal("hide");
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
											 
											$("#modal_message").modal("hide");										
											}
										}); 
										 
								  }else{
										swal({
											title: response.status+' Aborted!',
											text: response.responseJSON.message,
											type:'warning',
											onClose: function () {
											 $("#modal_message").modal("hide");										
											}
										}); 
										 
								  }
								},
								dataType:'json'
					})
					}
				});
		});
		<?php if($this->uri->segment(3)){ ?>
			new Noty({
					layout: 'topRight',
					text: '<p class="text-justify">Click DROP MENU from the button you will able to print this table</p>',
					type: 'info',
					modal: false,
					timeout: 5000,
					progressBar : false,
				}).show();
		<?php } ?>
	</script>
				