<?php echo require "views/navbar.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-"></i>&nbsp;&nbsp;Actividades extensivas</h1>
                      </div>
                    </div>
            </div>
    </header>
    <form action="<?php echo constant("URL"); ?>actividades_extensivas/finalizar_actividad" method="POST" id="archiform" enctype="multipart/form-data">
         <div><?php echo $this->af_re; ?></div>
    </form>

    <div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Administración de actividades</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">
              <div class="col-md-12"> 
              <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Título</th>
              <th>Descripción</th>
              <th>Hora de inicio</th>
              <th>Hora de Finalización</th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Editar</i></th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Eliminar</i></th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          <?php
            include_once "models/zactividades_extensivas.php";
            if(isset($this->actividad)){
              foreach($this->actividad as $row){
                $actividad = new Actividad();
                $actividad = $row;
                if($actividad->id == $_SESSION["s_id"]){
          ?>
            <tr id="row-<?php echo $actividad->idae; ?>">
              <td><b><?php echo $actividad->idae; ?></b></td>
              <td><b><?php echo $actividad->fecha; ?></b></td>
              <td><b><?php echo $actividad->titulo; ?></b></td>
              <td><b><?php echo $actividad->descripcion; ?></b></td>
              <td><b><?php echo $actividad->hora_inicio; ?></b></td>
              <td><b><?php echo $actividad->hora_fin; ?></b></td>
              <?php
              if($actividad->activo==0){
              ?>
              <td><h5><i class="btn btn-warning btn-round fa fa-pencil edit_this" data-toggle="modal" data-idae="<?php echo $actividad->idae; ?>" data-target="#modalFormEdit"></i></h5></td>
              <td><h5><i class="btn btn-danger btn-round fa fa-trash delete_this" data-toggle="modal" data-idae="<?php echo $actividad->idae; ?>" data-target="#modalFormDele"></i></h5></td>    
              <?php
              }
              ?> 
              <?php
              if($actividad->activo==1){
              ?>
              <td><small>Termino</small></td>
              <td><h5><i class="btn btn-danger btn-round fa fa-trash delete_this" data-toggle="modal" data-idae="<?php echo $actividad->idae; ?>" data-target="#modalFormDele"></i></h5></td>    
              <?php
              }
              ?>         
            </tr>
            <?php
                 }
                }
              }
            ?>
          </tbody>
        </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>         
</div>

<!-- Modal-->
<form action="<?php echo constant("URL"); ?>actividades_extensivas/editar_actividad"  method="POST">
    <div class="modal fade" id="modalFormEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar Actividad</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <input type="text" id="idae" name="idae" value="" hidden>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Título:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="titulo" name="titulo" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Descripción:</b></h5></label>
                  <div class="col-sm-9"><textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control"></textarea></div>
                </div><br><br><br>
                <div class="form-group">
                  <label class="col-sm-12 control-label text-left"><h5><b>Fecha de realización</label>
                       <!--datepicker-->
                        <div class="input-group date datepicker" id="datepicker" data-provide="datepicker"> 
                        <input type="text" id="fecha" value="" name="fecha" class="form-control">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                        </div> 
                      <!--end: datepicker-->
                  </div>
                </div><br><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora de inicio:</b></h5></label>
                  <div class="col-sm-3"><input type="time" min="0" name="hora_inicio" value="" class="form-control" required></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora de finalización:</b></h5></label>
                  <div class="col-sm-3"><input type="time" min="0" name="hora_fin" value="" class="form-control" required></div>
                </div><br><br>  
              </div>
            </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Modal-->

<!-- Modal 2-->
<form action="<?php echo constant("URL"); ?>actividades_extensivas/eliminar_actividad"  method="POST">
    <div class="modal fade" id="modalFormDele" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cancelar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Eliminar Actividad</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
             <input type="text" id="d_idae" name="d_idae" value="" hidden>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Título:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="d_titulo" value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Descripción:</b></h5></label>
                  <div class="col-sm-9"><textarea id="d_descripcion" cols="15" rows="2" class="form-control" disabled></textarea></div>
                </div><br><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>fecha:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="d_fecha" value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora de inicio:</b></h5></label>
                  <div class="col-sm-3"><input type="text" id="d_hora_inicio" value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora fin:</b></h5></label>
                  <div class="col-sm-3"><input type="text" id="d_hora_fin" value="" class="form-control" disabled></div>
                </div><br><br>
              </div>
            </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-danger" value="Eliminar">
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Modal 2-->

<script>
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es-es',
        format: "dd/mm/yyyy"  
    });
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
    $(document).ready(function () {
      $('#datatables-example').DataTable();
    });
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


const button1 = document.querySelectorAll(".delete_this");
button1.forEach(btn=>{
  btn.addEventListener("click", function(){
  var idae = this.dataset.idae;
<?php
  include_once "models/zactividades_extensivas.php";
    if(isset($this->actividad)){
      foreach($this->actividad as $row){
        $actividad = new Actividad();
        $actividad = $row;
?>
  if(idae == <?php echo $actividad->idae; ?>){
    document.getElementById("d_idae").value = "<?php echo $actividad->idae; ?>";
    document.getElementById("d_titulo").value = "<?php echo $actividad->titulo; ?>";
    document.getElementById("d_descripcion").value = "<?php echo $actividad->descripcion; ?>";
    document.getElementById("d_fecha").value = "<?php echo $actividad->fecha; ?>";
    document.getElementById("d_hora_inicio").value = "<?php echo $actividad->hora_inicio; ?>";
    document.getElementById("d_hora_fin").value = "<?php echo $actividad->hora_fin; ?>";
  }
<?php
  }
}
?>
  });
});

const button2 = document.querySelectorAll(".edit_this");
button2.forEach(btn=>{
  btn.addEventListener("click", function(){
  var idae = this.dataset.idae;
<?php
  include_once "models/zactividades_extensivas.php";
    if(isset($this->actividad)){
      foreach($this->actividad as $row){
        $actividad = new Actividad();
        $actividad = $row;
?>
  if(idae == <?php echo $actividad->idae; ?>){
    document.getElementById("idae").value = "<?php echo $actividad->idae; ?>";
    document.getElementById("titulo").value = "<?php echo $actividad->titulo; ?>";
    document.getElementById("descripcion").value = "<?php echo $actividad->descripcion; ?>";
    document.getElementById("fecha").value = "<?php echo $actividad->fecha; ?>";
  }
<?php
  }
}
?>
  });
});


$(function (){
      $("#archiform").on("submit", function(e){
        e.preventDefault();
        var div = $("div").find(".alert");
        var BtnEnter = $("form").find(".btnsend");
        var f = $(this);
        var formData = new FormData(document.getElementById("archiform"));
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
<!-- End: Content -->