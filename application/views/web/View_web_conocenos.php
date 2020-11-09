		<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Conoce un poco más de nosotros</h1>
		</div>
		<!-- /container -->
	</div>
	<main>

		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Nuestros origenes e historia</h2>
					<p></p>
				</div>
<?php foreach ($conocenos as $key => $value): ?>
				<div class="row justify-content-between">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" class="img-fluid" alt="">
						</figure>
					</div>
					<div class="col-lg-5">
						<?php echo $value->historia; ?>
					</div>
				</div>
<?php endforeach ?>
				<!--/row-->
			</div>
			<!--/container-->
		</div>
		<!--/bg_color_1-->

		<div class="container margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Miembros Fundadores</h2>
				<p></p>
			</div>
			<div id="carousel" class="owl-carousel owl-theme">

			<?php foreach ($redactor2 as $key => $value): ?>
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4><?php echo $value->nombres ?> <?php echo $value->apellidos ?><em><?php echo $value->empresa ?></em></h4>
						</div><img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" alt="">
					</a>
				</div>
			<?php endforeach ?>



			</div>
			<!-- /carousel -->
		</div>
		<!--/container-->
	</main>

	