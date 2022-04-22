<?php echo require "views/navbar_log.php"; ?>
  <div class="container" style="margin-top:50px; margin-bottom:50px;">
    <form action="<?php echo constant("URL"); ?>login/acceso_docente" method="POST" id="formSing" class="form-signin" enctype="multipart/form-data">
        <div class="panel">
        <div><i>DOCENTE</i></div>
            <div class="panel-body text-center">
              <div class="alert" id="alert"></div>
              <img src="<?php echo constant("URL"); ?>publics/img/img-user1.jpg" class="img-circle" id="blah" alt="user name" height="90" width="90"/><br>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="text" id="user" class="form-text" name="username" required>
                <span class="bar"></span>
                <label>Nombre de usuario</label>
              </div>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="password" onkeyup="charsCount(this)" id="pass" maxlength="30" class="form-text" name="password" required>
                <span class="bar"></span>
                <span id="charNum"></span>
                <label>Contraseña</label>
              </div>
              <input type="submit" class="btn btn-success col-md-12" value="Iniciar Sesión"/>
            </div>
            <div class="text-center" style="padding:5px;">
                  <a href="<?php echo constant("URL"); ?>login/recuperar_cuenta_docen">Olvido de Contraseña </a>
                  <a href="<?php echo constant("URL"); ?>registro/docente">| Registrarse</a>
               </div>
         </div>
       </form>
</div>
<?php echo require "views/footer.php"; ?>


