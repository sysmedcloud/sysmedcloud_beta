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

$(document).ready(function() {
    
    var baseURL = $('body').data('baseurl');
    
    $('#pacientes').dataTable({
        "ajax": {
            "url": baseURL+"paciente_admin/pacientes_json",
            "dataSrc": ""
        },
        "columns": [
            //{ "data": "id_usuario" },
            { "data": "fecha_creacion" },
            { "data": "rut" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "edad" },
            { "data": "celular" },
            { "data": "email"},
            { "data": "acciones"},
        ],
        columnDefs: [
               { type: 'date-eu', 
                 targets: 0
               }
           ],
        order: [[ 0, "desc" ]],
        responsive: true,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": baseURL+"swf/copy_csv_xls_pdf.swf"
        }
    });
});

//FUNCION QUE PERMITE ELIMINAR UN PACIENTE
function eliminar_paciente(){

    
}

