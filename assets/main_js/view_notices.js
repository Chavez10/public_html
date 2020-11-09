 $(document).on("ready", main);

 function main() {
     noticia("",1, 8);
     $("input[name=busqueda]").keyup(function() {
         textobuscar = $(this).val();
         valoroption = $("#cantidad").val();
         noticia(textobuscar, 1, valoroption);
     });
     $("body").on("click", ".paginacion li a", function(e) {
         e.preventDefault();
         valorhref = $(this).attr("href");
         valorBuscar = $("input[name=busqueda]").val();
         valoroption = $("#cantidad").val();
         noticia(valorBuscar, valorhref, valoroption);
     });
     $("#cantidad").change(function() {
         valoroption = $(this).val();
         valorBuscar = $("input[name=busqueda]").val();
         noticia(valorBuscar,1, valoroption);
     });
 }

 function noticia(valorBuscar, pagina, cantidad) {
     $.ajax({
         url: "Controller_periodico/all_notice",
         type: "POST",
         data: {
             buscar: valorBuscar,
             nropagina: pagina,
             cantidad: cantidad
         },
         dataType: "json",
         success: function(response) {
             filas = "";
             $.each(response.noticia, function(key, item) {
                 filas += "<div class='col-sm-4 col-md-4 col-xs-12'>"
                 filas += "<div class='thumbnail'>";
                 if (item.url != null) {
                     filas += "<img src='assets/upload/"+item.url+" ?>' alt='"+item.foto+"' style='height: 200px;'>";
                 } else {
                     filas += "<img src='assets/logo.png ?>' alt='...' style='height: 200px;'>";
                 }
                 filas += "<div class='caption' style='height:200px;'>";
                 filas += "<h5>"+item.Fecha+"</h5>";
                 filas += "<h5 style='color: blue;'>"+item.Titular+".</h5>";
                 filas += item.Subtitulo+"...";
                 filas += "<h5>Por: "+item.Reportero+".</h5>";
                 if (item.estado == "Activo") {
                     filas += "<p><a href='Controller_periodico/News/"+item.id_noticia+"' class='btn btn-primary' role'button'>Ver</a></p>";
                 } else {
                     filas += "<p><a href='Controller_periodico/lastNews/"+item.id_noticia+"' class='btn btn-primary' role'button'>Ver</a></p>";
                 }
                 filas += "</div>";
                 filas += "</div>";
                 filas += "</div>"
             });
             $("#not").html(filas);
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