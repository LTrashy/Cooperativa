<?php
class User extends SessionController{
    
    private $user;

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('user/index', ['user' => $this->user]);
    }
}