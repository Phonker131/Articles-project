<?php
require_once './router.php';
class Dispatcher{
    //get request data and send it to router
    function dispatch(){
        $request_uri_full =  parse_url($_SERVER['REQUEST_URI'])['path'];

        $request_uri_ar = explode("/",$request_uri_full);
        $request_uri =  $request_uri_ar[1];
        if($request_uri===''){
            $request_uri = 'articles';
        }
        $request_method = $_SERVER['REQUEST_METHOD'];
        $path_variables = null;
        if(count($request_uri_ar) > 4){
            $path_variables = array_slice($request_uri_ar,4);
        }
        $router = new Router();
        //var_dump($request_uri);
        $router -> doRoute($request_uri,$request_method,$path_variables);
    }


}