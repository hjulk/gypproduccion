$(document).ready(function () {
    $('#banners').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

    $('#noticias').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

    $('#datos').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

    $('#comunicados').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

    $('#citasEspecialidades').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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
                    {extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL'},
                    {
                        extend: 'print',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' );

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    }
                ]
            }]

    });

    $('#citasEspecialidadesDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive: {
                                details: {
                                    display: $.fn.dataTable.Responsive.display.modal( {
                                        header: function ( row ) {
                                            var data = row.data();
                                            return 'Detalle Solicitud ';
                                        }
                                    } ),
                                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                        tableClass: 'table'
                                    })
                                }
                            },
        lengthChange: false,
        searching   : false,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

    $('#btnReporteCE').click(function(){

        var Day         = $("#day").val();
        var Month       = $("#month").val();
        var Year        = $("#year").val();
        var Solicitud   = $("#solicitud").val();
        var Servicio    = $("#servicio").val();
        var Respuesta   = $("#respuesta").val();
        var tipo        = 'post';

        $.ajax({
            type: "post",
            url : "consultarReporteCE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {_method: tipo,day: Day,month: Month,year: Year,solicitud: Solicitud,servicio: Servicio,respuesta: Respuesta},
            success : function(data){

                var valido  = data['valido'];
                var errores = data['errors'];
                if(valido === 'true'){
                    var Resultado = jQuery.parseJSON(data['results']);
                    $('#panelResultado').show();
                    $('#citasEspecialidades').DataTable().destroy();
                    $('#citasEspecialidades').DataTable({
                        data: Resultado,
                        columnDefs: [
                            { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 2, targets: -10 }],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal( {
                                    header: function ( row ) {
                                        var data = row.data();
                                        return 'Detalle Solicitud ';
                                    }
                                } ),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table'
                                })
                            }
                        },
                        lengthChange: false,
                        searching   : true,
                        ordering    : true,
                        info        : true,
                        autoWidth   : false,
                        processing  : true,
                        rowReorder  : false,
                        order: [[ 0, "desc" ]],
                        columns: [
                                    { "data": "id_cita" },
                                    { "data": "fecha_solicitud" },
                                    { "data": "tipo_identificacion" },
                                    { "data": "identificacion" },
                                    { "data": "nombre_usuario" },
                                    { "data": "correo" },
                                    { "data": "telefono" },
                                    { "data": "solicitante" },
                                    { "data": "tipo_solicitud" },
                                    { "data": "tipo_servicio" },
                                    { "data": "descripcion" },
                                    { "data": "nombre_archivo" },
                                    { "data": "tipo_respuesta" },
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
                                    {extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL'},
                                    {
                                        extend: 'print',
                                        customize: function ( win ) {
                                            $(win.document.body)
                                                .css( 'font-size', '10pt' );

                                            $(win.document.body).find( 'table' )
                                                .addClass( 'compact' )
                                                .css( 'font-size', 'inherit' );
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
                }else{
                    $.each(errores,function(key, value){
                        if(value){
                            toastr.error(value);
                        }
                    });
                    $('#panelResultado').hide();
                }
            },

        });
    });

    $('#usuarios').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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
        responsive  : true,
        lengthChange: false,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        order: [[ 0, "desc" ]],
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros.",
            info: "Mostrando tickets del _START_ al _END_ de un total de _TOTAL_ tickets",
            infoEmpty: "Mostrando tickets del 0 al 0 de 0 tickets",
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

