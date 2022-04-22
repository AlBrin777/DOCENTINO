<?php
     class Calendario extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $this->view->render("calendario/docente/index");
         }
         function docente(){
            $eve = $this->model->evento();
            $this->view->eve = $eve;
            $this->view->render("calendario/docente/index");
        }
        function administrador(){
            $this->view->render("calendario/administrador/index");
        }
        //----------DOCENTE------------------------//
        function registrar_evento(){
            $id = $_POST["id_user"];
            $evento = $_POST["evento"];
            $descripcion = $_POST["descripcion"];
            $fecha = $_POST["fecha"];
            if($this->model->registrar_evento(["id"=>$id, "evento"=>$evento, "descripcion"=>$descripcion, "fecha"=>$fecha])){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>EVENTO REGISTRADO</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."calendario/docente/'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }
        }
        //----------FIN DOCENTE--------------------//
        //----------ADMINISTRADOR-----------------//
        //----------FIN ADMINISTRADOR--------------//
     }
?>