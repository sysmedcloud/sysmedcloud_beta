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
    
    $('#datos_paciente').html('<i class="fa fa-spinner fa-spin fa-5x"></i> Cargando...');
    
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
            
            var modal = '<div class="row">'+
                '<div class="col-xs-12 col-md-3">'+
                  '<a href="#" class="thumbnail">'+
                    '<img src="'+baseURL+'img/1.jpg" alt="...">'+
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
                                           '<td>Soltero(a)</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Telefono fijo:</strong></td>'+
                                           '<td>'+data.telefono+'</td>'+
                                           '<td><strong>Celular:</strong></td>'+
                                           '<td>'+data.celular+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>Religión:</strong></td>'+
                                           '<td>Catolicismo</td>'+
                                           '<td><strong>Previsión méd.:</strong></td>'+
                                           '<td>Consalud</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                           '<td><strong>País de res.:</strong></td>'+
                                           '<td>Chile</td>'+
                                           '<td><strong>N. de estudio:</strong></td>'+
                                           '<td>Profesional</td>'+
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
                                            '<td colspan="3">Ingenieria en informatica mencion redes</td>'+
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
                                            '<td colspan="3">Región del libertador Gral. Bernardo Ohiggins</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Provincia:</strong></td>'+
                                            '<td colspan="3">cachapoal</td>'+
                                        '</tr>'+
                                       '<tr>'+
                                            '<td><strong>Comuna:</strong></td>'+
                                            '<td colspan="3">Teodoro Schmidt</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td><strong>Calle/pasaje/villa:</strong></td>'+
                                            '<td colspan="3">Ingenieria en informatica mencion redes</td>'+
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
                                           '<td>AB</td>'+
                                           '<td><strong>Factor RH:</strong></td>'+
                                           '<td>Positivo</td>'+
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
                            '<h1>EN CONSTRUCCION...</h1>'+
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
function eliminar_paciente(){

    
}

