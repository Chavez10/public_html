<?php $xd = $_SESSION['sistemaoperativo'];
if ($xd == 'iPhone' || $xd == 'iPad' || $xd == 'Android' || $xd == 'BlackBerry'): ?>
    <h3 align="center">Gestion de usuarios</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar usuario<i class=""></i></button>
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
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar usuario por nombre" />
        <br>
    </div>

    <table id="tbuser" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info" width="30%">Usuario</th>
                <th class="info" width="60%">Nombre</th>
                <th class="info" width="100%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="text-center paginacion">
    </div>

<?php else: ?>
    <div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
        <h3 align="center">Gestion de usuarios</h3>
        <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar usuario<i class=""></i></button>
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
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar usuario por nombre" />
            <br>
        </div>

        <table id="tbuser" class="table table-responsive" width="100%">
            <thead>
                <tr>
                    <th class="info"  width="15%">#</th>
                    <th class="info" width="30%">Usuario</th>
                    <th class="info" width="60%">Nombre</th>
                    <th class="info" width="100%">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="text-center paginacion">
        </div>
    </div>        
<?php endif ?>




<div class="modal" id="create_form_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
                <h2 class="pmd-cart-title-text" id="form-title"></h2>
            </div>
            <form class="" id="developer_cu_form">
                <div class="modal-body">
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Usuario</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Nombre completo</label>
                        <input type="text" class="form-control" name="nombre_completo" id="nombre_completo">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Clave</label>
                        <input type="password" class="form-control" name="clave" id="clave">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Confirma clave</label>
                        <input type="password" class="form-control" name="clave" id="clave2">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Rol</label>
                        <input type="text" class="form-control" name="id_rol" id="id_rol">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado">
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/create_user.js"></script>


