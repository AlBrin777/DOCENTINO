<?php
     class Horas_academicas extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $inscripcion = $this->model->horas_academicas();
             $this->view->inscripcion = $inscripcion;
             $this->view->render("horas_academicas/inscripcion_formativa/index");
         }
         function inscripcion_formativa(){
            $inscripcion = $this->model->horas_academicas();
            $this->view->inscripcion = $inscripcion;
            $this->view->render("horas_academicas/inscripcion_formativa/index");
        }
        function cumplimiento(){
            $inscripcion = $this->model->horas_academicas();
            $this->view->inscripcion = $inscripcion;
            $this->view->render("horas_academicas/cumplimiento/index");
        }
        /*------------------INSCRIPCIÓN FORMATIVA----------------------*/
        function inscribir(){
            session_start();
            $id_usuario = $_SESSION["s_id"];
            $periodo = $_POST["n_periodo"]."".$_POST["a_periodo"];
            $carrera = $_POST["carrera"];
            $asignatura = $_POST["asignatura"];
            $seccion = $_POST["seccion"];
            $n_horas = $_POST["n_horas"];
            if($this->model->inscribir(["periodo"=>$periodo, "carrera"=>$carrera, "asignatura"=>$asignatura, "seccion"=>$seccion, "n_horas"=>$n_horas, "id_usuario"=>$id_usuario])){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>INSCRIPCIÓN COMPLETADA</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."horas_academicas/inscripcion_formativa'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }
        }
        function editar_inscripcion(){
            $idha = $_POST["idha"];
            $periodo = $_POST["periodo"];
            $carrera = $_POST["carrera"];
            $asignatura = $_POST["asignatura"];
            $seccion = $_POST["seccion"];
            $n_horas = $_POST["n_horas"];
            if($this->model->editar_inscripcion(["idha"=>$idha,"periodo"=>$periodo, "carrera"=>$carrera, "asignatura"=>$asignatura, "seccion"=>$seccion, "n_horas"=>$n_horas])){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>ACTUALIZACIÓN DE INSCRIPCIÓN COMPLETADA</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."horas_academicas/inscripcion_formativa'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }  
        }
        function eliminar_inscripcion(){
            $idha = $_POST["d_idha"];
            if($this->model->eliminar_inscripcion($idha)){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>INSCRIPCIÓN ELIMINADA</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."horas_academicas/inscripcion_formativa'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }
        }
        /*------------------FIN---------------------------------------*/

        /*------------------CUMPLIMIENTO----------------------*/
        function sumar_horas(){
            $idha = $_POST["idha"];
            $suma = $_POST["s_horas"];
            $n_horas = $this->model->n_horas($idha);
            $total_horas = $n_horas + $suma;
            if($n_horas!=false){
                if($this->model->sumar_horas(["idha"=>$idha, "n_horas"=>$total_horas])){
                    echo "<div class='btn-round btn-warning animated pulse text-center'><h4>¡Se han sumado nuevas horas a la inscripción nro: ".$idha."</h4></div>";
                    echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='4; URL=".constant('URL')."horas_academicas/cumplimiento'></html>";
                }else{
                    echo "<div class='btn-round btn-danger animated pulse text-center'><h4>ERROR</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse text-center'><h4>ERROR</h4></div>";
            } 
        }
        function finalizar_cumplimiento(){
            $idha = $_POST["f_idha"];
            if($this->model->finalizar_cumplimiento($idha)){
                echo "<div class='btn-round btn-success animated pulse text-center'><h4>FINALIZADO</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."horas_academicas/cumplimiento'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
            }
        }
        /*------------------FIN---------------------------------------*/
     }
?>