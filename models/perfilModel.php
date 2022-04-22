<?php
    require_once "models/zdocente.php";
    class perfilModel extends Model{
         public function __construct(){
             parent::__construct();
         }
        public function perfil(){
             try{
                 $data = [];
                 $query = $this->db->connect()->query("SELECT * FROM docente");
                 while($row = $query->fetch()){
                     $perfil = new Docente;
                     $perfil->ci = $row["ci"];
                     $perfil->nombre = $row["nombre"];
                     $perfil->apellido = $row["apellido"];
                     $perfil->telefono = $row["telefono"];
                     $perfil->correo = $row["correo"];
                     $perfil->vocacion = $row["vocacion"];
                     $perfil->foto = $row["foto"];
                     $perfil->id = $row["id"];
                     array_push($data, $perfil);
                    }
                    return $data;
             }catch(PDOExeption $e){
                 return false;
             }
        }
        public function registro($data){
            try{
                $query = $this->db->connect()->prepare("INSERT INTO docente(ci, nombre, apellido, telefono, correo, vocacion, foto, id) VALUES(:ci, :nombre, :apellido, :telefono, :correo, :vocacion, :foto, :id)");
                $query->execute([
                    "ci"=>$data["ci"],
                    "nombre"=>$data["nombre"],
                    "apellido"=>$data["apellido"],
                    "telefono"=>$data["telefono"],
                    "correo"=>$data["correo"],
                    "vocacion"=>$data["vocacion"],
                    "foto"=>$data["foto"],
                    "id"=>$data["id"],
                ]);
                return true;
            }catch(PDOExeption $e){
                return false;
            }
        }
        public function actualizar_registro($data){
            try{
                $id = $data["id"];
                $query = $this->db->connect()->prepare("UPDATE docente SET ci=:ci, nombre=:nombre, apellido=:apellido, 
                telefono=:telefono, correo=:correo, vocacion=:vocacion, foto=:foto, id=:id WHERE id = $id");
                $query->execute([
                    "ci"=>$data["ci"],
                    "nombre"=>$data["nombre"],
                    "apellido"=>$data["apellido"],
                    "telefono"=>$data["telefono"],
                    "correo"=>$data["correo"],
                    "vocacion"=>$data["vocacion"],
                    "foto"=>$data["foto"],
                    "id"=>$data["id"],
                ]);
                return true;
            }catch(PDOExeption $e){
                return false;
            }
        }
        public function id_existe($id){
            try{
                $query = $this->db->connect()->query("SELECT id FROM docente");
                $enc = 1;
                while($row=$query->fetch()){
                    if($row["id"]==$id){
                        $enc = 2;
                    }
                }
                return $enc;
            }catch(PDOExeption $e){
                return 0;
            }
        }
     }
?>