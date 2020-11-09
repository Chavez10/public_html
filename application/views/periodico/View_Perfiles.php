  <link href="<?php echo base_url(); ?>assets_web/guillermo/css/style.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets_web/guillermo/css/blog.css" rel="stylesheet">
  <br><br>

  <div class="bg_color_1">
     <div class="container margin_80_55">
        <div class="main_title_2">
           <span><em></em></span>
           <h2>SECCIÓN DE PERFILES</h2>
       </div>
       <div class="container">
        <?php $fox = base_url().'assets/upload/6020.png'?>
        <div id="dis" class="col-md-4">
            <div class="col-md-5" >
                <select name="cantidad" id="cantidad" class="form-control">
                    <option value="8"><strong>MOSTRAR POR</strong></option>
                    <option value="8"><p>8</p></option>
                    <option value="10"><p>10</p></option>
                </select>
            </div>
        </div>
        <div id="dis2" class="col-md-4 col-md-offset-4" >
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar personas" />
            <a id="buse" class="btn btn-info">PROCESANDO <i class="fa fa-refresh fa-spin"></i></a>
            <br>
        </div>
        <div id="ocu" class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p><h4 align="center">NO SE ENCONTRARON RESULTADOS</h4></p>
                    <p><img src="<?php echo $fox ?>" alt="" style="width: 100%;height: 100%;"></p>
                </div>

            </div>
        </div>
    </div>
    <div id="perf">



    </div>
</div>
</div>


<div id="dis3" class="text-center paginacion">
</div>

<br><br>


<script>
    var j1 = jQuery.noConflict();
</script>

<script>
    j1(document).ready(function ($) {
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
               url: "<?php echo base_url(); ?>Controller_periodico/pef_ajax",
               type: "POST",
               data: {
                   buscar: valorBuscar,
                   nropagina: pagina,
                   cantidad: cantidad
               },
               dataType: "json",
               beforeSend: function() {
                  $('#buse').css("display", "block");
              },
              success: function(response) {
               $('#buse').css("display", "none");            
               filas = "";
               $.each(response.perfiles, function(key, item) {
                  filas += "<div class='item col-md-3'>"
                  filas += "<div class='strip grid'>"
                  filas += "<figure>"
                  filas += "<a href='' id='perf' data-perf='"+item.idperfiles+"'><img src='<?php echo base_url(); ?>assets/upload/"+item.url_foto+"'' class='img-fluid' alt='' width='400' height='266'><div class='read_more'><span>"+item.nombre+"</span></div></a>"
                  filas += "<small>VER</small>"
                  filas += "</figure>"
                  filas += "<ul>"
                  filas += "<li><span class='loc_open' style='font-size:10px;'>"+item.nombre+"</span></li>"
                  filas += "</ul>"
                  filas += "</div>"
                  filas += "</div>"
              });
               $("#perf").html(filas);
               if (response.perfiles==0) {
                $('#dis').css("display", "none");
                $('#dis3').css("display", "none");
                $('#ocu').css("display", "inline");
            }else{
                $('#ocu').css("display", "none");
                $('#dis').css("display", "inline");
                $('#dis3').css("display", "block");
            }


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

       },
       error: function() {
        $('#buse').css("display", "none");
    }
});
}
$(document).on("click", "#perf", function (e) {
    e.preventDefault();
    var perf = $(this).attr("data-perf");
    $.ajax({
        url: "<?php echo base_url(); ?>Controller_periodico/perfil",
        method: "POST",
        data: {
            perf: perf
        },
        dataType: "json",
        success: function (data) {
            $("#perfil-modal").modal('show');
            $("#nombre").html(data.nombre);
            $("#info").html(data.info);
            $("#url_foto").html("<img src='<?php echo base_url(); ?>assets/upload/"+data.url_foto+"' style='max-height: 100%;max-width: 100%;'></img>");
            $("#cargo").html(data.cargo);
            $("#form-title").html('<h3 align="center">Perfil de '+data.nombre+'</h3>');
        }
    });
});
})
</script>

<style>
	#ocu{
		display: none;
	}
</style>


<div class="modal fade" id="perfil-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="pmd-cart-title-text" id="form-title"></h4>

            </div>
            <article class="blog">
                <figure>
                   <a><div id="url_foto"></div>
                      <div class="preview"><span id="nombre"></span></div>
                  </a>
              </figure>
              <div class="post_info">
               <h2 id="cargo"></h2>
               <p id="info"></p>
           </div>
       </article>
   </div>
</div>
</div>

