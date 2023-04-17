<?php $this->load->view('header') ?>
<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">
				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-list"></i> All Transaksi</h5>
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
						 
							
						</div>

					<table class="table datatable-custom">
						<thead class="bg-teal-700">
							<tr>
								<th>No</th>
								<th>Nama Konsumen</th>
								<th>Debit</th>
								<th>Kredit</th>
								<th>Saldo</th>
								 
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php $debit = 0; $kredit = 0; foreach ( $transaksi as $items ) { $debit += $items['debit']; $kredit += $items['kredit']; ?>
							<tr id="">
								<td><?php echo $number++; ?></td>
								<td><?php echo ucwords($items['nama_konsumen']) ?></td>
								<td><?php echo number_format($items['debit'],0,',','.') ?></td>
								<td><?php echo number_format($items['kredit'],0,',','.') ?></td>
								<td><?php echo number_format($items['saldo'],0,',','.') ?></td>
								 
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="<?php echo base_url('admin/data_transaksi'); ?>/<?php echo $items['id_konsumen'] ?>"><i class="icon-folder-open3"></i> View data</a></li>
												 
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						<?php } ?>
						<tr>
						<td colspan="2"><span class="pull-right"><b>Jumlah</b><span></td>
						<td><?php echo number_format($debit,0,',','.'); ?> </td>
						<td><?php echo number_format($kredit,0,',','.'); ?> </td>
						<td colspan="2"><?php $saldo = (int)$debit - (int)$kredit; echo number_format($saldo,0,',','.') ?> </td>
						</tr>
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