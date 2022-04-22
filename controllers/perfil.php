<?php
     class Perfil extends Controller{
         function __construct(){
             parent::__construct();
         }
         function render(){
            $perfil=$this->model->perfil();
            $this->view->perfil = $perfil;
            $this->view->render("perfil/index");
         }
         function registro_perfil(){
             session_start();
             $ci = $_POST["ci"];
             $nombre = $_POST["nombre"];
             $apellido = $_POST["apellido"];
             $telefono = $_POST["telefono"];
             $correo = $_POST["correo"];
             $vocacion = $_POST["vocacion"];

             $foto = constant("URL")."publics/img/avatar.jpg";
             $foto_x = isset($_FILES["foto"]["name"])?$_FILES["foto"]["name"]:null;
             if($foto_x!=null){
                $foto_ruta = $_FILES["foto"]["tmp_name"];
                $foto_destino = "C:\wamp\www\DOCENTINO\publics\img\perfil/".$foto_x;
                $foto = constant("URL")."publics/img/perfil/".$foto_x;
                copy($foto_ruta, $foto_destino);
             }
             $id = $_POST["id_docente"];
             $id_existe = $this->model->id_existe($id);
             if($id_existe==1){
                if($this->model->registro(["ci"=>$ci,"nombre"=>$nombre,"apellido"=>$apellido,"telefono"=>$telefono,"correo"=>$correo,"vocacion"=>$vocacion,"foto"=>$foto,"id"=>$id,])){
                    echo "<div class='btn-round btn-success animated pulse text-center'><h4>¡DATOS DE PERFIL GUARDADOS!</h4></div>";
                    echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='2; URL=".constant('URL')."perfil/'></html>";
                    $_SESSION["s_permiso"]=1;
                    $_SESSION["s_ci"] = $ci;
                    $_SESSION["s_nombre"] = $nombre;
                    $_SESSION["s_apellido"] = $apellido;
                    $_SESSION["s_telefono"] = $telefono;
                    $_SESSION["s_correo"] = $correo;
                    $_SESSION["s_vocacion"] = $vocacion;
                    $_SESSION["s_foto"] = $foto;    
                 }else{
                    echo "<div class='btn-round btn-danger animated pulse text-center'><h4>ERROR</h4></div>";
                 }
             }else{
                if($id_existe==2){
                    if($this->model->actualizar_registro(["ci"=>$ci,"nombre"=>$nombre,"apellido"=>$apellido,"telefono"=>$telefono,"correo"=>$correo,"vocacion"=>$vocacion,"foto"=>$foto,"id"=>$id,])){
                        echo "<div class='btn-round btn-success animated pulse text-center'><h4>Datos de perfil guardados</h4></div>";
                        echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='2; URL=".constant('URL')."perfil/'></html>";
                        $_SESSION["s_ci"] = $ci;
                        $_SESSION["s_nombre"] = $nombre;
                        $_SESSION["s_apellido"] = $apellido;
                        $_SESSION["s_telefono"] = $telefono;
                        $_SESSION["s_correo"] = $correo;
                        $_SESSION["s_vocacion"] = $vocacion;
                        $_SESSION["s_foto"] = $foto;    
                     }else{
                        echo "<div class='btn-round btn-danger animated pulse text-center'><h4>ERROR</h4></div>";
                     }
                }else{
                    echo "<div class='btn-round btn-danger animated pulse'><h4>ERROR</h4></div>";
                }
             }

         }

     }
?>