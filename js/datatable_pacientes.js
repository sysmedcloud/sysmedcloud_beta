$(document).ready(function() {
    
    var baseURL = $('body').data('baseurl');//url base
    
    $('#pacientes').dataTable({
        "ajax": {
            "url": baseURL+"paciente_admin/pacientes_json",//data
            "dataSrc": ""
        },
        "columns": [ //columnas de nuestra tabla
            { "data": "fecha_creacion" },
            { "data": "rut" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "edad" },
            { "data": "celular" },
            { "data": "email"},
            { "data": "editar"},
            { "data": "view"},
            { "data": "delete"}
        ],
        columnDefs: [
            { type: 'date-eu', //ordena fecha
              targets: 0
            }
        ],
        order: [[ 0, "desc" ]],//orden by por fecha de creacion
        responsive: true,//tabla responsive, agrega un boton
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
    
});
//funcion que permiter ordenar nuestra tabla por fecha
jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-eu-pre": function ( date ) {
        date = date.replace(" ", "");
        var eu_date, year;

        if (date == '') {
            return 0;
        }

        if (date.indexOf('.') > 0) {
            /*date a, format dd.mn.(yyyy) ; (year is optional)*/
            eu_date = date.split('.');
        } else {
            /*date a, format dd/mn/(yyyy) ; (year is optional)*/
            eu_date = date.split('/');
        }

        /*year (optional)*/
        if (eu_date[2]) {
            year = eu_date[2];
        } else {
            year = 0;
        }

        /*month*/
        var month = eu_date[1];
        if (month.length == 1) {
            month = 0+month;
        }

        /*day*/
        var day = eu_date[0];
        if (day.length == 1) {
            day = 0+day;
        }

        return (year + month + day) * 1;
    },

    "date-eu-asc": function ( a, b ) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },

    "date-eu-desc": function ( a, b ) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
} );


function ver_datos_paciente(id_paciente){
    
    var baseURL = $('body').data('baseurl');//url base
    
    $.ajax({
        data: {"id_paciente" : id_paciente},
        type: "POST",
        dataType: "json",
        url: baseURL+"paciente_admin/dataPaciente",
    })
   .done(function(data,textStatus,jqXHR ) {         
        
        if(textStatus === "success"){//La solicitud se realizo correctamente
            
            var nombre  =   data.primer_nombre+' '+data.segundo_nombre+' '+
                            data.apellido_paterno+' '+data.apellido_materno;
            
            var info_personal = '<p><strong>R.U.T:</strong> '+data.rut+'</p>'+
                                '<p><strong>Nombre:</strong> '+nombre+'</p>'+    
                                '<p><strong>Genero:</strong> '+data.genero+'</p>'+
                                '<p><strong>Edad:</strong> '+data.edad+'</p>';
                        
            $('#datos_personales').html(info_personal);  
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
function eliminar_paciente(){

    
}

