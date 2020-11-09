<main>
    <div class="container-fluid full-height">
        <div class="row row-height">
            <div  class="col-lg-5 content-left order-md-last order-sm-last order-last">
                <div id="results_map_view" style="background: #09B8C3;">
                    <div class="container-fluid" >
                        <br>
                        <div class="row">
                            <div class="col-10">
                                <h4 align="center">Nuestras instalaciones</h4>
                            </div>
                        </div>
                    </div>
                </div>
			<?php foreach ($encuentranos as $key => $value): ?>
                <div class="strip map_view add_top_20">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <figure>
                                <a href="<?php echo base_url(); ?>Controller_mapa/vista_web_mapa/<?php echo $value->id_en; ?>"><img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto ?>" class="img-fluid" alt=""></a>
                                
                            </figure>
                        </div>
                        <div class="col-8">
                            <div class="wrapper">
                                <h3><a href="detail-restaurant.html"><?php echo $value->instalacion; ?></a></h3>
                                <small><?php echo $value->direccion; ?></small>
                            </div>
                            <ul>
                                <li><span class="loc_open"><a href="<?php echo base_url(); ?>Controller_mapa/vista_web_mapa/<?php echo $value->id_en; ?>">Ver mapa</a></span></li>
                                <!--li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li-->
                            </ul>
                        </div>
                    </div>
                </div>
			<?php endforeach ?>
            </div>


	<?php if (count($encuentranos_mapa) > 0): ?>
        <?php foreach ($encuentranos_mapa as $key => $value): ?>
            <div class="col-lg-7 map-right" style="margin-top: 5%;">
                <div class="grid_12">
                    <p align="center" id="mapt">Vista en mapa de <?php echo $value->instalacion ?></p>
                    <button id="" class="btn btn-warning btn-block">Rutas a <?php echo $value->instalacion ?></button>
                    <div class="map">
                   	
                        <figure class="">
                        	<?php echo $value->mapa; ?>
                        </figure>
                    <button id="btn-enci" class="btn btn-warning btn-block">Rutas a <?php echo $value->instalacion ?></button>
                    
                    </div>

                </div>
            </div>
		<?php endforeach ?>
	<?php else: ?>
                <div class="col-lg-7 map-right">
<p id="f">Selecciona una Ubicación</p>
<p id="f1">Selecciona una Ubicación abajo</p>
                
            </div>
<?php endif; ?>

        </div>
    </div>
</main>

                        <style>
                        #left{
                        	background: #1C726F;
                        }
                        #f{
                        	text-align: center;
                        	color: #BCBCBC;
                        	margin-top: 30%;
                        	font-size: 50px;
                        }
                        #btn-enci{
							text-align: center;
                        }
                            @media only screen and (max-width: 700px) {
                                #btn-enci, #d, #f{
                                    display: none;

                                }
                            .map{
                                height: 300px;
                            }                                
                            #f1{
                        	text-align: center;
                        	color: #BCBCBC;
                        	margin-top: 40%;
                        	font-size: 25px;
                        }
                            .map figure iframe {
                                height: 300px;
                            }
                            }    
                            @media only screen and (min-width: 700px) {
                                #btn-encis,#f1{
                                    display: none;
                                }
                            } 
                            #mapt{
                                font-size: 20px;
                                font-family: TimesNewRoman;
                            }
                            .map {
                                overflow: hidden;
                                padding-top: 5px;
                            }
                            .map figure {
                                position: relative;
                                display: block;
                                width: 100%;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                box-sizing: border-box;
                            }
                            .map figure iframe {
                                width: 1100px;
                                height: 500px;

                                max-width: 100%;
                            }

                            .map figure {
                                height: auto !important;
                                margin-bottom: 15px;
                            }
                            .map figure iframe {
                                height: 500px;
                            }
                        </style>