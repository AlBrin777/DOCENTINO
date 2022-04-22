<?php
     class loginModel extends Model{
         public function __construct(){
             parent::__construct();
         }
         /*       DOCENTE      */
         public function consulta_ud($username){
             try{
                 $query = $this->db->connect()->query("SELECT username FROM usuarios");
                 $enc = 0;
                 while($row=$query->fetch()){
                     if($row["username"]==$username){
                         $enc = 1;
                     }
                 }
                 return $enc;
             }catch(PDOException $e){
                 return 0;
             }
         }
         public function consulta_pd($data){
            try{
                $query = $this->db->connect()->query("SELECT username, password FROM usuarios");
                $enc = 0;
                while($row=$query->fetch()){
                    if($row["username"]==$data["username"]){
                        if($row["password"]==$data["password"]){
                            $enc = 1;
                        }
                    }
                }
                return $enc;
            }catch(PDOException $e){
                return 0;
            }
        }
        public function consulta_id($username){
            try{
                $query = $this->db->connect()->query("SELECT id, username FROM usuarios");
                while($row=$query->fetch()){
                    if($row["username"]==$username){
                        $id = $row["id"];
                    }
                }
                return $id;
            }catch(PDOException $e){
                return 0;
            }
        }
        public function consulta_permiso($id){
            try{
                $query = $this->db->connect()->query("SELECT id FROM docente");
                $enc = 0;
                while($row=$query->fetch()){
                    if($row["id"]==$id){
                        $enc = 1;
                    }
                }
                return $enc;
            }catch(PDOException $e){
                return 0;
            }
        }
        /*-----------ADMINISTRADOR------------*/
        public function consulta_ua($username){
            try{
                $query = $this->db->connect()->query("SELECT username FROM admin");
                $enc = 0;
                while($row=$query->fetch()){
                    if($row["username"]==$username){
                        $enc = 1;
                    }
                }
                return $enc;
            }catch(PDOException $e){
                return 0;
            }
        }
        public function consulta_pa($data){
           try{
               $query = $this->db->connect()->query("SELECT username, password FROM admin");
               $enc = 0;
               while($row=$query->fetch()){
                   if($row["username"]==$data["username"]){
                       if($row["password"]==$data["password"]){
                           $enc = 1;
                       }
                   }
               }
               return $enc;
           }catch(PDOException $e){
               return 0;
           }
       }
       public function consulta_ia($username){
           try{
               $query = $this->db->connect()->query("SELECT id, username FROM admin");
               while($row=$query->fetch()){
                   if($row["username"]==$username){
                       $id = $row["id"];
                   }
               }
               return $id;
           }catch(PDOException $e){
               return 0;
           }
       }
       public function perfil($id){
        try{
            $data = [];
            $query = $this->db->connect()->query("SELECT * FROM docente");
            while($row = $query->fetch()){
                if($row["id"]==$id){
                    $_SESSION["s_ci"] = $row["ci"];
                    $_SESSION["s_nombre"] = $row["nombre"];
                    $_SESSION["s_apellido"] = $row["apellido"];
                    $_SESSION["s_telefono"] = $row["telefono"];
                    $_SESSION["s_correo"] = $row["correo"];
                    $_SESSION["s_vocacion"] = $row["vocacion"];
                    $_SESSION["s_foto"] = $row["foto"];                
                }
               }
               return $data;
        }catch(PDOExeption $e){
            return null;
        }
   }
     }
?>