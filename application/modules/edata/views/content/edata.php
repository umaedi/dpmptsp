<?php $this->load->view('header') ?> 
<style>
@media (min-width: 45em) {
    .card-columns {
        -webkit-column-count: 1;
        -moz-column-count: 1;
        column-count: 1;
    }
}

@media (min-width: 65em) {
    .card-columns {
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;
    }
}

@media (min-width: 75em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }
}
.dropdown-item {
    padding: .5rem .5rem;
}

</style>


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
							<!-- Bottom right menu -->
				<?php $this->load->view('fab') ?>
				
				<!-- /bottom right menu -->
				<div class="text-center mb-4 py-2"><img width="60px" src="<?php echo base_url('assets/images/web/tb.png'); ?>" class="rounded" alt="Tulang Bawang">
						<h1 style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red; font-size: 30px;" class=" text-white font-weight-semibold mb-1" ><b>PORTAL DATA KABUPATEN TULANG BAWANG</b></h1>
						<h6 style="text-shadow: 1px 1px 2px red, 0 0 25px red, 0 0 5px red;" class=" d-block font-weight-semibold text-white">Welcome to our database browse what's you need !</h6>
				</div>
		 
				<div class="loader text-center mt-5 mb-5"></div>
								<div class="card-columns" id="content">
								
								</div>

				 
				<!-- /directory -->
				
			</div>
			<!-- /main content -->
		</div>
		<!-- /content area -->
		<input name="title" type="hidden" placeholder="" value="<?php echo $this->input->get('keyword'); ?>">
<?php $this->load->view('footer') ?>
<script>
$('body').addClass('fixed-bg');  
		var param = window.location.pathname.split('/').pop();
		 
		function loadData(keyword){
		
		$.ajax({
					data: {"keyword" : keyword},
					url: ServUrl+""+param,
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 200){
							if(response.responseJSON.length == 0){
							swal('I`m so sorry there`s no data were found !');
							 
							}; 
							var tbody = '';				
							$.each(response.responseJSON, function(k,v){
								var count = '<span class="ml-1 badge badge-flat border-white">'+v.item.length+' data</span>';
								if (v.item.length == 0) count = "";
								tbody += '<div class="card mt-1 border border-danger">';
								tbody += '<div class="card-header header-elements-inline">';
								tbody += '<h5 class="font-weight-semibold"><i class="icon-folder6 mr-2 text-teal-800"></i><a data-toggle="collapse" href="#in'+v.instansi_id+'" aria-expanded="true">'+v.instansi+''+count+'</a></h5>';
								tbody += '</div>';
								tbody += '<div class="card-body collapse show" id="in'+v.instansi_id+'">';
								tbody += '<div class="dropdown-divider"></div>';
								$.each(v.item, function(x,y){
										tbody += '<a href="'+BaseUrl+'edata/open/'+y.path+'" class="dropdown-item font-weight-semibold" title="'+y.title+'">';	
										tbody += '<i class="icon-file-text2 mr-1"></i>'+y.title+'';
										tbody += '</a>';
										tbody += '<div class="dropdown-divider"></div>';
									});
								tbody += '</div>';
								tbody += '</div>';
								
							});
								
								
							$('#content').html(tbody);  
							
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
	
	};
	var keyword = $("input[name=title]").val();
	loadData(keyword);	
		new Noty({
					layout: 'bottomRight',
					text: '<p class="text-justify"> Hi <b><?php echo $this->session->userdata('name'); ?></b>, I\'m <b>Sophia</b> yours personal assistant welcome & nice to meet you.</p>',
					type: 'info',
					modal: false,
					timeout: false,
					progressBar : false,
				}).show();
</script>
