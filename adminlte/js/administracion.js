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

    $('#notificacionesAviso').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }],
        responsive  : true,
        lengthChange: true,
        searching   : true,
        ordering    : true,
        info        : false,
        autoWidth   : false,
        rowReorder  : false,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        order: [[ 01, "asc" ]],
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

function mostrarContrasena(){
    var tipo = document.getElementById("password");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

function mostrarContrasenaUpd(){
    var tipo = document.getElementById("mod_password");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

$('#form-notificacion').submit(function() {
    var fileInputP = document.getElementById('notificationfile');
    var Procedimientos = fileInputP.value;
    if(Procedimientos){
        var fileSize = $('#notificationfile')[0].files[0].size;
        var sizekiloBytes = parseInt(fileSize / 1024);
        if (sizekiloBytes >  $('#notificationfile').attr('size')) {
            alert('El tamaño supera el limite permitido de 2mb');
            return false;
        }
    }
});

function soloNumero(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function check(e) {
    key=e.keyCode || e.which;

    teclado=String.fromCharCode(key).toLowerCase();

    letras="abcdefghijklmnñopqrstuvwxyz0123456789";

    especiales="8-37-38-46-164-46";

    teclado_especial=false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
            break;
        }
    }

    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function obtener_datos_notificacion(id) {
    var NombreCiudadano = $("#nombre_ciudadano" + id).val();
    var Placa           = $("#placa" + id).val();
    var Year            = $("#year" + id).val();
    var Estado          = $("#estado_activo" + id).val();

    $("#idNotificacion_upd").val(id);
    $("#mod_nombre_ciudadano").val(NombreCiudadano);
    $("#mod_placa").val(Placa);
    $("#mod_year_notification").val(Year);
    $("#mod_estado").val(Estado);
}
