 
    <div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
        <h3 align="center">Opciones</h3> 
        <input name="id_menuo" id="id_menuo" parsley-type="alphanum" type="hidden"  />
        <a id="add_user" class="btn btn-info" data-modal="form-primary">Crear Rol</a>
        <div id="tab1"></div><div  id="tab2"></div>

    </div>
<div id="agregar" style="width:400px;min-height:400px;" title="Crear nuevo rol">
    <form name="agre_user" id="agre_user">
        <div class="modal-body form">
            <div class="form-group">
                <label>Rol</label> 
                <input name="rolc" id="rolc" parsley-type="alphanum" type="text" class="form-control"  />
            </div>
        </div>
    </form>               
</div>
<div class="editando" style="width:400px;min-height:400px;" title="Editar rol">
    <div class="modal-body form">
        <div class="form-group">
            <label>Rol</label> 
            <input name="eroll" id="eroll" parsley-type="alphanum" type="text" class="form-control"  />
            <input name="id_role" id="id_role" parsley-type="alphanum" type="hidden"  />
        </div>                     
    </div>
</div>
<div id="eliminando" class="alert alert-warning">
    <input type="hidden" name="idr" id="idr">              
    <i class="fa fa-warning sign"></i>
    <strong style='color:red;'>Alerta!</strong> Esta seguro de eliminar el rol.
</div>
<div id="dialog_asignar_menu" title="Menu de opcciones">
    <form  action="" name="asig_menu" id="asig_menu" method="post">
        <label>Asignar Permisos</label>
        <input type="hidden" name="id_rol_asignar" id="id_rol_asignar">
        <div>
            <input style="background: #F0EFF4;"  type="name" name="nombre_rol" id="nombre_rol" readonly="true">    
        </div>
        <div  id="opciones_menu"><!--aqui colocamos el resultado que devuelve la llamada ajax-->
        </div>    
    </form>
</div>
<div class="md-overlay"></div>



<script src="assets/js/java-menu.js"></script>

<style>

    .cool_checkbox, .cool_checkbox *{
        height:30px; margin:0; padding:0;
        display:inline-block;
        white-space:nowrap; user-select: none;
    }
    .cool_checkbox{
        font-family:sans-serif;
        width:70px; position:relative; overflow:hidden;
        border:1px solid gray; border-radius:6px;
        background:gray;
    }

    .cool_checkbox input{
        display:none;
    }
    .cool_checkbox label{
        position:absolute; width:150px;
        cursor:pointer;
        transition: left 0.2s ease-in-out;
        vertical-align:top;
        line-height:100%;
        left:-56px;
        display:block;
    }
    .cool_checkbox > input:checked + label{
        left:0px;
    }

    .cool_checkbox > input:disabled + label{
        opacity:0.8;
    }

    .cool_checkbox label > span{
        text-align:left; text-transform:uppercase;
        font-weight:bolder; font-family:sans;
        width:50px; position:relative; z-index:0;
        box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        vertical-align:middle;
        line-height:30px;
    }
    .cool_checkbox label > span:nth-child(1){
        padding-right:15px; text-align:right;
        background:#4085EC;
        background-image: linear-gradient(bottom, #76AEFC 0%, #4D8EEF 49%, #4085EC 50%, #336ED4 100%);
        color:white; text-shadow: 0px -1px 0.5px #1b3d72;
    }

    .cool_checkbox label > span:nth-child(2){
        width:40px; margin:-2px -10px; z-index:1; border-radius: 6px;height:32px;
        background:gray;
        box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
    }

    .cool_checkbox label > span:nth-child(2) > span{
        width:38px; height:29px; margin:1px;
        border-top:1px solid white;
        overflow:hidden; text-indent:-999em;
        border-radius: 5px;
        background:#e4e4e4; background-image: linear-gradient(bottom, #FBFBFB 0%, #CECECE 100%);
    }

    .cool_checkbox label > span:nth-child(3){
        padding-left:15px; text-align:left;
        color:#7e7e7e;
        background:#EFEFEF; background-image: linear-gradient(bottom, #FEFEFE 0%, #F9F9F9 49%, #EFEFEF 50%, #E7E7E7 100%);
    }

    /* A partir de aquí: arreglos temporales hasta que CSS3 esté bien soportado */
    .cool_checkbox{
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
    }
    .cool_checkbox label{
        -moz-transition: left 0.2s ease-in-out;
        -webkit-transition: left 0.2s ease-in-out;
        -o-transition: left 0.2s ease-in-out;
    }
    .cool_checkbox label > span{
        -moz-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
    }
    .cool_checkbox label > span:nth-child(1){
        background-image: -o-linear-gradient(bottom, #76AEFC 0%, #4D8EEF 49%, #4085EC 50%, #336ED4 100%);
        background-image: -moz-linear-gradient(bottom, #76AEFC 0%, #4D8EEF 49%, #4085EC 50%, #336ED4 100%);
        background-image: -webkit-linear-gradient(bottom, #76AEFC 0%, #4D8EEF 49%, #4085EC 50%, #336ED4 100%);
        background-image: -ms-linear-gradient(bottom, #76AEFC 0%, #4D8EEF 49%, #4085EC 50%, #336ED4 100%);
    }
    .cool_checkbox label > span:nth-child(2){
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        -webkit-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
    }
    .cool_checkbox label > span:nth-child(2) > span{
        background-image: -o-linear-gradient(bottom, #FBFBFB 0%, #CECECE 100%);
        background-image: -moz-linear-gradient(bottom, #FBFBFB 0%, #CECECE 100%);
        background-image: -webkit-linear-gradient(bottom, #FBFBFB 0%, #CECECE 100%);
        background-image: -ms-linear-gradient(bottom, #FBFBFB 0%, #CECECE 100%);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
    }
    .cool_checkbox label > span:nth-child(3){
        background-image: -o-linear-gradient(bottom, #FEFEFE 0%, #F9F9F9 49%, #EFEFEF 50%, #E7E7E7 100%);
        background-image: -moz-linear-gradient(bottom, #FEFEFE 0%, #F9F9F9 49%, #EFEFEF 50%, #E7E7E7 100%);
        background-image: -webkit-linear-gradient(bottom, #FEFEFE 0%, #F9F9F9 49%, #EFEFEF 50%, #E7E7E7 100%);
        background-image: -ms-linear-gradient(bottom, #FEFEFE 0%, #F9F9F9 49%, #EFEFEF 50%, #E7E7E7 100%);
    }




.ui-dialog {

    
    
}

.ui-dialog{
    max-width: 300px;
    max-height: 350px;
}



</style>