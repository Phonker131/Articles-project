<?php
require_once "./controllers/ArticleController.php";
require_once './models/ArticleModel.php';

class Router{

    //Validate data from request and choose controller
    function doRoute($request_uri,$request_method,$path_variables){
        if(!$this->validate_path($request_uri,$request_method)){
            http_response_code(404);
            return;
        }
        require './config/db_config.php';

        $controller = new ArticleController(new ArticleModel($db_config));
        $router_method_name = strtolower($request_method.(str_replace("_","",$request_uri)));
        $reflectionMethod = new ReflectionMethod('ArticleController', $router_method_name);
        $reflector = new ReflectionClass($controller);
        $parameters = $reflector->getMethod($router_method_name)->getParameters();
        //get array params
        $params = [];
        foreach($parameters as $parameter){
            if($parameter -> name == 'article_ID'){

                if($path_variables==null or !is_numeric($path_variables[0]) ){
                    http_response_code(400);
                    return;
                }
                else{
                    $params []= $path_variables[0];
                }

            }
            else{
                if($request_method == "GET"){
                    if(!isset($_GET[$parameter -> name])){

                        $params []='';
                    }
                    else {
                        
                        $params [] = htmlentities($_GET[$parameter->name]);
                    }

                }
                else if($request_method == "POST"){
                    if(!isset($_POST[$parameter -> name])){
                        http_response_code(400);
                        return;
                    }
                    $params []=  htmlentities($_POST[$parameter -> name]);
                }
            }

        }


      $reflectionMethod -> invokeArgs($controller, $params);

    }

    function validate_path($request_uri,$request_method){
        $actions = require('./actions/actions.php');
        if(!array_key_exists($request_uri, $actions)){
            return false;
        }
        if(!in_array($request_method, $actions[$request_uri]["methods"])){
            return 	false;
        }
        return true;

    }


}
