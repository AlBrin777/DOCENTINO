<?php 
    class registroModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        /* ADMINISTRADOR */
        public function consultar_a($user_name){ 
            try{
                 $query = $this->db->connect()->query("SELECT username FROM admin");
                 $enc = 0;
                 while($row = $query->fetch()){
                     if($row["username"]==$user_name){
                         $enc = 2;
                     }
                 }
                 return $enc;
            }catch(PDOException $e){
                return 0;
            }
        }
        public function insertar_a($data){
            try{
                $query = $this->db->connect()->prepare("INSERT INTO admin(username, password) VALUES(:username, :password)");
                $query->execute(['username'=>$data["user_name"], 'password'=>$data["password"]]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
        public function llave_existe($llave){
            try{
                $query = $this->db->connect()->query("SELECT llave_de_acceso FROM permiso_registro_admin");
                $enc = 0;
                while($row = $query->fetch()){
                    if($row["llave_de_acceso"]==$llave){
                        $enc = 1;
                    }
                }
                return $enc;
            }catch(PDOExeption $e){
                return 0;
            }
        }

        /* DOCENTE */ 
        public function consultar_d($user_name){ 
            try{
                 $query = $this->db->connect()->query("SELECT username FROM usuarios");
                 $enc = 0;
                 while($row = $query->fetch()){
                     if($row["username"]==$user_name){
                         $enc = 2;
                     }
                 }
                 return $enc;
            }catch(PDOException $e){
                return 0;
            }
        }
        public function insertar_d($data){
            try{
                $query = $this->db->connect()->prepare("INSERT INTO usuarios(username, password) VALUES(:username, :password)");
                $query->execute(['username'=>$data["user_name"], 'password'=>$data["password"]]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }
?>