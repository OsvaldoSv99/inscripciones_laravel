/**datatable js*/

$(document).ready(function() {
    $('#tabla').DataTable(
        {
        "autoWidth": false,
        "language": {
            
            "info": "<span class='paginacion font-normal'>Mostrando _TOTAL_ entradas</span>",
            "search": "Buscar",
            "paginate": {
                "previous": "<span class='navegacion'><</span>",
                "next":"<span class='navegacion'>></span>",
            },
            "lengthMenu": 'Mostrar <select style="background:white">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmty": "",
            "infoFiltered": ""
        }
    }
);
});