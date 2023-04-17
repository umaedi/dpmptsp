<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
<style>
.fixed-height{
 height: 460px;
}
</style>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/plugins/extensions/jquery_ui/effects.min.js"></script>
	<script src="<?php echo base_url('assets/admin'); ?>/js/demo_pages/jqueryui_components.js"></script>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			  <!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Dashboard</h6>
								<div class="header-elements">
									<div class="list-icons ml-3">
				                		<div class="list-icons-item dropdown">
				                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
											<div class="dropdown-menu">
												<a href="#" class="dropdown-item"><i class="icon-sync"></i> Reload data</a>
												
											</div>
				                		</div>
				                	</div>
			                	</div>
							</div>

							<div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<div id="campaigns-donut"><svg width="42" height="42"><g transform="translate(21,21)"><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(102, 187, 106);" d="M1.1634144591899855e-15,19A19,19 0 0,1 -14.050144241469582,12.790365389381929L-7.025072120734791,6.3951826946909645A9.5,9.5 0 0,0 5.817072295949927e-16,9.5Z"></path></g><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(149, 117, 205);" d="M-14.050144241469582,12.790365389381929A19,19 0 0,1 0.6493373977393208,-18.988900993577726L0.3246686988696604,-9.494450496788863A9.5,9.5 0 0,0 -7.025072120734791,6.3951826946909645Z"></path></g><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(255, 112, 67);" d="M0.6493373977393208,-18.988900993577726A19,19 0 0,1 5.817072295949928e-15,19L2.908536147974964e-15,9.5A9.5,9.5 0 0,0 0.3246686988696604,-9.494450496788863Z"></path></g></g></svg></div>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0 count_data"></h5>
										<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Total Arsip Data</span>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3 mb-sm-0">
									<div id="campaign-status-pie"><svg width="42" height="42"><g transform="translate(21,21)"><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(41, 182, 246);" d="M1.1634144591899855e-15,19A19,19 0 0,1 -10.035763324841723,-16.133302652828462L-5.017881662420861,-8.066651326414231A9.5,9.5 0 0,0 5.817072295949927e-16,9.5Z"></path></g><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(239, 83, 80);" d="M-10.035763324841723,-16.133302652828462A19,19 0 0,1 17.35205039879773,-7.739919053684189L8.676025199398865,-3.8699595268420945A9.5,9.5 0 0,0 -5.017881662420861,-8.066651326414231Z"></path></g><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(129, 199, 132);" d="M17.35205039879773,-7.739919053684189A19,19 0 0,1 14.540850859600345,12.229622082421841L7.270425429800173,6.1148110412109205A9.5,9.5 0 0,0 8.676025199398865,-3.8699595268420945Z"></path></g><g class="d3-arc" style="stroke: rgb(255, 255, 255); cursor: pointer;"><path style="fill: rgb(153, 153, 153);" d="M14.540850859600345,12.229622082421841A19,19 0 0,1 5.817072295949928e-15,19L2.908536147974964e-15,9.5A9.5,9.5 0 0,0 7.270425429800173,6.1148110412109205Z"></path></g></g></svg></div>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0 count_file"></h5>
										<span class="badge badge-mark border-danger mr-1"></span> <span class="text-muted">Total File Terupload</span>
									</div>
								</div>
								
								<div>
									<div class="btn-group dropleft d-xs-none d-sm-none d-md-none">
										<button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false">DROP MENU</button>
										<div class="dropdown-menu dropdown-menu-right" x-placement="left-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-2px, 0px, 0px);">
											<div class="dropdown-header">Options</div>
											<a href="<?php echo base_url('skpd/data_rumah_tangga/list'); ?>" class="dropdown-item"><i class="icon-list-unordered"></i> Rumah Tangga Sasaran</a>
											<a href="<?php echo base_url('skpd/data_anggota_rumah_tangga/list'); ?>" class="dropdown-item"><i class="icon-list-unordered"></i> Anggota Rumah Tangga Sasaran</a>
										</div>
									</div>
								</div>
							</div>

							<div class="table-responsive">
							
							</div>
						</div>
						<!-- /marketing campaigns -->

			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->
		
				 
	 
<?php $this->load->view('footer') ?>
<script>
	//UPDATE GANTI
	var instansiId = 19;
	//END UPDATE
	function upload(){
		$('input[name=id]').val(instansiId);
		$('input[name=title]').val('');
		$('.file-input-ajax').fileinput('reset');
		$('#title').html('Upload Foto Kegiatan');
		$("#modal-upload").modal("show");
		$('#modal-upload').on('shown.bs.modal', function () {
		$('input[name=title]').focus();
		})
	}
	

	function loadData(){
		$.ajax({
					data: {"id" : instansiId},
					url: ServUrl+"pmptsp/arsip_data/report",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							$('.count_file').html(response.responseJSON.data.file_count);
							$('.count_data').html(response.responseJSON.data.data_count);
							 
							 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	loadData();
 
 
</script>