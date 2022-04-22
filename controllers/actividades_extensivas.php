<?php
     class Actividades_extensivas extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $actividad = $this->model->actividades();
             if($actividad!=false){
                 $this->view->actividad = $actividad;
             }
             $this->view->render("actividades_extensivas/inscribir_actividad/index");
         }
         function inscribir_actividad(){
            $actividad = $this->model->actividades();
            if($actividad!=false){
                $this->view->actividad = $actividad;
            }
             $this->view->render("actividades_extensivas/inscribir_actividad/index");
         }
         function administrar($id_user){
            $actividad = $this->model->actividades();
            if($actividad!=false){
                include_once "models/zactividades_extensivas.php";
                $fecha_actual = "".date("d")."/".date("m")."/".date("y")."";
                $hora_actual = date("H");
                $minut_actual = date("i");
                $af_re = "";
                foreach($actividad as $row){
                    $act = new Actividad();
                    $act = $row;
                    $hora = explode(":", $act->hora_fin);
                    if($act->activo == 0){
                        if($act->fecha == $fecha_actual && $act->id == $id_user[0]){
                            if($hora[0]==$hora_actual){
                                if($hora[1]==$minut_actual||$hora[1]<$minut_actual){
                                    $af_re = '<span>
                                    <div class="panel col-12 col-md-12">   
                                      <div class="panel-heading">
                                           <label for=""><b>Actividad finalizada recientemente</b></label>
                                      </div>
                                      <div class="panel-body">
                                      <div class="table-responsive">
                                          <table id="" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                             <thead>
                                                <tr>
                                                  <th>ID <?php echo date("y"); ?></th>
                                                  <th>Título</th>
                                                  <th>Fecha</th>
                                                  <th>Hora de inicio</th>
                                                  <th>Hora de finalización</th>
                                                  <th style="background-color: rgb(240, 260, 230);text-align:center;color:blue"><h4><i>Subir Foto</i></h4></th>
                                                </tr>
                                              </thead>
                                             <tbody id="tbody-substations">
                                                  <td>'.$act->idae.'</td>
                                                  <td>'.$act->titulo.'</td>
                                                  <td>'.$act->fecha.'</td>
                                                  <td>'.$act->hora_inicio.'</td>
                                                  <td>'.$act->hora_fin.'</td>
                                                  <td class="text-center"><input type="file" name="file[]" multiple></td>
                                             </tbody>
                                            </table>
                                       </div>
                                          <div class="text-right">
                                           <input type="text" name="id_act" value="'.$act->idae.'" hidden>
                                           <input type="submit" class="btn btn-primary btn-round" value="Listo">
                                          </div>
                                      </div> 
                                    </div>
                                </span>
                                ';
                                
                                }  
                            }else{
                                if($hora[0]<$hora_actual){
                                    $af_re = '<span>
                                    <div class="panel col-12 col-md-12">   
                                      <div class="panel-heading">
                                           <label for=""><b>Actividad finalizada recientemente</b></label>
                                      </div>
                                      <div class="panel-body">
                                      <div class="table-responsive">
                                        <span class="alert"></span>
                                          <table id="" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                             <thead>
                                                <tr>
                                                  <th>ID <?php echo date("y"); ?></th>
                                                  <th>Título</th>
                                                  <th>Fecha</th>
                                                  <th>Hora de inicio</th>
                                                  <th>Hora de finalización</th>
                                                  <th style="background-color: rgb(240, 260, 230);text-align:center;color:blue"><h4><i>Subir Foto</i></h4></th>
                                                </tr>
                                              </thead>
                                             <tbody id="tbody-substations">
                                                  <td>'.$act->idae.'</td>
                                                  <td>'.$act->titulo.'</td>
                                                  <td>'.$act->fecha.'</td>
                                                  <td>'.$act->hora_inicio.'</td>
                                                  <td>'.$act->hora_fin.'</td>
                                                  <td class="text-center"><input type="file" name="file[]" multiple></td>
                                             </tbody>
                                            </table>
                                       </div>
                                          <div class="text-right">
                                              <input type="text" name="id_act" value="'.$act->idae.'" hidden>
                                              <input type="submit" class="btn btn-primary btn-round" value="Listo">
                                          </div>
                                      </div> 
                                    </div>
                                </span>';
                                }
                            }
                        }
                    }
                }
                $this->view->af_re = $af_re;
                $this->view->actividad = $actividad;
            }
            $this->view->render("actividades_extensivas/administrar/index");
        }
        //-----------------Inscribir actividad
        function inscribir(){
            session_start();
            $fecha = $_POST["fecha"];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $hora_inicio = $_POST["hora_inicio"];
            $hora_fin = $_POST["hora_fin"];
            $id = $_SESSION["s_id"];
            if($this->model->inscribir_actividad(["fecha"=>$fecha, "titulo"=>$titulo, "descripcion"=>$descripcion, "hora_inicio"=>$hora_inicio, "hora_fin"=>$hora_fin, "id"=>$id])){
                echo "<div class='btn-round btn-warning animated pulse text-center'><h4>Actividad inscrita</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='4; URL=".constant('URL')."actividades_extensivas/inscribir_actividad'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse text-center'><h4>ERROR</h4></div>";
            }
        }
        //-----------------Fin
        //-----------------------Administrar
        function editar_actividad(){
            session_start();
            $idae = $_POST["idae"];
            $fecha = $_POST["fecha"];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $hora_inicio = $_POST["hora_inicio"];
            $hora_fin = $_POST["hora_fin"];
            if($this->model->editar_actividad(["idae"=>$idae,"fecha"=>$fecha, "titulo"=>$titulo, "descripcion"=>$descripcion, "hora_inicio"=>$hora_inicio, "hora_fin"=>$hora_fin])){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>ACTUALIZACIÓN DE ACTIVIDAD COMPLETADA</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."actividades_extensivas/administrar/".$_SESSION["s_id"]."'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            } 
        }
        function eliminar_actividad(){
            $idae = $_POST["d_idae"];
            if($this->model->eliminar_actividad($idae)){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>ACTIVIDAD ELIMINADA</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."actividades_extensivas/administrar/".$_SESSION["s_id"]."'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }
        }
        function finalizar_actividad(){
            session_start();
                if (isset($_FILES["file"])){
                    $id = $_POST["id_act"];
                    $reporte = null;
                    $x = 0;
                    for($x=0; $x<count($_FILES["file"]["name"]); $x++)
                   {
                     $file = $_FILES["file"];
                     $nombre = $file["name"][$x];
                     $tipo = $file["type"][$x];
                     $ruta_provisional = $file["tmp_name"][$x];
                     $size = $file["size"][$x];
                     $dimensiones = getimagesize($ruta_provisional);
                     $width = $dimensiones[0];
                     $height = $dimensiones[1];
                     $carpeta = "C:\wamp\www\DOCENTINO\publics\img\img_report/";
                     if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif')
                     {
                         $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
                     }
                     else if($size > 1024*1024)
                     {
                         $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
                     }
                     else if($width > 500 || $height > 500)
                     {
                         $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
                     }
                     else if($width < 60 || $height < 60)
                     {
                         $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
                     }
                     else
                     {
                         $src = $carpeta.$nombre;
               
                         //Caragamos imagenes al servidor
                         copy($ruta_provisional, $src);       
                         $foto = constant("URL")."publics/img/img_report/".$nombre;
                         //Codigo para insertar imagenes a tu Base de datos.
                         if($this->model->subir_fotos(["id"=>$id, "imagen"=>$foto])){
                            echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";  
                         }else{
                            echo "<p style='color: red'>ERROR</p>";  
                         }
                         //Sentencia SQL
                     }
                       if($x==count($_FILES["file"]["name"])-1){
                        $this->model->listo($id);
                        echo "<div class='btn-round btn-success animated pulse text-center'><h4>¡REPORTE DE ACTIVIDAD GUARDADO!</h4></div>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='7; URL=".constant('URL')."actividades_extensivas/administrar/".$_SESSION["s_id"]."'></html>";
                       }
                   }
                   echo $reporte;
                }else{
                    echo "<p style='color: green'><b>Subiendo...</b></p>";  
                }
        }
        //---------------------------------
     }
?>