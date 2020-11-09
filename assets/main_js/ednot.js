 $(document).on("ready", main);

 function main() {
     ed_notice("", 1, 5);
     $("input[name=busqueda]").keyup(function() {
         textobuscar = $(this).val();
         valoroption = $("#cantidad").val();
         ed_notice(textobuscar, 1, valoroption);
     });
     $("body").on("click", ".paginacion li a", function(e) {
         e.preventDefault();
         valorhref = $(this).attr("href");
         valorBuscar = $("input[name=busqueda]").val();
         valoroption = $("#cantidad").val();
         ed_notice(valorBuscar, valorhref, valoroption);
     });
     $("#cantidad").change(function() {
         valoroption = $(this).val();
         valorBuscar = $("input[name=busqueda]").val();
         ed_notice(valorBuscar, 1, valoroption);
     });
 }

 function ed_notice(valorBuscar, pagina, cantidad) {
     $.ajax({
         url: "Controller_ednot/listar_ednot",
         type: "POST",
         data: {
             buscar: valorBuscar,
             nropagina: pagina,
             cantidad: cantidad
         },
         dataType: "json",
         success: function(response) {
             filas = "";
             xd = "";
              var i = 0;
             $.each(response.ed_notice, function(key, item) {
                 i++;
                 if (item.estado == 'Activo') {
                    xd = "<p style='background:#33CC80; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-check'></i></p>"
                } else {
                    xd = "<p style='background:#EC1365; color:white; font-family:solid; font-size:15px;border-radius:10px; text-align:center;'>" + item.estado + " <i class='fa fa-times'></i></p>"
                }
                 filas += "<tr><td><center>" + i + "º</center></td>"
                 filas += "<td><center>" + xd + "</center></td>"
                 filas += "<td>" + item.Titular + "</td>";
                 filas += "<td>" + item.Reportero + "</td>";
                 filas += "<td> N~ " + item.num_edicion + "</td>";
                 filas += "<td><button type='button' class='btn btn-sm' id='delteBtnId' data-delteBtnId=" + item.id_edicion_noticia + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                 filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_edicion_noticia + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></td></tr>";
             });
             $("#tbednot tbody").html(filas);
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
         title: "Eliminar la Asignacion?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     }).then((ifWillDelete) => {
         if (ifWillDelete) {
             var delteBtnId = $(this).attr('data-delteBtnId');
             var action = 'delete';
             $.ajax({
                 url: "Controller_ednot/eliminar_ednot",
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
                             title: "Asignacion eliminada correctamente",
                             icon: "success"
                         });
                         main();
                     }
                 },
                 error: function() {
                     swal({
                         title: "Verifique que no este asignado",
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
     $("#form-title").text('Asignar Noticia');
     $("#action").val('create');
     $("#submit").val('create');
 });
 $(document).on("click", "#editBtnId", function(e) {
     e.preventDefault();
     var editBtnId = $(this).attr('data-editBtnId');
     var action = 'fetchSingleRow';
     $.ajax({
         url: "Controller_ednot/linea_actualizar",
         method: "POST",
         data: {
             editBtnId: editBtnId,
             action: action
         },
         dataType: "json",
         success: function(data) {
             $("#create_form_modal").modal('show');
             $("#id_noticia").val(data.id_noticia);
             $("#id_edicion").val(data.id_edicion);
             $("#form-title").text('Editar Asignacion');
             $("#action").val('update');
             $("#submit").val('update');
             $("#updateId").val(editBtnId);
         }
     });
 });
 $(document).on("submit", "#developer_cu_form", function(e) {
     e.preventDefault();
     var id_noticia = $("#id_noticia").val();
     var id_edicion = $("#id_edicion").val();
     if (id_noticia == '') {
         swal({
             title: "Seleccione una noticia",
             icon: "warning"
         });
     } else if (id_edicion == '') {
         swal({
             title: "Seleccione una edicion",
             icon: "warning"
         });
     } else {
         $.ajax({
             url: "Controller_ednot/actualizar_crear_ednot",
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
                         title: "Asignacion registrada correctamente",
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
                         title: "Asignacion actualizada correctamente",
                         icon: "success"
                     });
                     $("#developer_cu_form")[0].reset();
                 }
                 main();
             }
         });
     }
 });