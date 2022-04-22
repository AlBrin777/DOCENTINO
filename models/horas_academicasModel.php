<?php
    require_once "models/zhoras_academicas.php";
     class horas_academicasModel extends Model{
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
         public function inscribir($data){
             try{
                $query = $this->db->connect()->prepare("INSERT INTO horas_academicas(periodo, carrera, asignatura, seccion, n_horas, id) VALUES(:periodo, :carrera, :asignatura, :seccion, :n_horas, :id)");
                $query->execute([
                "periodo"=>$data["periodo"],
                "carrera"=>$data["carrera"],
                "asignatura"=>$data["asignatura"],
                "seccion"=>$data["seccion"],
                "n_horas"=>$data["n_horas"],
                "id"=>$data["id_usuario"]
                ]);
                return true;
             }catch(PDOException $e){
                 return false;
             }
         }
         public function editar_inscripcion($data){
             try{
                 $query = $this->db->connect()->prepare("UPDATE horas_academicas SET periodo=:periodo, carrera=:carrera, asignatura=:asignatura, seccion=:seccion, n_horas=:n_horas WHERE idha=:idha");
                 $query->execute([
                    "idha"=>$data["idha"],
                    "periodo"=>$data["periodo"],
                    "carrera"=>$data["carrera"],
                    "asignatura"=>$data["asignatura"],
                    "seccion"=>$data["seccion"],
                    "n_horas"=>$data["n_horas"],
                    ]);
                    return true;
             }catch(PDOExeception $e){
                 return false;
             }
         }
         public function eliminar_inscripcion($idha){
             try{
                 $query = $this->db->connect()->prepare("DELETE FROM horas_academicas WHERE idha=:idha");
                 $query->execute(["idha"=>$idha]);
                 return true;
             }catch(PDOExeption $e){
                 return false;
             }
         }
         public function n_horas($idha){
            try{
                $query = $this->db->connect()->query("SELECT idha, n_horas FROM horas_academicas");
                $n_horas=0;
                while($row = $query->fetch()){
                    if($row["idha"]==$idha){
                        $n_horas = $row["n_horas"];
                    }
                }
                return $n_horas;
            }catch(PDOExeption $e){
                return false;
            }
         }
         public function sumar_horas($data){
            try{
                $query = $this->db->connect()->prepare("UPDATE horas_academicas SET n_horas=:n_horas WHERE idha=:idha");
                $query->execute([
                   "idha"=>$data["idha"],
                   "n_horas"=>$data["n_horas"],
                   ]);
                   return true;
            }catch(PDOExeception $e){
                return false;
            }    
         }
         public function finalizar_cumplimiento($idha){
            try{
                $query = $this->db->connect()->prepare("UPDATE horas_academicas SET finalizado=:finalizado WHERE idha=:idha");
                $query->execute([
                   "idha"=>$idha,
                   "finalizado"=>1,
                   ]);
                   return true;
            }catch(PDOExeception $e){
                return false;
            }    
         }
     }
?>