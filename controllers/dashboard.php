<?php

class Dashboard extends SessionController{
     
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('dashboard/index', []);
    }
}