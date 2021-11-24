<?php
    class Controller{
        function __construct(){
            $this->view = new Views();
        }

        function loadModel($model){
            $url = 'models/'.$model.'model.php';

            if(file_exists($url)){
                require $url;

                $modelName = $model.'Model';
                $this->model = new $modelName();
            }
        }

        function existPOST($params)
        {
            foreach($params as $param){
                if(!isset($_POST[$param])){
                    //TODO: ERROR LOG
                    var_dump('hi');
                    die();
                    return false;
                }
            }
            return true;
        }

        function existGET($params)
        {
            foreach($params as $param){
                if(!isset($_GET[$param])){
                    //TODO: ERROR LOG
                    return false;
                }
            }
            return true;
        }

        function getGet($name)
        {   
            return $_GET[$name];
        }

        function getPost($name)
        {
            return $_POST[$name];
        }

        function redirect($route, $mensajes)
        {
            $data = [];
            $params = '';

            foreach($mensajes as $key => $mensaje){
                array_push($data, $key. '='. $mensaje);
            }
            $params = join('&', $data);

            if($params != ''){
                $params = '?' . $params;
            }

            header('Location: ' . constant('URL') . $route . $params);
            die();
        }
    }