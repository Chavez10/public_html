<div class="sub_header_in sticky_header" style="background: #3DA8CB;font-family:timesNewRoman;">
    <div class="container">
        <h1>Publicaciones</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<main>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">

                    <?php foreach ($blogi as $key => $value): ?>
                        <div class="col-md-6">
                            <article class="blog">
                                <figure>
                                    <a href="<?php echo base_url(); ?>Controller_blog/vista_web_blog_post/<?php echo $value->id_articulo ?>"><img src="<?php echo base_url(); ?>assets/upload/<?php echo $value->foto ?>" alt="">
                                        <div class="preview"><span>Ver todo</span></div>
                                    </a>
                                </figure>
                                <div class="post_info">
                                    <small>Categoria: <?php echo $value->categoria ?></small><br>
                                    <h2><a href="#0"><?php echo $value->titulo; ?></a></h2>
                                    <p><?php echo $value->articulo ?>...</p>
                                    <ul>
                                        <li>
                                            <div class="thumb"><img src="<?php echo base_url(); ?>assets_web/img/avatar.jpg" alt=""></div> <?php echo $value->nombres ?> <?php echo $value->apellidos ?> <br> <?php echo $value->puesto ?> en <?php echo $value->empresa ?>
                                        </li>
                                        <li><i class=""></i></li>
                                    </ul>
                                </div>

                            </article>
                        </div>
                    <?php endforeach ?>
                </div>



            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <!-- /widget -->
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
                                <small>Categoria: <?php echo $value->categoria; ?></small>
                                <h3><a href="#" title=""><?php echo $value->titulo; ?></a></h3>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- /widget -->

                <!-- /widget -->
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
