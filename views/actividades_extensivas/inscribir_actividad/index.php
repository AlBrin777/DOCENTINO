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
                <div class="time text-center">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sabado, 1ro de Octubre 2029</p>
                </div>
    <div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Inscripción de actividad</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
        <span class="alert"></span>
            <form class="cmxform" id="signupForm" method="POST" action="<?php echo constant("URL"); ?>actividades_extensivas/inscribir" novalidate="novalidate">
              <div class="col-md-6">
                <label for="">PERIODO ACADÉMICO EN CURSO:</label>&nbsp;<label for=""><b>II-2021</b></label>
                <form action="">
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Título de la actividad:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="titulo" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Descripción:</b></h5></label>
                  <div class="col-sm-9"><textarea name="descripcion" id="" cols="30" rows="3" class="form-control"></textarea></div>
                </div><br><br><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Fecha de realización:</b></h5></label>
                  <div class="col-sm-9">
                      <!--datepicker-->
                      <div class="input-group date datepicker" id="datepicker" data-provide="datepicker"> 
                        <input type="text" id="dateevent" name="fecha" class="form-control">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                          </div> 
                      </div>
                        <!--end: datepicker-->
                  </div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora de inicio:</b></h5></label>
                  <div class="col-sm-3"><input type="time" min="0" name="hora_inicio" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Hora de finalización:</b></h5></label>
                  <div class="col-sm-3"><input type="time" min="0" name="hora_fin" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6"><input type="submit" value='INSCRIBIR' class="form-control btn-danger"></div>
                  </div>
                </form>               
              </div>
              <div class="col-md-6">
              <div class="table-responsive">
                <b>Inscritas</b><br><br>
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>ACTIVIDAD</th>
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
              <td><?php echo $actividad->idae; ?></td>
              <td><h5><b><?php echo $actividad->titulo; ?></b></h5></td>           
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
    let currentDate = new Date();
    var date = currentDate;
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es-es',  
    });
</script>
<!-- End: Content -->