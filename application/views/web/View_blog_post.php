<div class="sub_header_in sticky_header" style="background: #3DA8CB;font-family:timesNewRoman;">
    <div class="container">
        <h1>Publicación completa</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->


<main>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <?php foreach ($blog as $key => $value): ?>	
                    <div class="singlepost">
                        <figure><img alt="" class="img-fluid" src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" ></figure>
                        <h1><?php echo $value->titulo ?></h1>
                        <div class="postmeta">
                            <ul>
                                <li><a href="#"><i class="ti-folder"></i> Catecogia: <?php echo $value->categoria ?></a></li><br>
                                <li><a href="#"><i class="ti-calendar"></i> Publicación: <?php echo $value->fecha ?></a></li><br>
                                <li><a href="#"><i class="ti-user"></i> Publicado por: <?php echo $value->nombres ?> <?php echo $value->apellidos ?></a></li>

                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="dropcaps justify">
                               <?php echo $value->articulo ?>
                            </div>

                        </div>

                    </div>

                <?php endforeach ?>
                <hr>

            </div>
<style>
    .post-content p{
        margin:5px 0;
    }
</style>

            <aside class="col-lg-3">
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Otras Publicaciones</h4>
                    </div>
                    <ul class="comments-list">
                        <?php foreach ($blog1 as $key => $value): ?>
                            <li>
                                <div class="alignleft">
                                    <a href="<?php echo base_url(); ?>Controller_blog/vista_web_blog_post/<?php echo $value->id_articulo ?>"><img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" alt=""></a>
                                </div>
                                <small><?php echo $value->categoria; ?></small>
                                <h3><a href="#" title=""><?php echo $value->titulo; ?></a></h3>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <a href="<?php echo base_url(); ?>Controller_blog/vista_web_blog" class="btn btn-info btn-sm">Ver más...</a>
                </div>
                <div class="widget">
                    <div class="widget-title">
                        <h4>Publicaciones antiguas</h4>
                    </div>
                    <ul class="comments-list">
                        <?php foreach ($blogig as $key => $value): ?>
                            <li>
                                <div class="alignleft">
                                    <a href="<?php echo base_url(); ?>Controller_blog/vista_web_blog_post/<?php echo $value->id_articulo ?>"><img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto; ?>" alt=""></a>
                                </div>
                                <small><?php echo $value->categoria; ?></small>
                                <h3><a href="#" title=""><?php echo $value->titulo; ?></a></h3>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- /widget -->
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>