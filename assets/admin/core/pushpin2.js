
	function pushPin(){
		if((typeof(jenis) !='') || (typeof(jenis) != "undefined")){x= '?jenis='+jenis;}else{x = '';};
		var path = window.location.pathname.split('/').pop();
		var title = $("#jenis").val();
		 
		var data = {"instansi_id" : instansi , "sub" : sub, "param" : param+''+x, "path" : path+''+x, "title" : title};
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
		if((typeof(jenis) !='') || (typeof(jenis) != "undefined")){x= '?jenis='+jenis;}else{x = '';};
		var path = window.location.pathname.split('/').pop();
		 
		var data = {"instansi_id" : instansi , "param" : param+''+x, "path" : path+''+x};
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
	