<?php $xd = $_SESSION['sistemaoperativo'];
if ($xd == 'iPhone' || $xd == 'iPad' || $xd == 'Android' || $xd == 'BlackBerry'): ?>
    <h3 align="center">Opciones</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar opción<i class=""></i></button>


    <div class="panel-group accordion accordion-semi" id="accordion4" ></div>

<?php else: ?>
    <div class="container" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
        <h3 align="center">Opciones</h3>
        <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar opción<i class=""></i></button>


        <div class="panel-group accordion accordion-semi" id="accordion4" ></div>
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
                        <label for="Developer Skill" class="control-label">Opción</label>
                        <input type="text" class="form-control" name="opcion" id="opcion">
                    </div>
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">URL</label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <select class="form-control" id="id_menu" name="id_menu">
                        <option value="">-Seleccione el menu-</option>
<?php foreach ($menus as $m) { ?>

                            <option value="<?php echo $m["id_menu"]; ?>">
                            <?php echo $m['menu']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
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
<script src="assets/lib/jquery.min.js"></script>
<script src="assets/js/java-menu.js"></script>
<script>
    var j1 = jQuery.noConflict();
</script>


<script>

    j1(document).ready(function ($) {
        $(document).on("click", "#delteBtnId", function (e) {
            e.preventDefault();
            swal({
                title: "Eliminar Opción?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((ifWillDelete) => {
                if (ifWillDelete) {
                    var delteBtnId = $(this).attr('data-delteBtnId');
                    var action = 'delete';
                    $.ajax({
                        url: "Controller_menu_opciones/eliminar_opcion",
                        method: "POST",
                        data: {
                            delteBtnId: delteBtnId,
                            action: action
                        },
                        success: function (data) {
                            if (data.trim() == 'deleted') {
                                swal({
                                    title: "Opción eliminada correctamente",
                                    icon: "success"
                                });
                                listar_menu_acordion();
                            }
                        },
                        error: function () {
                            swal({
                                title: "verifique que no este asignado",
                                icon: "warning"
                            });
                        }
                    });
                } else {
                    return false;
                }
            })
        });
        $(document).on("click", "#create_acc_btn", function (e) {
            e.preventDefault();
            $("#developer_cu_form")[0].reset();
            $("#form-title").text('Crear Opción');
            $("#action").val('create');
            $("#submit").val('create');
        });
        $(document).on("click", "#editBtnId", function (e) {
            e.preventDefault();
            var editBtnId = $(this).attr('data-editBtnId');
            var action = 'fetchSingleRow';
            $.ajax({
                url: "Controller_menu_opciones/linea_actualizar",
                method: "POST",
                data: {
                    editBtnId: editBtnId,
                    action: action
                },
                dataType: "json",
                success: function (data) {
                    $("#create_form_modal").modal('show');
                    $("#opcion").val(data.opcion);
                    $("#url").val(data.url);
                    $("#id_menu").val(data.id_menu);
                    $("#form-title").text('Editar opción');
                    $("#action").val('update');
                    $("#submit").val('update');
                    $("#updateId").val(editBtnId);
                }
            });
        });
        $(document).on("submit", "#developer_cu_form", function (e) {
            e.preventDefault();
            var url = $("#url").val();
            var opcion = $("#opcion").val();
            var id_menu = $("#id_menu").val();
            if (url == '') {
                swal({
                    title: "Campo url requerido",
                    icon: "warning"
                });
            } else if (opcion == '') {
                swal({
                    title: "Campo opcion requerido",
                    icon: "warning"
                });
            } else if (id_menu == '') {
                swal({
                    title: "Seleccione un menu",
                    icon: "warning"
                });
            } else {
                $.ajax({
                    url: "Controller_menu_opciones/actualizar_crear_opcion",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.trim() == 'created') {
                            swal({
                                title: "Menu registrado correctamente",
                                icon: "success"
                            });
                            $("#create_form_modal").modal('hide');
                            if ($('.modal-backdrop').is(':visible')) {
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                            }
                            ;
                            $("#developer_cu_form")[0].reset();
                        }
                        $("#create_form_modal").modal('hide');
                        if (data.trim() == 'update') {
                            swal({
                                title: "Menu actualizado correctamente",
                                icon: "success"
                            });
                            $("#developer_cu_form")[0].reset();
                        }
                        listar_menu_acordion();
                    }
                });
            }
        });
    })
    function listar_menu_acordion() {
        $.ajax({
            url: "Controller_menu_opciones/listar_menu_acordion",
            type: 'POST',
            success: function (data) {
                $('#accordion4').html(data);
            }
        });
    }

    listar_menu_acordion();

</script>
