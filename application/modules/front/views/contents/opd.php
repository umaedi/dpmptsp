<?php $this->load->view('header'); ?>

		<div class="kb-breadcrumbs pt-90 bg-warning">
		
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
		<!--/ Knowledge base breadcrumbs -->
<!-- Team boxes section with custom margins -->
		<section class="hg_section pt-100 mb-70">
			<div class="container">
			<div class="col-sm-12 col-md-12 col-lg-12 mb-sm-30">
			<div class="row kl-title-block clearfix text-center tbk-symbol--line tbk--colored tbk-icon-pos--after-title pb-60 justify-content-md-center">
							<div class="col-sm-12 col-md-12">
								<h3 class="tbk__title text-white" style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;">
									Kepala Organisasi Perangkat Daerah
								</h3> 
								 
								<div class="tbk__symbol ">
									 
								</div>
							</div>
							 
							<div class="col-sm-12 col-md-7">
								<!-- Search box default style element -->
								<div class="elm-searchbox elm-searchbox--normal elm-searchbox--eff-typing border border-danger shadow">
									<!-- Search box wrapper -->
									<div class="elm-searchbox__inner">
										<form class="elm-searchbox__form" action="<?php echo base_url('feature/data-opd');?>" method="get">
											<input id="s" name="keyword" maxlength="30" class="elm-searchbox__input" type="text" size="20" value=""  placeholder="Cari Instansi ...">
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
				<div class="row" id="datas">
					 
								<!-- CALLOUT -->
				</div>
				<div class="row">	
					<div class="col-sm-12 text-center pt-50" id="load">
						<div class="loader text-center"></div> 
						<div class="col-md-12 about-content text-center text-white"><a id="loadmore" class="btn-element btn btn-fullcolor btn-md btn-fullwidth" onclick="loadMore()" data-value=""><span> Load More</span></a></div>
					</div>
				</div>
				<!--/ row -->
			</div>
			</div>
			<!--/ container -->
		</section>
		<!--/ Team boxes section with custom margins -->
<?php $this->load->view('footer'); ?>
<script>

	var Serve = 'http://serviceopdtuba.cooljarsoft.com/api/';
	var data = {"keyword": getUrlParameter('keyword'), "limit" : 8, "sort" : "ASC", "page" : 1}
		
	function loadData(data){
		
		$.ajax({
					data: data,
					url:  Serve+"v1/instansi/list-merge",
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
						 console.log(response.responseJSON.data);
						 var content = ''; 
						 $.each(response.responseJSON.data.data, function(k,v){
							 
							content +='<div class="col-sm-12 col-md-4 col-lg-3 pt-20">';
								content +='<div class="team_member">';
									content +='<a href="'+v.origin+'" target="_blank" class="grayHover img-thumbnail" style="height: 300px;overflow: hidden;">';
										content +='<img src="'+v.url_img+'" class="img-fluid" alt="'+v.instansi+'" title="'+v.instansi+'" />';
									content +='</a>';
									content +='<h4 class="small font-weight-bold">'+v.kepalaOpd+'</h4>';
									content +='<h6 class="font-weight-bold tcolor text-uppercase">'+v.instansi+'</h6>';
									content +='<div class="details">';
										content +='<div class="desc">';
											content +='<p><a href="'+v.origin+'" target="_blank" title="website" class="btn btn-sm btn-info mr-5">Website</a>';
											content +='<a href="'+BaseUrl+'data/index_data?keyword='+v.instansi+'" title="data sektoral" class="btn btn-sm btn-danger">Data Sektoral</a></p>';
										content +='</div>';
									content +='</div>';
								content +='</div>';
							content +='</div>';
						 });
						 
						 $('#datas').append(content);
						 $('#loadmore').data("value", response.responseJSON.data.current_page);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}else if(response.status == 204){
							 $('#loadmore').remove();
							 $('#datas').append('<div class="col-md-12 text-center mt-50 mb-50"><h2>Oops! Not Found</h2></div>');
						}
                    },
					dataType:'json'
                })
	
	};
	 
	loadData(data);
	
	function loadMore(){
		var page = parseInt($('#loadmore').data("value"))+1;
		var data = {"keyword": getUrlParameter('keyword'), "limit" : 8, "sort" : "ASC", "page" : page};
		loadData(data);		
	};
	  
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