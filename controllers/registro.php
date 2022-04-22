<?php 
     class Registro extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
             $this->view->render("registro/docente/index");
         }
         function docente(){
            $this->view->render("registro/docente/index");
        }
         function administrador(){
            $this->view->render("registro/administrador/index");
        }
        function registrar_admin(){ 
            $user_name = $_POST["user_name"];
            $password = $_POST["password"];
            $c_password = $_POST["c_password"];

            if($this->model->consultar_a($user_name)!=2){
                if($password==$c_password){
                    if($this->model->insertar_a(["user_name"=>$user_name, "password"=>$password])){
                        echo "<a href='".constant("URL")."login/administrador'><div class='btn-round btn-success'><h5>¡REGISTRADO!<br>AHORA PUEDES INICIAR SESIÓN</h5>Click aquí</div></a>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."login/administrador'></html>";
                    }else{
                        echo "<div class='btn-round btn-danger animated pulse'><h4>¡Ha ocurrido un error!</h4></div>";
                    }
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>'Confirmar contraseña' no coincide</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>El usuario ya existe</h4></div>";
            }
        }
        function registrar_docente(){ 
            $user_name = $_POST["user_name"];
            $password = $_POST["password"];
            $c_password = $_POST["c_password"];

            if($this->model->consultar_d($user_name)!=2){
                if($password==$c_password){
                    if($this->model->insertar_d(["user_name"=>$user_name, "password"=>$password])){
                        echo "<a href='".constant("URL")."login/docente'><div class='btn-round btn-success'><h5>¡REGISTRADO!<br>AHORA PUEDES INICIAR SESIÓN</h5>Click aquí</div></a>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."login/docente'></html>";
                    }else{
                        echo "<div class='btn-round btn-danger animated pulse'><h4>¡Ha ocurrido un error!</h4></div>";
                    }
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>'Confirmar contraseña' no coincide</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>El usuario ya existe</h4></div>";
            }
        }
        function permiso_admin(){
            session_start();
            $llave = $_POST["llave"];
            if($this->model->llave_existe($llave)==1){
                $_SESSION["s_llave"] = $llave;
                echo "<div class='btn-round btn-warning animated pulse'><h4>Redireccionando...</h4></div>";
                echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."registro/administrador'></html>";
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>Llave incorrecta</h4></div>";

            }
        }
     }
?>