$(document).on("ready", main);

function main() {
    conocenos("", 1, 5);
    $("input[name=busqueda]").keyup(function() {
        textobuscar = $(this).val();
        valoroption = $("#cantidad").val();
        conocenos(textobuscar, 1, valoroption);
    });
    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorhref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda]").val();
        valoroption = $("#cantidad").val();
        conocenos(valorBuscar, valorhref, valoroption);
    });
    $("#cantidad").change(function() {
        valoroption = $(this).val();
        valorBuscar = $("input[name=busqueda]").val();
        conocenos(valorBuscar, 1, valoroption);
    });
}

function conocenos(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: "Controller_conocenos/listar_conocenos",
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
            var i = 0
            $.each(response.conocenos, function(key, item) {
                i++;
                if (item.estado == 'Activo') {
                    xd = "<p style='background:#33CC80; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-check'></i></p>"
                } else if (item.estado == 'Antigua') {
                    xd = "<p style='background:#FB9F00; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-times'></i></p>"
                } else {
                    xd = "<p style='background:#EC1365; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-times'></i></p>"
                }
                filas += "<tr><td><center>" + i + "º</center></td>"
                filas += "<td><center>" + xd + "</center></td>"
                filas += "<td><center><img style='width:50px;height:50px;border-radius:10px;' src='assets/upload/" + item.foto + "' alt=''></center></td>";
                
                filas += "<td><center><button type='button' href=" + item.id_con + " data-target='.bs-example-modal-lg' class='btn btn-sm' data-deleteImg=" + item.foto + " id='delteBtnId' data-delteBtnId=" + item.id_con + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                filas += "<button type='button' class='btn btn-sm'  id='editBtnId' data-editBtnId=" + item.id_con + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></center></td></tr>";
            });
            if (response.cabecera == '') {
                filas += "<tr><td colspan='3'>No hay datos</td>"
            }
            $("#tbconocenos tbody").html(filas);
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
        title: "Eliminar articulo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((ifWillDelete) => {
        if (ifWillDelete) {
            var deleteImg = $(this).attr('data-deleteImg');
            var delteBtnId = $(this).attr('data-delteBtnId');
            var action = 'delete';
            $.ajax({
                url: "Controller_conocenos/eliminar_conocenos",
                method: "POST",
                data: {
                    deleteImg: deleteImg,
                    delteBtnId: delteBtnId,
                    action: action
                },
                success: function(data) {
                    if (data.trim() == 'deleted') {
                        swal({
                            title: "Articulo eliminado correctamente",
                            icon: "success"
                        });
                        main();
                    }
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
    $("#form-title").text('Crear articulo');
    $("#action").val('create');
    $("#submit").val('create');
});
$(document).on("click", "#editBtnId", function(e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-editBtnId');
    var action = 'fetchSingleRow';
    $.ajax({
        url: "Controller_conocenos/linea_actualizar",
        method: "POST",
        data: {
            editBtnId: editBtnId,
            action: action
        },
        dataType: "json",
        success: function(data) {
            $("#create_form_modal").modal('show');
            $("#historia").val(data.historia);;
            $("#estado").val(data.estado);
            $("#uploaded_image").val(data.foto);
            $("#uploaded_hidden_image").html(data.uploaded_hidden_image);
            $("#form-title").text('Actualizar articulo');
            $("#action").val('update');
            $("#submit").val('update');
            $("#updateId").val(editBtnId);
        }
    });
});
// Load Data
$(document).on("submit", "#developer_cu_form", function(e) {
    e.preventDefault();
    var historia = $("#historia").val();
    var estado = $("#estado").val();
    var foto = $("#foto").val();
    var imageExtention = $("#foto").val().split('.').pop().toLowerCase();
    if (imageExtention != '') {
        if (jQuery.inArray(imageExtention, ['png', 'jpg', 'jpeg', 'gif']) == -1) {
            swal({
                title: "Foto Invalida",
                icon: "warning"
            });
            $("#foto").val('');
            return false;
        }
    }
    if (historia == '') {
        swal({
            title: "Campo historia requerido",
            icon: "warning"
        });
    } else if (estado == '') {
        swal({
            title: "Selecciona un estado",
            icon: "warning"
        });
    } else {
        $.ajax({
            url: "Controller_conocenos/actualizar_crear_conocenos",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.trim() == 'created') {
                    swal({
                        title: "Articulo registrado correctamente",
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
                        title: "Articulo actualizado correctamente",
                        icon: "success"
                    });
                    $("#developer_cu_form")[0].reset();
                }
                main();
            }
        });
    }
});