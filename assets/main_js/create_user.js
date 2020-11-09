 $(document).on("ready", main);

 function main() {
     usuarios("", 1, 5);
     $("input[name=busqueda]").keyup(function() {
         textobuscar = $(this).val();
         valoroption = $("#cantidad").val();
         usuarios(textobuscar, 1, valoroption);
     });
     $("body").on("click", ".paginacion li a", function(e) {
         e.preventDefault();
         valorhref = $(this).attr("href");
         valorBuscar = $("input[name=busqueda]").val();
         valoroption = $("#cantidad").val();
         usuarios(valorBuscar, valorhref, valoroption);
     });
     $("#cantidad").change(function() {
         valoroption = $(this).val();
         valorBuscar = $("input[name=busqueda]").val();
         usuarios(valorBuscar, 1, valoroption);
     });
 }

 function usuarios(valorBuscar, pagina, cantidad) {
     $.ajax({
         url: "Controller_usuarios/listar_usuario",
         type: "POST",
         data: {
             buscar: valorBuscar,
             nropagina: pagina,
             cantidad: cantidad
         },
         dataType: "json",
         success: function(response) {
             filas = "";
             var i = 0;
             $.each(response.usuario, function(key, item) {
                 i++;
                 filas += "<tr><td>" + i + "</td><td>" + item.nombre + "</td><td>" + item.nombre_completo + "</td>";
                 filas += "<td><button type='button' class='btn btn-sm' id='delteBtnId' data-delteBtnId=" + item.id_usuario + "><i style='color:#D91F1F;' class='fa fa-trash'></i></button>";
                 filas += "<button type='button' class='btn btn-sm' id='editBtnId' data-editBtnId=" + item.id_usuario + "><i style='color:#2B77A8;' class='fa fa-pencil'></button></td></tr>";
             });
             $("#tbuser tbody").html(filas);
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
         title: "Eliminar usuario?",
         icon: "warning",
         buttons: true,
         dangerMode: true,
     }).then((ifWillDelete) => {
         if (ifWillDelete) {
             var delteBtnId = $(this).attr('data-delteBtnId');
             var action = 'delete';
             $.ajax({
                 url: "Controller_usuarios/eliminar_usuario",
                 method: "POST",
                 data: {
                     delteBtnId: delteBtnId,
                     action: action
                 },
                 success: function(data) {
                     if (data.trim() == 'deleted') {
                         swal({
                             title: "Usuario eliminado correctamente",
                             icon: "success"
                         });
                         main();
                     }
                 },
                 error: function() {
                     swal({
                         title: "No puedes elimiar un usuario con registro de bitacora",
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
     $("#form-title").text('Crear usuario');
     $("#action").val('create');
     $("#submit").val('create');
 });
 $(document).on("click", "#editBtnId", function(e) {
     e.preventDefault();
     var editBtnId = $(this).attr('data-editBtnId');
     var action = 'fetchSingleRow';
     $.ajax({
         url: "Controller_usuarios/linea_actualizar",
         method: "POST",
         data: {
             editBtnId: editBtnId,
             action: action
         },
         dataType: "json",
         success: function(data) {
             $("#create_form_modal").modal('show');
             $("#nombre").val(data.nombre);
             $("#nombre_completo").val(data.nombre_completo);
             $("#id_rol").val(data.id_rol);
             $("#estado").val(data.estado);
             $("#form-title").text('Editar usuario');
             $("#action").val('update');
             $("#submit").val('update');
             $("#updateId").val(editBtnId);
         }
     });
 });
 $(document).on("submit", "#developer_cu_form", function(e) {
     e.preventDefault();
     var nombre = $("#nombre").val();
     var nombre_completo = $("#nombre_completo").val();
     var clave = $("#clave").val();
     var id_rol = $("#id_rol").val();
     var estado = $("#estado").val();
     var clave2 = $("#clave2").val();
     var action = $("#action").val();

     if (nombre == '') {
         swal({
             title: "Campo nombre requerido",
             icon: "warning"
         });
     } else if (nombre_completo == '') {
         swal({
             title: "Campo Nombre completo requerido",
             icon: "warning"
         });
     }  else if (id_rol == '') {
         swal({
             title: "Campo rol requerido",
             icon: "warning"
         });
     } else if (estado == '') {
         swal({
             title: "Campo estado requerido",
             icon: "warning"
         });
     }else if (clave != clave2) {
         swal({
             title: "Las contaseñas no coinciden",
             icon: "warning"
         });
     }else if(action == 'create' && clave == ''){
        swal({
             title: "Campo clave requerido",
             icon: "warning"
         });
    
}  else {
         $.ajax({
             url: "Controller_usuarios/actualizar_crear_usuario",
             method: "POST",
             data: new FormData(this),
             contentType: false,
             processData: false,
             success: function(data) {
                 if (data.trim() == 'created') {
                     swal({
                         title: "Usuario registrado correctamente",
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
                         title: "Usuario actualizado correctamente",
                         icon: "success"
                     });
                     $("#developer_cu_form")[0].reset();
                 }
                 main();
             }
         });
     }
 });