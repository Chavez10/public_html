<!-- <br><br>
<div class="container-fluid">
    <div class="row">
    <h1 align="center">
      <?php if (empty($sql)): ?>
        No hay noticias en esta edicion...
        <div class="thumbnail" align="center">
          <img src="<?php echo base_url();?>assets/upload/10068.jpg" alt="..." style="height: 400px;">
          <div class="caption">
            <h1>Espere para mas publicaciones en esta edicion...</h1>
          </div>
        </div>
      <?php else: ?>
        Edicion N~<?php print_r($sql[0]->id_edicion) ?>
      <?php endif ?>
    </h1> 
    </div> 
</div>
<br><br> 
<div class="container" style="padding: 5px;">
  <?php foreach ($sql as $key => $value): ?>
  <div class="col-sm-4 col-md-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url();?>assets/upload/<?php echo $value->url; ?>" alt="<?php echo $value->foto; ?>" style="height: 200px;">
      <div class="caption">
        <h5><?php echo $value->Fecha; ?>.</h5>
        <h5 style="color: blue;"><?php echo $value->Titular; ?>.</h5>
        <?php echo $value->Subtitulo; ?>.
        <h5>Por:<?php echo $value->Reportero; ?>.</h5>
        <?php if ($value->estado == "Activo"): ?>
          <p><a href="<?php echo base_url();?>Controller_periodico/News/<?php echo $value->id_noticia ?>" class="btn btn-primary" role="button">Ver</a></p>
        <?php else: ?>
          <p><a href="<?php echo base_url();?>Controller_periodico/lastNews/<?php echo $value->id_noticia ?>" class="btn btn-primary" role="button">Ver</a></p>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php endforeach ?>
</div>

<script>

  $(function (){
      $(window).scroll(function(){
         if ($(this).scrollTop() > 1) {
          $('#logo').addClass("azul");
         } else {
          $("#logo").removeClass("azul");
         }
      });
  });
</script> 

<style> 
h5{
  text-align: left;
}
#logo {
    height: 75px;
    transition: 0.5s;
}

#logo.azul {
    height: 50px;
    transition: 0.5s;
}
@media only screen and (max-width: 720px) {
  #logo {
    height: 50px;
}
</style>

<script src="assets/js/noticias.js"></script> -->

<?php foreach ($tema as $key => $value): ?>
    
<?php 
$color = $value->color;
?>
<?php endforeach ?>

  <link href="<?php echo base_url(); ?>assets_web/guillermo/css/style.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets_web/guillermo/css/blog.css" rel="stylesheet">
    

            

<br><br>

<?php foreach ($sec as $key => $value): ?>
    <div class="main_title_2">
                <span><em></em></span>
                <h1 style="color:<?php echo $color; ?>;"><i class="fa fa-newspaper-o"></i>   Edición Nº<?php echo $value->num_edicion; ?></h1>
            </div>
<?php endforeach ?>

<?php $fox = base_url().'assets/upload/6020.png'?>
 


 <div id="dis" class="col-md-4">
    <div class="col-md-5" >
            <select name="cantidad" id="cantidad" class="form-control">
                <option value="8"><strong>MOSTRAR POR</strong></option>
                <option value="8"><p>8</p></option>
                <option value="16"><p>16</p></option>
            </select>
    </div>
</div>
    <div id="dis2" class="col-md-4 col-md-offset-4" >
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar noticias por Titulo" />
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
<div id="not" class="container-fluid margin_80_55"></div>
<div id="dis3" class="text-center paginacion">
</div>

<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script>
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
         url: "<?php echo base_url(); ?>Controller_periodico/all_notice_ed/<?php echo $id; ?>",
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
             $.each(response.noticia, function(key, item) {
                
                filas += "<div class=''>"
                filas += "<div class='col-sm-3 col-md-3 col-xs-12'>"
                filas += "<div class='item'>"
                filas += "<div class='strip grid' style='border-top: solid 4px #09245A;'>"
                if (item.url != null) {
                filas += "<figure>"
                if (item.estado == "Activo") {
                filas += "<a href='Controller_periodico/News/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<img src='<?php echo base_url(); ?>assets/upload/"+item.url+"' alt='"+item.foto+"' class='img-fluid' width='400' height='266'>"
                filas += "<div class='read_more'>"
                filas += "<span>Ver más</span>"
                filas += "</div>"
                filas += "</a>"
                } else {
                filas += "<a href='Controller_periodico/lastNews/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<img src='<?php echo base_url(); ?>assets/upload/"+item.url+"' alt='"+item.foto+"' class='img-fluid' width='400' height='266'>"
                filas += "<div class='read_more'>"
                filas += "<span>Ver más</span>"
                filas += "</div>"
                filas += "</a>"
                }   
                filas += "<small>"+item.Fecha+"</small>"
                filas += "</figure>"
                } else {
                filas += "<figure>"
                if (item.estado == "Activo") {
                filas += "<a href='Controller_periodico/News/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<img src='<?php echo base_url(); ?>assets/nohay.jpg' class='img-fluid' width='400' height='266'>"
                filas += "<div class='read_more'>"
                filas += "<span>Ver más</span>"
                filas += "</div>"
                filas += "</a>"
                } else {
                filas += "<a href='Controller_periodico/lastNews/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<img src='<?php echo base_url(); ?>assets/nohay.jpg' class='img-fluid' width='400' height='266'>"
                filas += "<div class='read_more'>"
                filas += "<span>Ver más</span>"
                filas += "</div>"
                filas += "</a>"
                }
                filas += "</figure>"
                }
                filas += "<div class='wrapper'>"
                filas += "<div class='post-content'>"
                filas += "<div class='' style='height: 75px;'>"
                var tt = item.Titular.length;
                filas += "<p><strong>"+item.Titular+"</strong></p><br>"
                filas += "</div>"
                filas += "</div>"
                filas += "<div class='' >"
                filas += "<a class='address'>"+item.Subtitulo+"...</a>"
                filas += "</div>"
                filas += "</div>"
                filas += "<div class='wrapper'><span class='loc_closed' style='font-size:10px;'><strong>POR: </strong>"+item.Reportero.toUpperCase()+"</span></div>"
                filas += "<ul style='background: #0D133A'>"
                if (item.estado == "Activo") {
                filas += "<li>"
                filas += "<a href='Controller_periodico/News/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<span class='loc_closed'>Ver Publicación</span>"
                filas += "</a>"
                filas += "</li>"
                } else {
                filas += "<li>"
                filas += "<a href='Controller_periodico/lastNews/"+item.id_noticia+"/"+item.id_cat_noticia+"'>"
                filas += "<span class='loc_closed'>Ver Publicación</span>"
                filas += "</a>"
                filas += "</li>"
                }           
                filas += "</ul>"
                filas += "</div>";
                filas += "</div>"
                filas += "</div>"
                filas += "</div>"
                

             });
             $("#not").html(filas);
                if (response.noticia==0) {
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
</script>

<script>

  $(function (){
      $(window).scroll(function(){
         if ($(this).scrollTop() > 1) {
          $('#logo').addClass("azul");
         } else {
          $("#logo").removeClass("azul");
         }
      });
  });
</script> 

<style> 

#re{
    font-size: 100px;
}
#ocu{
    display: none;
}
#buse{
    display: none;
}
#dis{
    display: none;
}
#logo {
    height: 75px;
    transition: 0.5s;
}

#logo.azul {
    height: 50px;
    transition: 0.5s;
}
@media only screen and (max-width: 720px) {
  #logo {
    height: 50px;
}
}
</style>