<?php $this->load->view('header'); ?>
<style>
.knowledge {
   background-image: url("<?php echo base_url('assets/images/web/MPP2.jpg'); ?>"); 
    /* Set a specified height, or the minimum height for the background image */
    min-height: 500px;
    /* Set background image to fixed (don't scroll along with the page) */
    background-attachment: fixed;
    /* Center the background image */
    background-position: center;
    /* Set the background image to no repeat */
    background-repeat: no-repeat;
    /* Scale the background image to be as large as possible */
    background-size: cover;
}
</style>
<div class="kb-breadcrumbs pt-90 bg-warning">
		
 
			<!--/ container -->

			<!-- Sub-header Bottom mask style 2 -->
			<div class="kl-bottommask kl-bottommask--shadow_ud"></div>
			<!--/ Sub-header Bottom mask style 2 -->
		</div>
		
<!-- Content section with titles, sub-title & description + Sidebar and custom paddings -->
        <section class="hg_section pt-100 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
						<div class="row">
						
							<div class="col-md-12 col-sm-12">
								<div class="kl-title-block clearfix text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title pb-60 ">
									
									<h3 class="tbk__title text-white" style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;">
										Temukan data Pemerintah dengan mudah!
									</h3>

									<div class="tbk__symbol tcolor">
										 
									</div>
									<div class="row justify-content-md-center">
									<div class="col-sm-12 col-md-7">
										<!-- Search box default style element -->
										<div class="elm-searchbox elm-searchbox--normal elm-searchbox--eff-typing border border-danger shadow">
											<!-- Search box wrapper -->
											<div class="elm-searchbox__inner">
												<form class="elm-searchbox__form" action="<?php echo base_url('data/index_data');?>" method="get">
													<input id="s" name="keyword" maxlength="30" class="elm-searchbox__input" type="text" size="20" value=""  placeholder="Cari Data ...">
													<span class="elm-searchbox__input-text"></span>
													<button type="submit" id="searchbox_submit" class="elm-searchbox__submit fas fa-search"></button>

													<div class="clearfix"></div>
												</form>
											</div>
											<!--/ Search box wrapper -->
										</div>
										<!--/ Search box default style element -->
									</div>
									</div>
								</div>	
								<div class="card">
								<div class="card-body">
									  
									<!-- Accordions element style 5 -->
									<div class="hg_accordion_element style5 pt-50">
										<!-- Title -->
										<h6 class="zn_text_box-title--style2" id="total"></h6>
										<!--/ Title -->
										<div class="fake-loading loading-1s"></div>
										<!-- Accordions wrapper -->
										<div class="th-accordion" id="list-table">
											<!-- Acc group #13 -->
											<div class="loader text-center mt-5 mb-5"></div> 
											<!--/ Acc group #13 -->

										</div>
										<!--/ Accordions wrapper -->
									</div>
									<!--/ Accordions element style 5 -->
									 
					
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
		</section>
		<!--/ Content section with titles, sub-title & description + Sidebar and custom paddings -->
<?php $this->load->view('footer'); ?>
<script>
	var param = window.location.pathname.split('/');
	var endpoint = param.pop();
	
	function loadData(){
		
		$.ajax({
					data: {"keyword" : getUrlParameter('keyword')},
					url:  ServUrl+"report/lists",
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							var html = '';
							var no = 0;
							var n = 0;
							$.each(response.responseJSON.data, function(x,y){
								no++;
								html += '<div class="acc-group pl-10 pt-15 pb-15 fw-semibold tcolor"><i class="fa fa-building tcolor mr-10" aria-hidden="true"></i> Data Sektoral '+y.instansi+'</div>';
								$.each(y.item, function(k,v){
								n++;
											html += '<div class="acc-group">';
												html += '<div id="heading13">';
													html += '<a data-toggle="collapse" data-number="'+n+'" data-target="#acc'+n+'" class="collapsed text-primary" aria-expanded="false" aria-controls="acc'+n+'">';
														html += ' '+v.title+'<span class="acc-icon"></span>';
													html += '</a>';
												html += '</div>';
												html += '<div id="acc'+n+'" class="collapse" aria-labelledby="heading13" data-parent=".style5">';
													html += '<div class="content"><i class="fa fa-building text-warning" aria-hidden="true"></i> '+y.instansi+' <li class="fas fa-cogs ml-10"></li> API Tersedia</p></div>';
													html += '<div class="d-inline-flex mr-20 mb-30">';
														html += '<button onclick="openData(`'+v.fullpath+'`)" target="_self" class="btn-element btn btn-lined lined-custom" title="Open Data"><span>Open Data</span>';
														html += '</button>';
													html += '</div>';
												html += '</div>';
											html += '</div>';
								});
							});
							if(getUrlParameter('keyword') != undefined){param = getUrlParameter('keyword').replace(/\+/g, ' ');}else{ param = ''; }
							$('input[name=keyword]').val(param); 
							$('#list-table').html(html); 
							$('#total').html(n+" Dataset"); 
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	function openData($id){
		 
		document.location.href = BaseUrl+'data/open/'+$id;
	}
	loadData();
	
	function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
	};
	 
	
	</script>