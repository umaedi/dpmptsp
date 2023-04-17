</div>
<input id="instansi-id" type="hidden" data-value="<?php echo $this->session->userdata('lvl')?>">
<input id="user-id" type="hidden" data-value="<?php echo $this->session->userdata('id')?>">
<!-- Footer -->
	<div class="navbar navbar-expand-md navbar-light fixed-bottom">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-third">
				<i class="icon-menu mr-2"></i>
				Bottom navbar
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-third">
		<?php if($this->session->userdata('is_login')){ ?>
			<span class="navbar-text">
				© 2023. <a href="#"></a> member of <a href="http://andrastuff.com" target="_blank">andrastuff.com</a>
			</span>
		<?php } ?>
 
		</div>
	</div>
	<!-- /footer -->
		
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_3/LTR/material/full/navbar_multiple_top_bottom.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Oct 2018 14:17:19 GMT -->
</html>
<script>
	function signOut() {
		
		 swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, let me signout!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (result) {
				if(result.value == true){
				$.ajax({
							data: "",
							url: ServUrl+"admin/auth/signout/",
							crossDomain: true,
							headers: header,
							method: 'GET',
							complete: function(response){ 
								if(response.status == 200){
								  swal({
										title: 'Success Signout!',
										text: 'Thank you for using this program',
										type:'success',
										onClose: function () {
										 window.location.replace(BaseUrl+"root/");
										 
										}
									});
								}
							},
							dataType:'json'
				})
				}
            });
	
	}
	
	function goBack() {
		window.history.back();
	}
	$(".loader").hide();
	var image = "<?php echo base_url(). 'assets/images/web/loading.gif'; ?>";
	var $loading = $(".loader").html( '<img class="loading-image" src="'+image+'" alt="loading..">');
		 jQuery(document).ajaxStart(function () {
				   
					$loading.show();
			});
			
		 jQuery(document).ajaxStop(function () {
				$(".card").fadeIn("slow", function() {
				$loading.hide();
				
		});
		 });
		 

	$(window).on('shown.bs.modal', function() { 
    $("body").removeAttr("style");
	});
	</script>

	<script>
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value.replace(/\+/g, ' ').replace(/\#/g, ' ');
		});
		return vars;
	}
	</script>