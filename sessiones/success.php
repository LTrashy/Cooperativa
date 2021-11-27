<?php
class Success{


    //TODO: SUCCESS
    const SUCCESS_SIGNUP_NEWUSER       = "8281e04ed52ccfc13820d0f6acb0985a";
    const SUCCESS_USER_UPDATEDATA      = "jda87d9f9f7g8c0a0s99098d0d09v9b0";
    const SUCCESS_USER_UPDATEUSER      = "djg09as098d87g789as09asd00098sd8";
    const SUCCESS_USER_UPDATEPASSWORD  = "afjsajf8f89f56434900as0d0a0sd0ad";

    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_SIGNUP_NEWUSER         => "Usuario registrado correctamente",
            Success::SUCCESS_USER_UPDATEDATA        => "Datos actualizados correctamente",
            Success::SUCCESS_USER_UPDATEUSER        => "Username actualizado con exito",
            Success::SUCCESS_USER_UPDATEPASSWORD    => "Contraseña actualizada correctamente",
            

        ]; //TODO: SUCCESS LIST
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