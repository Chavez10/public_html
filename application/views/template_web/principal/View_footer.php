<script src="<?php echo base_url(); ?>assets/lib/bootstrap.min.js"></script>
<?php foreach ($tema as $key => $value): ?>
    
<?php 
$footer = $value->footer;
?>
<?php endforeach ?>

</div>
<section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <br>
          <ul class="list-unstyled list-inline social text-center">
            <?php foreach ($red as $key => $value): ?>
              <?php $red_social =  $value->red_social;
              $url =  $value->url;
              $icono =  $value->icono;
              $entidad =  $value->entidad; ?>
              <li class="list-inline-item"><a href="<?php echo $url ?>"  target="_blank"><i class="<?php echo $icono?>" title="<?php echo $red_social ?>"></i></a></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>  
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center text-white">
          <p style="color: #fff;"> &copy; Universidad Salvadoreña Alberto Masferrer <br> 
          Facultad de Ciencias Empresariales</p>
        </div>
      </div>  
    </div>
  </section>
</body>

<script>

    $(document).ready(function () {
        $(".jm-loadingpage").fadeOut("slow");
        ;
    });
</script>
<style type="text/css">

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: <?php echo $footer; ?>;
    bottom: 0;
    width: 100%;
}
#footer h5{
  padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 10px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
  padding: 2px 0;
}
#footer ul.social li a i {
   margin-right: 5px;
  font-size:20px;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.social li:hover a i {
  font-size:30px;
  margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
  color:#ffffff;
}
#footer ul.social li a:hover{
  color:#eeeeee;
}
#footer ul.quick-links li{
  padding: 3px 0;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.quick-links li:hover{
  padding: 3px 0;
  margin-left:5px;
  font-weight:700;
}
#footer ul.quick-links li a i{
  margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
  #footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}
</style>

