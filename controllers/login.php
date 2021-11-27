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
        error_log('login::authenticate -> authenticate user');
        if($this->existPOST(['username','password'])){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            if(empty($username) || empty($password)){
                $this->redirect('', ['errors' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]); //TODO: error
            }

            $user = $this->model->login($username, $password);
            if($user != null){
                $this->initialize($user);
            }else{
                $this->redirect('',['errors' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]); //TODO: error
            }
        }else{
            $this->redirect('',['errors' => Errors::ERROR_LOGIN_AUTHENTICATE]); //TODO: error
        }
    }

    
}

?>