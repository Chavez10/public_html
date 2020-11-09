  <link href="<?php echo base_url(); ?>n_ase/css/nivo-lightbox.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>n_ase/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>n_ase/css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url(); ?>n_ase/css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url(); ?>n_ase/css/animate.css" rel="stylesheet" />

  <!-- boxed bg -->
  <link id="bodybg" href="<?php echo base_url(); ?>n_ase/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="<?php echo base_url(); ?>n_ase/color/default.css" rel="stylesheet">


    <section id="facilities" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold"><a href="javascript: history.go(-1)" title="Volver">Galería</a></h2>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div id="owl-works" class="owl-carousel" id="cart">
              <?php foreach ($fot_sec as $key => $value): ?>
                <div class="item">
                  <a href="<?php echo base_url(); ?>assets/upload/<?php echo $value->url; ?>" title="<?php echo $value->titulo_foto; ?>" data-lightbox-gallery="gallery1" data-lightbox-hidpi="<?php echo base_url(); ?>assets/upload/<?php echo $value->url; ?>">
                    <img id="im-cart" src="<?php echo base_url(); ?>assets/upload/<?php echo $value->url; ?>" class="img-responsive" alt="img">
                  </a>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<br><br><br>

<style>
  #cart{
    max-width: 100%;
    max-height: 100%
  }
  #im-cart{
    max-height: 160px;
  }
  @media only screen and (max-width: 720px) {
    #im-cart{
    max-height: 100px;
    min-height: 100px;
  }
  }
</style>

  <script src="<?php echo base_url(); ?>n_ase/js/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>n_ase/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>n_ase/js/nivo-lightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>n_ase/js/custom.js"></script>