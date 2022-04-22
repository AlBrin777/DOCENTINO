<?php
class App{
    function __construct(){
     
        $url = isset($_GET["url"]) ? $_GET["url"]:null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);
   
        if(empty($url[0])){
            $controllerFile = "controllers/login.php";
            require_once $controllerFile;
            $controller = new Login();
            $controller->loadModel("login");
            $controller->render();
            return false;
        }
        $controllerFile = "controllers/".$url[0].".php";
        if(file_exists($controllerFile)){
            require_once $controllerFile;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            $nparam = sizeof($url);
            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for($i=2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }
        }else{
            require_once "controllers/errors.php";
            $controller = new Errors();
            $controller->render();
        }
   }
}
?>