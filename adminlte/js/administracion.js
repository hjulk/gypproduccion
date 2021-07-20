$(document).ready(function () {

    $('#notificacionesDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -2 }],
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
        paging      : false,
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

    $('#contactenosDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -2 }],
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
        paging      : false,
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

    $('#hojasVidaDashboard').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -2 }],
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
        paging      : false,
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

    $('#dependencias').DataTable({
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

});

function obtener_datos_dependencia(id) {
    var Nombre  = $("#nombre_dependencia" + id).val();
    var Estado  = $("#estado_activo" + id).val();

    $("#idD_upd").val(id);
    $("#mod_nombre_dependencia").val(Nombre);
    $("#mod_estado").val(Estado);
}

function obtener_datos_rol(id) {
    var Nombre  = $("#nombre_rol" + id).val();
    var Estado  = $("#estado_activo" + id).val();

    $("#idR_upd").val(id);
    $("#mod_nombre_rol").val(Nombre);
    $("#mod_estado").val(Estado);
}

function obtener_datos_usuario(id) {
    var Nombre      = $("#nombre_usuario" + id).val();
    var Correo      = $("#correo" + id).val();
    var Usuario     = $("#username" + id).val();
    var Rol         = $("#id_rol" + id).val();
    var Dependencia = $("#id_dependencia" + id).val();
    var Administrador = $("#id_administrador" + id).val();
    var Estado      = $("#estado_activo" + id).val();

    $("#idUser_upd").val(id);
    $("#mod_nombre_usuario").val(Nombre);
    $("#mod_correo").val(Correo);
    $("#mod_username").val(Usuario);
    $("#mod_id_rol").val(Rol);
    $("#mod_id_dependencia").val(Dependencia);
    $("#mod_administrador").val(Administrador);
    $("#mod_estado").val(Estado);
}
