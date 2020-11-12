<!DOCTYPE html>
<html lang="es">
<head>
	<title>Iniciar sesión | Patria</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
	<base href = "<?php echo base_url(); ?>">
=======
>>>>>>> 1decc1a912176b02cbad0302dfab37df7634cc97
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/cm-overlay.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/jquery.fatNav.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/lightbox.css">
<<<<<<< HEAD
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,700">
=======
	<link rel="stylesheet" href="<?php echo base_url(); ?>//fonts.googleapis.com/css?family=Raleway:300,400,500,600,700">
<<<<<<< HEAD
>>>>>>> 1decc1a912176b02cbad0302dfab37df7634cc97

=======
<!-- dfa-->
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
	</div>
		<div class="headder-w3">
		<h1><a href="index.html">Anchor</a></h1>
		</div>
		<div class="tele">
		<p><span  class="fa fa-phone" aria-hidden="true"></span> +1 234 567 8901</p>
		</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="w3layouts-nav-right">
		<div class="fat-nav">
			<div class="fat-nav__wrapper">
				<ul>
					<li><a href="index.html" >Home</a></li>
					<li><a href="#about"  class="scroll" >About Us</a></li>
					<li><a href="#gallery"  class="scroll" >Gallery</a></li>
					<li><a href="#services"  class="scroll" >Services</a></li>
					<li><a href="#clients"  class="scroll" >Clients</a></li>
					<li><a href="#contact"  class="scroll" >Contact</a></li>
				</ul>
			</div>
		</div>
	</div>		
		</div>
	<div class="clearfix"></div>
</div>


<<<<<<< HEAD
<script type='text/javascript' src='<?php echo base_url(); ?>assetsfront/js/jquery-2.2.3.min.js'></script>
<!-- //js -->

<!--menu script-->
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfront/js/modernizr-2.6.2.min.js"></script>
<script src="<?php echo base_url(); ?>assetsfront/js/bootstrap.min.js"></script>	
=======
<script type='text/javascript' src='assetsfront/js/jquery-2.2.3.min.js'></script>
<!-- //js -->

<!--menu script-->
<script type="text/javascript" src="assetsfront/js/modernizr-2.6.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
<!--navbar script-->
		<script src="<?php echo base_url(); ?>assetsfront/js/jquery.fatNav.js"></script>
		<script>
		(function() {
			
			$.fatNav();
			
		}());
		</script>
	<!--banner slider script-->
<<<<<<< HEAD
  <script src="<?php echo base_url(); ?>assetsfront/js/responsiveslides.min.js"></script>
=======
  <script src="assetsfront/js/responsiveslides.min.js"></script>
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
			  <script>
				// You can also use "$(window).load(function() {"
				$(function () {
				  // Slideshow 4
				  $("#slider4").responsiveSlides({
					auto: true,
					pager:true,
					nav:true,
					speed: 500,
					namespace: "callbacks",
					before: function () {
					  $('.events').append("<li>before event fired.</li>");
					},
					after: function () {
					  $('.events').append("<li>after event fired.</li>");
					}
				  });
			
				});
			 </script>

	<!--client carousel -->
<<<<<<< HEAD
	<script src="<?php echo base_url(); ?>assetsfront/js/owl.carousel.js"></script>
=======
	<script src="assetsfront/js/owl.carousel.js"></script>
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({
				items: 1,
				itemsDesktop: [768, 1],
				itemsDesktopSmall: [414, 1],
				lazyLoad: true,
				autoPlay: true,
				navigation: true,

				navigationText: false,
				pagination: true,

			});

		});
	</script>
	<!-- //carousel -->
	<!-- gallery-pop-up -->
<<<<<<< HEAD
	<script src="<?php echo base_url(); ?>assetsfront/js/jquery.chocolat.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsfront/css/chocolat.css" type="text/css" media="screen">
=======
	<script src="assetsfront/js/jquery.chocolat.js"></script>
	<link rel="stylesheet" href="assetsfront/css/chocolat.css" type="text/css" media="screen">
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
	<!--light-box-files -->
	<script type="text/javascript">
		$(function () {
			$('.agileinfo_portfolio_grid a').Chocolat();
		});
	</script>
	<!-- //gallery-pop-up -->
		<!-- start-smoth-scrolling -->
<<<<<<< HEAD
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfront/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetsfront/js/easing.js"></script>
=======
<script type="text/javascript" src="assetsfront/js/move-top.js"></script>
<script type="text/javascript" src="assetsfront/js/easing.js"></script>
>>>>>>> d0d6795408d4f61e44b8150f7d41ebaa3d5000f3
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
</head>
<body>