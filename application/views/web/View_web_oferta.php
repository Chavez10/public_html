	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Ofertas Formativas</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3 esta" id="faq_cat">
						<div class="box_style_cat" id="faq_box">
							<ul id="cat_nav">
								<li><a style="color: black;" href="#payment" class="active"><i class="icon_check"></i>Interesante no?</a></li>
								<li><a id="sus" style="color: #656768;" class="btn btn-success btn-sm" href="http://fundeplast.org/index.php/inscripcion/"><i class="icon_times"></i>Inscríbete ahora</a></li>

							</ul>
						</div>
						<!--/sticky -->
				</aside>
				<!--/aside -->
				
				<div class="col-lg-9" id="faq">
					<h4 align="" class="nomargin_top">Cursos disponibles</h4>
		<br>
					<div role="tablist" class="add_bottom_45 accordion_2" id="payment">

			<?php  $i=0; foreach ($sql as $key => $value): ?>
	<?php $i++ ?>

						<div class="card">
							<div class="card-header" role="tab" id="collap">
								<h5 class="mb-0">
									<a id="col" data-toggle="collapse" href="#collapse<?php echo $i; ?>" aria-expanded="true"><i class="indicator ti-minus"></i><?php echo $value->curso; ?></a>
								</h5>
							</div>

							<div id="collapse<?php echo $i; ?>" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p><strong>Categoria:</strong> <?php echo $value->formacion; ?></p>
									<p><strong>Descripción:</strong> <?php echo $value->descripcion; ?></p>
								</div>
							</div>
						</div>
<?php endforeach ?>	

						</div>
									<a id="es" class="btn btn-success btn-block" href="http://fundeplast.org/index.php/inscripcion/">Inscríbete ahora</a>

					</div>
				</div>
			</div>
	</main>


	<style>
	#sus{
		 background: #DAB5FD;
		 border-color:#DAB5FD;
		 color: #565454;
	}
		#sus:hover{
		 background: #D2A1FF;
		 border-color:#DAB5FD;
	}
		#collap{
			background: #386FC9;
			text-align: center;

		}
		#col{
			color: white;
			font-family: TimesNewRoman;
			font-size: 20px;
		}
		#payment:focus{
			background-color: #2549D1;
		}
@media only screen and (min-width: 1000px) {
#es{
	display: none;
}
}
	</style>