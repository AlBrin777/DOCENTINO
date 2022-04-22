<?php echo require "views/navbar.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-"></i>&nbsp;&nbsp;Historial</h1>
                      </div>
                    </div>
            </div>
    </header>
<div><b> Todos los registros hasta la fecha:</b> <?php echo date('d-m-Y') ?></div><br>
    <div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Horas academicas</h4>
        </div>
        <span class="alert"></span>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">

            <div class="col-md-12">
              <div class="table-responsive">
              <table id="datatables-example1" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Periodo</th>
              <th>Carrera</th>
              <th>Asignatura</th>
              <th>Sección</th>
              <th cellspacing=2>Nro. de Horas</th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          <?php
            if(isset($this->inscripcion)){
              foreach($this->inscripcion as $row){
                $inscripcion = new H_academicas();
                $inscripcion = $row;
                if($inscripcion->id == $_SESSION["s_id"]){
          ?>
            <tr id="row-<?php echo $inscripcion->idha; ?>">
              <td><?php echo $inscripcion->idha; ?></td>
              <td><?php echo $inscripcion->periodo; ?></td>
              <td><?php echo $inscripcion->carrera; ?></td>
              <td><?php echo $inscripcion->asignatura; ?></td>
              <td><?php echo $inscripcion->seccion; ?></td>
              <td><?php echo $inscripcion->n_horas; ?></td>             
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
<div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Actividades extensivas</h4>
        </div>
        <span class="alert"></span>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">
              <div class="col-md-12"> 
              <div class="table-responsive">
              <table id="datatables-example2" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Título</th>
              <th>Descripción</th>
              <th>Hora de inicio</th>
              <th>Hora de Finalización</th>
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

  <div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <i><h4><b>Documentos afines:</b></h4></i>
        </div>
        <span class="alert"></span>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">
              <div class="col-md-12"> 
              <div class="table-responsive">
              <table id="datatables-example3" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Documento</th> 
            </tr>
          </thead>
          <tbody id="rows">
          <?php
              include_once "models/zdocumentos_afines.php";
              if(isset($this->docu)){
                foreach($this->docu as $row){
                  $docu = new Documento();
                  $docu = $row;
                  if($docu->id == $_SESSION["s_id"]){
          ?>
            <tr id="row-<?php echo $docu->idda; ?>">
              <td><?php echo $docu->fecha; ?></td>
              <td><?php echo $docu->nombre; ?></td>
              <td><a href="<?php echo $docu->documento; ?>"><?php echo $docu->documento; ?></a></td>
            </tr>
          <?php
                              
                }
              }                
            }
          ?>
          </tbody>
        </table>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div> 
</div>
<script>
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
    $(document).ready(function () {
      $('#datatables-example1').DataTable();
    });
    $(document).ready(function () {
      $('#datatables-example2').DataTable();
    });
    $(document).ready(function () {
      $('#datatables-example3').DataTable();
    });
</script>
<!-- End: Content -->