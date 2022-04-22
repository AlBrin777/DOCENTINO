<?php
    require_once "models/zactividades_extensivas.php";
     class actividades_extensivasModel extends Model{
         public function __construct(){
             parent::__construct();
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
         public function inscribir_actividad($data){
             try{
                 $query = $this->db->connect()->prepare("INSERT INTO actividades_extensivas(fecha, titulo, descripcion, hora_inicio, hora_fin, id, activo) VALUES(:fecha, :titulo, :descripcion, :hora_inicio, :hora_fin, :id, :activo)");
                 $query->execute([
                     "fecha"=>$data["fecha"],
                     "titulo"=>$data["titulo"],
                     "descripcion"=>$data["descripcion"],
                     "hora_inicio"=>$data["hora_inicio"],
                     "hora_fin"=>$data["hora_fin"],
                     "id"=>$data["id"],
                     "activo"=>0,
                 ]);
                 return true;
             }catch(PDOExeption $e){
                 return false;
             }
         }
         public function editar_actividad($data){
            try{
                $query = $this->db->connect()->prepare("UPDATE actividades_extensivas SET fecha=:fecha, titulo=:titulo, descripcion=:descripcion, hora_inicio=:hora_inicio, hora_fin=:hora_fin WHERE idae=:idae");
                $query->execute([
                   "idae"=>$data["idae"],
                   "fecha"=>$data["fecha"],
                   "titulo"=>$data["titulo"],
                   "descripcion"=>$data["descripcion"],
                   "hora_inicio"=>$data["hora_inicio"],
                   "hora_fin"=>$data["hora_fin"],
                   ]);
                   return true;
            }catch(PDOExeception $e){
                return false;
            }
        }
        public function eliminar_actividad($idae){
            try{
                $query = $this->db->connect()->prepare("DELETE FROM actividades_extensivas WHERE idae=:idae");
                $query->execute(["idae"=>$idae]);
                return true;
            }catch(PDOExeption $e){
                return false;
            }
        }
        public function subir_fotos($data){
            try{
                $query = $this->db->connect()->prepare("INSERT INTO img_actividades_extensivas(idae, imagen) VALUES(:id, :imagen)");
                $query->execute(["id"=>$data["id"], "imagen"=>$data["imagen"]]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
        public function listo($id){
            try{
                $query = $this->db->connect()->prepare("UPDATE actividades_extensivas SET activo=:activo WHERE idae=:idae");
                $query->execute(["activo"=>1, "idae"=>$id]);
                return 1;
            }catch(PDOException $e){
                return 0;
            }
        }
     }
?>