   <?php

     date_default_timezone_set('America/El_Salvador');
      $año=strftime( "%Y", time() );
      $mes=strftime( "%m", time() );
      $dia=strftime( "%d", time() );

switch ($dia) {
  case 'value':
    # code...
    break;
}
switch ($mes)
    {
        case 1:
        $mes='Enero';
        break;
        case 2:
        $mes='Febrero';
        break;
        case 3:
        $mes='Marzo';
        break;
        case 4:
        $mes='Abril';
        break;
        case 5:
        $mes='Mayo';
        break;
        case 6:
        $mes='Junio';
        break;
        case 7:
        $mes='Julio';
        break;
        case 8:
        $mes='Agosto';
        break;
        case 9:
        $mes='Septiembre';
        break;
        case 10:
        $mes='Octubre';
        break;
        case 11:
        $mes='Noviembre';
        break;
        case 12:
        $mes='Diciembre';
        break;
    }
     ?>
  <div class="container-fluid" id="fondo">
    <br>
    <h2 align="center">ESTADISTICAS</h2>
    <br>
    
  
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#actual" aria-controls="actual" role="tab" data-toggle="tab">Actual</a></li>
    <li role="presentation"><a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">Historial</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="actual">
    
    <div id="conte">
      <h4 id="hcon4">
        <?php echo $dia .' de '.$mes.' del '.$año ?><br>
      </h4>
      <h2 id="hcon2" align="center"> Visitas de este día       <br><?php echo $res->visitas; ?></h2>
     </div>

<section class="content">
      <div class="row">
        <div id="box-mov" class="col-md-4">
            <div class="box box-danger" >
            <div class="box-header">
              <h4 class="box-title">Dispositivos moviles más usados</h4>
            </div>
            <div class="container-fluid">
              <div class="chart" id="movil"></div>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <div id="box-os" class="col-md-4">
            <div class="box box-danger" >
            <div class="box-header">
              <h4 class="box-title">Sistemas operativos más usados</h4>
            </div>
            <div class="container-fluid">
      <div class="chart" id="os"></div>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <div id="box-nav" class="col-md-4">
            <div class="box box-danger" >
            <div class="box-header">
              <h4 class="box-title">Navegadores más usados</h4>
            </div>
            <div class="container-fluid">
    <div class="chart" id="navegador"></div>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
      </div>
    </section>
    </div>
    <div role="tabpanel" class="tab-pane" id="historial">
      <!--a href="<?php echo base_url(); ?>Controller_visitas/cargar_historia/2019-03-30">ir</a-->
      <h3 align="center">Mantenimento</h3>
    </div>
  </div>

</div>




</div>
<style>
  #conte{
  background: black;
  border-radius: 20px;
  }
  #hcon4{
  color: white;
  font-family: solid!important;
  position:relative;
  left: 5%;
  }
  #hcon2{
  color: white;
  font-family: solid!important
  }

  #box-os{
    background: #F4F5FB;
  }
  #box-mov{
    background: #F8F9FB;
  }
  #box-nav{
    background: #F8F9FC;
  }
  #fondo{
  background: #fff;
  box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);
  border: 1px solid #C8C4C4;
  }
  #titulo{
    font-size: 13px !important;
  }
  @media only screen and (max-width: 720px) {
  #hcon2{
  font-size: 20px;
  }
  #hcon4{
  font-size: 10px;
  left: 0%;
  text-align: center;
  }
  #fondo{
  background: none;
  box-shadow: none;
  border: none;
  }
  }
</style>
<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>

      

<script>
  /*------------------------------------------------------------------------------------------*/
    var navegador = new Morris.Donut({
      element: 'navegador',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#16276E","#BD0F92","#22E3E1","#4FD115","#66240A"],
      data: [
      <?php foreach ($navegador as $key => $value): ?>
        {label: "<?php echo $value->navegador;  ?>", value: <?php echo $value->total;  ?>},
      <?php endforeach ?>
      ],
      hideHover: 'auto'
    });
    /*------------------------------------------------------------------------------------------*/
    var os = new Morris.Donut({
      element: 'os',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#16276E","#BD0F92","#22E3E1","#4FD115","#66240A"],
      data: [
      <?php foreach ($os as $key => $value): ?>
        {label: "<?php echo $value->os;  ?>", value: <?php echo $value->total;  ?>},
      <?php endforeach ?>
      ],
      hideHover: 'auto'
    });
    /*------------------------------------------------------------------------------------------*/
    var movil = new Morris.Donut({
      element: 'movil',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#16276E","#BD0F92","#22E3E1","#4FD115","#66240A"],
      data: [
      <?php foreach ($movil as $key => $value): ?>
        {label: "<?php echo $value->movil;  ?>", value: <?php echo $value->total;  ?>},
      <?php endforeach ?>
      ],
      hideHover: 'auto'
    });
    /*------------------------------------------------------------------------------------------*/
</script>
