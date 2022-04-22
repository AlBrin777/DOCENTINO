<?php echo require "views/navbar_a.php"; ?>

<!-- Start: Content -->
<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h1 class="animated fadeInLeft"><i class="fa fa-"></i>&nbsp;&nbsp;Calendario</h1>
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
          <h4>Fechas no laborales</h4>
        </div>
        <div class="text-right" style="margin-right:20px;">
          <h3><i class="btn btn-primary btn-round fa fa-plus-circle" data-toggle="modal" data-target="#modalFormAdd">&nbsp;Añadir</i></h3>
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
              <th>Fecha</th>
              <th>Día de la semana</th>
              <th>Razón</th>
              <th style="background-color: rgb(240, 260, 230);text-align:center;color:green"><i>Eliminar</i></th>
            </tr>
          </thead>
          <tbody id="tbody-substations">
            <tr id="">
              <td></td>
              <td></td>
              <td></td>
              <td><a class="deletethis" data-idsub=""><h5><i class="btn btn-danger btn-round fa fa-trash"></i></h5></a></td>              
            </tr>
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
<form action=""  method="POST">
    <div class="modal fade" id="modalFormAdd" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Registrar un docente</h4>
           </div>          
          <!-- Modal Body -->
          <div class="modal-body">
            <span class="alert"></span>
            <form role="form form-inline">
             <div class="col-md-12"><br><br><br>
             <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Fecha:</b></h5></label>
                  <div class="col-sm-9">
                     <!--datepicker-->
                        <div class="input-group date" id="datepicker" data-provide="datepicker"> 
                        <input type="text" id="dateevent" name="dateevent" class="form-control">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                          </div> 
                      </div>
                    <!--end: datepicker-->
                </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Día de la semana:</b></h5></label>
                  <div class="col-sm-9">
                     <select name="manager" id="manager">
                     <option value="año">Lunes</option>
                     <option value="año">Martes</option>
                     <option value="año">Miércoles</option>
                     <option value="año">Jueves</option>
                     <option value="año">Viernes</option>
                     <option value="año">Sábado</option>
                     </select>
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-3 control-label text-right"><h5><b>Razón:</b></h5></label>
                  <div class="col-sm-9"><input type="text" name="" value="" class="form-control"></div>
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

<script>
   function countChars(obj){
     document.getElementById("charNum").innerHTML = obj.value.length+" /30";
   }
    $(document).ready(function () {
      $('#datatables-example').DataTable();
    });
  
const button1 = document.querySelectorAll(".deletethis");
button1.forEach(butn=>{
butn.addEventListener("click", function(){
    const id_sub = this.dataset.idsub;
    const confirm = window.confirm("¿Eliminar a la subestación "+id_sub+"?");
    if(confirm){
     httpRequest("http://localhost/conveg/administration/deletethis/"+id_sub, function(){
       // document.querySelector('.alert_del').innerHTML = this.responseText;
        const tbody = document.querySelector("#tbody-substations");
        const row = document.querySelector("#row1-"+id_sub);
        tbody.removeChild(row);
          alert("La subestación de ID: "+id_sub+" ha sido eliminada");
        });
     }
  });
});
function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
          callback.apply(http);
        }
    }
}
</script>
<!-- End: Content -->