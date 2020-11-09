<?php
if (!$this->session->userdata('usuario'))
    redirect('Controller_home/cerrar');
$nombreSistema = "proyecto";
$bg2 = $this->model_setting->getinfo(2);
$the_bg2 = $bg2[0]['valor'];
$bg3 = $this->model_setting->getinfo(3);
$the_bg3 = $bg3[0]['valor'];
$_SESSION['cache'] = "180807";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo base_url() ?>">
        <link rel="shortcut icon" href="assets/ulogo.ico" type="image/x-icon" />
        <title><?php echo $nombreSistema ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/style.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/vendors/css/vendor.bundle.base.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/vendors/css/vendor.bundle.addons.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/bootstrap.min.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/public/alertify.core.css?v=<?php echo $_SESSION['cache'] ?>" >
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/public/alertify.default.css?v=<?php echo $_SESSION['cache'] ?>" >
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/jquery-ui.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/font-awesome.min.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/main.css?v=<?php echo $_SESSION['cache'] ?>">
        <link rel="stylesheet" href="<?php base_url(); ?>assets/css/font-awesome-animation.css?v=<?php echo $_SESSION['cache'] ?>">
        <link href="<?php echo base_url() . 'assets/public/css/jquery-ui-1.9.2.custom.css'; ?>" type="text/css" rel="stylesheet">


        <link href="<?php echo base_url() . 'assets/public/css/style.css'; ?>" rel="stylesheet" />
        <script src="<?php echo base_url() . 'assets/public/js/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php base_url(); ?>assets/js/jquery.min1.12.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/bootstrap.min.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/jquery.min.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/jquery-ui.min.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/public/jquery.number.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/public/alertify.min.js?v=<?php echo $_SESSION['cache'] ?>" ></script>
        <script src="<?php base_url(); ?>assets/js/jquery.mask.js?v=<?php echo $_SESSION['cache'] ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/mask.js"></script>
        <script src="<?php base_url(); ?>assets/js/off-canvas.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script src="<?php base_url(); ?>assets/js/misc.js?v=<?php echo $_SESSION['cache'] ?>"></script>
        <script>_curr = '<?php echo @ $this->uri->segment(1) ?>/<?php echo @ $this->uri->segment(2) ?>';</script>
    </head>
    <body>
        <div class="jm-loadingpage"></div>

        <nav class="navbar navbar-default visible-xs visible-sm" role="navigation" id="contenedormovil" style="background: #5C9492;">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="position: relative;left: 10%;" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" ><p style="font-size: 30px; font-family:solid; position: relative;left: 40%;"><?php echo $nombreSistema ?></p></a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav" id="movilmenu" >

                    </ul>
                    <ul class="nav navbar-nav" style="position: relative; left: 75%;"><li><a href="" data-toggle="modal" data-target="#logoutModal" style="color: #613D4A;"><i class="menu-icon fa fa-power-off"></i> Salir</a></li></ul>
                </div>
            </div>
        </nav>

        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row visible-lg visible-md"  style="background: #5C9492;height: 3px;">

            <div class="container-fluid">
                <div>
                    <button class="usermenuhide navbar-toggler sidebar-toggler" type="button" data-toggle="sidebar-show">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                    <h5><?php echo $nombreSistema ?></h5>
                    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="modal" data-target="#logoutModal" aria-expanded="false">
                                <span class="profile-text"><?php echo $_SESSION['nombre_completo']; ?></span>
                                <img class="img-xs rounded-circle" src="assets/images/faces/userface.png" alt="Profile image">
                            </a>

                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper" style="padding: 0px; background: red;">
            <nav class="sidebar sidebar-offcanvas" id="sidebar" style="box-shadow: 6px 6px 6px #A4CBCB; ">
                <div  id="mainmenu"></div>
            </nav>

            <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body"><p style="font-size: 15px; font-family: timesnewroman; text-align: center;">¿<?php echo $_SESSION['nombre_completo']; ?> en Realidad Desea Salir?</p></div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="Controller_home/cerrar">Salir</a>
                            <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .jm-loadingpage{
                    position: fixed;
                    left: 0px;
                    top:0px;
                    width: 100%;
                    height: 100%;
                    z-index: 999999999;
                    background: url(assets/images/preloader.gif) center no-repeat #fff;
                    /*background: url(assets/images/esta.gif) center no-repeat #fff;*/
                }
            </style>

