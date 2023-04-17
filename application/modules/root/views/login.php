
<?php $this->load->view('navbar_login'); ?>
<style>
.fixed-bg {
    /* The background image */
    background-image: url("<?php echo base_url('assets/images/web/MPP2.jpg'); ?>");
    /* Set a specified height, or the minimum height for the background image */
    //min-height: 500px;
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
<script>
	Noty.overrideDefaults({
            theme: 'limitless',
            layout: 'topRight',
            type: 'alert',
            timeout: 2500
        });
		
	function e(type, text){
		 new Noty({
						text: text,
						type: type,
						modal: true
					}).show();
					signOut()
	}
</script>
<!-- Page content -->
	<div class="page-content fixed-bg">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center" ng-app="login">

				<!-- Login card -->
				<form class="login-form form-validate" ng-controller="LoginController" ng-submit="sendForm()">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3"><br>
								<img width="60%" src="<?php echo base_url('assets/images/web/'.$meta['logo']); ?>" alt="">
								 
								<h5 class="mb-0 h2 text-success"> <br></h5>
								<span class="d-block text-muted">login to Your credentials</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="username" ng-model="data.username" placeholder="Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-orange-800"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" ng-model="data.password" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-orange-800"></i>
								</div>
							</div>

							
							<div class="form-group">
								<button type="submit" class="btn bg-danger btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
							<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="<?php echo base_url('root/terms'); ?>">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a>
							<small class="mt-2"><br>Developed &amp; Designed by: <a href="http://facebook.com/dye.ard" target="_blank">Andrastuff</a></small>
							</span>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script src="<?php echo base_url('assets/admin'); ?>/core/angular.min.js"></script>
	<script>
	var app = angular.module('login', []);

	app.controller("LoginController", function($scope, $http) {
    $scope.sendForm = function (){
      $http({
			method : "POST",
			data : $scope.data,
			url : ServUrl+"admin/auth/login"
		}).then(function mySuccess(response) {
			
			if(response.status == 203){
				 new Noty({
						text: response.data.status,
						type: 'warning',
						modal: true
					}).show();
			}else{
				window.location.reload();
			}
		}, function myError(response) {
			 e('info','401 server conection error');
		});
    };
	
	});
</script>