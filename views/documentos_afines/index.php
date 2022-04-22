<?php echo require "views/navbar.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-"></i>&nbsp;&nbsp;Documentos afines</h1>
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
          <i><h4><b>Añadidos a documentos:</b></h4></i>
          <div class="text-right" style="margin-right:20px;">
          <h3>Subir <i class="btn btn-primary btn-round fa fa-plus-circle" data-toggle="modal" data-target="#modalFormDoc"></i></h3>
        </div>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <form class="cmxform" id="signupForm" method="POST" action="" novalidate="novalidate">
              <div class="col-md-12"> 
              <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Documento</th> 
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Eliminar</i></th>
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
              <td><h5><i class="btn btn-danger btn-round fa fa-trash delete_this" data-toggle="modal" data-idda="<?php echo $docu->idda; ?>" data-target="#modalFormDele"></i></h5></td>                 
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
<form action="<?php echo constant("URL"); ?>documentos_afines/subir_documento" id="formDocu" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modalFormDoc" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Cargar archivo</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <div role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Nombre:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="nombre" value="" class="form-control"></div>
                </div><br><br>
                <div class="form-group">
                  <input type="file" name="document" id="docu">
                </div><br><br><br>
              </div>
            </div>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Subir">
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Modal-->

<!-- Modal 2-->
<form action="<?php echo constant("URL"); ?>documentos_afines/eliminar_documento"  method="POST">
    <div class="modal fade" id="modalFormDele" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"><div style="font-red;">¿Desea eliminar el siguiente documento?</div></h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <div role="form form-inline">
             <div class="col-md-12"><br><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Nombre:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="d_nombre" id="d_nombre" value="" class="form-control" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Documento:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="d_docu" id="d_docu" class="form-control" value="" disabled></div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Subido en la fecha:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="d_fecha" id="d_fecha" class="form-control" value="" disabled></div>
                </div><br><br>
                   <input type="text" name="d_idda" id="d_idda" value="" hidden>
              </div>
            </div>
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

    $(function (){
      $("#formDocu").on("submit", function(e){
        e.preventDefault();
        var div = $("div").find(".alert");
        var BtnEnter = $("form").find(".btnsend");
        var f = $(this);
        var formData = new FormData(document.getElementById("formDocu"));
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

const button2 = document.querySelectorAll(".delete_this");
button2.forEach(btn=>{
  btn.addEventListener("click", function(){
  var idda = this.dataset.idda;
<?php
  include_once "models/zdocumentos_afines.php";
    if(isset($this->docu)){
      foreach($this->docu as $row){
        $docu = new Documento();
        $docu = $row;
?>
  if(idda == <?php echo $docu->idda; ?>){
    document.getElementById("d_idda").value = "<?php echo $docu->idda; ?>";
    document.getElementById("d_fecha").value = "<?php echo $docu->fecha; ?>";
    document.getElementById("d_nombre").value = "<?php echo $docu->nombre; ?>";
    document.getElementById("d_docu").value = "<?php echo $docu->documento; ?>";
  }
<?php
  }
}
?>
  });
});
</script>
<!-- End: Content -->