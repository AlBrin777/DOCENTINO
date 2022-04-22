<?php
    require_once "models/zhoras_academicas.php";
    require_once "models/zactividades_extensivas.php";
    require_once "models/zdocumentos_afines.php";
     class historialModel extends Model{
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
        public function actividades(){
            try{
                $data = [];
                $query = $this->db->connect()->query("SELECT * FROM actividades_extensivas");
                while($row = $query->fetch()){
                    $actividad = new Actividad();
                    $actividad->idae = $row["idae"];
                    $actividad->fecha = $row["fecha"];
                    $actividad->titulo = $row["titulo"];
                    $actividad->descripcion = $row["descripcion"];
                    $actividad->hora_inicio = $row["hora_inicio"];
                    $actividad->hora_fin = $row["hora_fin"];
                    $actividad->id = $row["id"];
                    $actividad->activo = $row["activo"];
                    array_push($data, $actividad);
                }
                return $data;
            }catch(PDOException $e){
                return false;
            }
        }
        public function documento(){
            try{
                $data = [];
                $query = $this->db->connect()->query("SELECT * FROM documentos_afines");
                while($row=$query->fetch()){
                    $docu = new Documento();
                    $docu->idda = $row["idda"];
                    $docu->nombre = $row["nombre"];
                    $docu->documento = $row["documento"];
                    $docu->fecha = $row["fecha"];
                    $docu->id = $row["id"];
                    array_push($data, $docu);
                }
                return $data;
            }catch(PDOException $e){
                return null;
            }
        } 
     }
?>