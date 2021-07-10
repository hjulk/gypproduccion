$(document).ready(function () {
    $('#notificaciones').DataTable(
      {
        "responsive": true,
        "autoWidth": false,
        "rowReorder": false,
        "paging": true,
        "iDisplayLength": 15,
        "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
        "language": {
          processing: "Procesando...",
          search: "Buscar:",
          lengthMenu: "Mostrar _MENU_ registros.",
          info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          infoEmpty: "Mostrando registros del 0 al 0 de 0 registros",
          infoFiltered: "(filtrado de un total de _MAX_ registros)",
          infoPostFix: "",
          loadingRecords: "Cargando...",
          zeroRecords: "No se encontraron resultados",
          emptyTable: "Ningún dato disponible en esta tabla",
          row: "Registro",
          export: "Exportar",
          paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "Ultimo"
          },
          aria: {
            sortAscending: ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
          },
          select: {
            row: "registro",
            selected: "seleccionado"
          }
        }
      }
    );
  });