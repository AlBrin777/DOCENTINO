<?php
     class Login extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
            $this->view->render("login/docente/index");
         }
         function docente(){
            $this->view->render("login/docente/index");
        }
         function administrador(){
             $this->view->render("login/administrador/index");
         }
         function recuperar_cuenta_docen(){
            $this->view->render("login/recuperar_cuenta_docen/index");
        }
        function recuperar_cuenta_admin(){
            $this->view->render("login/recuperar_cuenta_admin/index");
        }
        function acceso_docente(){
            session_start();
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($this->model->consulta_ud($username)==1){
                if($this->model->consulta_pd(["username"=>$username, "password"=>$password])==1){
                    $id=$this->model->consulta_id($username);
                    if($id!=false){
                        $_SESSION["s_cuenta"] = 1;
                        $_SESSION["s_id"] = $id;
                        $_SESSION["s_username"] = $username; 
                        $_SESSION["s_permiso"] = $this->model->consulta_permiso($id);
                        if($_SESSION["s_permiso"]!=0){
                            $this->model->perfil($id);
                        }
                        echo "<div class='btn-round btn-success animated pulse'><h4>Accediendo...</h4></div>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."principal/docente'></html>";
                    }else{
                        echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR <usuario no válido><br>Debe registrarse nuevamente</h4></div>";
                    }                  
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>Contraseña incorrecta</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>Nombre de usuario incorrecto</h4></div>";
            }
        }
        function acceso_administrador(){
            session_start();
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($this->model->consulta_ua($username)==1){
                if($this->model->consulta_pa(["username"=>$username, "password"=>$password])==1){
                    $id=$this->model->consulta_ia($username);
                    if($id!=false){
                        $_SESSION["s_cuenta"] = 0;
                        $_SESSION["s_id"] = $id;
                        $_SESSION["s_username"] = $username;
                        echo "<div class='btn-round btn-success animated pulse'><h4>Accediendo...</h4></div>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".constant('URL')."principal/administrador'></html>";
                    }else{
                        echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR <usuario no válido><br>Debe registrarse nuevamente</h4></div>";
                    }                  
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>Contraseña incorrecta</h4></div>";
                }
            }else{
                echo "<div class='btn-round btn-danger animated pulse'><h4>Nombre de usuario incorrecto</h4></div>";
            }
        }
        function cerrar_sesion(){
            session_start();
            session_destroy();
            if($_SESSION["s_cuenta"]==0){
                header("location: ".constant("URL")."login/administrador");
            }else{
                header("location: ".constant("URL")."");
            }
        }
     }
?>