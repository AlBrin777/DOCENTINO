<?php echo require "views/navbar.php"; ?>

<!-- start: Content -->
<div id="content" style="margin-top:30px;">
      <div style="padding: 10px;">
        <form action="<?php echo constant("URL"); ?>perfil/registro_perfil" method="POST" id="perfilform" enctype="multipart/form-data">
          <!--hedader-->
          <div class="box-shadow-none content-header">
            <div class="panel-body">
              <div class="">
                <h3 class="animated fadeInLeft">Perfíl de usuario</h3>
              </div>
            </div>
          </div>
          <!--End: Header-->
          <div class="panel" style="margin-top:30px; padding: 10px;">
          <span class="alert"></span>
            <div class="panel-body">
              <div class="col-12 col-sm-12 col-md-3" style="padding:60px;">
                <div>
                   <div class="form-group">
                    <div class=""><h2><b><?php echo $_SESSION["s_username"]; ?></b></h2></div>
                   </div>
                  <img src="<?php
                   if(isset($_SESSION["s_foto"])==false){
                    echo constant("URL")."/publics/img/perfil/avatar.jpg";
                   }else{
                     echo $_SESSION["s_foto"];
                   }
                   ?>" class="" id="blah" alt="user name" height="130" width="130"/><br>
                  &nbsp;&nbsp;<label style="width: 120px;" for="file-upload" class="btn btn-round text-white center subir float-left">Cambiar imagen</label>
                  <input type="file" name="foto" id="file-upload" style="display: none;">
                </div>
                <style>
                  .subir{padding: 5px 10px; background: rgb(50, 90, 199);color: blue; border: 0px solid #ffff;} 
                  .subir:hover{color: cornsilk;background: crimson;}
                </style>
              </div>
              <div class="col-sm-12 col-md-7" style="padding:60px;"> 
               <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Cédula:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="ci" name="ci" value="" class="form-control border-round"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Nombre:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="nombre" name="nombre" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b> Apellido:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="apellido" name="apellido" value="" class="form-control"></div>
                </div><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Teléfono:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="telefono" name="telefono" value="" class="form-control"></div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b> Vocación:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="vocacion" name="vocacion" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-right"><h5><b> Correo:</b></h5></label>
                    <div class="col-sm-9"><input type="email" id="correo" name="correo" value='' class="form-control"></div>
                  </div>
                  <input type="number" name="id_docente" value="<?php echo $_SESSION["s_id"]; ?>" hidden>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="col-md-9 col-sm-12"></div>
                <div style="padding:20px;" class="text-right col-md-3 col-sm-12">
                  <input  type="submit" value="Guardar" id="btnsend" class="form-control btn-round btn-success"/>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
  include_once "models/zdocente.php";
    if(isset($this->perfil)){
    foreach($this->perfil as $row){
      $perfil = new Docente;
      $perfil = $row;
      if($perfil->id==$_SESSION["s_id"]){
    ?>
    <script>
        document.getElementById("ci").value = "<?php echo $perfil->ci; ?>";
        document.getElementById("nombre").value = "<?php echo $perfil->nombre; ?>";
        document.getElementById("apellido").value = "<?php echo $perfil->apellido; ?>";
        document.getElementById("telefono").value = "<?php echo $perfil->telefono; ?>";
        document.getElementById("correo").value = "<?php echo $perfil->correo; ?>";
        document.getElementById("vocacion").value = "<?php echo $perfil->vocacion; ?>";
    </script>
    <?php
      }
    }
  }
    ?>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#file-upload").change(function(){
      readURL(this);
    });
    $(function (){
      $("#perfilform").on("submit", function(e){
        e.preventDefault();
        var div = $("div").find(".alert");
        var BtnEnter = $("form").find(".btnsend");
        var f = $(this);
        var formData = new FormData(document.getElementById("perfilform"));
        formData.append("name", "value");
        $.ajax({
          type: "POST",
          url: f.attr("action"),
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function (data){
            BtnEnter.val("Validando...");
            BtnEnter.attr("disabled","disabled");
          },
          complete: function (data){
            div.val("Listo");
            div.attr("disabled");
          },
          success: function (data){
            div.html(data);
          },
          error: function (data){
            $(".alert").removeClass("d-none");
          },
        });
        return false;
      });
    });

  </script>
  <!-- end: content -->