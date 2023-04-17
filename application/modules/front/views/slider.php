<!-- Slideshow - Simple Slider element + bottom mask style 4 -->
		<div class="kl-slideshow simpleslider__slideshow maskcontainer--mask4">
			<!-- Fake loading 1s -->
			<div class="fake-loading loading-1s">
			</div>

			<div class="bgback">
			</div>

			<!-- Animated Sparkles -->
			<div class="th-sparkles"></div>
			<!--/ Animated Sparkles -->

			<!-- Background -->
			<div class="kl-bg-source">
				<!-- Background image -->
				<div class="kl-bg-source__bgimage" style="background-image:url(<?php echo base_url('assets/images/web'); ?>/hero-bg-3.jpg); background-repeat:no-repeat; background-attachment:scroll; background-position-x:center; background-position-y:top; background-size:cover">
				</div>
				<!--/ Background image -->

				<!-- Color overlay -->
				 <div class="kl-bg-source__overlay" style="background-color:rgba(255,255,255,0.9)">
				</div>
				<!--/ Color overlay -->
			</div>
			<!--/ Background -->

			<!-- Slideshow container -->
			<div class="kl-slideshow-inner container kl-slideshow-safepadding">
				<div class="row">
					<div class="col-sm-12">
						<!-- Simple slider container -->
						<div class="hg_simple_slider_container showOnMouseover hg-shadow-lifted kl-flex--modern">
							<!-- Slides -->
							<ul class="hg_simple_carousel cfs--default js-slick " data-slick='{
								"infinite": true,
								"slidesToShow": 1,
								"slidesToScroll": 1,
								"autoplay": true,
								"autoplaySpeed": 5000,
								"easing": "easeOutExpo",
								"fade": false,
								"arrows": true,
								"appendArrows": ".hg_simple_slider_container .hgSlickNav",
								"dots": true,
								"appendDots": ".hg_simple_slider_container .hg_simple_carousel-pagination"
							}'>
								
								<li class="ssl-item">
									<!-- Image -->
									<div class="hg_simple_slider-itemimg cover-fit-img" style="background-image:url(<?php echo base_url('assets/images/web'); ?>/1570602908774_sipermata1.jpg);">
									</div>
									<!--/ Image -->

									<!-- Gradient overlay -->
									 

									<!-- Caption wrapper -->
									<div class="flex-caption-wrapper">
									
										<!-- Label/Category -->
										 
									</div>
									<!--/ Caption wrapper -->

									<!-- underbar -->
									 <div class="flex-underbar"></div>
								</li>
								
								<li class="ssl-item">
									<!-- Image -->
									<div class="hg_simple_slider-itemimg cover-fit-img" style="background-image:url(<?php echo base_url('assets/images/web'); ?>/1570602908753_sipermata2.jpg);">
									</div>
									<!--/ Image -->

									<!-- Gradient overlay -->
									 

									<!-- Caption wrapper -->
									<div class="flex-caption-wrapper">
									
										<!-- Label/Category -->
										 
									</div>
									<!--/ Caption wrapper -->

									<!-- underbar -->
									 <div class="flex-underbar"></div>
								</li>
								
								<li class="ssl-item">
									<!-- Image -->
									<div class="hg_simple_slider-itemimg cover-fit-img" style="background-image:url(<?php echo base_url('assets/images/web'); ?>/sipermata3.jpg);">
									</div>
									<!--/ Image -->

									<!-- Gradient overlay -->
									 

									<!-- Caption wrapper -->
									<div class="flex-caption-wrapper">
									
										<!-- Label/Category -->
										 
									</div>
									<!--/ Caption wrapper -->

									<!-- underbar -->
									 <div class="flex-underbar"></div>
								</li>
								<!--/ Slide #1 -->

							</ul>
							<!--/ Slides -->

							<!-- Pagination bullets -->
							<div class="hg_simple_carousel-pagination ssl--no-thumbs">
							</div>
							<!-- Pagination bullets -->

							<!-- Navigation arrows -->
							<div class="hg_simple_carousel-nav hgSlickNav">
							</div>
							<!--/ Navigation arrows -->
						</div>
						<!--/ Simple slider container -->
					</div>
					<!--/ col-sm-12 -->
				</div>
				<!--/ row -->
			</div>
			<!--/ Slideshow container -->

			 
			<!-- Bottom mask style 4 -->
			<div class="kl-bottommask kl-bottommask--mask3">
				<svg width="2700px" height="57px" class="svgmask" viewBox="0 0 2700 57" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
					<defs>
						<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask3">
							<feOffset dx="0" dy="3" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
							<feGaussianBlur stdDeviation="2" in="shadowOffsetInner1" result="shadowBlurInner1"></feGaussianBlur>
							<feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
							<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.4 0" in="shadowInnerInner1" type="matrix" result="shadowMatrixInner1"></feColorMatrix>
							<feMerge>
								<feMergeNode in="SourceGraphic"></feMergeNode>
								<feMergeNode in="shadowMatrixInner1"></feMergeNode>
							</feMerge>
						</filter>
					</defs>
					<path d="M-2,57 L-2,34.007 L1268,34.007 L1284,34.007 C1284,34.007 1291.89,33.258 1298,31.024 C1304.11,28.79 1329,11 1329,11 L1342,2 C1342,2 1345.121,-0.038 1350,-1.64313008e-14 C1355.267,-0.03 1358,2 1358,2 L1371,11 C1371,11 1395.89,28.79 1402,31.024 C1408.11,33.258 1416,34.007 1416,34.007 L1432,34.007 L2702,34.007 L2702,57 L1350,57 L-2,57 Z" class="bmask-bgfill" filter="url(#filter-mask3)" fill="#fbfbfb"></path>
				</svg>
				<i class="fas fa-angle-down"></i>
			</div>
			<!--/ Bottom mask style 4 -->
		</div>
		<!--/ Slideshow - Simple Slider element + bottom mask style 4 -->