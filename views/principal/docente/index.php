<?php echo require "views/navbar.php"; ?>

<div id="content" style="margin-top:30px;">
  <div style="padding: 10px;">
    <header>
            <div class="panel box-shadow-none content-header">
                    <div class="panel-body">
                      <div class="col-md-12">
                      <div class="time text-center">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sabado, 1ro de Octubre 2029</p>
                </div>
                      </div>
                    </div>
            </div>
    </header>
<div class="col-12 col-md-12 col-lg-12 col-lx-12">
    <div class="col-md-8">
        <div class="panel box-v4">
            <div class="panel-heading bg-white border-none">
                <h4><span class="icon-notebook icons"></span> Agenda</h4>
            </div>
            <div class="panel-body padding-0">
                <div class="col-md-12 col-xs-12 col-md-12 padding-0 box-v4-alert">
                    <div>
                    <h1 id="title_event">EVENTO DE HOY</h1>
                    <?php
                       if(isset($this->eve)){
                         include_once "models/zcalendario.php";
                         $fecha = date("d")."/".date("m")."/".date("Y");
                         $parrafo = '<p id="desc_event">¡No se ha registrado ningún evento para esta fecha!<br>
                         Puedes registrar eventos en la sección de <a href="">Calendario</a>
                         </p>';
                         foreach($this->eve as $row){
                           $eve = new Evento();
                           $eve = $row;
                           if($eve->id == $_SESSION["s_id"]){
                             if($fecha == $eve->fecha){
                    ?>  
                            <?php $parrafo =  '<p id="desc_event">'.$eve->descripcion.'</p>'; ?>
                           
                   <?php  
                             }
                   ?>
                   <?php           
                           }
                         }
                         echo $parrafo;
                       }
                   ?>
                    </div>
                </div>
                <div class="calendar">
                        </div><br>
                        <p><small> Los eventos programados pueden visualizarse aquí en el calendario.</small></p>
            </div>
        </div> 
    </div>
                      <div class="col-md-4">
                            <div class="col-md-12 padding-0">
                              <div class="panel box-v2">
                                  <div class="panel-heading padding-0">
                                    <img src="<?php echo constant("URL")?>publics/img/city.jpg" class="box-v2-cover img-responsive"/>
                                    <div class="box-v2-detail">
                                      <img src="<?php echo isset($_SESSION["s_foto"])?$_SESSION["s_foto"]: ''.constant("URL").'publics/img/img-user1.jpg'; ?>" class="img-responsive"/>
                                      <h4><?php echo isset($_SESSION["s_nombre"])?$_SESSION["s_nombre"]:$_SESSION["s_username"]; ?> <?php echo isset($_SESSION["s_apellido"])?$_SESSION["s_apellido"]:""; ?></h4>
                                    </div>
                                  </div>
                                  <div class="panel-body">
<?php
   if(isset($this->data)){
    $n_horas = 0;
    $n_inscripciones = 0;
       foreach($this->data as $row){
           $data = new H_academicas();
           $data = $row;
           if($data->id == $_SESSION["s_id"]){
             $n_horas = $n_horas + $data->n_horas;
             $n_inscripciones = $n_inscripciones + 1;
            }
        }
    }
?>
                                    <div class="col-md-12 padding-0 text-center">
                                      <div class="col-md-6 col-sm-6 col-xs-6 padding-0">
                                          <h3><?php echo $n_horas; ?></h3>
                                          <p>Horas académicas</p>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-6 padding-0">
                                          <h3><?php echo $n_inscripciones; ?></h3>
                                          <p>Inscripciones</p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
    </div>
</div>
</div>
<script type="text/javascript">
    let currentDate = new Date();
    var date = currentDate;
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es-es',  
    });
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
</script>