<?php
class Signup extends SessionController{

    function __construct()
    {
        //error_log('Singup::Construct -> inicio signup');
        parent::__construct();
    }

    function render()
    {
        //error_log('Singup::render -> render signup');
        $this->view->render('login/signup', []);
    }
}
?>