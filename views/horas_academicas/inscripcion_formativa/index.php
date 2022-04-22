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
          <h4>Inscripción formativa</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
           <span class="alert"></span>
            <form class="cmxform" id="signupForm" method="POST" action="<?php echo constant("URL"); ?>horas_academicas/inscribir" novalidate="novalidate">
              <div class="col-md-4">
                <label for="">PERIODO ACADÉMICO EN CURSO:</label>&nbsp;<label for=""><b>II-2021</b></label>
                <h3><b><i>Incripción de docencia:</i></b></h3><br>
                <form action="">
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Periodo:</b></h5></label>
                  <div class="col-sm-9">
                    <select name="n_periodo" id="manager">
                     <option value="I-">I</option>
                     <option value="II-">II</option>
                   </select>&nbsp;<b>-</b>&nbsp;
                   <select name="a_periodo" id="manager">
                     <option value="2021">2021</option>
                   </select>
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Carrera:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="carrera" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Asignatura:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="asignatura" value="" class="form-control"></div>
                </div><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Sección:</b></h5></label>
                  <div class="col-sm-3"><input type="text" name="seccion" value="" class="form-control"></div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Número de horas:</b></h5></label>
                  <div class="col-sm-3"><input type="number" min="0" name="n_horas" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6"><input type="submit" value='INSCRIBIR' class="form-control btn-danger"></div>
                  </div>
                </form>               
              </div>
              <div class="col-md-8">
              <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Periodo</th>
              <th>Carrera</th>
              <th>Asignatura</th>
              <th>Sección</th>
              <th>Nro. de Horas</th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Editar</i></th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Eliminar</i></th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          <?php
          include_once "models/zhoras_academicas.php";
          if(isset($this->inscripcion)){
             foreach($this->inscripcion as $row){
               $inscripcion = new H_academicas();
               $inscripcion = $row;
               if($inscripcion->id==$_SESSION["s_id"] && $inscripcion->finalizado == 0){
          ?>
            <tr id="row-<?php echo $inscripcion->idha; ?>">
              <td><?php echo $inscripcion->idha; ?></td>
              <td><?php echo $inscripcion->periodo; ?></td>
              <td><?php echo $inscripcion->carrera; ?></td>
              <td><?php echo $inscripcion->asignatura; ?></td>
              <td><?php echo $inscripcion->seccion; ?></td>
              <td><?php echo $inscripcion->n_horas; ?></td>
              <td><h5><i class="btn btn-warning btn-round fa fa-pencil edit_this" data-toggle="modal" data-idha="<?php echo $inscripcion->idha; ?>" data-target="#modalFormEdit"></i></h5></td>
              <td><h5><i class="btn btn-danger btn-round fa fa-trash delete_this" data-toggle="modal" data-idha="<?php echo $inscripcion->idha; ?>" data-target="#modalFormDele"></i></h5></td>
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
<form action="<?php echo constant("URL"); ?>horas_academicas/editar_inscripcion"  method="POST">
    <div class="modal fade" id="modalFormEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar inscipción</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <input type="text" id="idha" name="idha" value="" hidden>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Periodo:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="periodo" name="periodo" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Carrera:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="carrera" name="carrera" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Asignatura:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="asignatura" name="asignatura" value="" class="form-control"></div>
                </div><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Sección:</b></h5></label>
                  <div class="col-sm-3"><input type="text" id="seccion" name="seccion" value="" class="form-control"></div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Número de horas:</b></h5></label>
                  <div class="col-sm-3"><input type="number" id="n_horas" min="0" name="n_horas" value="" class="form-control"></div>
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
<form action="<?php echo constant("URL"); ?>horas_academicas/eliminar_inscripcion"  method="POST">
    <div class="modal fade" id="modalFormDele" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cancelar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Eliminar inscipción</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <input type="text" id="d_idha" name="d_idha"  value="" hidden>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Periodo:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="d_periodo"  value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Carrera:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="d_carrera"  value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Asignatura:</b></h5></label>
                  <div class="col-sm-9"><input type="text" id="d_asignatura"  value="" class="form-control" disabled></div>
                </div><br><br>  
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Sección:</b></h5></label>
                  <div class="col-sm-3"><input type="text" id="d_seccion"  value="" class="form-control" disabled></div>
                </div><br><br>                   
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Número de horas:</b></h5></label>
                  <div class="col-sm-3"><input type="number" id="d_n_horas" min="0"  value="" class="form-control" disabled></div>
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
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
    $(document).ready(function () {
      $('#datatables-example').DataTable();
    });
  
const button1 = document.querySelectorAll(".delete_this");
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
    document.getElementById("d_idha").value = "<?php echo $inscripcion->idha; ?>";
    document.getElementById("d_periodo").value = "<?php echo $inscripcion->periodo; ?>";
    document.getElementById("d_carrera").value = "<?php echo $inscripcion->carrera; ?>";
    document.getElementById("d_asignatura").value = "<?php echo $inscripcion->asignatura; ?>";
    document.getElementById("d_seccion").value = "<?php echo $inscripcion->seccion; ?>";
    document.getElementById("d_n_horas").value = "<?php echo $inscripcion->n_horas; ?>";
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
    document.getElementById("periodo").value = "<?php echo $inscripcion->periodo; ?>";
    document.getElementById("carrera").value = "<?php echo $inscripcion->carrera; ?>";
    document.getElementById("asignatura").value = "<?php echo $inscripcion->asignatura; ?>";
    document.getElementById("seccion").value = "<?php echo $inscripcion->seccion; ?>";
    document.getElementById("n_horas").value = "<?php echo $inscripcion->n_horas; ?>";
  }
<?php
  }
}
?>

  });
});

</script>
<!-- End: Content -->