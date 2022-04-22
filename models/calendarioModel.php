<?php
     require_once "models/zcalendario.php";
     class calendarioModel extends Model{
         public function __construct(){
             parent::__construct();
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
         public function registrar_evento($data){
             try{
                 $query = $this->db->connect()->prepare("INSERT INTO calendario(evento, descripcion, fecha, id) VALUES(:evento, :descripcion, :fecha, :id)");
                 $query->execute([
                     "evento"=>$data["evento"],
                     "descripcion"=>$data["descripcion"],
                     "fecha"=>$data["fecha"],
                     "id"=>$data["id"],
                 ]);
                 return true;
             }catch(PDOException $e){
                 return false; 
             }
         }
     }

?>