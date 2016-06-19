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
        
        console.log(data);
        
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