      $(document).ready(function() {
          //initialize the javascript
          listar_roles();
          $('#menut').live("click", function() {
              listar_menus();
          });

          $('#t-1').live("click", function() {
              var id_menu = $(this).attr('href');
              $('#id_menuo').val(id_menu);
          });
          $('#t-2').live("click", function() {
              var id_menu = $(this).attr('href');
              $('#id_menuo').val(id_menu);
          });
          $('#t-3').live("click", function() {
              var id_menu = $(this).attr('href');
              $('#id_menuo').val(id_menu);
          });

          function listar_roles() {
              $.ajax({
                  url: "Controller_home/listar_rol",
                  type: 'POST',
                  success: function(data) {
                      $('#tab1').html(data);
                  }
              });
          }

          function listar_menus() {
              $.ajax({
                  url: "Controller_home/listar_menu",
                  type: 'POST',
                  success: function(data) {
                      $('#tab3').html(data);
                  }
              });
          }

          function listar_opciones(idmenu) {
              $.ajax({
                  url: "Controller_home/listar_opcion",
                  type: 'POST',
                  data: {
                      id_menu: idmenu
                  },
                  success: function(data) {
                      $('#t' + idmenu).html(data);
                  }
              });
          }



          $('#add_user').click(function() {
              $('#rolc').val("");
              $('#agregar').dialog("open");
              return false;
          });
          $('#agregar').dialog({
              autoOpen: false,
              width: 420,
              height: 250,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $(".alert").remove();
                      if ($("#rolc").val() == "") {
                          $("#rolc").focus().after('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle sign"></i><strong>Error!</strong> Debes ingresar el nombre de rol.</div>');
                          return false;
                      }
                      $.ajax({
                          url: "Controller_home/crear_rol",
                          type: 'POST',
                          data: {
                              rol: $('#rolc').val()
                          },
                          success: function(data) {
                            alertify.alert("Agregado con exito");
                              listar_roles();
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
          $('.edite').live("click", function() {
              var id_role = $(this).attr('href');
              $('#eroll').val(document.getElementById('rol' + id_role).innerHTML);
              $('#id_role').val(id_role);
              $('.editando').dialog("open");
              return false;
          });
          $('.editando').dialog({
              autoOpen: false,
              width: 420,
              height: 250,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $.ajax({
                          url: "Controller_home/editar_rol",
                          type: 'POST',
                          data: {
                              rol: $('#eroll').val(),
                              id_rol: $('#id_role').val()
                          },
                          success: function(data) {
                            alertify.alert("Editado con exito");
                              listar_roles();
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
          $('.deletee').live("click", function() {
              var id_rol = $(this).attr('href');
              $('#idr').val(id_rol);
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
                          url: "Controller_home/eliminar_rol",
                          type: 'POST',
                          data: {
                              id_rol: $('#idr').val()
                          },
                          success: function(data) {
                            alertify.alert("Eliminado con exito");
                              listar_roles();
                          },
                          error: function() {
                              alertify.alert("No se puede eliminar el rol porque tiene usuarios que usan este rol");
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
          /*dialogo para asignar el menu al usuario*/
          $('.dialog_menu').live("click", function() {
              var id_rol = $(this).attr('href');
              $('#id_rol_asignar').val(id_rol);
              $('#nombre_rol').val(document.getElementById('rol' + id_rol).innerHTML); //para mostrar el nombre del rol al que queremos a gregar el menu dinamico
              $.ajax({
                  url: "Controller_home/listar_opciones_menu",
                  type: 'POST',
                  data: {
                      rol: id_rol
                  },
                  success: function(data) {
                      $("#opciones_menu").html(data);
                  }
              });
              $('#dialog_asignar_menu').dialog("open");
              return false;
          });
          $('#dialog_asignar_menu').dialog({
              autoOpen: false,
              height: 400,
              width: 300,
              modal: true,
              resizable:false,

              buttons: [{
                  text: "Guardar",
                  click: function() {
                      $.ajax({
                          url: "Controller_home/guardar_asignacion_menu",
                          type: "POST",
                          data: $("#asig_menu").serialize(),
                          success: function(data) {
                            alertify.alert("Asignación guardada");
                              $('#primera_tabla').css('display', 'none');
                              $('#lista_rol').css('display', 'none');
                              $("#primera_asignacion").html(data);
                          }
                      });
                      $(this).dialog("close");
                  }
              }, {
                  text: "No",
                  click: function() {
                      $(this).dialog("close");
                  }
              }]
          });
          $('#add_menu').click(function() {
              $('#menu').val("");
              $('#agregar_menu').dialog("open");
              return false;
          });
          $('#agregar_menu').dialog({
              autoOpen: false,
              width: 420,
              height: 250,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $(".alert").remove();
                      if ($("#menu").val() == "") {
                          $("#menu").focus().after('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle sign"></i><strong>Error!</strong> Debes ingresar el nombre de menu.</div>');
                          return false;
                      }
                      $.ajax({
                          url: "Controller_home/crear_menu",
                          type: 'POST',
                          data: {
                              menu: $('#menu').val()
                          },
                          success: function(data) {
                            alertify.alert("Agregado con exito");
                              listar_menus();
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
          $('.edite_menu').live("click", function() {
              var id_menu = $(this).attr('href');
              $('#menue').val(document.getElementById('menui' + id_menu).innerHTML);
              $('#id_menu').val(id_menu);
              $('.editando_menu').dialog("open");
              return false;
          });
          $('.editando_menu').dialog({
              autoOpen: false,
              width: 420,
              height: 250,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $.ajax({
                          url: "Controller_home/editar_menu",
                          type: 'POST',
                          data: {
                              menu: $('#menue').val(),
                              id_menu: $('#id_menu').val()
                          },
                          success: function(data) {
                            alertify.alert("Editado con exito");
                              listar_menus();
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
          $('.delete_menu').live("click", function() {
              var id_menu = $(this).attr('href');
              $('#id_menud').val(id_menu);
              $('#eliminando_menu').dialog("open");
              return false;
          });
          $('#eliminando_menu').dialog({
              autoOpen: false,
              width: 500,
              height: 180,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $.ajax({
                          url: "Controller_home/eliminar_menu",
                          type: 'POST',
                          data: {
                              id_menu: $('#id_menud').val()
                          },
                          success: function(data) {
                            alertify.alert("Eliminado con exito");
                              listar_menus();
                          },
                          error: function() {
                              alert("No se puede eliminar el menu porque tiene usuarios que usan el menu");
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
          $('#add_opcion').click(function() {
              $('#opcion').val("");
              $('#agregar_opcion').dialog("open");
              return false;
          });
          $('#agregar_opcion').dialog({
              autoOpen: false,
              width: 450,
              height: 400,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      $(".alert").remove();
                      if ($("#opcion").val() == "") {
                          $("#opcion").focus().after('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle sign"></i><strong>Error!</strong> Debes ingresar el nombre de opcion.</div>');
                          return false;
                      }
                      $.ajax({
                          url: "Controller_home/crear_opcion",
                          type: 'POST',
                          data: $('#agre_opcion').serialize(),
                          success: function(data) {
                            alertify.alert("Agregado con exito");
                              listar_opciones($('#mid').val());
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
          $('.edite_opcion').live("click", function() {
              var id_opcion = $(this).attr('href');
              $('#opcione').val(document.getElementById('opcioni' + id_opcion).innerHTML);
              $('#id_opcion').val(id_opcion);
              $('.editando_opcion').dialog("open");
              return false;
          });
          $('.editando_opcion').dialog({
              autoOpen: false,
              width: 420,
              height: 250,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      var menuid = ($('#id_menuo').val().substring(5, 6));
                      $.ajax({
                          url: "Controller_home/editar_opcion",
                          type: 'POST',
                          data: {
                              opcion: $('#opcione').val(),
                              id_opcion: $('#id_opcion').val()
                          },
                          success: function(data) {
                            alertify.alert("Editado con exito");
                              listar_opciones(menuid);
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
          $('.delete_opcion').live("click", function() {
              var id_opcion = $(this).attr('href');
              $('#id_opciond').val(id_opcion);
              $('#eliminando_opcion').dialog("open");
              return false;
          });
          $('#eliminando_opcion').dialog({
              autoOpen: false,
              width: 500,
              height: 180,
              modal: true,
              buttons: [{
                  text: "Aceptar",
                  click: function() {
                      var menuid = ($('#id_menuo').val().substring(5, 6));
                      $.ajax({
                          url: "Controller_home/eliminar_opcion",
                          type: 'POST',
                          data: {
                              id_opcion: $('#id_opciond').val()
                          },
                          success: function(data) {
                            alertify.alert("Eliminado con exito");
                              listar_opciones(menuid);
                          },
                          error: function() {
                              alert("No se puede eliminar el menu porque tiene usuarios que usan la opcion");
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
      });

      