<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
    <h3 align="center">Gestion de Ediciones</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar Edicion<i class=""></i></button>
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

    <table id="tbedit" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info" width="30%">Numero de Edicion</th>
                <th class="info" width="30%">Fecha de Edicion</th>
                <th class="info" width="30%">Estado</th>
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
                <h2 class="pmd-cart-title-text" id="form-title">Crear Edicion</h2>
            </div>
            <form class="" id="developer_cu_form">
                <div class="modal-body">
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Numero de Edicion</label>
                        <input type="text" class="form-control" name="num_edicion" id="num_edicion">
                    </div>

                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Fecha de Publicacion</label>
                        <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion">
                    </div>

                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Name" class="control-label">Estado</label>
                        <select name="estado" id="estado">
                            <option value="">--Selecciona una opción--</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/web_edition.js"></script>


<script>
    $('.se').select2({
        dropdownParent: $('#create_form_modal')
    });
</script>