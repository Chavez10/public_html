<form id="tarea" role="form" action="Controller_Perfiles/rellena_textarea/<?php echo $id; ?>" method="post">
	<?php foreach ($textarea as $key => $value): ?>




                        <div class="form-group pmd-textfield pmd-text-field-floating-label">
                            <label for="Developer Name" class="control-label">Información</label>
                            <textarea name="info" id="info" cols="100" rows="100" ><?php echo $value->info; ?></textarea>
                        </div>
<?php endforeach ?>

<div align="center">
    <button type="submit" class="btn btn-info col-md-2">Subir</button>
    <a class="btn btn-danger col-md-2" href="<?php echo base_url(); ?>Controller_Perfiles/vista_perfiles">Cancelar</a>

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
    CKEDITOR.replace('info')
    CKEDITOR.config.height = 425

</script>