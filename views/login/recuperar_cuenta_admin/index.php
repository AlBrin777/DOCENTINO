<?php echo require "views/navbar_log_a.php"; ?>
  <div class="container" style="margin-top:50px; margin-bottom:50px;">
    <form action="" method="POST" id="formSing" class="form-signin" enctype="multipart/form-data">
        <div class="panel">
        <div><i>RECUPERACIÓN DE CONTRASEÑA</i></div>
            <div class="panel-body text-center">
              <div class="alert" id="alert"></div>
              <img src="<?php echo constant("URL"); ?>publics/img/log-unefa.jpg" class="img-circle" id="blah" alt="user name" height="90" width="90"/><br>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="text" id="user" class="form-text" name="user" required>
                <span class="bar"></span>
                <label>Cédula de identidad</label>
              </div>
              <input type="submit" class="btn btn-success col-md-12" value="Enviar"/>
            </div>
            <div class="text-center" style="padding:5px;">
                  <a href="<?php echo constant("URL"); ?>login/Administrador">Iniciar sesión</a>
                  <a href="<?php echo constant("URL"); ?>registro/Administrador">| Registro</a>
               </div>
         </div>
       </form>
</div>
<?php echo require "views/footer.php"; ?>


