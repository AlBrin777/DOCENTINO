<?php
     class Docentes extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $this->view->render("docentes/index");
         }
     }
?>