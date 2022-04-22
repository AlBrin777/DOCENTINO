<?php
     require_once "models/zdocumentos_afines.php";
     class documentos_afinesModel extends Model{
         public function __construct(){
             parent::__construct();
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
         public function subir_documento($data){
             try{
                 $query = $this->db->connect()->prepare("INSERT INTO documentos_afines(nombre, documento, fecha, id) VALUES(:nombre, :documento, :fecha, :id)");
                 $query->execute([
                     "nombre"=>$data["nombre"],
                     "documento"=>$data["documento"],
                     "fecha"=>$data["fecha"],
                     "id"=>$data["id"],
                 ]);
                 return true;
             }catch(PDOException $e){
                 return false;
             }
         }
         public function eliminar_documento($idda){
             try{
                 $query = $this->db->connect()->prepare("DELETE FROM documentos_afines WHERE idda=:idda");
                 $query->execute(["idda"=>$idda]);
                 return true;
             }catch(PDOException $e){
                 return false;
             }
         }
     }
?>