<?php foreach ($notice as $key => $value): ?>
  <?php $Titular =  $value->Titular; 
  $Subtitulo =  $value->Subtitulo; 
  ?>
  <?php $url =  $value->url; ?>
  <?php $Nota =  $value->Nota; ?>
  <?php $Reportero =$value->Reportero; ?>
  <?php $Fotografo =$value->fotografo; ?>
  <?php $fotfecha =$value->fechafoto; ?> 
  <?php $EditNot = $value->edicion; ?>
  <?php $CatNot = $value->nc_noticia; ?>
  <?php $CantFotos = $value->cantidad; ?>
  <?php $IdEdit = $value->id_edicion; ?>
  <?php $IdCat = $value->id_cat_noticia; ?>
<?php endforeach ?>

<?php foreach ($tema as $key => $value): ?>
    
<?php 
$fotorola = base_url() . 'assets/upload/' . $value->foto;

?>

<?php endforeach ?>

<?php $id = $this->uri->segment(3); ?>

<div class="row">
<div class="hidden-xs col-lg-12 col-md-12 col-sm-12 hero-image" style="padding: 5px;">
      <img src="<?php echo $fotorola; ?>" alt="..." style="width: 100%; height: 400px;">
</div>
<div class="col-xs-12 hidden-sm hidden-lg hidden-md menu hero-image" style="padding: 10px;">
  <img src="<?php echo $fotorola; ?>" alt="..." style="width: 100%; height: 200px;">
</div>
<div class="hidden-xs hidden-sm col-lg-2 col-md-2" style="text-align: left;">
  <hr>
  <a href="<?php echo base_url();?>Controller_periodico/all_News/1"><font size="3" color="000085">Noticias USAM</font></a>
  <hr>
  <a class="dropdown">
    <a class="dropdown-toggle" data-toggle="collapse" data-target="#submenu4" aria-expanded="false"><font size="3" color="000085">Nacional</font><span class="caret"></span></a>
      <ul class="nav collapse" id="submenu4" role="menu" aria-labelledby="btn-1"> 
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/7" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Politica</font></a></li>                       
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/8" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Sucesos</font></a></li>
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/9" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Economia</font></a></li>
      </ul>
  </a>
  <hr>
  <a href="<?php echo base_url();?>Controller_periodico/all_News/3"><font size="3" color="000085">  Deportes </font></a>
  <hr>
    <a class="dropdown">
      <a class="dropdown-toggle" data-toggle="collapse" data-target="#submenu5" aria-expanded="false">
        <font size="3" color="000085">Revista </font><span class="caret"></span></a>
        <ul class="nav collapse" id="submenu5" role="menu" aria-labelledby="btn-1"> 
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/10" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Espectaculos</font></a></li>                       
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/11" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span> Arte y Cultura</font></a></li>
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/12" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Reportaje</font></a></li>
        <li><a href="<?php echo base_url();?>Controller_periodico/all_News/13" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Academico</font></a></li>                  
        </ul>
      </a>
  <hr>  
    <a href="<?php echo base_url();?>Controller_periodico/acercade"><font size="3" color="000085">Acerca de</font></a>
  <hr>
  
    <?php foreach ($sql as $key => $value): ?>
      <?php $id_not = $value->id_noticia ?>
      <?php $Titulo =  $value->Titular; ?>
      <?php $Foto =  $value->url; ?>
      <?php $Info =  $value->Subtitulo; ?>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" align=" justify">     
      <div class="thumbnail">
        <?php if ($Foto != null): ?>
                <img src="<?php echo base_url();?>assets/upload/<?php echo $Foto ?>" alt="..." style="height: 100px;width: 150px">
              <?php else: ?>
                <img src="<?php echo base_url();?>assets/nohay.jpg" alt="..." style="height: 100px;width: 150px">
              <?php endif ?>
        <div class="caption">
          <b style="font-size: 12px;"><?php echo $Titulo; ?></b>
        </div>
          <div class="caption" style="background: #1F2852;">
          <?php if ($value->estado == "Activo"): ?>
                <a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/News/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">VER MÁS</a>
              <?php else: ?>
                <a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/lastNews/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">VER MÁS</a>
              <?php endif ?>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>

<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
      <font size="5" color="black"><center><strong></strong><?php echo $Titular; ?></center></font>
      <font size="3" color="black"><center><strong></strong><?php echo $Subtitulo; ?></center></font>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <?php if ($url != null): ?>
            <a class="thumbnail">
            <img src="<?php echo base_url();?>assets/upload/<?php echo $url; ?>" alt="..." style="height: 240px;">
            <div class="caption" align="right">
              <h5><?php echo $Fotografo ?> - <?php echo $fotfecha ?></h5>
            </div>
            </a>
          <?php else: ?>
            <br>
            <br>

          <?php endif ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 align="right">
          <?php if ($IdEdit != null): ?>
              <a href="<?php echo base_url(); ?>Controller_periodico/edition/<?php echo $IdEdit; ?>" style="text-decoration: none;">
              Ediciòn: <?php echo $EditNot; ?>
            </a> 
            -   
            <?php endif ?> 
            <a href="<?php echo base_url(); ?>Controller_periodico/all_News/<?php echo $IdCat; ?>" style="text-decoration: none;">
              Categoria: <?php echo $CatNot; ?></h5>
            </a>
          <p ALIGN="justify"><?php echo $Nota; ?></p>
        </div>
      </div>
      <?php if ($CantFotos > 0): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <h3><a href="<?php echo base_url() ?>/Controller_periodico/galeria/<?php echo $id ?>" style="text-decoration: none;">Ver Galeria</a></h3>
        </div>
      <?php endif ?>
      </div>

<div class="col-xs-12 hidden-sm hidden-lg hidden-md menu" style="padding: 10px;">
  <?php foreach ($sql as $key => $value): ?>
      <?php $id_not = $value->id_noticia ?>
      <?php $Titulo =  $value->Titular; ?>
      <?php $Foto =  $value->url; ?>
      <?php $Info =  $value->Subtitulo; ?>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">     
      <div class="thumbnail">
        <img src="<?php echo base_url();?>assets/upload/<?php echo $Foto ?>" alt="..." style="height: 100px;">
        <div class="caption">
          <b><?php echo $Titulo; ?></b>
        </div>
        <div class="caption" style="background: #1F2852;">
          <?php if ($value->estado == "Activo"): ?>
                <a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/News/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">Ver mas...</a>
              <?php else: ?>
                <a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/lastNews/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">Ver mas...</a>
              <?php endif ?>
        </div>
      </div>
    </div>
    <?php endforeach ?>
</div>
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
p{
  line-height: 190%;
}

hr {
background-color: Blue;
height: 1px;
border: 0;
color: blue;
}

#submenu2 li a:hover {

    color: #FFF;
}

	 img {
      /*  To contain the image to the confines of the div  */
      max-width: 100%;
    }

    .hero-image {
      max-width: 100%; 
      margin: auto;
    }

    .hero-image::after {
      display: block;
      position: relative;
      background-image: linear-gradient(to bottom , rgba(255, 255, 255, 0) 0,#fff);
      margin-top: -150px;
      height: 150px;
      width: 100%;
      content:'';
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