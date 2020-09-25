 $(document).ready(function() {    
    $('#example').DataTable({

    //para cambiar el lenguaje a español
        scrollX: false,
        scrollCollapse: true,
        filter: true,
        iDisplayLength: 10,
        "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Búsqueda rápida:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: '<"row"<"col-md-11"><"col-md-1" B>><"row"<"col-md-6" l><"col-md-6" f>>t<"row"<"col-md-6" i><"col-md-6" p>>',   //lftBip    
        buttons:[ 
            {
                extend:    'csv',
                text:      'CSV ',
                titleAttr: 'Exportar a CSV',
                className: 'btn btn-success',
            },
        ]   
    });     
});