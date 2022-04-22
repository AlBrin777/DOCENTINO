<?php
     class Historial extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
            $inscripcion = $this->model->horas_academicas();
            $this->view->inscripcion = $inscripcion;
            $actividad = $this->model->actividades();
            $this->view->actividad = $actividad;
            $docu = $this->model->documento();
            $this->view->docu = $docu;
            $this->view->render("historial/index");
         }
     }
?>