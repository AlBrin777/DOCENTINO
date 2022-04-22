<?php
     class Seguridad extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $this->view->render("seguridad/index");
         }
         function actualizar_cuenta(){
            session_start();
            $username_a = $_SESSION["s_username"];
            $password_a = $_POST["password_a"];
            $username = $_POST["username"];
            $password_n = $_POST["password_n"];
            $password_c = $_POST["password_c"];
            if($this->model->verificar_cuenta_actual(["username_a"=>$username_a, "password_a"=>$password_a])==1){
                if($this->model->check_new_username(["username_a"=>$username_a, "username_n"=>$username])==1){
                    if($password_n==$password_c){
                        if($this->model->actualizar_cuenta(["username_a"=>$username_a, "username"=>$username, "password"=>$password_n])){
                            echo "<div class='btn-round btn-warning animated pulse'><h4>¡Los datos de su cuenta han sido actualizados!<br>Inicie sesión nuevamente</h4></div>";
                            echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."login/cerrar_sesion'></html>";
                        }
                    }else{
                        echo "<div class='btn-round btn-danger animated pulse'><h4>Confirmar contraseña no coincide</h4></div>";
                    }
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>El nuevo nombre de usuario ya existe</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>Contraseña actual incorrecta</h4></div>";
            }
         }
     }
?>