<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">

    <h2 style="text-align: center;padding: 12px;font-weight: bold;">Instalaciones</h2>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar Instalación</button>


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
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar Redactor" />
        <br>
    </div>
    <div class="table table-responsive">
        <table id="tbencuentranos" class="table" width="100%">
            <thead>
                <tr>
                    <th class="info" width="5%"><center>#</center></th>
            <th class="info" width="5%"><center>Estado</center></th>
            <th class="info" width="10%"><center>Foto</center></th>
            <th class="info" width="15%"><center>Instalación</center></th>
            <th class="info" width="15%"><center>Dirección</center></th>
            <th class="info"width="25%"><center>Acciones</center></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="text-center paginacion">
    </div>


    <!-- Modal -->
    <div class="modal" id="create_form_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pmd-modal-bordered">
                    <h2 class="pmd-cart-title-text" id="form-title"></h2>
                </div>
                <form class="" id="developer_cu_form">
                    <div class="modal-body">
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Estado</label>
                            <select name="estado" id="estado">
                                <option value="">--Selecciona una opción--</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Antigua">Antigua</option>
                            </select>
                        </div>
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Instalacion</label>
                            <input type="text" class="form-control" name="instalacion" id="instalacion">
                        </div>
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Direccion</label>
                            <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Mapa</label>
                            <input type="text" class="form-control" name="mapa" id="mapa">
                        </div>
                        <div class="form-group ">
                            <label for="Image" class="control-label">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            <span id="uploaded_hidden_image"></span>
                        </div>
                    </div>
                    <div class="pmd-modal-action">
                        <input type="hidden" id="updateId" name="updateId">
                        <input type="hidden" id="uploaded_image" name="uploaded_image">
                        <input type="hidden"  name="action" id="action" value="create">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success" value="Create  Account">
                        <button data-dismiss="modal" class="btn btn-default">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><br><br><br><br>








<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/web_encuentranos.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>


<script>
    $('.se').select2({
        dropdownParent: $('#create_form_modal')
    });
    CKEDITOR.replace('rticulo')
</script>
