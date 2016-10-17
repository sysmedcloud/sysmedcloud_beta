function desplegar_opciones( opcion ){
	switch(parseInt(opcion)){
		case 1:
			$('#tipo_repo').hide();
			$('#general_repos').show(200);
		break;
		case 2:
			$('#tipo_repo').hide();
			$('#client_repos').show(200);
		break;
	}
}

$('.bto_ret').click(function(){
	$('#general_repos').hide();
	$('#client_repos').hide();
	$('#tipo_repo').show(200);
});

$('#bto_repo').click(function(){	
    var opt = $('#sel_reportes').val();        
    var url  = '';     	
    switch(parseInt(opt)){
    	case 1:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt; 
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);   		
    	break;
    	case 2:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;  
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);  		
    	break;
    	case 3:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);
       	break;
    	case 4:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 5:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 6:
    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    		
    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	default:
    		sweetAlert("Error", "Asegúrese de seleccionar un tipo de reporte", "error");
    	break;
    }
    
    
});

$('#bto_repo_cli').click(function(){	
	var rut = $('#rut_paciente').val();
    var opt = $('#sel_reportes_cli').val();        
    var url  = '';
    if( rut.length == 0){
    	sweetAlert("Error", "Debe ingresar el rut del paciente", "error");
    }else{
    	switch(parseInt(opt)){
	    	case 1:
	    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;    
	    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
				setTimeout(function(){ window.location = url; }, 1000);		
	    	break;
	    	case 2:
	    		url = 'http://' + window.location.host + '/sysmedcloud/reportes/reporte_general/'+opt;  
	    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
				setTimeout(function(){ window.location = url; }, 1000);  		
	    	break;
	    	default:
	    		sweetAlert("Error", "Asegúrese de seleccionar un tipo de reporte", "error");
	    	break;
    	}	
    }   
    
});


