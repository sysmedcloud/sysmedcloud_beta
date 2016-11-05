//AL MOMENTO DE CARGAR LA PAGINA CARGA ESTO
$(document).ready(function() {
    
    //CARGA TABLA DE PACIENTES
    listado_consultas_medicas();
    
    var baseURL         = $('body').data('baseurl');//url base
    var id_paciente     = $("#id_paciente").val();
    
    $('#guardar_cambios').click(function(event) {

        event.preventDefault();
        
        //información del formulario
        var formData        = new FormData(document.getElementById("form_ficha_clinica"));
        var baseURL         = $('body').data('baseurl');//url base
        var id_paciente     = $("#id_paciente").val();
        var id_h_clinica    = $("#id_historia_med").val();
        
        //hacemos la petición ajax  
        $.ajax({
            type: "POST",
            url: baseURL+"ficha_medica/guardar",
            secureuri : false,
            //fileElementId :'logo',
            //dataType: 'json',
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            /*beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },*/
            success: function(res) {
                
                //Ficha clinica modificada correctamente
                if(res == "success")
                {   
                    swal({ 
                        title:"Historia Clínica Editada Correctamente",
                        text:"haz click en 'OK' para volver a la historia clínica!",
                        type:"success" 
                    },
                    function(){
                        //window.location.href = 'login.html';
                        var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente+"/"+id_h_clinica;   
                        $(location).attr('href',url);
                    });
                    
                }else if(res == "error"){//Error al editar informacion de la historia clínica

                    swal({ 
                        title: "Error al editar historia clínica",
                        text:  "Por favor inténtelo nuevamente!",
                        type:  "error" 
                    },
                    function(){
                        var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente+"/"+id_h_clinica;
                        $(location).attr('href',url);
                    });

                }else{//Error en la valición de datos    

                    var html = ''+res+'';
                    var errores = $(html).text();
                                       
                    swal({ 
                        title: "Error de validación",
                        text:   errores,
                        type:  "error"
                    });
                }
            }
        });
    });
    
    /*$('#personas_contacto').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"ficha_medica/personas_contacto/"+id_paciente,
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "id_persona_contacto"},
            { "data": "nombres"},
            { "data": "apellidos" },
            { "data": "parentesco" },
            { "data": "telefono" },
            { "data": "correo" }
        ],
        order: [[ 0, "desc" ]],//orden by por fecha de creacion
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
            }
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        responsive: false,//tabla responsive, agrega un boton
        //"dom": 'T<"clear">lfrtip',
    });*/
    
});

//FUNCION QUE PERMITE EDITAR UNA CONSULTA MEDICA (Sin Realizar)
function editar_consulta_med(){
    
    return true;
}

//FUNCION QUE PERMITE VER INFORMACION DE UNA CONSULTA MEDICA (Sin Realizar)
function ver_info_consulta_med(){
    
    return true;
}

//FUNCION QUE PERMITE ELIMINAR UNA CONSULTA MEDICA
function eliminar_consulta_med(id_consulta_medica){
    
    var baseURL = $('body').data('baseurl');//url base
    
    swal({   
        title: "¿Estas seguro de eliminar consulta médica n° "+id_consulta_medica+"?",   
        text: "Recuerda que... sera eliminado!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, eliminalo!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false 
    }, 
    function(){
        
        //Iniciar peticion con ajax
        $.ajax({
            data: {"id_consulta_med" : id_consulta_medica},
            type: "POST",
            //dataType: "json",
            url: baseURL+"ficha_medica/eliminarConsultaMed"
        })
       .done(function(data,textStatus,jqXHR ) {         
            
            if(data === "success"){//La solicitud se realizo correctamente
                
               //Consulta medica eliminada correctamente 
               swal({ 
                    title: "Consulta Médica eliminada!",
                    text:  "consulta médica n° "+id_consulta_medica+" fue eliminada correctamente.",
                    type:  "success" 
                },
                function(){
                    //recargar tabla de consultas medicas
                    listado_consultas_medicas();
                });
                
            }else{
                
                swal({ 
                    title: "Ha ocurrido un error",
                    text:  "Por favor intente nuevamente",
                    type:  "error" 
                });
                
                return false;
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {

            if(textStatus === "error") {//La solicitud a fallado
                alert("Error: "+textStatus+" "+jqXHR);
                console.log("La solicitud a fallado: " +  textStatus);
                console.log(textStatus+" "+jqXHR);
                
                swal({ 
                    title: "Error: "+textStatus+" "+jqXHR,
                    text:  "",
                    type:  "error" 
                });
            }
        });
    });
    
    return false;
}

//FUNCION QUE PERMITE CARGAR TABLA DE PACIENTES
function listado_consultas_medicas(){
    
    var id_paciente = $("#id_paciente").val();
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#consultas_medicas').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"ficha_medica/listado_consultas_med/"+id_paciente,//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "id_consulta"},
            { "data": "fecha" },
            { "data": "motivo_consulta" },
            { "data": "anamnesis_proxima" },
            { "data": "acciones"}
        ],
        columnDefs: [
            { type: 'date-eu', //ordena fecha
              targets: 0
            }
        ],
        order: [[ 0, "desc" ]],//orden by por fecha de creacion
        "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
            }
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        responsive: false,//tabla responsive, agrega un boton
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": baseURL+"swf/copy_csv_xls_pdf.swf",//archivos necesario para que funcione
            "aButtons": [ //botones que sirven para exportar informacion de la tabla
                {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                },
                {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                },
                {
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }                
            ]
        }
    });
}




//Funciones de referencias (ojo)

//FUNCION QUE PERMITE MOSTRAR UN MODAL CON LA INFORMACION DE UN PACIENTE
function ver_datos_paciente(id_paciente){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#datos_paciente').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando...');
    
    $.ajax({
        data: {"id_paciente" : id_paciente},
        type: "POST",
        dataType: "json",
        url: baseURL+"paciente_admin/dataPaciente"
    })
    .done(function(data,textStatus,jqXHR ) {         
        
        if(textStatus === "success"){//La solicitud se realizo correctamente
            
            var nombre  =   data.primer_nombre+' '+data.segundo_nombre+' '+
                            data.apellido_paterno+' '+data.apellido_materno;
            
            var personas_contacto = Object.keys(data.personas_contacto).length;
            
            var html_personas_contacto = "";//personas de contacto
            
            //crear html de las personas de contacto
            for (i = 0; i < personas_contacto; i++) { 

               html_personas_contacto += '<tr>'+
               '<td>'+data.personas_contacto[i].nombres+'</td>'+
               '<td>'+data.personas_contacto[i].apellidos+'</td>'+
               '<td>'+data.personas_contacto[i].correo+'</td>'+
               '<td>'+data.personas_contacto[i].parentesco+'</td>'+
               '</tr>';
           }
            
            var modal = '<div class="row">'+
                '<div class="col-xs-12 col-md-3">'+
                  '<a href="#" class="thumbnail">'+
                    '<img src="'+baseURL+'img/sin-foto.png" alt="...">'+
                  '</a>'+
                '</div>'+
                '<div class="col-xs-12 col-md-9">'+
                    '<p><strong>R.U.T:</strong> '+data.rut+'</p>'+
                    '<p><strong>Nombre:</strong> '+nombre+'</p>'+    
                    '<p><strong>Genero:</strong> '+data.genero+'</p>'+
                    '<p><strong>Edad:</strong> '+data.edad+'</p>'+
                '</div>'+
            '</div>'+
            '<div id="accordion" class="panel-group">'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h5 class="panel-title">'+
                            '<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" class="collapsed">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Datos de Identificación'+
                            '</a>'+
                        '</h5>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<div class="table-responsive">'+
                                '<table class="table table-striped">'+
                                     '<tbody>'+
                                        '<tr>'+
                                           '<td><strong>Correo:</strong></td>'+
                                           '<td>'+data.email+'</td> '+
                                           '<td><strong>Estado Civil:</strong></td>'+
                                           '<td>'+data.estado_civil+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Telefono fijo:</strong></td>'+
                                           '<td>'+data.telefono+'</td>'+
                                           '<td><strong>Celular:</strong></td>'+
                                           '<td>'+data.celular+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Religión:</strong></td>'+
                                           '<td>'+data.religion+'</td>'+
                                           '<td><strong>Previsión méd.:</strong></td>'+
                                           '<td>'+data.prevision+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>País de res.:</strong></td>'+
                                           '<td>'+data.nacionalidad+'</td>'+
                                           '<td></td>'+
                                           '<td></td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>N. de estudio:</strong></td>'+
                                            '<td colspan="3">'+data.nivel_estudio+'</td>'+
                                        '</tr>'+
                                       '<tr>'+
                                            '<td><strong>Fecha Nac.:</strong></td>'+
                                            '<td>'+data.fecha_nac+'</td>'+
                                            '<td><strong></strong></td>'+
                                            '<td></td>'+
                                        '</tr> '+
                                        '<tr>'+
                                            '<td><strong>Lugar de Nac.:</strong></td>'+
                                            '<td colspan="3">'+data.lugar_nac+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Ocupación:</strong></td>'+
                                            '<td colspan="3">'+data.ocupacion+'</td>'+
                                        '</tr>'+
                                     '</tbody>'+
                                 '</table>'+
                             '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Datos de Residencia Actual'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseTwo" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<div class="table-responsive">´'+
                                '<table class="table table-striped">'+
                                    '<tbody>'+
                                        '<tr>'+
                                            '<td><strong>Región:</strong></td>'+
                                            '<td colspan="3">'+data.region+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Provincia:</strong></td>'+
                                            '<td colspan="3">'+data.provincia+'</td>'+
                                        '</tr>'+
                                       '<tr>'+
                                            '<td><strong>Comuna:</strong></td>'+
                                            '<td colspan="3">'+data.comuna+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Calle/pasaje/villa:</strong></td>'+
                                            '<td colspan="3">'+data.calle+'</td>'+
                                        '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                   '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Gr. Sanguineo/ F. RH'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseThree" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                                '<div class="table-responsive">'+
                                '<table class="table table-striped">'+
                                    '<tbody>'+
                                        '<tr>'+
                                           '<td><strong>Grupo Sanguíneo:</strong></td>'+
                                           '<td>'+data.grupo_sang+'</td>'+
                                           '<td><strong>Factor RH:</strong></td>'+
                                           '<td>'+data.factor_rh+'</td>'+
                                        '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h4 class="panel-title">'+
                            '<a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">'+
                                '<i class="fa fa-plus-circle"></i>&nbsp;Personas de Contacto'+
                            '</a>'+
                        '</h4>'+
                    '</div>'+
                    '<div class="panel-collapse collapse" id="collapseFour" aria-expanded="false" style="height: 0px;">'+
                        '<div class="panel-body">'+
                            '<table class="table table-striped">'+
                                '<thead>'+
                                  '<tr>'+
                                    '<th>Nombres</th>'+
                                    '<th>Apellidos</th>'+
                                    '<th>Email</th>'+
                                    '<th>Parentesco</th>'+
                                  '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                html_personas_contacto+
                                '</tbody>'+
                              '</table>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
                        
            $('#datos_paciente').html(modal);  
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
         
        if(textStatus === "error") {//La solicitud a fallado
            
            console.log( "La solicitud a fallado: " +  textStatus);
            console.log(textStatus+" "+jqXHR);
        }
    });
}

//FUNCION QUE PERMITE ELIMINAR UN PACIENTE
function eliminar_paciente(id_paciente,nombre,rut){
    
    var baseURL = $('body').data('baseurl');//url base
    
    swal({   
        title: "¿Estas seguro de eliminar al paciente "+nombre+" R.U.T. "+rut+"?",   
        text: "Recuerda que todo su historial médico sera eliminado!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, eliminalo!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false 
    }, 
    function(){
        
        //Iniciar peticion con ajax
        $.ajax({
            data: {"id_paciente" : id_paciente},
            type: "POST",
            dataType: "json",
            url: baseURL+"paciente_admin/eliminarPaciente"
        })
       .done(function(data,textStatus,jqXHR ) {         

            if(textStatus === "success"){//La solicitud se realizo correctamente
                
               //Paciente eliminado correctamente 
               swal({ 
                    title: "Paciente eliminado!",
                    text:  "Historia medica del paciente fue eliminada correctamente.",
                    type:  "success" 
                },
                function(){
                    //recargar tabla de pacientes
                    listado_pacientes();
                });
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {

            if(textStatus === "error") {//La solicitud a fallado
                alert("Error: "+textStatus+" "+jqXHR);
                console.log("La solicitud a fallado: " +  textStatus);
                console.log(textStatus+" "+jqXHR);
            }
        });
    });
    
    return false;
    
}

//FUNCION QUE PERMITE VISUALIZAR DETALLE DE LA HISTORIA MEDICA DE UN PACIENTE
function ver_HC(id_paciente){
    
    var baseURL = $('body').data('baseurl');//url base
    var url = baseURL+"ficha_medica/ver_detalle/"+id_paciente;    
    $(location).attr('href',url);

}

