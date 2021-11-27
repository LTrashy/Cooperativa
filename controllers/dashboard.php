<?php
include_once 'models/personamodel.php';
class Dashboard extends SessionController{
     
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        error_log('DashBoard::construct -> inicio DashBoard');
    }

    function render()
    {
        $persona = new PersonaModel();
        $persona->get($this->user->getIdPersona());
        
        $this->view->render('dashboard/index', [
            'user' => $this->user,
            'persona' => $persona,
        ]);
    }
}