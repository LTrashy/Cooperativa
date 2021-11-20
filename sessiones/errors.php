<?php
class Errors{


    //TODO: ERRORES

    private $errorList = [];

    public function __construct()
    {
        $this->errorList = [];//TODO: ERRORES
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>