$(document).ready(function() {
    var dataTable = $('#multi-filter-select').DataTable({
        "pageLength": 5,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "tu_script_servidor.php", // Cambia esto al archivo de servidor que manejará las solicitudes AJAX
            "type": "POST"
        },
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>');
                });

                var input = $('<input type="text" class="form-control" placeholder="Buscar"/>')
                    .appendTo($(column.footer()).empty())
                    .on('keyup change', function() {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? val : '', true, false).draw();
                    });
            });
        }
    });
});
