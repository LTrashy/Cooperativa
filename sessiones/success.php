<?php
class Success{


    //TODO: SUCCESS

    private $successsList = [];

    public function __construct()
    {
        $this->successsList = []; //TODO: SUCCESS LIST
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>