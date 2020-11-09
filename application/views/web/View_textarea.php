<form id="tarea" role="form" action="Controller_blog/rellena_textarea/<?php echo $id; ?>" method="post">
	<?php foreach ($textarea as $key => $value): ?>




                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Articulo</label>
                            <textarea name="articulo" id="articulo" cols="100" rows="100" ><?php echo $value->articulo; ?></textarea>
                        </div>
<?php endforeach ?>

<div align="center">
    <button type="submit" class="btn btn-info col-md-2">subir</button>
    <a class="btn btn-danger col-md-2" href="<?php echo base_url(); ?>Controller_blog/vista_blog">Cancelar</a>

</div>

</form>



<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/web_blog.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>


<script>
    $('.se').select2({
        dropdownParent: $('#create_form_modal')
    });
    CKEDITOR.replace('articulo')
    CKEDITOR.config.height = 425

</script>
