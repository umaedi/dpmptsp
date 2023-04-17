<?php $this->load->view('header') ?>
<?php $this->load->view('sidebar') ?>


			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Messsage options -->
				<h6 class="content-group text-semibold">
					Backup Database
					<small class="display-block">Options for backup all database .sql format</small>
				</h6>

				<div class="row">
					

					<div class="col-md-4">
						
						<div class="panel panel-body border-top-primary text-center">
							<h6 class="no-margin text-semibold">Backup Database</h6>
							<p class="content-group-sm text-muted">Backup included all table</p>
							<a href="<?php echo site_url('admin/backup/1')?>" class="btn btn-info" id="spinner-only"> <i class="icon-database position-left"></i>Start Backup</a>

							<div class="blockui-message">
								<i class="icon-spinner10 spinner"></i>
					            <span class="text-semibold display-block">Loading</span>
					        </div>
							
						</div>
					</div>

					
				</div>
				<!-- /messsage options -->
			</div>
			<!-- /main content -->

		
	
	<?php $this->load->view('footer') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/extension_blockui.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/pages/dashboard.js"></script>