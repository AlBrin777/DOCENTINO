<?php echo require "views/navbar.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-lock"></i>&nbsp;&nbsp;Seguridad</h1>
                      </div>
                    </div>
            </div>
    </header>
    <div class="col-md-10">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Actualizar cuenta</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
         <span class="alert form-control text-center"></span>
            <form class="cmxform" id="signupForm" method="POST" action="<?php echo constant("URL"); ?>seguridad/actualizar_cuenta" novalidate="novalidate">
              <div class="col-md-6">
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                  <input type="text" class="form-text" value="<?php echo $_SESSION["s_username"]; ?>" id="validate_firstname" name="username" required="" aria-required="true">
                  <span class="bar"></span>
                  <label>Nombre de usuario</label>
                </div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                  <input type="password" class="form-text" id="validate_username" name="password_a" required="" aria-required="true">
                  <span class="bar"></span>
                  <label>Contraseña actual</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                  <input type="password"  class="form-text" id="validate_password" name="password_n" required="" aria-required="true">
                  <span class="bar"></span>                  
                  <span id="charNum"></span>
                  <label>Nueva contraseña</label>
                </div>
                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                  <input type="password" class="form-text" id="validate_confirm_password" name="password_c" required="" aria-required="true">
                  <span class="bar"></span>
                  <label>Confirmar nueva contraseña</label>
                </div>
              </div>                   
              <div class="col-md-12 text-right">
                <input class="submit btn btn-danger" type="submit" value="Guardar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>         
</div>
<script>
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
</script>
<!-- End: Content -->