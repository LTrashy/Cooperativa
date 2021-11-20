<?php
class Login extends SessionController
{
    
    function __construct()
    {
        parent::__construct();
    }

    function render(){
        error_log('Login::render -> carga render de login');
        $this->view->render('login/index');
    }
}

?>