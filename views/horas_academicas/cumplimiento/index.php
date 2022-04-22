<?php echo require "views/navbar.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-"></i>&nbsp;&nbsp;Horas académicas</h1>
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
          <h4>Registro de cumplimiento</h4>
        </div>
        <span class="alert"></span>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">

            <div class="col-md-12">
              <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Periodo</th>
              <th>Carrera</th>
              <th>Asignatura</th>
              <th>Sección</th>
              <th cellspacing=2>Nro. de Horas</th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>+horas</i></th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Finalizar</i></th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          <?php
            if(isset($this->inscripcion)){
              foreach($this->inscripcion as $row){
                $inscripcion = new H_academicas();
                $inscripcion = $row;
                if($inscripcion->id == $_SESSION["s_id"] && $inscripcion->finalizado == 0){
          ?>
            <tr id="row-<?php echo $inscripcion->idha; ?>">
              <td><?php echo $inscripcion->idha; ?></td>
              <td><?php echo $inscripcion->periodo; ?></td>
              <td><?php echo $inscripcion->carrera; ?></td>
              <td><?php echo $inscripcion->asignatura; ?></td>
              <td><?php echo $inscripcion->seccion; ?></td>
              <td><?php echo $inscripcion->n_horas; ?></td>
              <td><h5><i class="btn btn-primary btn-round fa fa-plus-circle sum_this" data-toggle="modal" data-idha="<?php echo $inscripcion->idha; ?>" data-target="#modalFormSum"></i></h5></td>
              <td><h5><i class="btn btn-danger btn-round fa fa-close stop_this" data-toggle="modal" data-idha="<?php echo $inscripcion->idha; ?>" data-target="#modalFormStop"></i></h5></td>              
            </tr>
            <?php
                  }
                if($inscripcion->id == $_SESSION["s_id"] && $inscripcion->finalizado == 1){
            ?>
              <tr id="row-<?php echo $inscripcion->idha; ?>">
              <td><?php echo $inscripcion->idha; ?></td>
              <td><?php echo $inscripcion->periodo; ?></td>
              <td><?php echo $inscripcion->carrera; ?></td>
              <td><?php echo $inscripcion->asignatura; ?></td>
              <td><?php echo $inscripcion->seccion; ?></td>
              <td><?php echo $inscripcion->n_horas; ?></td>
              <td>---</td>
              <td>---</td>
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
<form action="<?php echo constant("URL"); ?>horas_academicas/sumar_horas"  method="POST">
    <div class="modal fade" id="modalFormSum" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cancelar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Sumar horas académicas</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>   
                <input type="text" id="idha" name="idha" value="" hidden>
                <div class="form-group">
                  <label class="col-sm-6 control-label text-right"><h5><b>ID:</b></h5></label>
                  <div class="col-sm-6"><input type="number" min="0" id="g_idha" name="" value="" disabled class="form-control"></div>
                </div><br><br>      
                <div class="form-group">
                  <label class="col-sm-6 control-label text-right"><h5><b>Número de horas:</b></h5></label>
                  <div class="col-sm-6"><input type="number" min="0" id="n_horas" name="" value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-6 control-label text-right"><h5><b>SUMAR:</b></h5></label>
                  <div class="col-sm-6"><input type="number" min="0" id="s_horas" name="s_horas" value="" class="form-control"></div>
                </div><br><br>
              </div>
            </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-round btn-primary" value="Listo">
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Modal-->

<!-- Modal 2-->
<form action="<?php echo constant("URL"); ?>horas_academicas/finalizar_cumplimiento"  method="POST">
    <div class="modal fade" id="modalFormStop" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cancelar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">¿Finalizar cumplimiento?</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <input type="text" id="f_idha" name="f_idha"  value="" hidden>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Periodo:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="f_periodo"  value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Carrera:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="f_carrera"  value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Asignatura:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="f_asignatura"  value="" class="form-control" disabled></div>
                </div><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Sección:</b></h5></label>
                  <div class="col-sm-3"><input type="text" id="f_seccion"  value="" class="form-control" disabled></div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Número de horas:</b></h5></label>
                  <div class="col-sm-3"><input type="number" id="f_n_horas" min="0"  value="" class="form-control" disabled></div>
                </div><br><br>
              </div>
            </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-danger" value="Finalizar">
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Modal 2-->

<script>
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
    $(document).ready(function () {
      $('#datatables-example').DataTable();
    });

const button1 = document.querySelectorAll(".sum_this");
button1.forEach(btn=>{
  btn.addEventListener("click", function(){
  var idha = this.dataset.idha;
<?php
  include_once "models/zhoras_academicas.php";
    if(isset($this->inscripcion)){
      foreach($this->inscripcion as $row){
        $inscripcion = new H_academicas();
        $inscripcion = $row;
?>
  if(idha == <?php echo $inscripcion->idha; ?>){
    document.getElementById("idha").value = "<?php echo $inscripcion->idha; ?>";
    document.getElementById("g_idha").value = "<?php echo $inscripcion->idha; ?>";
    document.getElementById("n_horas").value = "<?php echo $inscripcion->n_horas; ?>";
  }
<?php
  }
}
?>
  });
});

const button2 = document.querySelectorAll(".stop_this");
button2.forEach(btn=>{
  btn.addEventListener("click", function(){
  var idha = this.dataset.idha;
<?php
  include_once "models/zhoras_academicas.php";
    if(isset($this->inscripcion)){
      foreach($this->inscripcion as $row){
        $inscripcion = new H_academicas();
        $inscripcion = $row;
?>
  if(idha == <?php echo $inscripcion->idha; ?>){
    document.getElementById("f_idha").value = "<?php echo $inscripcion->idha; ?>";
    document.getElementById("f_periodo").value = "<?php echo $inscripcion->periodo; ?>";
    document.getElementById("f_carrera").value = "<?php echo $inscripcion->carrera; ?>";
    document.getElementById("f_asignatura").value = "<?php echo $inscripcion->asignatura; ?>";
    document.getElementById("f_seccion").value = "<?php echo $inscripcion->seccion; ?>";
    document.getElementById("f_n_horas").value = "<?php echo $inscripcion->n_horas; ?>";
  }
<?php
  }
}
?>
  });
});
</script>
<!-- End: Content -->