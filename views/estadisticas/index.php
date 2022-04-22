<?php echo require "views/navbar.php"; ?>

<!-- start: Content -->
<div id="content" style="margin-top:35px;">
  <div class="box-shadow-none content-header">
    <div class="panel-body">
       <div class="">
         <h3 class="animated fadeInLeft">Estadísticas</b></h3>
        </div>
     </div>
   </div>
   <div class="text-center"><h3>AÑO <?php echo date("Y"); ?></h3></div>
    <!-- Horas académicas -->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 35px;">
        <div class="col-md-12 panel">
            <figure class="highcharts-figure" style="padding: 30px;">
                <div id="chartdis"></div>
                    <p class="highcharts-description">
                </p>
            </figure>
        </div>
<!-- End: Horas académicas -->
<!-- Actividades extensivas -->
        <div class="col-md-12 panel">
            <figure class="highcharts-figure" style="padding: 30px;">
                <div id="charttrans"></div>
                <p class="highcharts-description">
                </p>
            </figure>
        </div>
<!-- End: Actividades extensivas -->


</div>
<!-- end: content -->
<!-- start: Javascript -->
<script type="text/javascript">

        //Start Charts HighCharts

//START: CHART HORAS ACADÉMICAS
<?php
   $anio = date("Y");
   if(isset($this->data)){
    $n_horas_i = 0;
    $n_horas_ii = 0;
       foreach($this->data as $row){
           $data = new H_academicas();
           $data = $row;
           $periodo = explode("-", $data->periodo);
           if($data->id == $_SESSION["s_id"]){
               if($periodo[1]==$anio){
                   if($periodo[0]=="I"){
                       $n_horas_i = $n_horas_i + $data->n_horas;
                   }
                   if($periodo[0]=="II"){
                       $n_horas_ii = $n_horas_ii + $data->n_horas;
                   }
               }
           }
       }
   }
?>
        Highcharts.chart('chartdis', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Horas académicas por periodo'
          },
          subtitle: {
              text: ''
          },
          xAxis: {
            categories: [
                'PERIODO I',
                'PERIODO II',
              ],
              crosshair: true,
          },
          yAxis: {
              title: {
                  text: 'Nro. de Horas',
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">Periodo: {point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">Total de horas: </td>' +
                  '<td style="padding:0"><b>{point.y}</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0,
              }
          },
          series: [{
              colorByPoint: true,
              data: [
                    <?php echo $n_horas_i; ?>, 
                    <?php echo $n_horas_ii; ?>,
                  ],
              showInLegend: false,
          },]
      });
// END: CHART HORAS ACADÉMICAS
 
//START: CHART ACTIVIDADES EXTENSIVAS

<?php
   if(isset($this->data1)){
       $na_e = 0;
       $na_f = 0;
       $na_m = 0;
       $na_a = 0;
       $na_my = 0;
       $na_j = 0;
       $na_jl = 0;
       $na_ag = 0;
       $na_s = 0;
       $na_o = 0;
       $na_n = 0;
       $na_d = 0;
       foreach($this->data1 as $row){
           $data1 = new H_academicas();
           $data1 = $row;
           $fecha = explode("/", $data1->fecha);
           if($data1->id == $_SESSION["s_id"]){
               if($fecha[2]==$anio){
                   if($fecha[1]=="01"){
                    $na_e = $na_e + 1;
                   }
                   if($fecha[1]=="02"){
                    $na_f = $na_f + 1;
                   }
                   if($fecha[1]=="03"){
                    $na_m = $na_m + 1;
                   }
                   if($fecha[1]=="04"){
                    $na_a = $na_a + 1;
                   }
                   if($fecha[1]=="05"){
                    $na_my = $na_my + 1;
                   }
                   if($fecha[1]=="06"){
                    $na_j = $na_j + 1;
                   }
                   if($fecha[1]=="07"){
                    $na_jl = $na_jl + 1;
                   }
                   if($fecha[1]=="08"){
                    $na_ag = $na_ag + 1;
                   }
                   if($fecha[1]=="09"){
                    $na_s = $na_s + 1;
                   }
                   if($fecha[1]=="10"){
                    $na_o = $na_o + 1;
                   }
                   if($fecha[1]=="11"){
                    $na_n = $na_n + 1;
                   }
                   if($fecha[1]=="12"){
                    $na_d = $na_d + 1;
                   }
               }
           }
       }
   }
?>
Highcharts.chart('charttrans', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Actividades extensivas'
          },
          subtitle: {
              text: ''
          },
          xAxis: {
              categories: [
                  'Enero',
                  'Febrero',
                  'Marzo',
                  'Abril',
                  'Mayo',
                  'Junio',
                  'Julio',
                  'Agosto',
                  'Septiembre',
                  'Octubre',
                  'Noviembre',
                  'Diciembre',
              ],
              crosshair: true
          },
          yAxis: {
              max: 100,
              title: {
                  text: 'Nro. de actividades'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">Periodo: {point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">Total de actividades: </td>' +
                  '<td style="padding:0"><b>{point.y}</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  borderWidth: 0
              }
          },
          series: [{
              colorByPoint: true,
              data: [
                  <?php echo $na_e; ?>,
                  <?php echo $na_f; ?>,
                  <?php echo $na_m; ?>,
                  <?php echo $na_a; ?>,
                  <?php echo $na_my; ?>,
                  <?php echo $na_j; ?>,
                  <?php echo $na_jl; ?>,
                  <?php echo $na_ag; ?>,
                  <?php echo $na_s; ?>,
                  <?php echo $na_o; ?>,
                  <?php echo $na_n; ?>,
                  <?php echo $na_d; ?>,
              ],
              showInLegend: false
          },]
      });
//END: CHART ACTIVIDADES EXTENSIVAS


//End: Charts HighCharts
</script>
<!-- end: Javascript -->