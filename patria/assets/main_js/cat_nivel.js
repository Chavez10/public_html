$(document).on("ready", main);

function main() {
    catnivel("", 1, 5);
    $("input[name=busqueda]").keyup(function() {
        textobuscar = $(this).val();
        valoroption = $("#cantidad").val();
        catnivel(textobuscar, 1, valoroption);
    });
    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorhref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda]").val();
        valoroption = $("#cantidad").val();
        catnivel(valorBuscar, valorhref, valoroption);
    });
    $("#cantidad").change(function() {
        valoroption = $(this).val();
        valorBuscar = $("input[name=busqueda]").val();
        catnivel(valorBuscar, 1, valoroption);
    });
}

function catnivel(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: "Controller_catnivel/listar_cat_nivel",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            cantidad: cantidad
        },
        dataType: "json",
        success: function(response) {
            xd = "";
            filas = "";
            var i = 0;
            $.each(response.catnivel, function(key, item) {
                i++;
                filas += "<tr><td><center>" + i + "º</center></td>"
                filas += "<td><center>" + item.nc_nivel + "</center></td>"
                filas += "<td><button type='button' class='btn btn-sm' id='delteBtnId' data-delteBtnId=" + item.id_cat_nivel + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_cat_nivel + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></center></td></tr>";
            });
            if (response.catnivel == '') {
                filas += "<tr><td colspan='3'>No hay datos</td>"
            }
            $("#tbnivel tbody").html(filas);
            linkseleccionado = Number(pagina);
            //total registros
            totalregistros = response.totalregistros;
            //cantidad de registros por pagina
            cantidadregistros = response.cantidad;
            numerolinks = Math.ceil(totalregistros / cantidadregistros);
            paginador = "<ul class='pagination'>";
            if (linkseleccionado > 1) {
                paginador += "<li><a href='1'>&laquo;</a></li>";
                paginador += "<li><a href='" + (linkseleccionado - 1) + "' '>&lsaquo;</a></li>";
            } else {
                paginador += "<li class='disabled'><a href='#'>&laquo;</a></li>";
                paginador += "<li class='disabled'><a href='#'>&lsaquo;</a></li>";
            }
            //muestro de los enlaces 
            //cantidad de link hacia atras y adelante
            cant = 2;
            //inicio de donde se va a mostrar los links
            pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
            //condicion en la cual establecemos el fin de los links
            if (numerolinks > cant) {
                //conocer los links que hay entre el seleccionado y el final
                pagRestantes = numerolinks - linkseleccionado;
                //defino el fin de los links
                pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) : numerolinks;
            } else {
                pagFin = numerolinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkseleccionado) paginador += "<li class='active'><a href='javascript:void(0)'>" + i + "</a></li>";
                else paginador += "<li><a href='" + i + "'>" + i + "</a></li>";
            }
            //condicion para mostrar el boton sigueinte y ultimo
            if (linkseleccionado < numerolinks) {
                paginador += "<li><a href='" + (linkseleccionado + 1) + "' >&rsaquo;</a></li>";
                paginador += "<li><a href='" + numerolinks + "'>&raquo;</a></li>";
            } else {
                paginador += "<li class='disabled'><a href='#'>&rsaquo;</a></li>";
                paginador += "<li class='disabled'><a href='#'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
        }
    });
}
 $(document).on("click", "#delteBtnId", function(e) {
     e.preventDefault();
     swal({
         title: "Eliminar el nivel?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     }).then((ifWillDelete) => {
         if (ifWillDelete) {
             var delteBtnId = $(this).attr('data-delteBtnId');
             var action = 'delete';
             $.ajax({
                 url: "Controller_catnivel/eliminar_catnivel",
                 method: "POST",
                 data: {
                     delteBtnId: delteBtnId,
                     action: action
                 },
                 beforeSend: function() {
                 swal({
                     title: "Eliminando.....",
                     animation: false,
                     customClass: 'animated tada',
                     timer: 5000
                 });
             },
                 success: function(data) {
                     if (data.trim() == 'deleted') {
                         swal({
                             title: "Nivel eliminado correctamente",
                             icon: "success"
                         });
                         main();
                     }
                 },
                 error: function() {
                     swal({
                         title: "verifique que no este asignado",
                         icon: "warning"
                     });
                 }
             });
         } else {
             return false;
         }
     })
 });
$(document).on("click", "#create_acc_btn", function(e) {
    e.preventDefault();
    $("#developer_cu_form")[0].reset();
    $("#uploaded_hidden_image").html('');
    $("#form-title").text('Crear Nivel');
    $("#action").val('create');
    $("#submit").val('create');
});
$(document).on("click", "#editBtnId", function(e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-editBtnId');
    var action = 'fetchSingleRow';
    $.ajax({
        url: "Controller_catnivel/linea_actualizar",
        method: "POST",
        data: {
            editBtnId: editBtnId,
            action: action
        },
        dataType: "json",
        success: function(data) {
            $("#create_form_modal").modal('show');
            $("#id_cat_nivel").val(data.id_cat_nivel);
            $("#nc_nivel").val(data.nc_nivel);
            $("#uploaded_image").val(data.foto);
            $("#uploaded_hidden_image").html(data.uploaded_hidden_image);
            $("#form-title").text('Editar Nivel');
            $("#action").val('update');
            $("#submit").val('update');
            $("#updateId").val(editBtnId);
        }
    });
});
$(document).on("submit", "#developer_cu_form", function(e) {
    e.preventDefault();
    var nc_nivel = $("#nc_nivel").val();

    if (nc_nivel == '') {
        swal({
            title: "Campo Nivel requerido",
            icon: "warning"
        });
    } else {
        $.ajax({
            url: "Controller_catnivel/actualizar_crear_catnivel",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            beforeSend: function() {
                swal({
                    title: "Guardando.....",
                    animation: false,
                    customClass: 'animated tada',
                    timer: 5000
                });
            },
            success: function(data) {
                if (data.trim() == 'created') {
                    swal({
                        title: "Nivel registrado correctamente",
                        icon: "success"
                    });
                    $("#create_form_modal").modal('hide');
                    if ($('.modal-backdrop').is(':visible')) {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    };
                    $("#developer_cu_form")[0].reset();
                }
                $("#create_form_modal").modal('hide');
                if (data.trim() == 'update') {
                    swal({
                        title: "Nivel actualizado correctamente",
                        icon: "success",
                    });
                    $("#developer_cu_form")[0].reset();
                }
                main();
            }
        });
    }
});