 $(document).on("ready", main);

 function main() {
     notice("", 1, 5);
     $("input[name=busqueda]").keyup(function() {
         textobuscar = $(this).val();
         valoroption = $("#cantidad").val();
         notice(textobuscar, 1, valoroption);
     });
     $("body").on("click", ".paginacion li a", function(e) {
         e.preventDefault();
         valorhref = $(this).attr("href");
         valorBuscar = $("input[name=busqueda]").val();
         valoroption = $("#cantidad").val();
         notice(valorBuscar, valorhref, valoroption);
     });
     $("#cantidad").change(function() {
         valoroption = $(this).val();
         valorBuscar = $("input[name=busqueda]").val();
         notice(valorBuscar, 1, valoroption);
     });
 }

 function notice(valorBuscar, pagina, cantidad) {
     $.ajax({
         url: "Controller_notice/listar_notice",
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
             $.each(response.notice, function(key, item) {
                 i++;
                 filas += "<tr>"
                 filas += "<td><center>" + i + "</center></td>";
                 filas += "<td>" + item.Titular + "</td>";
                 filas += "<td>" + item.Reportero + "</td>";
                 filas += "<td>" + item.Fecha + "</td>";
                 filas += "<td><center><a style='background:#132D38;color:white;' class='btn btn-sm' href='Controller_notice/vista_textarea/" + item.id_noticia + "'>Ingresar-Editar Texto</a><button type='button' class='btn btn-sm' id='delteBtnId' data-delteBtnId=" + item.id_noticia + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                 filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_noticia + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></td></center></tr>";
             });
             $("#tbnot tbody").html(filas);
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
         title: "Eliminar la Noticia?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     }).then((ifWillDelete) => {
         if (ifWillDelete) {
             var delteBtnId = $(this).attr('data-delteBtnId');
             var action = 'delete';
             $.ajax({
                 url: "Controller_notice/eliminar_notice",
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
                             title: "Noticia eliminada correctamente",
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
     $("#form-title").text('Crear noticia');
     $("#action").val('create');
     $("#submit").val('create');
 });
 $(document).on("click", "#editBtnId", function(e) {
     e.preventDefault();
     var editBtnId = $(this).attr('data-editBtnId');
     var action = 'fetchSingleRow';
     $.ajax({
         url: "Controller_notice/linea_actualizar",
         method: "POST",
         data: {
             editBtnId: editBtnId,
             action: action
         },
         dataType: "json",
         success: function(data) {
             $("#create_form_modal").modal('show');
             $("#id_cat_noticia").val(data.id_cat_noticia);
             $("#id_cat_nivel").val(data.id_cat_nivel);
             $("#Titular").val(data.Titular);
             $("#Subtitulo").val(data.Subtitulo);
             $("#Fecha").val(data.Fecha);
             $("#Editor").val(data.Editor);
             $("#Reportero").val(data.Reportero);
             $("#form-title").text('Editar noticia');
             $("#action").val('update');
             $("#submit").val('update');
             $("#updateId").val(editBtnId);
         }
     });
 });
 $(document).on("submit", "#developer_cu_form", function(e) {
     e.preventDefault();
     var id_cat_noticia = $("#id_cat_noticia").val();
     var id_cat_nivel = $("#id_cat_nivel").val();
     var Titular = $("#Titular").val();
     var Subtitulo = $("#Subtitulo").val();
     var Fecha = $("#Fecha").val();
     var Editor = $("#Editor").val();
     var Reportero = $("#Reportero").val();
     if (id_cat_noticia == '') {
         swal({
             title: "Campo categoria de la noticia requerido",
             icon: "warning"
         });
     } else if (id_cat_nivel == '') {
         swal({
             title: "Campo nivel de la noticia requerido",
             icon: "warning"
         });
     } else if (Titular == '') {
         swal({
             title: "Campo Titular requerido",
             icon: "warning"
         });
     } else if (Subtitulo == '') {
         swal({
             title: "Campo Subtitulo requerido",
             icon: "warning"
         });
     } else if (Fecha == '') {
         swal({
             title: "Campo Fecha requerido",
             icon: "warning"
         });
     } else if (Editor == '') {
         swal({
             title: "Campo Editor requerido",
             icon: "warning"
         });
     } else if (Reportero == '') {
         swal({
             title: "Campo Reportero requerido",
             icon: "warning"
         });
     } else {
         $.ajax({
             url: "Controller_notice/actualizar_crear_notice",
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
                         title: "Noticia registrada correctamente",
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
                         title: "Noticia actualizada correctamente",
                         icon: "success"
                     });
                     $("#developer_cu_form")[0].reset();
                 }
                 main();
             }
         });
     }
 });