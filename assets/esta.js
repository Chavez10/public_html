var _lista_rol;

function get_roles() {
    $('#tablebody-rol').html('');
    $.ajax({
        url: 'act/get_rol',
        type: 'post',
        dataType: 'json',
        success: function(data) {
            var l = '';
            _lista_rol = data;
            var m = '<option value=""></option>';
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    l += '<tr id="linea-rol-' + data[i].id_rol + '" >';
                    l += '<td width="10%" align="center">';
                    l += data[i].rol
                    l += '</td>';
                    l += '<td align="center" width="10%">';
                    l += '<a  id="edit" class="edit_rol label label-default" href=' + data[i].id_rol + '><i class="fa fa-pencil"></i></a>  '
                    l += '<a class="del_user label label-danger"  href=' + data[i].id_rol + ' ><i class="fa fa-times"></i></a>'
                    l += '</td>';
                    l += '</tr>';
                    m += '<option value="' + data[i].id_rol + '" >' + data[i].rol + '</option>';
                }
                $('#tablebody-rol').html(l);
                $('.asignar-id_rol').html(m);
            }
        }
    });
}
$('.del_user').live("click", function() {
    var id_user = $(this).attr('href');
    $('#idud').val(id_user);
    $('#eliminando').dialog("open");
    return false;
});
$('#eliminando').dialog({
    autoOpen: false,
    width: 500,
    height: 180,
    modal: true,
    buttons: [{
        text: "Aceptar",
        click: function() {
            $.ajax({
                url: "act/eliminar_usuario",
                type: 'POST',
                data: {
                    id_usuario_del: $('#idud').val()
                },
                success: function(data) {
                    get_roles();
                }
            });
            $(this).dialog("close");
        }
    }, {
        text: "Cancelar",
        click: function() {
            $(this).dialog("close");
        }
    }]
});
$('#add_rol').live("click", function() {
    $('#rol').val("");
    $('#agregar').dialog("open");
    return false;
});
$('#agregar').dialog({
    autoOpen: false,
    width: 100,
    height: 220,
    modal: true,
    buttons: [{
        text: "Aceptar",
        click: function() {
            $(".alert").remove();
            if ($("#rol").val() == "") {
                $("#rol").focus().after('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle sign"></i><strong>Error!</strong> Debes ingresar el rol.</div>');
                return false;
            }
            $.ajax({
                url: "act/agregar_role",
                type: 'POST',
                data: $('#agre_rol').serialize(),
                success: function(data) {
                    get_roles();
                }
            });
            $(this).dialog("close");
        }
    }, {
        text: "Cancelar",
        click: function() {
            $(this).dialog("close");
        }
    }]
});
        $('.edit_rol').live("click", function () {


            var id_rol = $(this).attr('href');
            /*obtenemos los campos a editar segun el id de los usuarios*/
            $('#erol').val(document.getElementById('rol' + id_rol).innerHTML);
//$('#ec2').val(document.getElementById('clave'+id_user).innerHTML);


//var loc= document.getElementById('loc'+id_user).innerHTML;
            var rol = document.getElementById('rol' + id_rol).innerHTML;

            $("#idus").val(id_rol);


            /*asignamos el rol que tiene el usuario al momento de editar*/

            $("#erol").val(rol);


            $('#editando').dialog("open");
            return false;

        });
$('#editandoz').dialog({
    autoOpen: false,
    width: 100,
    height: 220,
    modal: true,
    buttons: [{
        text: "Aceptar",
        click: function() {
            $.ajax({
                url: "act/editar_role",
                type: 'POST',
                data: $('#rol_edit').serialize(),
                success: function(data) {
                    get_roles();
                }
            });
            $(this).dialog("close");
        }
    }, {
        text: "Cancelar",
        click: function() {
            $(this).dialog("close");
        }
    }]
});