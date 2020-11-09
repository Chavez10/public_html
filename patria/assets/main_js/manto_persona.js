 $(document).on("ready", main);
 $(document).on("click", "#create_acc_btn", function(e) {
     e.preventDefault();
     $("#developer_cu_form")[0].reset();
     $("#form-title").text('');
     $("#action").val('create');
     $("#submit").val('create');
 });

 function main() {
     get_persona("", 1, 5);
     $("input[name=busqueda]").keyup(function() {
         textobuscar = $(this).val();
         valoroption = $("#cantidad").val();
         get_persona(textobuscar, 1, valoroption);
     });
     $("body").on("click", ".paginacion li a", function(e) {
         e.preventDefault();
         valorhref = $(this).attr("href");
         valorBuscar = $("input[name=busqueda]").val();
         valoroption = $("#cantidad").val();
         get_persona(valorBuscar, valorhref, valoroption);
     });
     $("#cantidad").change(function() {
         valoroption = $(this).val();
         valorBuscar = $("input[name=busqueda]").val();
         get_persona(valorBuscar, 1, valoroption);
     });
 }

 function get_persona(valorBuscar, pagina, cantidad) {
     $.ajax({
         url: "Controller_registro_personas/listar_persona",
         type: "POST",
         data: {
             buscar: valorBuscar,
             nropagina: pagina,
             cantidad: cantidad
         },
         dataType: "json",
         success: function(response) {
             filas = "";
             var spacio = " ";
             $.each(response.persona, function(key, item) {
                 filas += "<tr>"
                 filas += "<td>" + item.id_per + "</td>";
                 filas += "<td>" + item.nombres + spacio + item.apellidos + "</td>";
                 filas += "<td>" + item.telefono + "</td>";
                 filas += "<td>" + item.direccion + "</td>";
                 filas += "<td>" + item.correo_electronico + "</td>";
                 filas += "<td><button type='button' class='btn btn-sm' id='delteBtnId' data-delteBtnId=" + item.id_per + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                 filas += "<a class='btn btn-sm' href='Controller_registro_mascotas/vista_mascotas/" + item.id_per + "'><i style='color:#39A2BC;' class='fa fa-eye'></i> </a>  ";
                 filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_per + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></td></tr>";
             });
             $("#tbraza tbody").html(filas);
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
         title: "Eliminar propitario?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     }).then((ifWillDelete) => {
         if (ifWillDelete) {
             var delteBtnId = $(this).attr('data-delteBtnId');
             var action = 'delete';
             $.ajax({
                 url: "Controller_registro_personas/eliminar_persona",
                 method: "POST",
                 data: {
                     delteBtnId: delteBtnId,
                     action: action
                 },
                 success: function(data) {
                     if (data.trim() == 'deleted') {
                         swal({
                             title: "Propietario eliminado correctamente",
                             icon: "success"
                         });
                         main();
                     }
                 },
                 error: function() {
                     swal({
                         title: "verifique que no tenga mascotas asignadas",
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
     $("#form-title").text('Crear propietario');
     $("#action").val('create');
     $("#submit").val('create');
 });
 $(document).on("click", "#editBtnId", function(e) {
     e.preventDefault();
     var editBtnId = $(this).attr('data-editBtnId');
     var action = 'fetchSingleRow';
     $.ajax({
         url: "Controller_registro_personas/linea_actualizar",
         method: "POST",
         data: {
             editBtnId: editBtnId,
             action: action
         },
         dataType: "json",
         success: function(data) {
             $("#create_form_modal").modal('show');
             document.getElementById('id_per').disabled = true;
             $("#id_per").val(data.id_per);
             $("#nombres").val(data.nombres);
             $("#apellidos").val(data.apellidos);
             $("#correo_electronico").val(data.correo_electronico);
             $("#telefono").val(data.telefono);
             $("#direccion").val(data.direccion);
             $("#form-title").text('Editar Propietario');
             $("#action").val('update');
             $("#submit").val('update');
             $("#updateId").val(editBtnId);
         }
     });
 });
 $(document).on("submit", "#developer_cu_form", function(e) {
     e.preventDefault();
     document.getElementById('id_per').disabled = false;
     var id_per = $("#id_per").val();
     var nombres = $("#nombres").val();
     var apellidos = $("#apellidos").val();
     var correo_electronico = $("#correo_electronico").val();
     var telefono = $("#telefono").val();
     var direccion = $("#direccion").val();
     if (nombres == '') {
         swal({
             title: "Campo nombres requerido",
             icon: "warning"
         });
     } else if (id_per == '') {
         swal({
             title: "Selecciona un sexo",
             icon: "warning"
         });
     } else if (apellidos == '') {
         swal({
             title: "Selecciona un sexo",
             icon: "warning"
         });
     } else if (correo_electronico == '') {
         swal({
             title: "Selecciona un sexo",
             icon: "warning"
         });
     } else if (telefono == '') {
         swal({
             title: "Selecciona un sexo",
             icon: "warning"
         });
     } else if (direccion == '') {
         swal({
             title: "Selecciona un sexo",
             icon: "warning"
         });
     } else {
         $.ajax({
             url: "Controller_registro_personas/actualizar_crear_persona",
             method: "POST",
             data: new FormData(this),
             contentType: false,
             processData: false,
             success: function(data) {
                 if (data.trim() == 'created') {
                     swal({
                         title: "Propietario registrado correctamente",
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
                 if ($('.modal').is(':visible')) {
                     $('body').removeClass('modal-open');
                     $('.modal').remove();
                 };
                 if (data.trim() == 'update') {
                     swal({
                         title: "Propietario actualizado correctamente",
                         icon: "success"
                     });
                     $("#developer_cu_form")[0].reset();
                 }
                 main();
             }
         });
     }
 });