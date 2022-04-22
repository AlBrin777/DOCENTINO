<?php
     class Documentos_afines extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $docu = $this->model->documento();
             $this->view->docu = $docu;
             $this->view->render("documentos_afines/index"); 
         }
         function subir_documento(){
             session_start();
             $id = $_SESSION["s_id"];
             $fecha = date('d-m-Y h:i:s a', time());
             $nombre_ar = $_POST["nombre"];
             $archivo = isset($_FILES["document"]["name"])?$_FILES["document"]["name"]:null;
             if($archivo!=null){
                 $ruta_ar = isset($_FILES["document"]["tmp_name"])?$_FILES["document"]["tmp_name"]:null;
                 if($ruta_ar!=null){
                    $destino_ar = "C:\wamp\www\DOCENTINO\publics\doc/".$archivo;
                    $archi_db = constant("URL")."publics/doc/".$archivo;
                    copy($ruta_ar, $destino_ar);
                    if($this->model->subir_documento(["nombre"=>$nombre_ar, "documento"=>$archi_db, "fecha"=>$fecha, "id"=>$id])){
                       echo "<div class='btn-round btn-success animated pulse text-center'><h4>¡DOCUMENTO SUBIDO!</h4></div>";
                       echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='2; URL=".constant('URL')."documentos_afines/'></html>";
                    }else{
                       echo "<div class='btn-round btn-danger animated pulse text-center'><h4>¡ERROR!</h4></div>";
                    }
                 }else{
                     echo "<div class='btn-round btn-danger animated pulse text-center'><h4>Ha ocurrido un error o el archivo es muy grande</h4></div>".$fecha;
                 }
             }else{
                echo "<div class='btn-round btn-warning animated pulse text-center'><h4>Subiendo archivo...</h4></div>".$fecha;
             }
         }
         function eliminar_documento(){
             $idda = $_POST["d_idda"];
             if($this->model->eliminar_documento($idda)){
                echo "<div class='btn-round btn-warning animated pulse text-center'><h4>¡DOCUMENTO ELIMINADO!</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='2; URL=".constant('URL')."documentos_afines/'></html>";
             }else{
                echo "<div class='btn-round btn-danger animated pulse text-center'><h4>¡ERROR!</h4></div>";
             }
         }
     }
?>