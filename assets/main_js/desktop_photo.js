$(document).on("ready", main);

function main() {
    photo("", 1, 5);
    $("input[name=busqueda]").keyup(function() {
        textobuscar = $(this).val();
        valoroption = $("#cantidad").val();
        photo(textobuscar, 1, valoroption);
    });
    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorhref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda]").val();
        valoroption = $("#cantidad").val();
        photo(valorBuscar, valorhref, valoroption);
    });
    $("#cantidad").change(function() {
        valoroption = $(this).val();
        valorBuscar = $("input[name=busqueda]").val();
        photo(valorBuscar, 1, valoroption);
    });
}

function photo(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: "Controller_photo/listar_photo",
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
            $.each(response.photo, function(key, item) {
                i++;
                filas += "<tr>"
                filas += "<td><center>" + i + "</td></center>";
                filas += "<td><center><img style='width:50px;height:50px;border-radius:10px;' src='assets/upload/" + item.url + "' alt=''></center></td>";
                filas += "<td><center>" + item.titulo_foto + "</center></td>"
                filas += "<td><center>" + item.Fotografo + "</center></td>"
                filas += "<td><center><button type='button' class='btn btn-sm' data-deleteImg=" + item.url + " id='delteBtnId' data-delteBtnId=" + item.id_foto + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_foto + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></center></td></tr>";
            });
            if (response.photo == '') {
                filas += "<tr><td colspan='3'>No hay datos</td>"
            }
            $("#tbphoto tbody").html(filas);
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
        title: "Eliminar Foto?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((ifWillDelete) => {
        if (ifWillDelete) {
            var deleteImg = $(this).attr('data-deleteImg');
            var delteBtnId = $(this).attr('data-delteBtnId');
            var action = 'delete';
            $.ajax({
                url: "Controller_photo/eliminar_photo",
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
                            title: "Foto eliminada correctamente",
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
    $("#form-title").text('Crear cabecera');
    $("#action").val('create');
    $("#submit").val('create');
});
$(document).on("click", "#editBtnId", function(e) {
    e.preventDefault();
    var editBtnId = $(this).attr('data-editBtnId');
    var action = 'fetchSingleRow';
    $.ajax({
        url: "Controller_photo/linea_actualizar",
        method: "POST",
        data: {
            editBtnId: editBtnId,
            action: action
        },
        dataType: "json",
        success: function(data) {
            $("#create_form_modal").modal('show');
            $("#titulo_foto").val(data.titulo_foto);
            $("#Fotografo").val(data.Fotografo);
            $("#uploaded_image").val(data.url);
            $("#uploaded_hidden_image").html(data.uploaded_hidden_image);
            $("#form-title").text('Editar cabecera');
            $("#action").val('update');
            $("#submit").val('update');
            $("#updateId").val(editBtnId);
        }
    });
});
$(document).on("submit", "#developer_cu_form", function(e) {
    e.preventDefault();
    var titulo_foto = $("#titulo_foto").val();
    var Fotografo = $("#Fotografo").val();
    var url = $("#url").val();
    var imageExtention = $("#url").val().split('.').pop().toLowerCase();
    if (imageExtention != '') {
        if (jQuery.inArray(imageExtention, ['png', 'jpg', 'jpeg', 'gif']) == -1) {
            swal({
                title: "Foto Invalida",
                icon: "warning"
            });
            $("#url").val('');
            return false;
        }
    }
    if (titulo_foto == '') {
        swal({
            title: "Campo titulo_foto requerido",
            icon: "warning"
        });
    } else if (Fotografo == '') {
        swal({
            title: "Campo Fotografo requerido",
            icon: "warning"
        });
    } else {
        $.ajax({
            url: "Controller_photo/actualizar_crear_photo",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            xhr: function() {
                     var xhr = new window.XMLHttpRequest();
                     //Upload progress, request sending to server
                     alertify.alert('<div id="dr" align="center"><h3>Un momento</h3></div><div id="dr2" align="center"><h3><i style="color:green;" class="fa fa-check"></i> Completado exitosamente</h3></div><div class="progress" style=""><div id="bulk-action-progbar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width:1%"></div></div>');
                     xhr.upload.addEventListener("progress", function(evt) {
                         console.log("in Upload progress");
                         console.log("Upload Done");
                         $('#dr2').css("display", "none");
                         $('.alertify-buttons button').css("display", "none");
                     }, false);
                     //Download progress, waiting for response from server
                     xhr.addEventListener("progress", function(e) {
                         console.log("in Download progress");
                         if (e.lengthComputable) {
                             //percentComplete = (e.loaded / e.total) * 100;
                             percentComplete = parseInt((e.loaded / e.total * 100), 10);
                             console.log(percentComplete);
                             $('#bulk-action-progbar').data("aria-valuenow", percentComplete);
                             $('#bulk-action-progbar').css("width", percentComplete + '%');
                             $('#dr').css("display", "none");
                             $('#dr2').css("display", "block");
                             $('.alertify-buttons button').css("display", "inline");
                             if ($('.modal-backdrop').is(':visible')) {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    };
                         } else {
                             console.log("Length not computable.");
                         }
                     }, false);
                     return xhr;
                 },
            success: function(data) {
                if (data.trim() == 'created') {
                    $("#create_form_modal").modal('hide');
                    
                    $("#developer_cu_form")[0].reset();
                }
                $("#create_form_modal").modal('hide');
                if (data.trim() == 'update') {
                    $("#developer_cu_form")[0].reset();
                }
                main();
            }
        });
    }
});