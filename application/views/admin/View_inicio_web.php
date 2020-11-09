<?php foreach ($tema as $key => $value): ?>
    
<?php 
$texto = $value->texto;
$color = $value->color;
$headder = $value->headder;
$footer = $value->footer;
$fotorola = base_url() . 'assets/upload/' . $value->foto;

?>

<?php endforeach ?>

<?php foreach ($edit as $key => $value): ?>
    <?php 
        $id_edit = $value->id_edicion;
        $nom_edit = $value->num_edicion;
     ?>
<?php endforeach ?>
<div >
    <section class="wellcome_area row" >
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div id="contenedor-principal">
                <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="wellcome-heading">
                        <h2 id="text"><?php echo $texto; ?></h2>
                    </div>
                    <div class="col-xs-12 hidden-sm hidden-lg hidden-md menu hero-image" style="padding: 25px;">
                        <center>
                            <ul class="pagination" aling="center">
                                <li class="pagination-item" id="loquesea1"><a href="<?php echo base_url(); ?>Controller_periodico/edition/<?php echo $id_edit; ?>" class="fa fa-newspaper-o"> Edicion</a></li>
                                <li class="pagination-item" id="loquesea1"><a href="<?php echo base_url(); ?>Controller_periodico/all_News/7" class="fa fa-globe"> Nacional</a></li>
                                <li class="pagination-item" id="loquesea1"><a href="<?php echo base_url(); ?>Controller_periodico/all_News/3" class="fa fa-futbol-o"> Deportes</a></li>
                                <li class="pagination-item" id="loquesea1"><a href="<?php echo base_url(); ?>Controller_periodico/all_News/10" class="fa fa-sticky-note"> Revista</a></li>
                                <li class="pagination-item" id="loquesea1"><a href="<?php echo base_url(); ?>Controller_periodico/all_News/1" class="fa fa-magnet"> USAM</a></li>
                            </ul>
                        </center>
                    </div>
                        
                    </div>

                <div class="hidden-xs col-lg-6 col-md-6 col-sm-6">
            <div class="hidden-xs col-lg-6 col-md-6 col-sm-6" style="height: 240px;">
                <img src="<?php echo base_url(); ?>assets_web/img/medialuna.png" style="width: 100%; height: 90%; margin-top: 5%;" />
            </div>
            <div class="hidden-xs col-lg-4 col-md-4 col-sm-4">
                <div>
                    <a href="<?php echo base_url(); ?>Controller_periodico/edition/<?php echo $id_edit; ?>" id="btn1" class="btn btn-link btn-lg">Edición Nº <?php echo $nom_edit; ?></a>
                </div>
                <div>
                    <a href="<?php echo base_url(); ?>Controller_periodico/all_News/7" id="btn2" class="btn btn-link btn-lg">Nacional</a>
                </div>
                <div>
                    <a href="<?php echo base_url(); ?>Controller_periodico/all_News/3" id="btn3" class="btn btn-link btn-lg">Deportes</a>
                </div>
                <div>
                    <a href="<?php echo base_url(); ?>Controller_periodico/all_News/10" id="btn4" class="btn btn-link btn-lg">Revista</a>
                </div>
                <div>
                    <a href="<?php echo base_url(); ?>Controller_periodico/all_News/1" id="btn5" class="btn btn-link btn-lg">Noticias USAM</a>
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
    </section>
</div>
<style>
    body{
        background-color: <?php echo $color; ?>;
    }
        .wellcome_area {
        background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0) 50%,<?php echo $color ?>), url(<?php echo $fotorola; ?>);
        height:600px;
        position: relative;
        z-index: 1;
        background-position: bottom center;
        background-size: cover;
    }
    
    .wellcome-heading h2{
        font-family: Cooper Black; font-size: 27px;
    }


</style>



<style type="text/css">
    .bu{
        display: none;
    }
    #loquesea1,#loquesea2,#loquesea3,#loquesea4,#loquesea5,#loquesea6{
        display: inline-block;
        position: relative;
        z-index: 1;
    }
    #transparen h3{
        font-family: "Modern No. 20";
        background: #0C1525;
        opacity: 0.7;   
    }
    .form{
        width: 100%;
        height: 100%;
    }
    #contenedor-principal{
        position: absolute;
        margin-top: 20%;
    }

    #text{
        font-family: "Modern No. 20";
        font-size: 25px; 
        color: white;
        position:relative;
        margin-top: 25%;
        left:2%;
        z-index: 1;
    }

    #btn1{
        font-family: "Modern No. 20";
        margin-left: 30%;
        font-size: 25px;
        text-decoration:none; 
        color: white;
        z-index: 1;
    }
    #btn2{
        font-family: "Modern No. 20";
        margin-left: 25%;
        font-size: 25px;
        text-decoration:none; 
        color: white;
        z-index: 1;
    }
    #btn3{
        font-family: "Modern No. 20";
        margin-left: 15%;
        font-size: 25px;
        text-decoration:none; 
        color: white;
        z-index: 1;
    }
    #btn4{
        font-family: "Modern No. 20";
        margin-left: 5%;
        font-size: 25px;
        text-decoration:none; 
        color: white;
        z-index: 1;
    }
    #btn5{
        font-family: "Modern No. 20";
        font-size: 25px;
        text-decoration:none; 
        color: white;
        z-index: 1;
    }

    #btn1:hover{
        transition: 1s;
        font-size: 25px; 
         color: white;
         background-color: #121530;
         opacity: 0.6;
    }
    #btn2:hover{
        transition: 1s;
         font-size: 25px; 
         color: white;
         background-color: #121530;
         opacity: 0.6;
    }
    #btn3:hover{
        transition: 1s;
         font-size: 25px; 
         color: white;
         background-color: #121530;
         opacity: 0.6;
    }
    #btn4:hover{
        transition: 1s;
         font-size: 25px; 
         color: white;
         background-color: #121530;
         opacity: 0.6;
    }
    #btn5:hover{
        transition: 1s;
         font-size: 25px; 
         color: white;
         background-color: #121530;
         opacity: 0.6;
    }


    #xd1{
        position:absolute;
        margin-top: 20%;
        left:85%;
        z-index: 1;
    }
    #xd2{
        position:absolute;
        margin-top: 24%;
        left:80%;
        z-index: 1;
    }
    #xd3{
        position:absolute;
        margin-top: 28%;
        left:75%;
        z-index: 1;
    }
    #xd4{
        position:absolute;
        margin-top: 32%;
        left:70%;
        z-index: 1;
    }
        
    @media only screen and (max-width: 720px) {
    .bu{
        display: block;
    }
    .form{
        position: relative;
        width: 100%;
        height: 500px;
    }
    
    #text{
        font-size: 25px; 
        color: white;
        left:2%;
    }

    #contenedor-principal{
        
    }

    #btn1{
        margin-left: 0%;
        font-size: 25px;
        text-decoration:none;
        color: white;
        z-index: 1;
    }
    #btn2{
        margin-left: 0%;
        font-size: 25px;
        text-decoration:none;

        color: white;
        z-index: 1;
    }
    #btn3{
        margin-left: 0%;
        font-size: 25px;
        text-decoration:none;
        color: white;
        z-index: 1;
    }
    #btn4{
        margin-left: 0%;
        font-size: 25px;
        text-decoration:none;
        color: white;
        z-index: 1;
    }
    #btn5{
        margin-left: 0%;
        font-size: 25px;
        text-decoration:none;
        color: white;
        z-index: 1;
    }
    }

@media only screen and (max-width: 720px) {
     #text{
        font-size: 25px; 
        color: white;
        position:relative;
        margin-top: 60%;
        left:2%;
        z-index: 1;
    }
}
</style>