<?php
     class seguridadModel extends Model{
         public function __construct(){
             parent::__construct();
         }
         public function verificar_cuenta_actual($data){
             try{
                 $confirm = 0;
                 $query = $this->db->connect()->query("SELECT username, password FROM usuarios");
                 while($row = $query->fetch()){
                     if($row["username"]==$data["username_a"]){
                         if($row["password"]==$data["password_a"]){
                             $confirm = 1;
                         }
                     }
                 }
                 return $confirm;
             }catch(PDOExeption $e){
                 return 0;
             }
         }
         public function check_new_username($data){
             try{
                $confirm = 1;
                $query = $this->db->connect()->query("SELECT username, password FROM usuarios");
                while($row = $query->fetch()){
                    if($row["username"]!=$data["username_a"]){
                        if($row["username"]==$data["username_n"]){
                            $confirm = 2;
                        }
                    }
                }
                return $confirm;
             }catch(PDOExeption $e){
                 return 0;
             }
         }
         public function actualizar_cuenta($data){
            try{
                $query = $this->db->connect()->prepare("UPDATE usuarios SET username=:username, password=:password WHERE username=:username_a");
                $query->execute(["username_a"=>$data["username_a"],"username"=>$data["username"], "password"=>$data["password"]]);
                return true;
            }catch(PDOExeption $e){
                return 0;
            }
         }
     }
?>