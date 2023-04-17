<form id="form-pdf">
<input id="judul" name="judul" type="hidden" value="<?php echo $halaman; ?>">
<input id="instansi" name="instansi" type="hidden" value="<?php if(isset($instansi["instansi"])){echo $instansi["instansi"]; }elseif(isset($instansi)){echo $instansi; }?>">
<input id="year" name="year" type="hidden" value="">
<input id="content" name="content" type="hidden" value=""></form>
<link href="https://unpkg.com/tableexport@5.2.0/dist/css/tableexport.min.css" rel="stylesheet" type="text/css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.1/xlsx.core.min.js" integrity="sha256-NEmjetUCzF/mJX6Ztvx6h+WG2j+A8LX85axUiZWWMK4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js" integrity="sha256-FPJJt8nA+xL4RU6/gsriA8p8xAeLGatoyTjldvQKGdE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js" integrity="sha256-2mlJMabqiyPb1w0ZdzOuuyOWeHkngxrYTowNETowwtI=" crossorigin="anonymous"></script>
<script>
 
	function excel(){
	var Table = document.getElementById('table');
		
	var instance = TableExport(document.getElementById('table'),{
		 
			trimWhitespace: true,			
			formats: ['xlsx'],
			filename: param.substring(0, 30),
			exportButtons: true
		});
    //console.log(Table);
	var exportData = instance.getExportData()['table']['xlsx'];
	 
	
	instance.export2file(exportData.data, exportData.mimeType, exportData.filename, exportData.fileExtension);
	 
	}
	
	function csv(){
	var instance = new TableExport(document.getElementById('table'),{
			bootstrap: true,
			formats: ['csv'],
			filename: param,
			exportButtons: false
		});
		
	var exportData = instance.getExportData()['table']['csv'];
	 
	instance.export2file(exportData.data, exportData.mimeType, exportData.filename, exportData.fileExtension);
	}
	
	function pdf(){	
					$("input[name=year]").val($("select[name=year]").val());
					$("input[name=content]").val($("<div>").append($("#table").eq(0).clone()).html());
					$('#form-pdf').attr('action', BaseUrl+'download/data/'+param);
					$('#form-pdf').attr('method', 'post');
					$('#form-pdf').attr('target', '_blank');		
					$('#form-pdf').submit();
			
	}
</script>