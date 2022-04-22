<?php echo require "views/navbar_log_a.php"; ?>
<div class="container" style="margin-top:50px; margin-bottom:50px;">
    <form action="<?php echo constant("URL"); ?>registro/permiso_admin" method="POST" id="formSing" class="form-signin" enctype="multipart/form-data">
        <div class="panel">
        <div class="btn btn-danger"><i>PERMISO PARA REGISTRO DE ADMINISTRADOR</i></div>
            <div class="panel-body text-center">
              <div class="alert" id="alert"></div>
              <div class="form-group form-animate-text" style="margin-top:20px !important;">
                <input type="password" id="user" class="form-text" name="llave" required>
                <span class="bar"></span>
                <label>Llave de acceso</label>
              </div>
              <input type="submit" class="btn btn-success col-md-12" value="Iniciar registro"/>
            </div>
            <div class="form-group">
               Debe realizar la petición de su llave de acceso al personal autorizado.
            </div>
         </div>
       </form>
</div>
<?php echo require "views/footer.php"; ?>