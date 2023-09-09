$(document).ready(function () {

    $('#tipoImagenInicio').DataTable({
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
        order: [[0, "asc"]],
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

    $('#tipoImagenServicio').DataTable({
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
        order: [[0, "asc"]],
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

    $('#settlementConsultation').DataTable({
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
        order: [[0, "asc"]],
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

    $('#organigrama').DataTable({
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
        order: [[0, "asc"]],
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

    $('#nosotros').DataTable({
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
        order: [[0, "asc"]],
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

    $('#inicio').DataTable({
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
        order: [[0, "asc"]],
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

    $('#banner').DataTable({
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
        order: [[0, "asc"]],
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

    $('#bannerMovil').DataTable({
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
        order: [[0, "asc"]],
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

    $('#carousel').DataTable({
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
        order: [[0, "asc"]],
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

    $('#carouselMovil').DataTable({
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
        order: [[0, "asc"]],
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

    $('#benefits').DataTable({
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
        order: [[0, "asc"]],
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

    $('#tows').DataTable({
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
        order: [[0, "asc"]],
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

    $('#monitoringCameras').DataTable({
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
        order: [[0, "asc"]],
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

    $('#preguntaFrecuente').DataTable({
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
        order: [[0, "asc"]],
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


function obtener_datos_tipoImagenInicio(id) {
    var NombreImagen = $("#nombre_inicio" + id).val();
    var Estado = $("#estado_inicio_activo" + id).val();

    $("#idTipoImagenInicio_upd").val(id);
    $("#mod_nombre_inicio").val(NombreImagen);
    $("#mod_estado_inicio").val(Estado);

}

function obtener_datos_tipoImagenServicio(id) {
    var NombreImagen = $("#nombre_servicio" + id).val();
    var Estado = $("#estado__servicio_activo" + id).val();

    $("#idTipoImagenServicio_upd").val(id);
    $("#mod_nombre_servicio").val(NombreImagen);
    $("#mod_estado_servicio").val(Estado);

}

function obtener_datos_imagen_settlementConsultation(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();

    $("#idImagenSettlementConsultation_upd").val(id);
    $("#mod_nombre_imagen").val(NombreImagen);
    $("#mod_estado").val(Estado);
    $("#mod_pie_imagen").val(PieImagen);
}

function obtener_datos_imagen_organigrama(id) {
    var NombreImagen = $("#nombre_archivo" + id).val();
    var Estado = $("#estado_activo" + id).val();

    $("#idOrganigrama_upd").val(id);
    $("#mod_nombre_archivo").val(NombreImagen);
    $("#mod_estado_archivo").val(Estado);
}

function obtener_datos_imagen_nosotros(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();

    $("#idImagenNosotros_upd").val(id);
    $("#mod_nombre_imagen_nosotros").val(NombreImagen);
    $("#mod_estado_nosotros").val(Estado);
    $("#mod_pie_imagen_nosotros").val(PieImagen);
}

function obtener_datos_imagen_banner(id) {
    var NombreImagen = $("#nombre_imagen_banner" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var Enlace = $("#enlace" + id).val();

    $("#idImagenBanner_upd").val(id);
    $("#mod_nombre_imagen_banner").val(NombreImagen);
    $("#mod_estado_banner").val(Estado);
    $("#mod_enlace_banner").val(Enlace);
}

function obtener_datos_imagen_bannerMovil(id) {
    var NombreImagen = $("#nombre_imagen_bannerMovil" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var Enlace = $("#enlace" + id).val();

    $("#idImagenBannerMovil_upd").val(id);
    $("#mod_nombre_imagen_bannerMovil").val(NombreImagen);
    $("#mod_estado_bannerMovil").val(Estado);
    $("#mod_enlace_bannerMovil").val(Enlace);
}

function obtener_datos_imagen_carousel(id) {
    var NombreImagen = $("#nombre_imagen_carousel" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var Orden = $("#orden" + id).val();
    var Enlace = $("#enlace" + id).val();

    $("#idImagenCarousel_upd").val(id);
    $("#mod_nombre_imagen_carousel").val(NombreImagen);
    $("#mod_estado_carousel").val(Estado);
    $("#mod_orden_carousel").val(Orden);
    $("#mod_enlace_carousel").val(Enlace);
}

function obtener_datos_imagen_carouselMovil(id) {
    var NombreImagen = $("#nombre_imagen_carouselMovil" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var Orden = $("#orden" + id).val();
    var Enlace = $("#enlace" + id).val();

    $("#idImagenCarouselMovil_upd").val(id);
    $("#mod_nombre_imagen_carouselMovil").val(NombreImagen);
    $("#mod_estado_carouselMovil").val(Estado);
    $("#mod_orden_carouselMovil").val(Orden);
    $("#mod_enlace_carouselMovil").val(Enlace);
}

function obtener_datos_imagen_benefits(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();
    var Orden = $("#orden" + id).val();
    var TextoImagen = $("#texto_imagen" + id).val();

    $("#idImagenBenefits_upd").val(id);
    $("#mod_nombre_imagen_beneficios").val(NombreImagen);
    $("#mod_estado_beneficios").val(Estado);
    $("#mod_pie_imagen_beneficios").val(PieImagen);
    $("#mod_orden_beneficios").val(Orden);
    $("#mod_texto_imagen_beneficios").val(TextoImagen);
}

function obtener_datos_imagen_tows(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();
    var TipoGrua = $("#tipo_grua" + id).val();
    
    $("#idImagenTows_upd").val(id);
    $("#mod_nombre_imagen_gruas").val(NombreImagen);
    $("#mod_estado_gruas").val(Estado);
    $("#mod_pie_imagen_gruas").val(PieImagen);
    $("#mod_tipo_grua").val(TipoGrua);    
}

function obtener_datos_imagen_monitoringCameras(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();
    var Orden = $("#orden" + id).val();

    $("#idImagenMonitoringCameras_upd").val(id);
    $("#mod_nombre_imagen_monitoreoCamaras").val(NombreImagen);
    $("#mod_estado_monitoreoCamaras").val(Estado);
    $("#mod_pie_imagen_monitoreoCamaras").val(PieImagen);
    $("#mod_orden_monitoreoCamaras").val(Orden);
}

function obtener_datos_imagen_homePage(id) {
    var NombreImagen = $("#nombre_imagen" + id).val();
    var Estado = $("#estado_activo" + id).val();
    var PieImagen = $("#pie_imagen" + id).val();
    var TipoImagen = $("#tipo_imagen" + id).val();
    
    $("#idImagenHomePage_upd").val(id);
    $("#mod_nombre_imagen_inicio").val(NombreImagen);
    $("#mod_estado_inicio").val(Estado);
    $("#mod_pie_imagen_inicio").val(PieImagen);
    $("#mod_tipo_imagen").val(TipoImagen);    
}

function actualizarImagen() {
    if (document.getElementById('activarImagen_upd').checked) {
        document.getElementById("imageUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenNosotros() {
    if (document.getElementById('activarImagenNosotros_upd').checked) {
        document.getElementById("imageNosotrosUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageNosotrosUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarArchivo() {
    if (document.getElementById('activarArchivo_upd').checked) {
        document.getElementById("archivoUpdate").style.display = "block";
        document.getElementById("mod_archivo_upd").required = true;
    } else {
        document.getElementById("archivoUpdate").style.display = "none";
        document.getElementById("mod_archivo_upd").required = false;
    }
}

function actualizarImagenBanner() {
    if (document.getElementById('activarImagenBanner_upd').checked) {
        document.getElementById("imageBannerUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageBannerUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenBannerMovil() {
    if (document.getElementById('activarImagenBannerMovil_upd').checked) {
        document.getElementById("imageBannerMovilUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageBannerMovilUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenCarousel() {
    if (document.getElementById('activarImagenCarousel_upd').checked) {
        document.getElementById("imageCarouselUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageCarouselUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenCarouselMovil() {
    if (document.getElementById('activarImagenCarouselMovil_upd').checked) {
        document.getElementById("imageCarouselMovilUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageCarouselMovilUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenBeneficios() {
    if (document.getElementById('activarImagenBeneficios_upd').checked) {
        document.getElementById("imageBeneficiosUpdate").style.display = "block";
        document.getElementById("mod_imagen_pd").required = true;
    } else {
        document.getElementById("imageBeneficiosUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenGruas() {
    if (document.getElementById('activarImagenGruas_upd').checked) {
        document.getElementById("imageGruasUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageGruasUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenMonitoreoCamaras() {
    if (document.getElementById('activarImagenMonitoreoCamaras_upd').checked) {
        document.getElementById("imageMonitoreoCamarasUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageMonitoreoCamarasUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}

function actualizarImagenHomePage() {
    if (document.getElementById('activarImagenHomePage_upd').checked) {
        document.getElementById("imageHomePageUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageHomePageUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}