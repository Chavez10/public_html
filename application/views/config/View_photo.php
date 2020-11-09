<div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">

    <h2 style="text-align: center;padding: 12px;font-weight: bold;">Cabecera galeria</h2>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar foto</button>
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
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar cabecera por fecha de actualizacion" />
        <br>
    </div>
    <div class="table table-responsive">
        <table id="tbphoto" class="table" width="100%">
            <thead>
                <tr>
                    <th class="info" width="5%"><center>N~</center></th>
                    <th class="info" width="5%"><center>Foto</center></th>
                    <th class="info" width="10%"><center>Titulo</center></th>
                    <th class="info" width="15%"><center>Fotografo</center></th>
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
                    <h2 class="pmd-cart-title-text" id="form-title">Crear</h2>
                </div>
                <form class="" id="developer_cu_form">
                    <div class="modal-body">
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo_foto" id="titulo_foto">
                        </div>
                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Fotografo</label>
                            <input type="text" class="form-control" name="Fotografo" id="Fotografo">
                        </div>
                        <div class="form-group ">
                            <label for="Image" class="control-label">URL</label>
                            <input type="file" class="form-control" name="url" id="url">
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

<!-- /.form group -->

<!-- Color Picker -->

<!-- JS  files-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/desktop_photo.js"></script>






<script>
    $(function () {
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
    })
</script>