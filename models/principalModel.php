<?php
     require_once "models/zhoras_academicas.php";
     require_once "models/zcalendario.php";
     class principalModel extends Model{
         public function __construct(){
             parent::__construct();
         }
         public function horas_academicas(){
            try{
                $data = [];
                $query = $this->db->connect()->query("SELECT * FROM horas_academicas");
                while($row = $query->fetch()){
                    $inscripcion = new H_academicas();
                    $inscripcion->idha = $row["idha"];
                    $inscripcion->periodo = $row["periodo"];
                    $inscripcion->carrera = $row["carrera"];
                    $inscripcion->asignatura = $row["asignatura"];
                    $inscripcion->seccion = $row["seccion"];
                    $inscripcion->n_horas = $row["n_horas"];
                    $inscripcion->id = $row["id"];
                    $inscripcion->finalizado = $row["finalizado"];
                    array_push($data, $inscripcion);
                }
                return $data;
            }catch(PDOExeption $e){
                return null;
            }
        }
         public function evento(){
            try{
                $data = [];
                $query = $this->db->connect()->query("SELECT * FROM calendario");
                while($row = $query->fetch()){
                    $eve = new Evento();
                    $eve->idcd = $row["idcd"];
                    $eve->evento = $row["evento"];
                    $eve->descripcion = $row["descripcion"];
                    $eve->fecha = $row["fecha"];
                    $eve->id = $row["id"];
                    array_push($data, $eve);
                }
                return $data;
            }catch(PDOException $e){
                return null;
            }
         }
     }
?>