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

function actualizarImagen() {
    if (document.getElementById('activarImagen_upd').checked) {
        document.getElementById("imageUpdate").style.display = "block";
        document.getElementById("mod_imagen_upd").required = true;
    } else {
        document.getElementById("imageUpdate").style.display = "none";
        document.getElementById("mod_imagen_upd").required = false;
    }
}
