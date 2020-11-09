<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
    <h3 align="center">Gestion de Ediciones</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Asignar Noticia<i class=""></i></button>
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
        <input type="text" class="form-control" name="busqueda" placeholder="Escribe el nombre del menu" />
        <br>
    </div>

    <table id="tbednot" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info"  width="15%">Estado</th>
                <th class="info" width="100%">Titular</th>
                <th class="info" width="100%">Reportero</th>
                <th class="info" width="100%">Edicion</th>
                <th class="info" width="100%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="text-center paginacion">
    </div>
</div>

<div class="modal" id="create_form_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
                <h2 class="pmd-cart-title-text" id="form-title">Asignar Noticia</h2>
            </div>
            <form class="" id="developer_cu_form">
                <div class="modal-body">
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Noticia</label>
                        <select name="id_noticia" id="id_noticia"  class="form-control se" style="width: 100%;">
                            <option selected="selected">Buscar Noticia</option>
                            <?php foreach ($notice as $key => $value): ?>
                                <?php 
                                    $id_noticia = $value->id_noticia;
                                    $Titular = $value->Titular;
                                    $Reportero = $value->Reportero;
                                ?>
                            <option value="<?php echo $id_noticia ?>">Reportero: <?php echo $Reportero; ?> - Titulo: <?php echo $Titular ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="Developer Skill" class="control-label">Edicion</label>
                        <select name="id_edicion" id="id_edicion"  class="form-control se" style="width: 100%;">
                            <option selected="selected">Buscar Noticia</option>
                            <?php foreach ($edition as $key => $value): ?>
                                <?php 
                                    $id_edicion = $value->id_edicion;
                                    $num_edicion = $value->num_edicion;
                                ?>
                            <option value="<?php echo $id_edicion ?>">Edicion N~<?php echo $num_edicion ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="pmd-modal-action">
                    <input type="hidden" id="updateId" name="updateId">
                    <input type="hidden"  name="action" id="action" value="create">
                    <input type="submit"  name="submit" id="submit" class="btn btn-success" value="Create  Account">
                    <button data-dismiss="modal" class="btn btn-default">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
select{
    font-family: 'FontAwesome', 'sans-serif';
}
</style>

<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/ednot.js"></script>


<script>
    $('.se').select2({
        dropdownParent: $('#create_form_modal')
    });
</script>