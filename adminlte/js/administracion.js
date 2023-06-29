$(document).ready(function () {

    $('#notificacionesDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -2 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Solicitud ';
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        lengthChange: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        paging: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#contactenosDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -2 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Solicitud ';
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'tabledisplay table dt-responsive nowrap'
                })
            }
        },
        lengthChange: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        paging: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#hojasVidaDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Solicitud ';
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        lengthChange: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        paging: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#roles').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#dependencias').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#usuarios').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
    });

    $('#notificacionesAviso').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        rowReorder: false,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        order: [[01, "asc"]],
        language: {
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
    });

    $('#consultaNotificacionesAviso').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Notificación ' + data[0];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        lengthChange: false,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }],

    });

    $('#btnConsultaNotificaciones').click(function () {

        var FechaInicio = $("#fechaInicio").val();
        var FechaFin = $("#fechaFin").val();
        var tipo = 'post';

        $.ajax({
            type: "post",
            url: "consultaNotificacion",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { _method: tipo, fechaInicio: FechaInicio, fechaFin: FechaFin },
            success: function (data) {
                var valido = data['valido'];
                var errores = data['errors'];
                if (valido === 'true') {
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#consultaNotificacionesAviso').DataTable().destroy();
                    $('#consultaNotificacionesAviso').DataTable({
                        data: Resultado,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                }),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        columnDefs: [
                            { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 2, targets: -1 }],
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false,
                        processing: true,
                        rowReorder: false,
                        order: [[1, "asc"]],
                        columns: [
                            { "data": "ID_NOTIFICACION" },
                            { "data": "NOMBRE_CIUDADANO" },
                            { "data": "PLACA" },
                            { "data": "YEAR_NOTIFICATION" },
                            { "data": "ESTADO" },
                            { "data": "FECHA_CREACION" },
                            { "data": "FECHA_MODIFICACION" },
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: [
                                    'copy',
                                    'excel',
                                    'csv',
                                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                                    {
                                        extend: 'print',
                                        customize: function (win) {
                                            $(win.document.body)
                                                .css('font-size', '10pt');

                                            $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                        }
                                    }
                                ]
                            }],
                        language: {
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
                    });
                } else {
                    $.each(errores, function (key, value) {
                        if (value) {
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            },

        });
    });

    $('#desfijaciones').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Desfijacion ' + data[0];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        rowReorder: false,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        order: [[01, "asc"]],
        language: {
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
    });

    $('#consultaDesfijaciones').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalle Desfijacion ' + data[0];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        lengthChange: false,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }],

    });

    $('#btnConsultaDesfijaciones').click(function () {

        var FechaInicio = $("#fechaInicio").val();
        var FechaFin = $("#fechaFin").val();
        var tipo = 'post';

        $.ajax({
            type: "post",
            url: "consultaDesfijacion",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { _method: tipo, fechaInicio: FechaInicio, fechaFin: FechaFin },
            success: function (data) {
                var valido = data['valido'];
                var errores = data['errors'];
                if (valido === 'true') {
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#consultaDesfijaciones').DataTable().destroy();
                    $('#consultaDesfijaciones').DataTable({
                        data: Resultado,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                }),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        columnDefs: [
                            { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 2, targets: -1 }],
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false,
                        processing: true,
                        rowReorder: false,
                        order: [[1, "asc"]],
                        columns: [
                            { "data": "ID_DESFIJACION" },
                            { "data": "CONTENIDO" },
                            { "data": "ESTADO" },
                            { "data": "FECHA_CREACION" },
                            { "data": "FECHA_MODIFICACION" },
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: [
                                    'copy',
                                    'excel',
                                    'csv',
                                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                                    {
                                        extend: 'print',
                                        customize: function (win) {
                                            $(win.document.body)
                                                .css('font-size', '10pt');

                                            $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                        }
                                    }
                                ]
                            }],
                        language: {
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
                    });
                } else {
                    $.each(errores, function (key, value) {
                        if (value) {
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            },

        });
    });

    $('#reporteContacto').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }]
    });

    $('#btnConsultaContacto').click(function () {

        var FechaInicio = $("#fechaInicio").val();
        var FechaFin = $("#fechaFin").val();
        var tipo = 'post';

        $.ajax({
            type: "post",
            url: "consultaContacto",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { _method: tipo, fechaInicio: FechaInicio, fechaFin: FechaFin },
            success: function (data) {
                var valido = data['valido'];
                var errores = data['errors'];
                if (valido === 'true') {
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#reporteContacto').DataTable().destroy();
                    $('#reporteContacto').DataTable({
                        data: Resultado,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                }),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        columnDefs: [
                            { responsivePriority: 1, targets: 1 },
                            { responsivePriority: 2, targets: -1 }],
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false,
                        processing: true,
                        rowReorder: false,
                        aoColumnDefs: [
                            { "sWidth": "10%", "aTargets": [3] }
                        ],
                        order: [[1, "asc"]],
                        columns: [
                            { "data": "ID_CONTACTO" },
                            { "data": "NOMBRE_CIUDADANO" },
                            { "data": "CORREO" },
                            { "data": "MENSAJE" },
                            { "data": "FECHA_CREACION" }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: [
                                    'copy',
                                    'excel',
                                    'csv',
                                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                                    {
                                        extend: 'print',
                                        customize: function (win) {
                                            $(win.document.body)
                                                .css('font-size', '10pt');

                                            $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                        }
                                    }
                                ]
                            }],
                        language: {
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
                    });
                } else {
                    $.each(errores, function (key, value) {
                        if (value) {
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            }
        });
    });

    $('#reporteHojaVida').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }]
    });

    $('#btnConsultaHojaVida').click(function () {

        var FechaInicio = $("#fechaInicio").val();
        var FechaFin = $("#fechaFin").val();
        var tipo = 'post';

        $.ajax({
            type: "post",
            url: "consultaHojaVida",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { _method: tipo, fechaInicio: FechaInicio, fechaFin: FechaFin },
            success: function (data) {
                var valido = data['valido'];
                var errores = data['errors'];
                if (valido === 'true') {
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#reporteHojaVida').DataTable().destroy();
                    $('#reporteHojaVida').DataTable({
                        data: Resultado,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                }),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        columnDefs: [
                            { responsivePriority: 1, targets: 1 },
                            { responsivePriority: 2, targets: -1 }],
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false,
                        processing: true,
                        rowReorder: false,
                        aoColumnDefs: [
                            { "sWidth": "10%", "aTargets": [3] }
                        ],
                        order: [[1, "asc"]],
                        columns: [
                            { "data": "ID_TRABAJO" },
                            { "data": "NOMBRE_CIUDADANO" },
                            { "data": "ID_DOCUMENTO" },
                            { "data": "IDENTIFICACION" },
                            { "data": "DIRECCION" },
                            { "data": "CORREO" },
                            { "data": "TELEFONO" },
                            { "data": "PROFESION" },
                            { "data": "DOCUMENTO" },
                            { "data": "FECHA_CREACION" }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: [
                                    'copy',
                                    'excel',
                                    'csv',
                                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                                    {
                                        extend: 'print',
                                        customize: function (win) {
                                            $(win.document.body)
                                                .css('font-size', '10pt');

                                            $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                        }
                                    }
                                ]
                            }],
                        language: {
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
                    });
                } else {
                    $.each(errores, function (key, value) {
                        if (value) {
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            }
        });
    });

    $('#reporteVisitas').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[0, "desc"]],
        language: {
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
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            }]
    });

    $('#btnConsultaVisitas').click(function () {

        var FechaInicio = $("#fechaInicio").val();
        var FechaFin = $("#fechaFin").val();
        var tipo = 'post';

        $.ajax({
            type: "post",
            url: "consultaVisitas",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { _method: tipo, fechaInicio: FechaInicio, fechaFin: FechaFin },
            success: function (data) {
                var valido = data['valido'];
                var errores = data['errors'];
                if (valido === 'true') {
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#reporteVisitas').DataTable().destroy();
                    $('#reporteVisitas').DataTable({
                        data: Resultado,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                }),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        columnDefs: [
                            { responsivePriority: 1, targets: 1 },
                            { responsivePriority: 2, targets: -1 }],
                        lengthChange: false,
                        searching: true,
                        ordering: true,
                        info: true,
                        autoWidth: false,
                        processing: true,
                        rowReorder: false,
                        aoColumnDefs: [
                            { "sWidth": "10%", "aTargets": [3] }
                        ],
                        order: [[1, "asc"]],
                        columns: [
                            { "data": "ID_VISITA" },
                            { "data": "IP" },
                            { "data": "PAGINA" },
                            { "data": "FECHA" }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'collection',
                                text: 'Exportar',
                                buttons: [
                                    'copy',
                                    'excel',
                                    'csv',
                                    { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' },
                                    {
                                        extend: 'print',
                                        customize: function (win) {
                                            $(win.document.body)
                                                .css('font-size', '10pt');

                                            $(win.document.body).find('table')
                                                .addClass('compact')
                                                .css('font-size', 'inherit');
                                        }
                                    }
                                ]
                            }],
                        language: {
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
                    });
                } else {
                    $.each(errores, function (key, value) {
                        if (value) {
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            }
        });
    });

    $('#pagina').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[1, "asc"]],
        language: {
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
    });

    $('#subpagina').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[1, "asc"]],
        language: {
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
    });

    $('#imagenes').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[1, "asc"]],
        language: {
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
    });

    $('#tipoDocumentos').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[1, "asc"]],
        language: {
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
    });

    $('#tipoGruas').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: false,
        autoWidth: false,
        rowReorder: false,
        order: [[1, "asc"]],
        language: {
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
    });

});

function obtener_datos_dependencia(id) {
    var Nombre = $("#nombre_dependencia" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idD_upd").val(id);
    $("#mod_nombre_dependencia").val(Nombre);
    $("#mod_estado").val(Estado);
}

function obtener_datos_rol(id) {
    var Nombre = $("#nombre_rol" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idR_upd").val(id);
    $("#mod_nombre_rol").val(Nombre);
    $("#mod_estado").val(Estado);
}

function obtener_datos_usuario(id) {
    var Nombre = $("#nombre_usuario" + id).val();
    var Correo = $("#correo" + id).val();
    var Usuario = $("#username" + id).val();
    var Rol = $("#id_rol" + id).val();
    var Dependencia = $("#id_dependencia" + id).val();
    var Administrador = $("#id_administrador" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idUser_upd").val(id);
    $("#mod_nombre_usuario").val(Nombre);
    $("#mod_correo").val(Correo);
    $("#mod_username").val(Usuario);
    $("#mod_id_rol").val(Rol);
    $("#mod_id_dependencia").val(Dependencia);
    $("#mod_administrador").val(Administrador);
    $("#mod_estado").val(Estado);
}

function mostrarContrasena() {
    var tipo = document.getElementById("password");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarContrasenaUpd() {
    var tipo = document.getElementById("mod_password");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

$('#form-notificacion').submit(function () {
    var fileInputP = document.getElementById('notificationfile');
    var Procedimientos = fileInputP.value;
    if (Procedimientos) {
        var fileSize = $('#notificationfile')[0].files[0].size;
        var sizekiloBytes = parseInt(fileSize / 1024);
        if (sizekiloBytes > $('#notificationfile').attr('size')) {
            alert('El tamaño supera el limite permitido de 2mb');
            return false;
        }
    }
});

$('#form-documento').submit(function () {
    var fileInputP = document.getElementById('documento');
    var Procedimientos = fileInputP.value;
    if (Procedimientos) {
        var fileSize = $('#documento')[0].files[0].size;
        var sizekiloBytes = parseInt(fileSize / 1024);
        if (sizekiloBytes > $('#documento').attr('size')) {
            alert('El tamaño supera el limite permitido de 2mb');
            return false;
        }
    }
});

$('#form-documento-upd').submit(function () {
    var fileInputP = document.getElementById('documento_upd');
    var Procedimientos = fileInputP.value;
    if (Procedimientos) {
        var fileSize = $('#documento_upd')[0].files[0].size;
        var sizekiloBytes = parseInt(fileSize / 1024);
        if (sizekiloBytes > $('#documento').attr('size')) {
            alert('El tamaño supera el limite permitido de 2mb');
            return false;
        }
    }
});

function soloNumero(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function check(e) {
    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toLowerCase();

    letras = "abcdefghijklmnñopqrstuvwxyz0123456789";

    especiales = "8-37-38-46-164-46";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }

    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}

function obtener_datos_notificacion(id) {
    var NombreCiudadano = $("#nombre_ciudadano" + id).val();
    var Placa = $("#placa" + id).val();
    var Year = $("#year" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idNotificacion_upd").val(id);
    $("#mod_nombre_ciudadano").val(NombreCiudadano);
    $("#mod_placa").val(Placa);
    $("#mod_year_notification").val(Year);
    $("#mod_estado").val(Estado);
}

function obtener_datos_documento(id) {
    var NombreDocumento = $("#nombre_documento" + id).val();
    var TipoDocumento = $("#tipo_documento" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var NombreTipoDocumento = $("#nombre_tipo_documento" + id).val();

    $("#idDocumento_upd").val(id);
    $("#mod_nombre_documento").val(NombreDocumento);
    $("#mod_tipo_documento").val(TipoDocumento);
    $("#mod_nombre_tipo_documento").val(NombreTipoDocumento);
    $("#mod_estado").val(Estado);
}

function obtener_datos_pagina(id) {
    var NombrePagina = $("#nombre_pagina" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idPagina_upd").val(id);
    $("#mod_nombre_pagina").val(NombrePagina);
    $("#mod_estado_p").val(Estado);
}

function obtener_datos_subpagina(id) {
    var NombrePagina = $("#nombre_subpagina" + id).val();
    var IdPagina = $("#id_pagina" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idSubpagina_upd").val(id);
    $("#mod_nombre_subpagina").val(NombrePagina);
    $("#mod_id_pagina").val(IdPagina);
    $("#mod_estado").val(Estado);
}

function subpaginaFuncion() {
    var selectBox = document.getElementById("id_pagina");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var tipo = 'post';
    var select = document.getElementById("id_subpagina");

    if (selectedValue == '1') {
        document.getElementById("activacionTexto").style.display = "none";
        document.getElementById("campoOrdenImagen").style.display = "none";
        document.getElementById("id_tipo_grua").required = false;
        document.getElementById("id_ordenPagina").required = false;
        document.getElementById("inputFinAno").style.display = "block";
    }else{
        document.getElementById("inputFinAno").style.display = "none";
    }

    $.ajax({
        url: 'buscarSubpagina',
        type: "get",
        data: { _method: tipo, id_pagina: selectedValue },
        success: function (data) {
            var vValido = data['valido'];
            if (vValido === 'true') {
                document.getElementById("inputSubpagina").style.display = "block";
                var ListUsuario = data['Subpaginas'];
                select.options.length = 0;
                for (index in ListUsuario) {
                    select.options[select.options.length] = new Option(ListUsuario[index], index);
                }
                document.getElementById("id_subpagina").value = '';
                document.getElementById("id_subpagina").required = true;
                document.getElementById("inputGrua").style.display = "none";
                document.getElementById("id_tipo_grua").style.display = "none";
            } else {
                document.getElementById("inputSubpagina").style.display = "none";
                select.options.length = 0;
                document.getElementById("id_subpagina").value = '';
                document.getElementById("id_subpagina").required = false;
                document.getElementById("inputGrua").style.display = "none";
                document.getElementById("id_tipo_grua").style.display = "none";
            }
        }
    });

}

$('#imagen').change(function () {
    var clone = $(this).clone();
    clone.attr('id', 'imagen1');
    clone.attr('name', 'imagen1');
    $('#field2_area').html(clone);
});

$('#mod_imagen_upd').change(function () {
    var clone = $(this).clone();
    clone.attr('id', 'imagen2');
    clone.attr('name', 'imagen2');
    $('#field2_area1').html(clone);
});

function subpaginaFuncionUpd() {
    var selectBox = document.getElementById("mod_id_pagina");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var tipo = 'post';
    var select = document.getElementById("mod_id_subpagina");

    if (selectedValue == '1') {
        document.getElementById("activacionTextoUpd").style.display = "none";
        document.getElementById("campoOrdenImagenUpd").style.display = "none";
        document.getElementById("mod_id_tipo_grua").required = false;
        document.getElementById("mod_id_ordenPagina").required = false;
        document.getElementById("inputFinAnoUpd").style.display = "block";
    }else{
        document.getElementById("inputFinAnoUpd").style.display = "none";
    }

    $.ajax({
        url: 'buscarSubpagina',
        type: "get",
        data: { _method: tipo, id_pagina: selectedValue },
        success: function (data) {
            var vValido = data['valido'];
            if (vValido === 'true') {
                document.getElementById("inputSubpaginaUpd").style.display = "block";
                var ListUsuario = data['Subpaginas'];
                select.options.length = 0;
                for (index in ListUsuario) {
                    select.options[select.options.length] = new Option(ListUsuario[index], index);
                }
                document.getElementById("mod_id_subpagina").value = '';
                document.getElementById("mod_id_subpagina").required = true;
                document.getElementById("inputGruaUpd").style.display = "none";
                document.getElementById("mod_id_tipo_grua").style.display = "none";
            } else {
                document.getElementById("inputSubpaginaUpd").style.display = "none";
                select.options.length = 0;
                document.getElementById("mod_id_subpagina").value = '';
                document.getElementById("mod_id_subpagina").required = false;
                document.getElementById("inputGruaUpd").style.display = "none";
                document.getElementById("mod_id_tipo_grua").style.display = "none";
            }
        }
    });
}

function obtener_datos_imagen(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var IdPagina = $("#id_pagina" + id).val();
    var IdSubpagina = $("#id_subpagina" + id).val();
    var TextoImagen = $("#textoImagenForm" + id).val();
    var OrdenImagen = $("#id_ordenPagina" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();
    var Grua = $("#id_grua" + id).val();
    var NombreSubpagina = $("#nombre_subpagina" + id).val();
    var NombreGrua = $("#nombre_grua" + id).val();
    var NombrePagina = $("#nombre_pagina" + id).val();
    var FinAno = $("#fin_ano" + id).val();

    $("#idImagen_upd").val(id);
    $("#mod_nombre_imagen").val(NombreImagen);
    $("#mod_id_pagina").val(IdPagina)
    $("#mod_id_subpagina").val(IdSubpagina);
    $("#mod_estado").val(Estado);
    $("#mod_textoImagenForm").summernote('code', TextoImagen);
    $("#mod_id_ordenPagina").val(OrdenImagen);
    $("#mod_pie_imagen").val(PieImagen);
    $("#mod_id_tipo_grua").val(Grua);
    $("#mod_nombre_pagina").val(NombrePagina);
    $("#mod_fin_ano").val(FinAno);
    if (IdSubpagina > 0) {
        document.getElementById("inputSubpaginaUpd").style.display = "block";
        $("#mod_nombre_subpagina").val(NombreSubpagina);
    } else {
        document.getElementById("inputSubpaginaUpd").style.display = "none";
    }
    if (Grua > 0) {
        document.getElementById("inputGruaUpd").style.display = "block";
        $("#mod_nombre_grua").val(NombreGrua);
    } else {
        document.getElementById("inputGruaUpd").style.display = "none";
    }
    if (TextoImagen) {
        document.getElementById("activacionTextoUpd").style.display = "block";
    } else {
        document.getElementById("activacionTextoUpd").style.display = "none";
    }
}

function obtener_datos_desfijacion(id) {
    var Contenido = $("#contenido" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idDesfijacion_upd").val(id);
    $("#mod_contenidoDesfijacion").val(Contenido);
    $("#mod_estado").val(Estado);
    $('#mod_contenidoDesfijacion').summernote('code', Contenido);
}

function obtener_datos_tipoDocumento(id) {
    var Nombre = $("#nombre_documento" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idTipoDocumento_upd").val(id);
    $("#mod_nombre_documento").val(Nombre);
    $("#mod_estado").val(Estado);
}

function activarTextoImagen() {
    if (document.getElementById('activarTexto').checked) {
        document.getElementById("campoTextoImagen").style.display = "block";
        document.getElementById("textoImagenForm").required = true;
    } else {
        document.getElementById("campoTextoImagen").style.display = "none";
        document.getElementById("textoImagenForm").required = false;
        document.getElementById("textoImagenForm").value = '';
    }
}

function activarTextoImagenUpd() {
    if (document.getElementById('activarTextoUpd').checked) {
        document.getElementById("campoTextoImagenUpd").style.display = "block";
        document.getElementById("mod_textoImagenForm").required = true;
    } else {
        document.getElementById("campoTextoImagenUpd").style.display = "none";
        document.getElementById("mod_textoImagenForm").required = false;
        document.getElementById("mod_textoImagenForm").value = '';
    }
}

function mostrarGrua(IdSubpagina) {
    var selectPage = document.getElementById("id_pagina");
    var selectPageValue = selectPage.options[selectPage.selectedIndex].value;
    var selectSubPage = document.getElementById("id_subpagina");
    var selectSubPageValue = selectSubPage.options[selectSubPage.selectedIndex].value;

    switch (selectPageValue) {
        case '1': document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            break;
        case '2': if (selectSubPageValue == 5) {
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
        } else {
            document.getElementById("activacionTexto").style.display = "block";
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "block";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = true;
        }
            break;
        case '3': document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            break;
        case '4': if (selectSubPageValue == 8) {
            document.getElementById("inputGrua").style.display = "block";
            document.getElementById("id_tipo_grua").style.display = "block";
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
        } else if (selectSubPageValue == 12) {
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
        } else if (selectSubPageValue == 13 || selectSubPageValue == 16) {
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
        } else if (selectSubPageValue == 10) {
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
        } else if (selectSubPageValue == 9) {
            document.getElementById("activacionTexto").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "none";
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = false;
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
        } else {
            document.getElementById("activacionTexto").style.display = "block";
            document.getElementById("inputGrua").style.display = "none";
            document.getElementById("id_tipo_grua").style.display = "none";
            document.getElementById("campoOrdenImagen").style.display = "block";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            document.getElementById("id_ordenPagina").required = true;
        }
            break;
        case '5':
            if (selectSubPageValue == 15) {
                document.getElementById("activacionTexto").style.display = "none";
                document.getElementById("campoOrdenImagen").style.display = "none";
                document.getElementById("id_tipo_grua").required = false;
                document.getElementById("id_ordenPagina").required = false;
                document.getElementById("inputGrua").style.display = "none";
                document.getElementById("id_tipo_grua").style.display = "none";
            } else {
                document.getElementById("activacionTexto").style.display = "block";
                document.getElementById("inputGrua").style.display = "none";
                document.getElementById("id_tipo_grua").style.display = "none";
                document.getElementById("campoOrdenImagen").style.display = "block";
                document.getElementById("id_tipo_grua").value = '';
                document.getElementById("id_tipo_grua").required = false;
                document.getElementById("id_ordenPagina").required = true;
            }
            break;
        case '6':
            document.getElementById("inputGrua").style.display = "none !important";
            document.getElementById("id_tipo_grua").style.display = "none !important";
            document.getElementById("activacionTexto").style.display = "none !important";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            break;
        default: document.getElementById("inputGrua").style.display = "none !important";
            document.getElementById("id_tipo_grua").style.display = "none !important";
            document.getElementById("id_tipo_grua").value = '';
            document.getElementById("id_tipo_grua").required = false;
            break;
    }
}

function mostrarGruaUpd(IdSubpaginaUpd) {
    var selectPage = document.getElementById("mod_id_pagina");
    var selectPageValue = selectPage.options[selectPage.selectedIndex].value;
    var selectSubPage = document.getElementById("mod_id_subpagina");
    var selectSubPageValue = selectSubPage.options[selectSubPage.selectedIndex].value;

    switch (selectPageValue) {
        case '1': document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            break;
        case '2': if (selectSubPageValue == 5) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
        } else {
            document.getElementById("activacionTextoUpd").style.display = "block";
            document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "block";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = true;
        }
            break;
        case '3': document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            break;
        case '4': if (selectSubPageValue == 8) {
            document.getElementById("inputGruaUpd").style.display = "block";
            document.getElementById("mod_id_tipo_grua").style.display = "block";
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
        } else if (selectSubPageValue == 12) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
        } else if (selectSubPageValue == 13) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
        } else if (selectSubPageValue == 10) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
            document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
        } else if (selectSubPageValue == 9) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
            document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
        } else {
            document.getElementById("activacionTextoUpd").style.display = "block";
            document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "block";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = true;
        }
            break;
        case '5': if (selectSubPageValue == 15) {
            document.getElementById("activacionTextoUpd").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = false;
        } else {
            document.getElementById("activacionTextoUpd").style.display = "block";
            document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("campoOrdenImagenUpd").style.display = "block";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            document.getElementById("mod_id_ordenPagina").required = true;
        }
            break;
        case '6': document.getElementById("inputGruaUpd").style.display = "none";
            document.getElementById("mod_id_tipo_grua").style.display = "none";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            break;
        default: document.getElementById("inputGruaUpd").style.display = "none !important";
            document.getElementById("mod_id_tipo_grua").style.display = "none !important";
            document.getElementById("mod_id_tipo_grua").value = '';
            document.getElementById("mod_id_tipo_grua").required = false;
            break;
    }
}

function obtener_datos_tipoGrua(id) {
    var Nombre = $("#nombre_grua" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idTipoGrua_upd").val(id);
    $("#mod_nombre_grua").val(Nombre);
    $("#mod_estado").val(Estado);
}


$(function () {
    $('#form-imagen').validate({
        rules: {
            imagen: {
                required: true,
                accept: true,
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $('#form-imagen_upd').validate({
        rules: {
            imagen_upd: {
                required: true,
                accept: true,
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $('#form-notificacion-manual').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $('#form-notificacion_upd').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $('#form-desfijaciones').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $('#form-desfijaciones_upd').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }

    });
});
