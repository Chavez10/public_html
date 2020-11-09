	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Galeria de imagenes</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60_35">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Ya estas aqui!</h2>
				<p>Disfruta de nuestra galeria de fotos completa</p>
			</div>
			<div class="grid-gallery">
				<ul class="magnific-gallery">
				<?php foreach ($galeria as $key => $value): ?>
					<li>
						<figure>
							<img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" title="<?php echo $value->descripcion; ?>" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p><?php echo $value->titulo; ?></p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
				<?php endforeach ?>
				</ul>
			</div>
			<!-- /grid gallery -->
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>