<?php
class Login extends SessionController
{
    
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        //error_log('Login::render -> carga render de login');
        $this->view->render('login/index');
    }

    function authenticate()
    {
        if($this->existPOST(['username','password'])){
            var_dump('hii');
                    die();
        }else{
            var_dump('hoo');
            die();
        }
    }

    function saludo()
    {
        echo 'holaaa';
    }
}

?>