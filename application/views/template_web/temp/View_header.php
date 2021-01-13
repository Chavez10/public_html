<!DOCTYPE html>
<html lang="es">

<head>
	<title>Periodico Digital | <?php echo $titulo ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo base_url(); ?>">

	<!-- site icons -->
	<link rel="icon" href="<?php echo base_url() ?>assets_F/images/fevicon/fevicon.png" type="image/gif" />
	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/bootstrap.min.css" />
	<!-- Site css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/style.css" />
	<!-- responsive css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/responsive.css" />
	<!-- colors css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/colors1.css" />
	<!-- custom css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/custom.css" />
	<!-- wow Animation css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_F/css/animate.css" />
	<!-- revolution slider css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_F/revolution/css/settings.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_F/revolution/css/layers.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets_F/revolution/css/navigation.css" />
</head>

	<body id="default_theme" class="it_service">
	<div>
	<!-- loader -->
	<div class="bg_load"><img class="loader_animation" src="<?php echo base_url() ?>assets_F/papper.png" alt="#" /> </div>
	<!-- end loader -->
	<!-- header -->
	<header id="default_header" class="header_style_1">
		<!-- header bottom -->
		<!-- <div class="header_bottom" style="position: fixed; background-color:white;"> -->
		<div class="header_bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
						<!-- logo start -->
						<div class="logo"> <a href="it_home.html"><img src="<?php echo base_url() ?>assets_F/logo.png" alt="logo" /></a> </div>
						<!-- logo end -->
					</div>
					<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
						<!-- menu start -->
						<div class="menu_side">
							<div id="navbar_menu">
								<ul class="first-ul">
									<li><a href="it_about.html">Noticias USAM</a></li>
									<li> <a class="active" href="it_home.html">Nacionales</a>
										<ul>
											<li><a href="#">Politica</a></li>
											<li><a href="#">Sucesos</a></li>
											<li><a href="#">Economia</a></li>
										</ul>
									</li>
									<li><a href="it_about.html">Deportes</a></li>
									<li> <a href="#">Revista</a>
										<ul>
											<li><a href="#">Espectaculos</a></li>
											<li><a href="#">Arte y Cultura</a></li>
											<li><a href="#">Reportajes</a></li>
											<li><a href="#">Academico</a></li>
											<li><a href="#">Tecnologia</a></li>
										</ul>
									</li>
									<li><a href="it_about.html">Editoria - Opiniones</a></li>
									<li><a href="it_about.html">Ediciones</a></li>
								</ul>
								</div>
								<div class="search_icon">
									<ul>
										<li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
					</div>
				</div>
			</div>
	</header>
</body>

<style>
	.header_bottom {
		position: relative;
		/* default colors + transition */
		background-color: white;
		color: black;
		transition: all 0.3s ease-out;
	}

	/* scrolling state */
	.header_bottom.fixed-top {
	position: fixed;
	top: 0;
	width: 100%;
	/* scrolling colors */
	background-color: white;
	color: white;
	}

	.header_bottom.fixed-top a {
	color: white;
	}
</style>
<script>
	document.addEventListener("scroll", function () {
	const navbar = document.querySelector(".header_bottom");
	const navbarHeight = 100;

	const distanceFromTop = Math.abs(
		document.body.getBoundingClientRect().top
	);

	if (distanceFromTop >= navbarHeight) navbar.classList.add("fixed-top");
	else navbar.classList.remove("fixed-top");
	});
</script>