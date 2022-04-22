<?php echo require "views/navbar.php"; ?>

          <!-- start: Content -->
          <div id="content" style="margin-top:30px">
            <div style="padding: 10px">
                <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <h3 class="animated fadeInLeft">Calendario</h3>
                      </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                    <center><span class="alert"></span></center>
                      <div class="col-md-5">
                      <form action="<?php echo constant("URL"); ?>calendario/registrar_evento" method="POST">
                        <div id='external-events'>
                        <div id=''>
                        <div class='fc-event label'>Mi evento</div>
                        </div>
                        <h4>Programar un evento</h4>
                        <div><label for="title"><h4><b>Nombre:</b></h4></label></div>
                        <div><input class="form-control" onkeyup="countChars(this)" maxlength="57" id="tevent" name="evento" type="text"></div>
                        <span id="charNum">0</span>/57<br><br><br>
                        <div><label for="des">Descripción</label></div>
                        <div><textarea class="form-control" onkeyup="countChars1(this)" maxlength="347" id="devent" name="descripcion" cols="30" rows="6"></textarea></div>
                        <span id="charNum1">0</span>/347
                        <div><br>
                        Fecha:
                        <!--datepicker-->
                        <div class="input-group date datepicker" id="datepicker" data-provide="datepicker"> 
                            <input type="text" id="dateevent" name="fecha" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div> 
                        </div>
                        <!--end: datepicker-->
                        <input type="text" value="<?php echo $_SESSION["s_id"]; ?>" name="id_user" hidden>
                        </div><br>
                          <p>
                              <input type="submit" class="form-control btn-round btn-primary" value="Añadir">
                          </p>
                        </div>
                      </form>
                      </div>
                      <div class="col-md-7">
                        <div class="calendar">
                        </div><br>
                        <p><small> Los eventos programados pueden visualizarse aquí en el calendario.</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- end: content -->
    <script type="text/javascript">
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es-es',
        format: "dd/mm/yyyy"  
    });
    let currentDate = new Date();
    var date = currentDate;
        // start: Calendar =========
         $('.dashboard .calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: date,
            businessHours: true, // display business hours
            editable: true,
            events: [
              <?php
              if(isset($this->eve)){
                include_once "models/zcalendario.php";
                foreach($this->eve as $row){
                  $eve = new Evento();
                  $eve = $row;
                  $fecha = explode("/", $eve->fecha);
                  if($eve->id == $_SESSION["s_id"]){
              ?>
              {
              title: '<?php echo $eve->evento; ?>',
              start: '<?php echo $fecha[1]."/".$fecha[0]."/".$fecha[2]; ?>',
              constraint: 'businessHours'
              },
              <?php              
                    }
                  }
                }
              ?>
            ]
        });
        // end : Calendar==========


        function countChars(obj){
          document.getElementById("charNum").innerHTML = obj.value.length;
        }
        function countChars1(obj){
          document.getElementById("charNum1").innerHTML = obj.value.length;
        }

     </script>
  <!-- end: Javascript -->