    <!--div class="container-fluid"><?php echo form_open(base_url() . 'Controller_home/login'); ?>
        <div class="sign-in-wrapper">
            <div class="form-group">
                <label>Email</label>
                <input required autofocus type="text" class="form-control" placeholder="Username" name="username" id="username">

                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input required type="password" class="form-control" placeholder="*********" name="password" id="password">

                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Recordar
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Olvidaste tu contraseña?</a></div>
            </div>
            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>

        </div>
        <?php echo form_close(); ?>
    </div-->


        <!-- style="background-color: #666666;"-->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form validate-form">
                    <?php echo form_open(base_url() . 'Controller_home/login'); ?>
                    <span class="login100-form-title p-b-43">
                        Iniciar sesión
                    </span>


                    <div class="wrap-input100 validate-input" data-validate = "Usuario requerido">
                        <input class="input100" type="text" name="username" id="username">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Usuario</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Contraseña requerida">
                        <input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Contraseña</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">

                        
                    </div>
            

                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" type="submit" value="Ingresar">
                    </div>
                
                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            ¿Olvidaste tu contraseña?
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    <?php echo form_close(); ?>
                </div>

                <div class="login100-more">
                    <video class="video_background" src="<?php echo base_url(); ?>assets/login/images/intro_forest.mp4" loop autoplay preload muted>Video</video>
                </div>
            </div>
        <!-- style="background-image: url('images/bg-01.jpg');" -->
        </div>
        
    </div>