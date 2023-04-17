<?php $this->load->view('header'); ?>
		<div class="kb-breadcrumbs pt-90 bg-warning">
		
			<div class="container">
				<div class="kb-breadcrumbs-container">
					<ul>
						<li>
							<a href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li class="active">
							<a href="#"><?php echo $halaman; ?></a>
						</li>
					</ul>
				</div>
			</div>
			<!--/ container -->

			<!-- Sub-header Bottom mask style 2 -->
			<div class="kl-bottommask kl-bottommask--shadow_ud"></div>
			<!--/ Sub-header Bottom mask style 2 -->
		</div>
		<!--/ Knowledge base breadcrumbs -->
<!-- Content section with titles, sub-title & description + Sidebar and custom paddings -->
        <section class="hg_section--relative pt-100 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="card">
								<div class="card-body">
									 <span><?php echo $pages['content']; ?></span>
								</div>
								</div>
								<!--/ .kb-category -->
							</div>
							<!--/ col-md-12 col-sm-12 -->

						</div>
						<!--/ row -->
					</div>
					<!--/ col-sm-12 col-md-6 col-lg-8 mb-sm-30 -->

					 
				</div>
				<!--/ row -->
			</div>
			<!--/ container -->
			<div class="kl-bottommask kl-bottommask--shadow_simple_down">
			</div>
		</section>
		
			
		<!--/ Content section with titles, sub-title & description + Sidebar and custom paddings -->
		<?php $this->load->view('spaces'); ?>
		
<?php $this->load->view('footer'); ?>
