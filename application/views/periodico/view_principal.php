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
	<link href="<?php echo base_url(); ?>assets_web/guillermo/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets_web/guillermo/css/blog.css" rel="stylesheet">

<?php $id = $this->uri->segment(3); ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 men" style="padding: 10px;">
	<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				<?php foreach ($carou as $key => $value): ?>
				<?php $tituloc =  $value->titulo; ?>
				<?php $fotoc =  $value->foto; ?>
				<?php $urlc =  $value->url; ?>
				<li><a href="<?php echo $urlc; ?>"><img class="port" src="<?php echo base_url();?>/assets/upload/<?php echo $fotoc ?>" alt="<?php echo $tituloc; ?>" title="<?php echo $tituloc; ?>" id="wows1_0"/></a></li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="assets_web/engine1/wowslider.js"></script>
	<script type="text/javascript" src="assets_web/engine1/script.js"></script>
</div>

<div class="row">
	<div class="hidden-xs hidden-sm col-lg-2 col-md-2" style="text-align: left;">
		<div class="row">
			<div id="dis2" class="container-fluid" style="background: #F9F9FD;">
				<br>
				<div class="widget search_blog">
					<div class="form-group">
						<input style="height: 41px" type="text" name="busqueda" id="search" class="form-control" placeholder="Buscar">
						<span><input type="submit" value="Search"></span>
					</div>
				</div>
				

				<div class='widget'>
					<div class='widget-title'>
						<h4>PERFILES</h4>
					</div>
				</div>
				<div  id="perf"></div>




			</div>
		</div>

		<div class="container-fluid">
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
						<li><a href="<?php echo base_url();?>Controller_periodico/all_News/14" style="text-align: left;"><font size="3" style="color: #792F11;"><span class="fa fa-play"></span>Tecnología</font></a></li>                  
					</ul>
				</a>
				<hr>
				<a href="<?php echo base_url();?>Controller_periodico/all_News/15"><font size="3" color="000085">Editorial - Opinión</font></a>
				<hr>  
				<a href="<?php echo base_url();?>Controller_periodico/acercade"><font size="3" color="000085">Acerca de</font></a>
				<hr>

			</div>
		</div>

		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
				<div class="">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align=" justify">
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
						<p align="justify"><?php echo $Nota; ?></p>
					</div>
				</div></div>
				<?php if ($CantFotos > 0): ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<h3><a href="<?php echo base_url() ?>/Controller_periodico/galeria/<?php echo $id ?>" style="text-decoration: none;">Ver Galeria</a></h3>
				</div>
				<?php endif ?>
			</div>



			<br>
			<br>
			<hr>
			<center><font size="4" color="blue"> Sugerencias </font></center>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"> 
				<?php foreach ($sql as $key => $value): ?>
				<?php $id_not = $value->id_noticia ?>
				<?php $Titulo =  $value->Titular; ?>
				<?php $Foto =  $value->url; ?>
				<?php $Info =  $value->Subtitulo; ?>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">			
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
							<a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/News/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">Ver mas...</a>
							<?php else: ?>
							<a style="color: white;background: #0B0F31" class="btn btn-sm" href="<?php echo base_url();?>Controller_periodico/lastNews/<?php echo $value->id_noticia ?>/<?php echo $value->id_cat_noticia ?>">Ver mas...</a>
							<?php endif ?>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
			<div class="col-xs-12 col-sm-12 hidden-lg hidden-md" style="text-align: left;">
				<center><font size="4" color="blue"> Perfiles</font></center>
				<br>
				<?php foreach ($perf as $key => $value): ?>
				<?php $url_foto =  $value->url_foto; ?>
				<?php $nombre =  $value->nombre; ?>
				<?php $idperfiles =  $value->idperfiles; ?>
				<div class="col-xs-6 col-sm-6">
					<div class="thumbnail">
						<img src="<?php echo base_url();?>/assets/upload/<?php echo $url_foto?>" class="img-circle imga" width="90" height="90" id="img">

						<?php $Informacion="	
						<div>
							<center><img src='assets/upload/$value->url_foto' width='200' height='200' ></center>
						</div>
						<div>
							<br>
							<center>Nombre: $value->nombre  </center>
						</div>
						<div>
							<center>Cargo: $value->cargo </center>
						</div>
						<div>
							<br>
							$value->info
						</div>
						" 
						?>
						<div class="caption">
							<button type="button" class="btn btn-primary btn-view btn-xs" style="margin-right:10px;" data-toggle="modal" data-target="#modal-default" value="<?php echo $Informacion ?>">Ver</button>
						</div>
					</div>
				</div>

				<?php endforeach ?>
			</div>
				<!-- <div class="col-xs-12 col-sm-12 hidden-lg hidden-md" style="text-align: left;">
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
					</div> -->



				</div>

				<div class="modal fade" id="modal-default">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<center><h4 class="modal-title">INFORMACIÓN</h4></center>
								</div>
								<div class="modal-body">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>


					<style>

					hr {
						background-color: Blue;
						height: 1px;
						border: 0;
						color: blue;
					}
					.imga{
						border: blue 1px solid;
					}
					#submenu3 li a:hover {
						color: #FFF;
					}
					#submenu2 li a:hover {

						color: #FFF;
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

				<script>
					$(document).ready(function () {

						$(".btn-view").on("click", function () {
							var perf = $(this).val();
							$("#modal-default .modal-body").html(perf);
						});
					});

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

				<script>
					$(document).on("ready", main);

					function main() {
						perfil("",1, 2);
						$("input[name=busqueda]").keyup(function() {
							textobuscar = $(this).val();
							valoroption = $("#cantidad").val();
							perfil(textobuscar, 1, valoroption);
						});
						$("body").on("click", ".paginacion li a", function(e) {
							e.preventDefault();
							valorhref = $(this).attr("href");
							valorBuscar = $("input[name=busqueda]").val();
							valoroption = $("#cantidad").val();
							perfil(valorBuscar, valorhref, valoroption);
						});
						$("#cantidad").change(function() {
							valoroption = $(this).val();
							valorBuscar = $("input[name=busqueda]").val();
							perfil(valorBuscar,1, valoroption);
						});
					}

					function perfil(valorBuscar, pagina, cantidad) {
						$.ajax({
							url: "<?php echo base_url(); ?>Controller_periodico/pef_ajax",
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
								$.each(response.perfiles, function(key, item) {
									filas += "<ul class='comments-list'>"
									filas += "<li>"
									filas += "<div class='alignleft'>"
									filas += "<a href='' id='perf' data-perf='"+item.idperfiles+"'><img src='assets/upload/"+item.url_foto+"' alt=''></a>"
									filas += "</div>"
									filas += "<small>"+item.nombre+"</small>"
									filas += "<h3><a href='' id='perf' data-perf='"+item.idperfiles+"' title=''>Ver perfil</a></h3>"
									filas += "</li>"
									filas += "</ul>"
								});
								$("#perf").html(filas);
								if (response.perfiles==0) {
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
					$(document).on("click", "#perf", function (e) {
						e.preventDefault();
						var perf = $(this).attr("data-perf");
						$.ajax({
							url: "<?php echo base_url(); ?>Controller_periodico/perfil",
							method: "POST",
							data: {
								perf: perf
							},
							dataType: "json",
							success: function (data) {
								$("#perfil-modal").modal('show');
								$("#nombre").html(data.nombre);
								$("#info").html(data.info);
								$("#url_foto").html("<img src='<?php echo base_url(); ?>assets/upload/"+data.url_foto+"'></img>");
								$("#cargo").html(data.cargo);
								$("#form-title").html('<h3 align="center">Perfil de '+data.nombre+'</h3>');
							}
						});
					});
				</script>
				<div class="modal fade" id="perfil-modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header pmd-modal-bordered">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="pmd-cart-title-text" id="form-title"></h4>

							</div>
							<article class="blog">
								<figure>
									<a><div id="url_foto"></div>
										<div class="preview"><span id="nombre"></span></div>
									</a>
								</figure>
								<div class="post_info">
									<h2 id="cargo"></h2>
									<p id="info"></p>
								</div>
							</article>
						</div>
					</div>
				</div>
				<select style="display: none" name="cantidad" id="cantidad" class="form-control">
					<option value="2"></option>
				</select>