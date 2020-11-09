<?php $NomSis = 'Periodico Digital' ?>
<?php foreach ($tema as $key => $value): ?>

  <?php 
  $headder = $value->headder;
  $resaltado = $value->resaltado;
  ?>
<?php endforeach ?>
<!DOCTYPE HTML>
<html class = "no-js" lang = "es">
<head>
  <meta charset = "utf-8">
  <link href="assets_web/css/style.css" type="text/css" rel="stylesheet">
  <link href = "https://fonts.googleapis.com/css?family=Roboto" rel = "stylesheet">
  <meta http-equiv = "x-ua-compatible" content = "ie=edge">
  <base href = "<?php echo base_url() ?>">
  <title><?php echo $NomSis ?> | <?php echo $titulo ?></title>
  <meta name = "description" content = "">
  <meta name = "viewport" content = "width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "assets/css/bootstrap.min.css">
  <link rel = "stylesheet" type = "text/css" href = "assets/css/bootstrap-theme.min.css">
  <link rel = "stylesheet" type = "text/css" href = "assets_web/css/jquery-ui.min.css">
  <link href="assets_web/css/fontawesome.min.css" rel="stylesheet">  
  <!-- <link rel = "stylesheet" type = "text/css" href = "assets/css/custom.css"> -->
  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/public/alertify.core.css" >

  <link rel="stylesheet" href="<?php base_url(); ?>assets/css/public/alertify.default.css" >

  <script src="<?php base_url(); ?>assets/js/public/alertify.min.js" ></script>

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/font-awesome.min.css'; ?>">
  <script src="<?php echo base_url('assets_web/js/jquery-1.12.0.min.js') ?>"></script>
  <script src="<?php echo base_url('assets_web/js/bootstrap.min.js') ?>"></script>
  <link rel="shortcut icon" href="assets/ulogo.ico" type="image/x-icon" />

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="assets_web/engine1/style.css" />
  <script type="text/javascript" src="assets_web/engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->
</head>
<div class="jm-loadingpag"></div>
<body style="">  



  <header>
    <div align="center" style="background: #d6d6d6">
      <a href="<?php echo base_url(); ?>Controller_home/index_web"><img id="img-port" src="<?php echo base_url(); ?>logo.png" alt=""></a>
    </div>  

    <div class="navbar navbar-custom navbar navscroll" style="background: <?php echo $headder; ?>;border-radius:0px;border-color: <?php echo $headder; ?>;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <center>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left weg">
              <li id="po"><a id="he-a" class="nav navbar-nav" href="<?php echo base_url(); ?>Controller_home/index_web">Periódico Digital</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/all_News/1">Noticias USAM</a></li>
              <li id="po" class="dropdown">
                <a id="he-a" href="#" class="dropdown-toggle" data-toggle="dropdown">Nacional<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/7">Política</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/8">Sucesos</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/9">Economía</a></li>
                </ul>
              </li>
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/all_News/3">Deportes</a></li>
              <li id="po" class="dropdown">
                <a id="he-a" href="" class="dropdown-toggle" data-toggle="dropdown">Revista<b class="caret" ></b></a>
                <ul class="dropdown-menu">
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/10">Espectáculos</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/11">Arte y Cultura</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/12">Reportaje</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/13">Académico</a></li>
                  <li id="po"><a href="<?php echo base_url();?>Controller_periodico/all_News/14">Tecnología</a></li>
                </ul>
              </li>
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/all_News/15">Editorial - Opinión</a></li>
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/list_ediciones">Ediciones</a></li>
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/perfiles">Perfiles</a></li>
              <li id="po"><a id="he-a" href="<?php echo base_url();?>Controller_periodico/acercade">Acerca de</a></li>
            </ul>
          </div>
        </center>
      </div>
    </div>
  </header>
  <div class="container-fluid">

<!-- <script>
  $(function (){
      $(window).scroll(function(){
         if ($(this).scrollTop() > 100) {
          $('.navscroll').addClass("show");
         } else {
          $(".navscroll").removeClass("show");
         }
      });
  });
</script>  -->
<style>
  #po:hover{
    color: white;
    background-color: <?php echo $resaltado; ?>
  }
  .navscroll {
    transition:background-color 700ms, color 700ms;
  }

  @media only screen and (max-width: 720px) {
    .navscroll {
      background:<?php echo $headder; ?>;
      opacity: 1;
      transition:background-color 500ms, color 500ms;
    }
    #img-port{
      min-height: 70px;
      max-width: 100%;
    }
    .weg{
      display: none;
    }
  }

  .navscroll.show {
    top: 0;
    border-width: 0 0 1px;
    position: fixed;
    right: 0;
    left: 0;
    z-index: 1030;
    transition:3s;
  }
  #img-port{
    max-height: 100px;
    max-width: 100%;
  }
</style>







<style type="text/css">
  #he-a{
    color:white;
  }
  #he-a:focus{
    color:black;
  }

  .navbar-custom {
    background-color:<?php echo $headder; ?>;
    color:#ffffff;
    border-radius:0;
  }

  .navbar-custom > li > a {
    color:white;
  }

  .navbar-custom > .active > a {
    color: #000000;
    background-color:transparent;
  }

  .navbar-custom > li > a:hover,
  .navbar-custom > li > a:focus,
  .navbar-custom > .active > a:hover,
  .navbar-custom > .active > a:focus,
  .navbar-custom > .open >a {
    color:white;
    text-decoration: none;
    background-color: <?php echo $resaltado; ?>;
  }

  .navbar-custom .navbar-brand {
    color:#eeeeee;
  }
  .navbar-custom .navbar-toggle {
    background-color:#eeeeee;
  }
  .navbar-custom .icon-bar {
    background-color:<?php echo $resaltado; ?>;
  }
</style>
<style>
  .jm-loadingpage{
    position: fixed;
    left: 0px;
    top:0px;
    width: 100%;
    height: 100%;
    z-index: 999999999;
    background: url(assets/images/preloader.gif) center no-repeat #fff;    }


    a:active {
      outline:0;
    }

    .clear {
      clear:both;
    }

    h1,h2, h3, h4, h5, h6 {
      font-family:'Roboto', sans-serif;
      font-weight:700;
      line-height:1.1em;
      color:#666;
      margin-bottom: 20px;
    }

    .highlight {
      color: #fff !important;
      padding: 0 8px;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
    }

    .color-white {
      color: #fff;
    }


    #wrapper {
      width:100%;
      margin:0; 
      padding:0;
    }

    #wrapper.boxed {
      width:1230px;
      overflow:hidden;
      margin:0 auto;  
      padding:0;
      background:#fff;
    }



    .row,.row-fluid {
      margin-bottom:30px;
    }

    .row .row,.row-fluid .row-fluid{
      margin-bottom:30px;
    }

    .row.nomargin,.row-fluid.nomargin {
      margin-bottom:0;
    }


    header .top {
      padding:20px 0;
      margin:0;
      background: #f2f2f2;
    }

    header .top {
      border-bottom: 1px solid #ddd;
    }

    header .top ul.topleft-info {
      list-style: none;
      margin: 10px 0 0;
      padding-left: 0;
      float:left;
    }

    header .top ul.topleft-info li {
      display: inline;
      margin: 0 20px 0 0;
      padding:0;
      font-weight: 600;
    }


    header .top ul.topleft-info li a:hover {
      text-decoration: none;
      outline: 0;
    }

    ul.social-network {

      list-style:none;
      margin:0;
      padding:0;
    }

    ul.social-network li {
      display:inline;
      margin:0 5px;
    }
    ul.social-network li a:hover {
      -webkit-transition: all 1s ease-in-out;
      -moz-transition: all 1s ease-in-out;
      -o-transition: all 1s ease-in-out;
      transition: all 1s ease-in-out;
    }

    header .top ul.social-network li a {
      color: #fff;
    }

    .sb-search {
      position: relative;
      width: 0%;
      min-width: 36px;
      height: 36px;
      float: right;
      overflow: hidden;
      -webkit-transition: width 0.3s;
      -moz-transition: width 0.3s;
      transition: width 0.3s;
      -webkit-backface-visibility: hidden;
    }

    .sb-search-input {
      position: absolute;
      top: 0;
      right: 0;
      border: none;
      outline: none;
      background: #fff;
      width: 50%;
      height: 36px;
      margin: 0;
      z-index: 10;
      padding: 2px 41px 2px 10px;
      font-family: inherit;
      font-size: 14px;
      color: #2c3e50;
    }

    .sb-search-input::-webkit-input-placeholder {
      color: #efb480;
    }

    .sb-search-input:-moz-placeholder {
      color: #efb480;
    }

    .sb-search-input::-moz-placeholder {
      color: #efb480;
    }

    .sb-search-input:-ms-input-placeholder {
      color: #efb480;
    }

    .sb-icon-search,
    .sb-search-submit  {
      width: 36px;
      height: 36px;
      display: block;
      position: absolute;
      right: 0;
      top: 0;
      padding: 0;
      margin: 0;
      line-height: 36px;
      text-align: center;
      cursor: pointer;
    }

    .sb-search-submit {
      background: #fff; /* IE needs this */
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; /* IE 8 */
      filter: alpha(opacity=0); /* IE 5-7 */
      opacity: 0;
      color: transparent;
      border: none;
      outline: none;
      z-index: -1;
    }

    .sb-icon-search {
      color: #fff;
      z-index: 90;
      font-size: 14px;
      font-family: 'FontAwesome';
      speak: none;
      font-style: normal;
      font-weight: normal;
      font-variant: normal;
      text-transform: none;
      -webkit-font-smoothing: antialiased;
      -webkit-border-radius: 2px 2px 2px 2px;
      -moz-border-radius: 2px 2px 2px 2px;
      border-radius: 2px 2px 2px 2px;
    }

    .sb-icon-search:before {
      content: "\f002";
    }

    /* Open state */
    .sb-search.sb-search-open,
    .no-js .sb-search {
      width: 100%;
    }

    .sb-search.sb-search-open .sb-icon-search,
    .no-js .sb-search .sb-icon-search {
      background: #666;
      color: #fff;
      z-index: 11;
    }

    .sb-search.sb-search-open .sb-search-submit,
    .no-js .sb-search .sb-search-submit {
      z-index: 90;
    }


    /* -- end top area */

    header .navbar {
      margin-bottom: 0;
    }

    .navbar-default {
      border: none;
    }

    .navbar-brand {
      color: #222;
      text-transform: uppercase;
      font-size: 24px;
      font-weight: 700;
      line-height: 1em;
      letter-spacing: -1px;
      margin-top: 30px;
      padding: 0 0 0 15px;
    }


    header .navbar-collapse  ul.navbar-nav {
      margin-right: 0;
    }

    header .navbar-default{
      background-color: #fff;
      border-bottom: 1px solid #ddd;
    }

    header .nav li a:hover,
    header .nav li a:focus,
    header .nav li.active a,
    header .nav li.active a:hover,
    header .nav li a.dropdown-toggle:hover,
    header .nav li a.dropdown-toggle:focus,
    header .nav li.active ul.dropdown-menu li a:hover,
    header .nav li.active ul.dropdown-menu li.active a{
      -webkit-transition: all .3s ease;
      -moz-transition: all .3s ease;
      -ms-transition: all .3s ease;
      -o-transition: all .3s ease;
      transition: all .3s ease;
    }


    header .navbar-default .navbar-nav > .open > a,
    header .navbar-default .navbar-nav > .open > a:hover,
    header .navbar-default .navbar-nav > .open > a:focus {
      -webkit-transition: all .3s ease;
      -moz-transition: all .3s ease;
      -ms-transition: all .3s ease;
      -o-transition: all .3s ease;
      transition: all .3s ease;
    }


    header .navbar {
      min-height: 8px;
    }

    header .navbar-nav > li  {
      padding-bottom: 4px;
      padding-top: 4px;
    }

    header  .navbar-nav > li > a {
      color:white;
      padding-bottom: 6px;
      padding-top: 5px;
      margin-left: 2px;
      line-height: 30px;
      font-weight: 700;
      -webkit-transition: all .3s ease;
      -moz-transition: all .3s ease;
      -ms-transition: all .3s ease;
      -o-transition: all .3s ease;
      transition: all .3s ease;
    }

    header .nav .caret {
      border-bottom-color: #f5f5f5;
      border-top-color: #f5f5f5;
    }
    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
      color: white;
      background-color: #fff;
    }
    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
      color: white;
      background-color:  #fff;
    } 


    .dropdown-menu  {
      box-shadow: none;
      border-radius: 0;
      border: 1px solid #eee;
    }

    header .navbar-nav > li > ul > li {
      border-bottom: 1px solid #eee;
    }

    header .navbar-nav > li > ul > li.dropdown-submenu > ul > li {
      border-bottom: 1px solid #eee;
    }


    .dropdown-menu li:last-child  {
      padding-bottom: 0 !important;
      margin-bottom: 0;
    }

    header .nav li .dropdown-menu  {
     padding: 0;
   }

   header .nav li .dropdown-menu li a {
     line-height: 30px;
     padding: 3px 12px;
   }

   /* --- menu --- */

   header .navigation {
    float:right;
  }

  header ul.nav li {
    border:none;
    margin:0;
  }

  header ul.nav li a {  
    font-size:12px;
    border:none;
    font-weight:700;
    text-transform:uppercase;
  }

  header ul.nav li ul li a {  
    font-size:13px;
    border:none;
    font-weight:400;
    text-transform:none;
  }


  .navbar .nav > li > a,.navbar .nav > li.active > .dropdown-menu > li > a {
    color: white;
    text-shadow: none;
  }


  .dropdown-menu li:hover,
  .dropdown-menu li a:hover,
  .dropdown-menu li > a:focus,
  .dropdown-submenu:hover > a, 
  .dropdown-menu .active > a,
  .dropdown-menu .active > a:hover {
    background: #f5f5f5;
    color: white;
  }
  .navbar .nav a:hover {
    background:none;
  }

  .navbar .nav > .active > a,.navbar .nav > .active > a:hover {
    background:none;
    font-weight:700;
  }

  .navbar .nav > .active > a:active,.navbar .nav > .active > a:focus {
    background:none;
    outline:0;
    font-weight:700;
  }

  .navbar .nav li .dropdown-menu {
    z-index:2000;
  }

  header ul.nav li ul {
    margin-top:1px;
  }
  header ul.nav li ul li ul {
    margin:1px 0 0 1px;
  }
  .dropdown-menu .dropdown i {
    position:absolute;
    right:0;
    margin-top:3px;
    padding-left:20px;
  }

  .navbar .nav > li > .dropdown-menu:before {
    display: inline-block;
    border-right: none;
    border-bottom: none;
    border-left: none;
    border-bottom-color: none;
    content:none;
  }



  ul.nav li.dropdown a {
    z-index:1000;
    display:block;
  }

  /* sub menu */

  header ul.nav li ul li.dropdown-submenu li a {  
    color: #444;
  }

  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
    margin-left: 1px;
    -webkit-border-radius: 0 0 0 0;
    -moz-border-radius: 0 0 0;
    border-radius: 0 0 0 0;
  }

  .dropdown-submenu:hover>.dropdown-menu {
    display: block;
  }

  .dropdown-submenu>a:after {
    display: block;
    content: "\f105";
    font-family: 'FontAwesome';
    float: right;
    width: 0;
    height: 0;

    margin-top: 0;
    margin-right: 0px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .dropdown-submenu:hover>a:after {
    border-left-color: #fff;
  }

  .dropdown-submenu.pull-left {
    float: none;
  }

  .dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
  }
  @media only screen and (max-width: 720px) {
    #po{
      color: white!important;
    }
    .navbar .nav > li > a,.navbar .nav > li.active > .dropdown-menu > li > a {
      color: white!important;
      text-shadow: none;
    }
    .dropdown-menu > li > a {
      color: white!important;
    }
  }
</style>


