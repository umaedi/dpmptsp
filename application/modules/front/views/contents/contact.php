<?php $this->load->view('header'); ?>

		<div class="kb-breadcrumbs pt-90 bg-info">
		
			<div class="container">
				<div class="kb-breadcrumbs-container">
					<ul>
						<li>
							<a href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li class="active">
							<a href="#" class="text-white"><?php echo $halaman; ?></a>
						</li>
					</ul>
				</div>
			</div>
			<!--/ container -->

			<!-- Sub-header Bottom mask style 2 -->
			<div class="kl-bottommask kl-bottommask--shadow_ud"></div>
			<!--/ Sub-header Bottom mask style 2 -->
		</div>

			<!-- Sub-header Bottom mask style 2 -->
			<div class="kl-bottommask kl-bottommask--shadow_ud"></div>
			<!--/ Sub-header Bottom mask style 2 -->
		</div>
		<!--/ Knowledge base breadcrumbs -->
		<section class="hg_section--relative pt-80 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<!-- Title element -->
						<div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title">
							<!-- Title with bold style -->
							<h3 class="tbk__title kl-font-alt fw-bold tcolor">
								<?php echo $meta['judul'];?>
							</h3>
							<!--/ Title with bold style -->

							<!-- Sub-title semibold style -->
							<P class="tbk__subtitlefw-semibold">
								<br>Jika Anda memiliki pertanyaan seputar data atau mengetahui adanya masalah maupun penyalahgunaan dengan layanan kami, anda dapat segera menghubungi kami melalui kontak di bawah ini.<br>
							</P>
							<!--/ Sub-title with semibold style -->
						</div>
						<!--/ Title element -->
					</div>
					<!--/ col-sm-12 col-md-12 -->

					<div class="col-sm-12 col-md-4">
						<!-- Text box -->
						<div class="text_box">
							<p>
								<strong><em><?php echo $meta['alamat'];?>,</em></strong><br>
								Lampung
							</p>
						</div>
						<!--/ Text box -->
					</div>
					<!--/ col-sm-12 col-md-4 -->

					<div class="col-sm-12 col-md-4">
						<!-- Text box -->
						<div class="text_box">
							<p>
								<strong>Tel: <?php echo $meta['telp'];?></strong><br>
								 Fax: <?php echo $meta['telp'];?>
							</p>
						</div>
						<!--/ Text box -->
					</div>
					<!--/ col-sm-12 col-md-4 -->

					<div class="col-sm-12 col-md-4">
						<!-- Text box -->
						<div class="text_box">
							<p>
								<strong>Email: <?php echo $meta['email'];?></strong><br>
								 
							</p>
						</div>
						<!--/ Text box -->
					</div>
					<!--/ col-sm-12 col-md-4 -->
				</div>
				<!--/ row -->
			</div>
			<!-- container -->

			<!-- Bottom mask shadow simple down -->
			<div class="kl-bottommask kl-bottommask--shadow_simple_down">
			</div>
			<!--/ Bottom mask shadow simple down -->
		</section>
		<?php $this->load->view('spaces'); ?>
		


<?php $this->load->view('footer'); ?>
