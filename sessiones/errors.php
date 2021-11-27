<?php
class Errors{


    //TODO: ERRORES
    const ERROR_SIGNUP_NEWUSER                   = "1fdce6bbf47d6b26a9cd809ea1910222";
    const ERROR_SIGNUP_NEWUSER_EMPTY             = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_SIGNUP_NEWUSER_EXISTS            = "a74accfd26e06d012266810952678cf3";
    const ERROR_LOGIN_AUTHENTICATE               = "11c37cfab311fbe28652f4947a9523c4";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY         = "2194ac064912be67fc164539dc435a42";
    const ERROR_LOGIN_AUTHENTICATE_DATA          = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_USER_UPDATEDATA                  = "123jkdakl134n423jkn42llbcvcr4r24";
    const ERROR_USER_UPDATEDATA_EMPTY            = "1njh33c23k3ñl1lk240f0sd9f7f9aq0d";
    const ERROR_USER_UPDATEUSER                  = "sd8d90g099v9cx0a08744h3h3h4443as";
    const ERROR_USER_UPDATEUSER_EMPTY            = "f98as6f6g89j76bvn5n4m3fsdf0098ga";
    const ERROR_USER_UPDATEPASSWORD              = "djf9as8nv98a99cb6b44b3b2bb1bb668";
    const ERROR_USER_UPDATEPASSWORD_EMPTY        = "adskjf90f87sa878f989b7df7g9s9djk";
    const ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME = "jfjf7fyfhdlkdksjdfoygyfuahsdkjg8";

    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            Errors::ERROR_SIGNUP_NEWUSER            => 'Hubo un error al intentar registrarte. Intenta de nuevo',
            Errors::ERROR_SIGNUP_NEWUSER_EMPTY      => 'Los campos no pueden estar vacíos',
            Errors::ERROR_SIGNUP_NEWUSER_EXISTS     => 'El nombre de usuario ya existe, selecciona otro',
            Errors::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al autenticarse',
            Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los parámetros para autenticar no pueden estar vacíos',
            Errors::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Nombre de usuario y/o password incorrectos',
            Errors::ERROR_USER_UPDATEDATA           => 'Hubo un problema al actualizar los datos',
            Errors::ERROR_USER_UPDATEDATA_EMPTY     => 'Los campos a actualizar no pueden estar vacios',
            Errors::ERROR_USER_UPDATEUSER           => 'Hubo un problema al actualizar su username',
            Errors::ERROR_USER_UPDATEUSER_EMPTY     => 'El campo a actualizar no puede estar vacio',
            Errors::ERROR_USER_UPDATEPASSWORD       => 'Hubo un problema al actualizar la contraseña, intente de nuevo',
            Errors::ERROR_USER_UPDATEPASSWORD_EMPTY => 'Los campos no pueden estar vacios',
            Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME => 'LA contraseña no es la misma',


        ];//TODO: ERRORES
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