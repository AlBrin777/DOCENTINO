<?php
     class Estadisticas extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
            $data = $this->model->horas_academicas();
            $this->view->data = $data;
            $data1 = $this->model->actividades();
            $this->view->data1 = $data1;
            $this->view->render("estadisticas/index");
         }
     }
?>