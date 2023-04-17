<?php $this->load->view('header') ?>
<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">
				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-list"></i> Hystory Claim Towing</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
					<div class="table-responsive">
						<div class="col-sm-12">
						<form class="form-horizontal" method="post" id="form-order-status" action="<?php echo base_url('admin/filter_history'); ?>">
								<table class="table table-lg text-nowrap">
									<tbody>
										<tr>
											 
											<td class="text-right col-md-2">
											<div class="form-group">
												<label class="col-lg-3 control-label">Search</label>
												<div class="col-lg-9">
													<input name="keyword" id="keyword" type="text" class="form-control" placeholder="Keyword" value="" >	 
												</div>
											</div>
											</td>
											<td class="text-right col-md-3">
											<div class="form-group">
												<label class="col-lg-3 control-label">Status</label>
												<div class="col-lg-9">
													<select name="status" id="order_status" class="select" placeholder="Sorting by Status Order ">
																	<option></option>
																	<optgroup label="Pilih level status order">
																	 
																	<option value="request" >Order Diminta</option>
																	
																	<option value="accepted" >Order Diterima</option>
																	 
																	<option value="rejected" >Order Ditolak</option>
																	</optgroup>
													</select>	 
												</div>
											</div>
											</td>
											<td class="text-right col-md-1">
											<div class="form-group">
												<button type="submit" class="btn bg-primary">Filter</button>
											</div>
											</td>
											 
										</tr>
									</tbody>
								</table>
								</form>
							
						</div>

					<table class="table datatable-custom">
						<thead class="bg-teal-700">
							<tr>
								<th>No</th>
								<th>Invoice</th>
								<th>Nama Konsumen</th>
								<th>Kendaraan</th>
								<th>Biaya</th>
								<th>Status</th>
								 
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ( $order as $items ) { ?>
							<tr id="<?php echo $items['id_claim']; ?>">
								<td><?php echo $number++; ?></td>
								<td><?php echo ucwords($items['invoice']) ?></td>
								<td><?php echo ucwords($items['nama_konsumen']) ?></td>
								<td><?php echo ucwords($items['merek']) ?></td>
								<td><?php echo ucwords($items['biaya']) ?></td>
								<td><?php echo ucwords($items['status']) ?></td>
								 
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="<?php echo base_url('admin/view_claim'); ?>/<?php echo $items['id_claim'] ?>"><i class="icon-folder-open3"></i> View Klaim</a></li>
												<li><a href="<?php echo base_url('admin/view_member'); ?>/<?php echo $items['id_konsumen'] ?>"><i class="icon-folder-open3"></i> View Konsumen</a></li>
												<li><a href="<?php echo base_url('admin/print_claim'); ?>/<?php echo $items['id_claim'].'.pdf'; ?>" target="_blank"><i class="icon-printer"></i> Print Raport</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
						<div class="content-divider">
							<span class="pt-10 pb-10"> </span>
						</div>
						<div class="text-right"><?php echo $pagination ?></div>
				</div>
				</div>
				<!-- /basic datatable -->
					</div>
			</div>
			<!-- /main content -->

		
	
	<?php $this->load->view('footer') ?>
	<script>$('.select').select2();  
	</script>