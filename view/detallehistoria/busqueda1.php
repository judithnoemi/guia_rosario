<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable con Búsqueda</title>
    <!-- Agrega las referencias a los archivos CSS y JS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>

<!-- Agrega el campo de entrada de búsqueda -->
<input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar en la tabla">

<!-- Agrega la tabla con el ID multi-filter-select -->
<table id="multi-filter-select">
    <thead>
        <tr>
            <th>Columna 1</th>
            <th>Columna 2</th>
            <!-- Agrega más columnas según sea necesario -->
        </tr>
    </thead>
    <tbody>
        <!-- Datos de la tabla -->
    </tbody>
</table>

<!-- Agrega el script JavaScript para inicializar DataTables y la lógica de búsqueda -->
<script>
    $(document).ready(function() {
        var table = $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;

                    // Agrega un campo de búsqueda en la parte superior de cada columna
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    // Agrega el campo de búsqueda a la parte superior de la columna
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });

                    // Agrega un campo de entrada para la búsqueda de texto
                    var input = $('<input type="text" class="form-control" placeholder="Buscar"/>')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change', function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? val : '', true, false)
                                .draw();
                        });
                });
            }
        });

        // Agrega la lógica de búsqueda al campo de entrada general
        $('#inputBusqueda').on('keyup change', function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            table.search(val ? val : '', true, false).draw();
        });
    });
</script>

</body>
</html>
