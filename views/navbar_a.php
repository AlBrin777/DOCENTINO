<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Login of DOCENTINO credits: Isna Nur Azis">
  <meta name="author" content="Alfredo Flores credits: Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DOCENTINO</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/datatables.bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/fullcalendar.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/nouislider.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/datepicker/bootstrap-datepicker3.css">
      <link rel="stylesheet" type="text/css" href="<?php echo constant("URL")?>publics/css/plugins/chart/highchart.css">
	    <link href="<?php echo constant("URL")?>publics/css/style.css" rel="stylesheet">
    <!-- end: Css -->
      <link rel="shortcut icon" href="<?php echo constant("URL")?>publics/img/log-dc-v2.png">

</head>

 <body id="mimin" class="dashboard">

      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
              <a href="" class="navbar-brand"> 
                 <b><img class="ripple" src="<?php echo constant("URL")?>publics/img/log-docentino.png" alt="Inicio"></b>
              </a>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name">
                <span>
                 Name_user
                </span>
                </li>
                  <li class="dropdown avatar-dropdown">
                   <img src="<?php echo constant("URL")?>publics/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="">ADMINISTRADOR</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li></li>
                        <li><a href="<?php echo constant("URL");?>seguridad"><span class="fa fa-lock"></span></a></li>
                        <li><a href="<?php echo constant("URL");?>login/cerrar_sesion"><span class="fa fa-power-off "></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>&nbsp;
                <li>&nbsp;&nbsp;&nbsp;</li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list"><br>
                    <li class="ripple text-center btn-round"><img src="<?php echo constant("URL")?>publics/img/log-unefa.jpg" height="90" alt="logo unefa"></li>
                    <li class="text-center"><h6><b>UNEFA</b></h6></li>
                    <li class="active ripple"><a href="<?php echo constant("URL");?>docentes"><span class="fa- fa"></span>Docentes</a></li>
                    <li class="ripple"><a href="<?php echo constant("URL");?>calendario/administrador"><span class="fa- fa"></span> Calendario</a></li>
                    <li class="text-center bg-blue text-white"><small><i class="fa fa-copyright"></i> Docentino 2021</small></li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

    <!-- start: Mobile -->
      <div id="mimin-mobile">
        <div class="mimin-mobile-menu-list bg-blue" style="margin-top: 50px;">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
            <ul class="nav nav-list"><br>
                    <li class="ripple text-center btn-round"><img src="<?php echo constant("URL")?>publics/img/log-unefa.jpg" height="90" alt="logo unefa"></li>
                    <li class="text-center"><h6><b>UNEFA</b></h6></li>
                    <li class="active ripple"><a href=""><span class="fa- fa"></span>Docentes</a></li>
                    <li class="ripple"><a href=""><span class="fa- fa"></span> Calendario</a></li>
                    <li class="text-center bg-blue text-white"><small><i class="fa fa-copyright"></i> Docentino 2021</small></li>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->

    <!--Charts-->
    <script src="<?php echo constant("URL")?>publics/charts/code/highcharts.js"></script>
    <script src="<?php echo constant("URL")?>publics/charts/code/modules/exporting.js"></script>
    <script src="<?php echo constant("URL")?>publics/charts/code/modules/pareto.js"></script>
    <script src="<?php echo constant("URL")?>publics/charts/code/modules/export-data.js"></script>
    <script src="<?php echo constant("URL")?>publics/charts/code/modules/accessibility.js"></script>
    <!---->
    <script src="<?php echo constant("URL")?>publics/js/jquery.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/bootstrap.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/main.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/query.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/valids.js"></script>

    <!-- plugins -->
    <script src="<?php echo constant("URL")?>publics/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/fullcalendar/locale/es.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.nicescroll.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.vmap.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/chart.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/moment.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.datatables.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/datatables.bootstrap.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.nicescroll.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.knob.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/jquery.mask.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/datepicker/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo constant("URL")?>publics/js/plugins/fullcalendar/locale/es.js"></script>

    <!-- custom -->
     <script src="<?php echo constant("URL")?>publics/js/main.js"></script>
     <script>
     const search = document.querySelector("#search");
     const bar = document.querySelector("#bar");
    
     const links = [
       {linkname: "<a href=''><div class='btn-light'>Horas acedémicas: Inscripción formativa</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Horas acedémicas: Registro de cumplimiento</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Actividades Extensivas: Inscribir</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Actividades Extensivas: Administrar</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Documentos afines</div></a>"},    
       {linkname: "<a href=''><div class='btn-light'>Calendario</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Estadísticas</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Historial</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Perfil</div></a>"},
       {linkname: "<a href=''><div class='btn-light'>Seguridad</div></a>"},
     ]

     const filter=()=>{
      const text = search.value.toLowerCase();
      bar.innerHTML = "";
         for(let linkn of links){
           let linkname = linkn.linkname.toLowerCase();
           if(linkname.indexOf(text)!==-1){
             bar.innerHTML += `<li style= 'background-color: #2196F3; padding: 10px; width:600px;'>${linkn.linkname}</li>`;
           }
           if(linkname.indexOf(text)===''){
             bar.innerHTML += "<div style= 'background-color: #2196F3; padding: 30px; width:600px;'>No encontrado</div>";
           }
         }
         if(search.value == ""){
           bar.innerHTML = "";
         }
     }
     search.addEventListener("keyup", filter);
     </script>
  <!-- end: Javascript -->
</body>
</html>