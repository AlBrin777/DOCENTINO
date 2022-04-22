<?php
class View{
    function __construct(){}
    
    function render($name){
        session_start();
        $tipo_cuenta = isset($_SESSION["s_cuenta"]) ? $_SESSION["s_cuenta"]: 2;
        if($name=="registro/administrador/index"){
            if(isset($_SESSION["s_llave"])){
                require "views/".$name.".php";
                session_destroy($_SESSION["s_llave"]);
            }else{
                require "views/registro/administrador/permiso.php";
            }
        }

        if($name=="login/docente/index"||$name=="registro/docente/index"||$name=="login/recuperar_cuenta_docen/index"||$name=="login/administrador/index"||$name=="login/recuperar_cuenta_admin/index"){
            require "views/".$name.".php";
        }else{
            if($tipo_cuenta==0){
                if(isset($_SESSION["s_username"])){
                    if($name=="docentes/index"||$name=="calendario/administrador/index"||$name=="principal/administrador/index"){
                        require "views/".$name.".php";
                    }
                }else{
                    require "views/login/administrador/index.php";
                }
            }else{
                if($tipo_cuenta==1){
                    if(isset($_SESSION["s_username"])){
                        if($_SESSION["s_permiso"]==1){
                            if($name!="docentes/index"||$name!="calendario/administrador/index"||$name!="principal/administrador/index"){
                                require "views/".$name.".php";
                            }else{
                                require "views/principal/docente/index.php";
                            }
                        }else{
                            require "views/perfil/index.php";
                        }
                    }else{
                        require "views/login/docente/index.php";
                    } 
                }else{
                    require "views/errors/index.php";
                }
            }
        }

    }

}
?>