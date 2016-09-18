//AL MOMENTO DE CARGAR LA PAGINA CARGA ESTO
$(document).ready(function() {
    var url = window.location.pathname.split("/");
    if(!url[3]){
        //CARGA TABLA DE PACIENTES
        listado_consultas_medicas_user();        
    }else{
        $('#div_cm').hide();
        $('#div_bto_cm').hide();
    }

    
});


//FUNCION QUE PERMITE CARGAR TABLA DE PACIENTES
function listado_consultas_medicas_user(){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#listado_consultas_medicas').dataTable({
        "destroy": true,//Variable que permite volver a cargar el ajax (tabla)
        "ajax": {
            "url": baseURL+"consulta_medica/consultas_med_json/",
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "id_consulta"},
            { "data": "fecha" },
            { "data": "rut" },
            { "data": "paciente" },
            { "data": "motivo_consulta" },
            /*{ "data": "anamnesis_proxima" },*/
            { "data": "acciones"}
        ],
        /*columnDefs: [
            { type: 'date-eu', //ordena fecha
              targets: 0
            }
        ],*/
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
                    listado_consultas_medicas_user();
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

function buscar_paciente(){
    
    var baseURL = $('body').data('baseurl');//url base
    
    var rut_paciente = $('#rut').val();
    
    if(rut_paciente === ""){

        swal({   
            title:"Ingrese rut del paciente",   
            text:"",   
            type: "info",   
            showCancelButton: true,  
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ok",   
            cancelButtonText: "Cerrar",   
            closeOnConfirm: true,   
            closeOnCancel: true 
        });
        
        limpiar_campos();
        
        return false;
    }

    $.ajax({
        data        : {"rut" : rut_paciente},
        type        : "POST",
        dataType    : "json",
        url         : baseURL+"paciente_admin/nombre_y_id_del_paciente"
    })
    .done(function(data,textStatus,jqXHR ) {         
        
        if(textStatus === "success"){//La solicitud se realizo correctamente

            var id_paciente = data.id_paciente;

            if(id_paciente !== "" && id_paciente > 0){   

                //Cambiamos valores a nuestros input
                $("#id_paciente").val(id_paciente);

                if(data.primer_nombre === "No informado"){
                    var nombres = "";
                    var apellidos = "";
                }else{
                    var nombres     = data.primer_nombre+" "+data.segundo_nombre;
                    var apellidos   = data.apellido_paterno+" "+data.apellido_materno;
                }

                $("#nombre_paciente").html(nombres+" "+apellidos);
                $("#rut_paciente").html(data.rut);
                $("#fecha_nac_paciente").html(data.fecha_nac);
                $("#nacionalidad_paciente").html(data.nacionalidad);
                $("#est_civil_paciente").html(data.estado_civil);
                $("#div_cm").show(1000);
                $("#div_bto_cm").show(1000);



            }else{


                //alert("Paciente con rut "+rut_paciente+" no existe en el sistema.");
                swal({   
                    title:"Paciente con rut "+rut_paciente+" no existe en el sistema",   
                    text:"Puedes crear un nuevo paciente desde el modulo pacientes/crear paciente",   
                    type: "warning",   
                    showCancelButton: true,  
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Crear nuevo paciente",   
                    cancelButtonText: "Cerrar",   
                    closeOnConfirm: false,   
                    closeOnCancel: true 
                }, 
                function(isConfirm){   
                    if (isConfirm) {     
                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        var url = baseURL+"paciente_admin/RegistrarPaciente";    
                        $(location).attr('href',url);
                    }
                });

                //$("#paciente").val("Paciente no existe en el sistema"); 
                limpiar_campos();
                return false;
            }
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {

        if(textStatus === "error") {//La solicitud a fallado

            console.log( "La solicitud a fallado: " +  textStatus);
            console.log(textStatus+" "+jqXHR);
        }
    });
}

function limpiar_campos(){
    
    $('#id_paciente').val('');
    $("#nombre_paciente").html('');
    $("#rut_paciente").html('');
    $("#fecha_nac_paciente").html('');
    $("#nacionalidad_paciente").html('');
    $("#est_civil_paciente").html('');
    
    return false;
}

// Archivos Revision por sistemas
$('#endo_img').click(function(){
    
    var documento = document.getElementById("endo_upload_img");
    var file = documento.files[0];
    var datos = new FormData();
    datos.append('rv_archivo', file);
    datos.append('id_paciente', $('#id_paciente').val());
    datos.append('id_consulta', $('#id_cita_med').val())
    $.ajax({
        url:'http://' + window.location.host + '/sysmedcloud/consulta_medica/rv_archivos_documentos/',
        type:'POST',
        contentType:false,
        data: datos,
        dataType: 'json',
        processData:false,
        cache:false,
        success: function(result){          
            if(result.estado == 'true'){
                $("#list_rv_archivos ul").append('<li>'+ result.nom_archivo +' <a href="#" title="Ver Información" onclick="ver_rv_imagen(\'' + result.nom_archivo + '\');" data-toggle="modal" data-target="#myModa1"><i class="fa fa-eye"></i></a></li>');                
                swal("Éxito", "Archivo subido exitósamente al sistema", "success")
            }else{
                sweetAlert("Error", "Asegúrese de seleccionar un archivo", "error");
            }            
        }        
    });
});

function ver_rv_imagen( nom_archivo ){
    var src = 'http://' + window.location.host + '/sysmedcloud/img/rv_archivos/';
    $('#nom_rv_archivo').text(nom_archivo);
    $('#img_rv_arcivo').attr('src', src + nom_archivo);        
}

// Archivos Examen fisico
$('#ef_img').click(function(){
    
    var documento = document.getElementById("ef_upload_img");
    var file = documento.files[0];
    var datos = new FormData();
    datos.append('ef_archivo', file);
    datos.append('id_paciente', $('#id_paciente').val());
    datos.append('id_consulta', $('#id_cita_med').val())
    $.ajax({
        url:'http://' + window.location.host + '/sysmedcloud/consulta_medica/ef_archivos_documentos/',
        type:'POST',
        contentType:false,
        data: datos,
        dataType: 'json',
        processData:false,
        cache:false,
        success: function(result){          
            if(result.estado == 'true'){
                $("#list_ef_archivos ul").append('<li>'+ result.nom_archivo +' <a href="#" title="Ver Información" onclick="ver_ef_imagen(\'' + result.nom_archivo + '\');" data-toggle="modal" data-target="#myModa2"><i class="fa fa-eye"></i></a></li>');                
                swal("Éxito", "Archivo subido exitósamente al sistema", "success")
            }else{
                sweetAlert("Error", "Asegúrese de seleccionar un archivo", "error");
            }            
        }        
    });
});

function ver_ef_imagen( nom_archivo ){
    var src = 'http://' + window.location.host + '/sysmedcloud/img/ef_archivos/';
    $('#nom_ef_archivo').text(nom_archivo);
    $('#img_ef_arcivo').attr('src', src + nom_archivo);        
}