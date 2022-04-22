<?php echo require "views/navbar_log_a.php"; ?>
  <div class="container" style="margin-top:50px; margin-bottom:50px;">
    <form action="<?php echo constant("URL"); ?>registro/registrar_admin" method="POST" id="formSing" class="form-signin" enctype="multipart/form-data">
        <div class="panel">
        <div><i>ADMINISTRADOR</i></div>
            <div class="panel-body text-center">
              <div class="alert" id="alert"></div>
              <img src="<?php echo constant("URL"); ?>publics/img/img-user1.jpg" class="img-circle" id="blah" alt="user name" height="90" width="90"/><br>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="text" id="user_name" class="form-text" name="user_name" required>
                <span class="bar"></span>
                <label>Nombre de usuario</label>
              </div>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="password" onkeyup="charsCount(this)" id="pass" maxlength="30" class="form-text" name="password" required>
                <span class="bar"></span>
                <span id="charNum"></span>
                <label>Contraseña</label>
              </div>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="password" onkeyup="charsCount(this)" id="pass" maxlength="30" class="form-text" name="c_password" required>
                <span class="bar"></span>
                <span id="charNum"></span>
                <label>Repetir Contraseña</label>
              </div>
              <input type="submit" class="btn btn-success col-md-12" value="Registrarme"/>
            </div>
            <div class="text-center" style="padding:3px;">
              <a href="<?php echo constant("URL"); ?>login/administrador">¿Ya tienes una cuenta?</a>
            </div>
         </div>
       </form>
</div>
<?php echo require "views/footer.php"; ?>


