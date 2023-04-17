<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<?php $this->load->view('sidebar') ?>
<script src="<?php echo base_url('assets/admin');?>/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
			 <form id="form-pages" class="form-horizontal" enctype="multipart/form-data">
		 
			<!-- Summernote editor -->
			<input name="id" type="hidden" value=""/>
			<input name="img" type="hidden" value=""/>
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">						
								Pages Content<br>
								<small class="display-block">Tell a bit about article</small>
							</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					
					<div class="card-body">
						<textarea name="content" id="summernote" class="summernote"></textarea>
					</div>
				</div>
				<!-- /summernote editor -->
			
				<div class="card border-2 border-purple-800">
					<div class="card-header header-elements-inline">
							<h6 class="text-semibold font-weight-semibold">
								
								Pages Information<br>
								<small class="display-block">Tell us a bit about information</small>
							</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					
					<div class="card-body">
						<fieldset class="step" id="step1">
							<div class="row">
								<div class="col-md-7">
								
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Judul Halaman <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Halaman" value=""/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Slug <span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="slug" name="slug" class="form-control" placeholder="Slug Halaman" value=""/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Keyword<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Keyword" value=""/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Deskripsi</label>
										<div class="col-lg-8">
										<textarea type="text" name="description" class="form-control" placeholder="Deskripsi"></textarea>
										</div>
									</div>
									<div class="form-group row">
									<label class="col-form-label col-lg-4 font-weight-semibold text-uppercase">Status<span class="text-danger">*</span></label>
										<div class="col-lg-8">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="publish" checked="">
												Publish
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status" value="unpublish" checked="">
												Unpiblish
											</label>
										</div>
										<i class="small"> </i>
										</div>	
									</div>									
								</div>
							</div>	
						</fieldset>
						
						<div class="content-divider">
							<span class="pt-10 pb-10"> </span>
						</div>
					
						<div class="text-left">
							<a onclick="goBack()" class="btn btn-default"><i class="icon-arrow-left13 position-left"></i> Cancel</a>
							<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					
					
					</div>
				</div>
				<!-- /summernote editor -->
				</form>
			
				 
			
			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
		
	<?php $this->load->view('footer') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/pages/picker_date.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url('assets/admin');?>/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo base_url('assets/admin');?>/js/demo_pages/picker_date.js"></script>
	
<script>

	$('.summernote').summernote({
			height: 500,
			fontNames: [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento'],
			fontNamesIgnoreCheck: [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento'],
			fontSizes: ['8', '9', '10', '11', '12', '14', '15', '16', '18', '24', '36', '48' , '64', '82', '150'],

            callbacks: {
            onImageUpload: function(files, editor, $editable) {
                sendFile(files[0], editor, $editable);
            },
			onMediaDelete : function(files) {
                deleteFile(files[0].src);
            }
			},
			toolbar: [
						// [groupName, [list of button]]
						['style', ['style', 'fontname', 'bold', 'italic', 'underline', 'clear']],
						['font', ['strikethrough', 'superscript', 'subscript']],
						['fontsize', ['fontsize']],
						['color', ['color']],
						['insert', ['picture','link','table']],
						['para', ['ul', 'ol', 'paragraph']],
						['height', ['height', 'fullscreen', 'undo', 'redo', 'codeview']]
						 
					  ],
		 
			
        });
		 
	function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                method: "POST",
                url: BaseUrl+"api/admin/pages/upload",
                cache: false,
                contentType: false,
                processData: false,
                complete: function(response) {
					if(response.status == 201){
					 
                     $('#summernote').summernote("insertImage", response.responseJSON.data.image, 'filename');
					}else{
					swal(response.responseJSON.data.message);	
					}
                },
				dataType:'json'
      })
	}	
	
	function deleteFile(file) {
            
            $.ajax({
                data: {"file" : file.split("/").pop()},
                method: "POST",
				cache: false,
                url: BaseUrl+"api/admin/pages/unupload",
                complete: function(response) {
					if(response.status == 200){
					console.log(response.responseJSON.data)
					}
                },
				dataType:'json'
      })
	}	 
	
	function loadView(){
		var id = window.location.pathname.split('/').pop();
		if ($.isNumeric(id)){
		$.ajax({
					data: "",
					url: BaseUrl+"api/admin/pages/view/"+id,
                    crossDomain: false,
                    method: 'GET',
                    complete: function(response){ 				
                        if(response.status == 200){
							if(response.responseJSON.data.parent >=1 ){
							$('.parent').html('<label class="col-form-label col-lg-4 font-weight-semibold">Parent</label><div class="col-lg-8"><input type="text" name="parent" class="form-control" placeholder="parent" value="" /></div>');	
							}
							$('.note-editable p').html(response.responseJSON.data.content);
							$('textarea[name=content]').html(response.responseJSON.data.content);
							$('input[name=judul]').val(response.responseJSON.data.judul);
							$('input[name=slug]').val(response.responseJSON.data.slug);
							$('input[name=keyword]').val(response.responseJSON.data.keyword);
							$('textarea[name=description]').val(response.responseJSON.data.description);
							$('input[name=status][value='+response.responseJSON.data.status+']').prop("checked",true);
                        }else if(response.status == 401){
							 e('info','401 server conection error');
						}
                    },
					dataType:'json'
                })
		}
	};
	loadView();
	
	$("#form-pages").submit(function(event) {
		event.preventDefault();
		var form = $(this)[0]; 
		var data = new FormData(form);
		var id = window.location.pathname.split('/').pop();
		if($.isNumeric(id)){
			var path = BaseUrl+"api/admin/pages/update/"+id;
		}else{
			var path = BaseUrl+"api/admin/pages/create";
		}
				$.ajax({
							data: data,
							url: path,
							method: 'POST',
							processData: false,
							contentType: false,
							cache: false,
							complete: function(response){                
							  if(response.status == 201){
								  
								  swal({
										title: '',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
												window.location.replace(BaseUrl+'/admin/pages');
										}
									}); 
							  }else if(response.status == 404){
								   swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										 										
										}
									});    
							  }else if(response.status == 401){
								e('info','401 server conection error');
							  }else{
								  swal({
										title: '',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
											 								
										}
									});	 
							  }
							},
							dataType:'json'
				})
				 
	});
	
	function readURL(input,img) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$(input).prev('img').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
	}
	
	
	$("#img").change(function(){
			readURL(this);
	});
</script>				



