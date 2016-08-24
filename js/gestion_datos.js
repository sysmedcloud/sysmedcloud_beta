// Gestion de datos (Mantenedores)
$(document).ready(function() {
    modal_info();
});

/**************************************************************************/
/** @Function que permite seleccionar el tipo de dato a cargar
/**************************************************************************/
function modal_info() {	
	html = '';
	html+= '<table class="table" text-align="left">';
	html+= '<thead>';
	html+= '</thead>';
	html+= '<tbody>';
	html+= '<tr>';
	html+= '  <td><input type="radio" value="1" name="data-gestion" checked="checked"><b> &nbsp;Alergias</b></td>';
	html+= '  <td><input type="radio" value="2" name="data-gestion"><b> &nbsp;Patologías</b></td>';
	html+= '</tr>';
	html+= '<tr>';
	html+= '  <td><input type="radio" value="3" name="data-gestion"><b> &nbsp;Medicamentos</b></td>';
	html+= '  <td><input type="radio" value="4" name="data-gestion" disabled title="no disponible"><b> &nbsp;Vacunas</b></td>';	
	html+= '</tr>';
	html+= '<tr>';
	html+= '  <td><input type="radio" value="5" name="data-gestion" disabled title="no disponible"><b> &nbsp;Tratamientos</b></a></td>';
	html+= '  <td><input type="radio" value="6" name="data-gestion"><b> &nbsp;Diagnósticos</b></td>';
	html+= '</tr>';
	html+= '</tbody>';
	html+= '</table>';

	$('#gestion_datos').modal('toggle');
	$('#modal-data').html(html);	
}

/**************************************************************************/
/** @Function que permite mostrar las opciones asociadas al CRUD
/**************************************************************************/

function mostrar_opciones(){
	html = '';
	html+= '<table class="table" text-align="left">';
	html+= '<thead>';
	html+= '</thead>';
	html+= '<tbody>';
	html+= '<tr>';
	html+= '  <td><input type="radio" value="1" name="data-crud" checked="checked"><b> &nbsp;Ver / Editar Información</b></td>';
	html+= '  <td><input type="radio" value="2" name="data-crud"><b> &nbsp;Agregar Información</b></td>';
	html+= '  <td><input type="radio" value="3" name="data-crud"><b> &nbsp;Eliminar Información</b></td>';
	html+= '</tr>';	
	html+= '</tbody>';
	html+= '</table>';

	$('#gestion_datos').modal('hide');
	$('#crud_datos').modal('toggle');
	$('#modal-data-sm').html(html);	

	var tipo_dato = $('input[name="data-gestion"]:checked').val();


	$('#bto_crud').click(function(){		
		var opcion 	= $('input[name="data-crud"]:checked').val();
		crud_datos(tipo_dato, opcion);
	});
}

/**************************************************************************/
/** @Function que permite cargar, actualizar o eliminar informacion 
	del sistema
/**************************************************************************/

function crud_datos(dato, opcion){		
	$('#middle').hide('fast');
	$('#crud_datos').modal('hide');
	var tipo = parseInt(dato);
	var opt = parseInt(opcion);	
	var html = '';	
	switch(opt) {
    case 1: // Ver / Editar informacion
    	var datos = { tipo : tipo ,  case : opt};
        $.ajax({
		      type: "POST",
		      url: 'http://' + window.location.host + '/sysmedcloud/gestion/ajax/',   
		      data: datos,
		      dataType: 'JSON',		    
		      success: function (result) {		       				
		      	var dato = parseInt(result.tipo);
		      	console.log(result);
				switch(dato){
				 	case 1: // Alergias
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Alergias");
				 		$('#alergias').html(result.html);
				 	break;
				 	case 2: // Patologias
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Patologías");
				 		$('#patologias').html(result.html);
				 	break;
				 	case 3: // Medicamentos				 		
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Medicamentos");
				 		$('#medicamentos').html(result.html);		 		
				 	break;
				 	case 4: // Vacunas
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Vacunas");
				 		$('#vacunas').html(result.html);
				 	break;
				 	case 5: // Tratamientos
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Tratamientos");
				 		$('#alergias').html(result.html);
				 	break;
				 	case 6: // Diagnosticos
				 		$('#ibox-wrapper').show();
				 		$('#spntipo').text("Diagnósticos");
				 		$('#diagnosticos').html(result.html);
				 	break;
				}

		     }

		 });

        break;
    case 2: // Agregar informacion

        break;	
    case 3: // Eliminar informacion    	
        
    	break;
    default:
        swal('Hubo un error al procesar su solicitud :(');
        break;
	}
}
