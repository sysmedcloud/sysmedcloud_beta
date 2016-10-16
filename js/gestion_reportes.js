$('#bto_repo').click(function(){
    var opt = $('#sel_reportes').val();    
    var url  = '';
    switch(parseInt(opt)){
    	case 0:
    		sweetAlert("Error", "Asegúrese de seleccionar un tipo de reporte", "error");
    	break;
    	case 1:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    	break;
    	case 2:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    	break;
    	case 3:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;
       	break;
    	case 4:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    	break;
    	case 5:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    	break;
    	case 6:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    	break;
    }

    sweetAlert("Correcto", "Estamos generando su reporte", "success");
    setTimeout(function(){ window.location = url; }, 1000);
    
})