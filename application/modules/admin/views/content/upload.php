	<?php $this->load->view('header') ?>
	<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">
			<div class="row">
				<div class="col-md-10">
				<!-- Task manager table -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-list2 position-left"></i> Data File</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
					<div class="panel-body">
					<div class="table-responsive">
					 
					<div class="dataTables_filter text-info"><?php echo $total ?> Total Files</div>
					<div class="DTTT_container">
						<a href="#" class="btn bg-info-700 btn-labeled heading-btn" data-toggle="modal" data-target="#modal_add"><b><i class="icon-upload"></i></b> Upload File</a>
						<a class="btn btn-warning btn-labeled heading-btn click-me" id="upFiles"><b><i class="icon-warning position-center"></i></b> Delete Selected</a>
					</div>

					<table class="table datatable-custom table-responsive" id="upFiles">
						<thead class="bg-teal-700">
							<tr>
								<th>No</th>
								<th>Judul File</th>
								<th>Link Download</th>
								<th>Type File</th>
								 
							</tr>
						</thead>
						<tbody>
						<?php foreach ( $file as $items ) { ?>
							<tr id="<?php echo $items['idfile'] ?>">
								<td><?php echo $number++; ?></td>
								<td><?php echo ucwords($items['judul_file']) ?></td>
								<td><?php if ($items['nama_file']){ ?><a href="<?php echo base_url('file/'.$items['nama_file']); ?>" target="_blank" ><?php echo base_url('file/'.$items['nama_file']); ?></a> <?php } else{ echo '<i>No file has been upload</i>'; } ?></td>
								<td><?php echo $items['type_file'] ?></td>
							 
								 
							</tr>
						<?php } ?>
						</tbody>
					</table>
				 
					<br>
						
						<div class="content-divider">
							<span class="pt-10 pb-10"><small class="text-info"><?php echo $total; ?> Total Record Data</small> </span>
						</div>
						<div class="text-right"><?php echo $pagination ?></div>
					</div>
					</div>
			</div>
			
				</div>
			</div>
			</div>
			<!-- /main content -->
			
				<!-- /main content -->
		<div id="modal_add" class="modal fade in">
					<div class="modal-dialog">
						<div class="modal-content ">
							<div class="modal-header bg-info-700">
								<button type="button" class="close" data-dismiss="modal"><i class="bg-danger icon-cross2 position-left"></i></button>
								<h5 class="modal-title">Form Upload</h5>
							</div>
							<form class="form-horizontal" method="post" action="<?php echo site_url('admin/'.$action) ?>" enctype="multipart/form-data" >
							<input name="id_dusun" id="id_dusun" type="hidden" class="form-control">
							<div class="panel-body"><br>
														<div class="form-group ">
														<label class="col-sm-3 control-label ">Judul File</label>
															<div class="col-md-9">
																<input name="judul_file" id="judul_file" type="text" class="form-control" placeholder="Judul File Upload">
															</div>
														</div>
														
														<div class="form-group ">
														<label class="col-sm-3 control-label ">File</label>
															<div class="col-md-9">
																 <input name="userfile" type="file" class="form-control"/>
															</div>
														</div>
														
							</div>
							

							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn bg-primary">Save changes</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			
			
	<?php $this->load->view('footer') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/tables/datatables/extensions/tools.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/datatables_extension.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/dashboard.js"></script>
	
