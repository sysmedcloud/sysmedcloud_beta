$(document).ready(function() {
    
    var baseURL = $('body').data('baseurl');
    
    $('#pacientes').dataTable({
        responsive: true,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": baseURL+"swf/copy_csv_xls_pdf.swf"
        }
    });
});

