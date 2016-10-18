function loader(){
	swal({  title: 'Generando Reporte',
				  type: 'info',
				  imageUrl: "http://"+ window.location.host +"/sysmedcloud/img/3d-loader.gif",				    
				  showCloseButton: false,
				  showCancelButton: false,
				  imageSize: "300x250",
				  confirmButtonText:'cerrar',
		});
}

$('#bto_repo').click(function(){
    
    var baseURL         = $('body').data('baseurl');//url base
    
    var opt = $('#sel_reportes').val();    
    var url  = '';
    switch(parseInt(opt)){
    	
    	case 1:
    		url = baseURL + 'reportes/reporte_general/'+opt; 
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 2:
    		url = baseURL + 'reportes/reporte_general/'+opt; 
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 3:
    		url = baseURL + 'reportes/reporte_general/'+opt;
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
       	break;
    	case 4:
    		url = baseURL + 'reportes/reporte_general/'+opt;
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 5:
    		url = baseURL + 'reportes/reporte_general/'+opt;
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
    	case 6:
    		url = baseURL + 'reportes/reporte_general/'+opt;
                loader();    		
    		setTimeout(function(){ window.location = url; }, 1000);
    	break;
        default:
    		sweetAlert("Error", "Asegúrese de seleccionar un tipo de reporte", "error");
    	break;
    }    
});

$('#bto_repo_cli').click(function(){	

    var baseURL         = $('body').data('baseurl');//url base
    var rut = $('#rut_paciente').val();
    var opt = $('#sel_reportes_cli').val(); 
    alert(opt);
    var url  = '';
    if( rut.length == 0){
    	sweetAlert("Error", "Debe ingresar el rut del paciente", "error");
    }else{
    	switch(parseInt(opt)){
	    	case 1:
	    		url = baseURL + 'reportes/reporte_general/'+opt;    
	    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
                        setTimeout(function(){ window.location = url; }, 1000);		
	    	break;
	    	case 2:
	    		url = baseURL + 'reportes/reporte_general/'+opt;  
	    		sweetAlert("Correcto", "Estamos generando su reporte", "success");
                        setTimeout(function(){ window.location = url; }, 1000);  		
	    	break;
	    	default:
	    		sweetAlert("Error", "Asegúrese de seleccionar un tipo de reporte", "error");
	    	break;
    	}	
    }   
    
});