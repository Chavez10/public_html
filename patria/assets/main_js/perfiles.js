$(document).on("ready", main);

function main() {
    perfiles("", 1, 5);
    $("input[name=busqueda]").keyup(function() {
        textobuscar = $(this).val();
        valoroption = $("#cantidad").val();
        perfiles(textobuscar, 1, valoroption);
    });
    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorhref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda]").val();
        valoroption = $("#cantidad").val();
        perfiles(valorBuscar, valorhref, valoroption);
    });
    $("#cantidad").change(function() {
        valoroption = $(this).val();
        valorBuscar = $("input[name=busqueda]").val();
        perfiles(valorBuscar, 1, valoroption);
    });
}

function perfiles(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: "Controller_Perfiles/listar_perfiles",
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
            $.each(response.perfiles, function(key, item) {
                i++;
                if (item.estado == 'Activo') {
                    xd = "<p style='background:#33CC80; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-check'></i></p>"
                } else {
                    xd = "<p style='background:#EC1365; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-times'></i></p>"
                }
                filas += "<tr>"
                filas += "<td><center>" + i + "</td></center>";
                filas += "<td><center>" + item.nombre + "</center></td>";
                filas += "<td><center><img style='width:50px;height:50px;border-radius:10px;' src='assets/upload/" + item.url_foto + "' alt=''></center></td>";
                filas += "<td><center>" + xd + "</center></td>"
                filas += "<td><center><button type='button' class='btn btn-sm' data-deleteImg=" + item.url_foto + " id='delteBtnId' data-delteBtnId=" + item.idperfiles + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.idperfiles + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></center></td></tr>";
            });
            if (response.perfiles == '') {
                filas += "<tr><td colspan='3'>No hay datos</td><tr>"
            }
            $("#tbperf tbody").html(filas);
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
        title: "Eliminar Perfil?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((ifWillDelete) => {
        if (ifWillDelete) {
            var deleteImg = $(this).attr('data-deleteImg');
            var delteBtnId = $(this).attr('data-delteBtnId');
            var action = 'delete';
            $.ajax({
                url: "Controller_Perfiles/eliminar_perfiles",
                method: "POST",
                data: {
                    deleteImg: deleteImg,
                    delteBtnId: delteBtnId,
                    action: action
                },
                beforeSend: function() {
                    swal({
                        title: "Eliminando.....",
                        timer: 5000
                    });
                },
                success: function(data) {
                    if (data.trim() == 'deleted') {
                        swal({
                            title: "Perfil eliminada correctamente",
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
    $("#form-title").text('Crear perfil');
    $("#action").val('create');
    $("#submit").val('create');
});
$(document).on("click", "#editBtnId", function(e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-editBtnId');
    var action = 'fetchSingleRow';
    $.ajax({
        url: "Controller_Perfiles/linea_actualizar",
        method: "POST",
        data: {
            editBtnId: editBtnId,
            action: action
        },
        dataType: "json",
        success: function(data) {
            $("#create_form_modal").modal('show');
            $("#nombre").val(data.nombre);
            $("#cargo").val(data.cargo);
            $("#info").val(data.info);
            $("#estado").val(data.estado);
            $("#uploaded_image").val(data.url_foto);
            $("#uploaded_hidden_image").html(data.uploaded_hidden_image);
            $("#form-title").text('Editar Perfil');
            $("#action").val('update');
            $("#submit").val('update');
            $("#updateId").val(editBtnId);
        }
    });
});
$(document).on("submit", "#developer_cu_form", function(e) {
    e.preventDefault();
    var nombre = $("#nombre").val();
    var cargo = $("#cargo").val();
    var info = $("#info").val();
    var estado = $("#estado").val();
    var imageExtention = $("#url_foto").val().split('.').pop().toLowerCase();
    if (imageExtention != '') {
        if (jQuery.inArray(imageExtention, ['png', 'jpg', 'jpeg', 'gif']) == -1) {
            swal({
                title: "Foto Invalida",
                icon: "warning"
            });
            $("#url_foto").val('');
            return false;
        }
    }
    if (nombre == '') {
        swal({
            title: "Campo nombre requerido",
            icon: "warning"
        });
    } else if (cargo == '') {
        swal({
            title: "Campo Cargo requerido",
            icon: "warning"
        });
    } else if (info == '') {
        swal({
            title: "Campo Información requerido",
            icon: "warning"
        });
    } else if (url_foto == '') {
        swal({
            title: "Campo Foto requerido",
            icon: "warning"
        });
    } else if (estado == '') {
        swal({
            title: "Campo Estado requerido",
            icon: "warning"
        });
    } else {
        $.ajax({
            url: "Controller_Perfiles/actualizar_crear_perfiles",
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
                        title: "Perfil registrado correctamente",
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
                        title: "Perfil actualizada correctamente",
                        icon: "success",
                    });
                    $("#developer_cu_form")[0].reset();
                }
                main();
            }
        });
    }
});