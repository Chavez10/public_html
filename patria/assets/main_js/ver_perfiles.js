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
        url: "Controller_periodico/all_perfiles",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            cantidad: cantidad
        },
        dataType: "json",
        success: function(response) {
            filas = "";         
            $.each(response.perfiles, function(key, item) {
                filas += "<div class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>";
                filas += "<div class='thumbnail'>";
                filas += "<img src='assets/upload/" + item.url_foto + "' class='img-circle imga' height='50' id='img'>";
                filas += "<div><center>"+item.nombre+" - "+item.cargo+"</center></div>";
                filas += "<div class='caption'>";
                filas += "<p align='center' style='color: blue; font-size: 15px;'><strong></strong></p>";
                filas += "<button type='button' class='btn btn-sm' id='infoBtnId' data-infoBtnId=" + item.idperfiles + " >Ver Mas</button>";
                filas += "</div>";
                filas += "</div>";
                filas += "</div>";
            });
            if (response.perfiles == '') {
                filas += "<tr><td colspan='3'>No hay datos</td><tr>"
            }
            $("#dvperf").html(filas);
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