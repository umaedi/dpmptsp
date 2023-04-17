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
						<h5 class="card-title"><?php echo $halaman; ?> <span class="title"></span></h5>
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
											<a onclick="pushPin()" class="dropdown-item" id="pin-status" title="Pin to E-Data or UnPin to remove from E-Data"><i class="icon-pushpin"></i>Pin to E-Data</a> 
										</div>
									</div>
								</div>
							</div>
					<div class="table-responsive">
					<div class="loader text-center mt-5 mb-5"></div>
					<table id="table" class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center h5">No.</th>
								<th class="text-center h5">Tahun</th>
								<th class="text-center h5">Jenis Penghargaan</th>
								<th class="text-center h5" rowspan="2">Keterangan</th>
								 
							</tr>

							<tr id="list-title">
								
							</tr>
						</thead>
						<tbody>
							 
						</tbody>
						 
					</table>
					</div>
					</div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
				
<?php $this->load->view('footer') ?>
<script> 
	var sub 	= "admin/";
	var param = window.location.pathname.split('/').pop();
	function loadData(){
		$('#table tbody').html('');  
		var year 	= $("select[name=year]").val();
		$.ajax({
					data: {"year" : year},
					url: ServUrl+sub+param+"/list",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){  
											
                        if(response.status == 200){
							var tbody = '';
							var no = 0;
							
							$.each(response.responseJSON.data, function(k,v){
								 
								no++;
								tbody += '<tr>';
								tbody += '<td class="text-center small"><a class="opt btn list-icons-item btn-outline-warning" data-id="'+v.id+'" data-tahun="'+v.tahun+'" data-jenis="'+v.jenis+'" data-keterangan="'+v.keterangan+'">'+no+'.</a></td>';
								tbody += '<td class="text-center">'+v.tahun+'</td>';
								tbody += '<td class="text-center">'+v.jenis+'</td>';
								tbody += '<td class="text-center">'+v.keterangan+'</td>';
								 
								tbody += "</tr>";
							
							});
								 
							if(response.responseJSON._meta.pinStatus == true){ 
							var pin = '<i class="icon-check text-success"></i>Show on E-Data';
							$('#alert').html('');
							}else{ 
							var pin = '<i class="icon-pushpin"></i>Pin to E-Data';
							$('#alert').html('<div class="alert bg-warning text-white alert-styled-left"><span class="font-weight-semibold">Warning!</span> the table isn\'t showing in the dashboard E-Data, you should make it available to everyone !</div>'); 
							};
							
							$('#pin-status').html(pin);
							if(tbody == '') tbody ='<tr><td colspan="4" class="text-center">No record availabe in '+year+'</td></tr>';
							$('#table tbody').html(tbody);  
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};

	loadData();
	$('.years').change(function(){
		$('.title').html($(this).val());
		loadData();
	});
	
var instansi 	= 1;
</script>
<?php $this->load->view('print') ?>