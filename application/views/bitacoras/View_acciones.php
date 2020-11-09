<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
    <h3 align="center">Bitacora de acciones</h3>
    <br><br>
    <div class="col-md-4">
        <p>
            <strong>Mostrar por : </strong>
            <select name="cantidad" id="cantidad">
                <option value="5">5</option>
                <option value="10">10</option>
            </select>
        </p>
    </div>
    <div class="col-md-4 col-md-offset-4" >
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar por fecha" />
        <br>
    </div>

    <table id="tbacciones" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info" width="30%">Fecha y hora</th>
                <th class="info" width="60%">Ip</th>
                <th class="info" width="100%">Accion</th>
                <th class="info" width="100%">Tabla</th>
                <th class="info" width="100%">usuario</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="text-center paginacion">
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/bitacora_acciones.js"></script>