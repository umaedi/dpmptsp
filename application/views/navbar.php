	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand wmin-200">
			<a href="<?php echo base_url(); ?>" class="d-inline-block">
				<img src="<?php echo base_url('assets/images'); ?>/web/logo.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>	 
			</ul>

			<span class="badge bg-light shadow-1 text-indigo-700 ml-md-auto mr-md-3">Active</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						 
						<span class="mr-3 ml-3"><?php echo $this->session->userdata('name'); ?></span>
					</a>
					
					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url('admin/users'); ?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
						 
						<a onClick="signOut()" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item">You're login as <?php echo $this->session->userdata('privilege'); ?> as Instansi <?php echo $this->session->userdata('instansi'); ?></a>
					 
				</div>

				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			 
		</div>

		<div class="page-header-content header-elements-md-inline">
			<div class="page-title text-white d-flex">
				<h4><i class="icon-arrow-left52 icon-versions mr-2"></i> <span class="font-weight-semibold"><?php echo $halaman; ?></span></h4>
				<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>

			<div class="header-elements d-none mb-3 mb-md-0">
				<div class="btn-group">
					<a onclick="goBack()" class="btn bg-dark"><i class="icon-arrow-left15 mr-3"></i> Back</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->
		
	<script>
	 function parse (data) {
       data = Math.round(data*Math.pow(10,3))/Math.pow(10,3);
       if (data != null) {
            var lastone = data.toString().split('').pop();
            if (lastone != '.') {
                 data = parseFloat(data);
            }
       }
	   if(data == 0) data = '&nbsp;';
       return data;
	};
	
	function my_number(bilangan){
        	return bilangan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    	}
	</script>		
			
			 
				
					
			 
			