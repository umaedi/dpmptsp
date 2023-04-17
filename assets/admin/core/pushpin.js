
	function pushPin(){
	
		var path = window.location.pathname.split('/').pop();
		var title = $("input[name=title]").val();
		if (typeof sub == 'undefined') {
			sub ='';
		}
	 
		var data = {"instansi_id" : instansi , "sub" : sub, "param" : param, "path" : path, "title" : title};
		$.ajax({
					data: data,
					url: ServUrl+"admin/pin/pinthis",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 201){
							swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										 loadData();
										}
									}); 
                        }else if(response.status == 401){
							e('info','401 server conection error');
						}else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadData();				
										}
									}); 
									 
							  }
                    },
					dataType:'json'
                })
	
		
	}
	
	function pushPublic(){
		var path = window.location.pathname.split('/').pop();
		var title = $("input[name=title]").val();
		if (typeof sub == 'undefined') {
			sub ='';
		}
	 
		var data = {"instansi_id" : instansi , "sub" : sub, "param" : param, "path" : path, "title" : title};
		$.ajax({
					data: data,
					url: ServUrl+"admin/pin/pinPublicThis",
                    crossDomain: true,
                    headers: header,
                    method: 'GET',
                    complete: function(response){                
                        if(response.status == 201){
							swal({
										title: response.status+' Saved!',
										text: response.responseJSON.message,
										type:'success',
										onClose: function () {
										 loadData();
										}
									}); 
                        }else if(response.status == 401){
							e('info','401 server conection error');
						}else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										onClose: function () {
										loadData();				
										}
									}); 
									 
							  }
                    },
					dataType:'json'
                })
	
		
	}
	