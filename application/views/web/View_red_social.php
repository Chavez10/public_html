<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
    <h3 align="center">Gestion de Redes</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar red<i class=""></i></button>
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

    <table id="tbred" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info" width="30%">Red Social</th>
                <th class="info" width="30%">Icono</th>
                <th class="info" width="30%">Entidad</th>
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
                <h2 class="pmd-cart-title-text" id="form-title">Crear Red Social</h2>
            </div>
            <form class="" id="developer_cu_form">
                <div class="modal-body">
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Red Social</label>
                        <input type="text" class="form-control" name="red_social" id="red_social">
                    </div>

                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Enlace</label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>

                    <label for="Developer Skill" class="control-label">Icono</label>
                    <select name="icono" id="icono"  class="form-control se" style="width: 100%;">
                        <option selected="selected">Buscar icono</option>
                        <option value="fa fa-facebook" data-icon="fa fa-facebook">Facebook</option>
                        <option value="fa fa-facebook-official" data-icon="fa fa-facebook-official">Facebook</option>
                        <option value="fa-facebook-square" data-icon="fa fa-facebook-square">Facebook</option>
                        <option value="fa fa-twitter" data-icon="fa fa-twitter">Twitter</option>
                        <option value="fa fa-twitter-square" data-icon="fa fa-twitter-square">Twitter</option>
                        <option value="fa fa-youtube" data-icon="fa fa-youtube">Youtube</option>
                        <option value="fa fa-youtube-play" data-icon="fa fa-youtube-play">Youtube</option>
                        <option value="fa fa-instagram"data-icon="fa fa-instagram">Instagram</option>
                        <option value="fa fa-whatsapp" data-icon="fa fa-whatsapp">Whatsapp</option>
                        <option value="fa fa-telegram" data-icon="fa fa-telegram">Telegram</option>
                        <option value="fa fa-pinterest" data-icon="fa fa-pinterest">Pinterest</option>
                        <option value="fa fa-linkedin" data-icon="fa fa-linkedin">linkeIn</option>
                        <option value="fa fa-snapchat" data-icon="fa fa-snapchat">Snapchat</option>
                        <option value="fa fa-snapchat-ghost" data-icon="fa fa-snapchat-ghost">Snapchat</option>
                        <option value="fa fa-snapchat-square" data-icon="fa fa-snapchat-square">Snapchat</option>
                        <option value="fa fa-user-circle" data-icon="fa fa-user-circle">Otros</option>
                    </select>

                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Entidad</label>
                        <input type="text" class="form-control" name="entidad" id="entidad">                                
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
<link rel="stylesheet" href="assets_web/fonts/fontawesome.min.css">
<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/web_red_social.js"></script>


<script>
    $('#icono').select2({
    dropdownParent: $('#create_form_modal')
});

function iformat(icon) {
    var originalOption = icon.element;
    return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '</span>');
}
$('.se').select2({
    width: "100%",
    templateSelection: iformat,
    templateResult: iformat,
    allowHtml: true
});
</script>