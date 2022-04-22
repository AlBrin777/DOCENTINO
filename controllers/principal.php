<?php
     class Principal extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $this->view->render("principal/docente/index");
         }
         function docente(){
            $data = $this->model->horas_academicas();
            $this->view->data = $data;
            $eve = $this->model->evento();
            $this->view->eve = $eve;
            $this->view->render("principal/docente/index");
        }
        function administrador(){
            $this->view->render("principal/administrador/index");
        }
     }
?>