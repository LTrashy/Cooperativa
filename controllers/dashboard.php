<?php
include_once 'models/personamodel.php';
include_once 'models/asociadomodel.php';
class Dashboard extends SessionController{
     
    private $user;
    private $persona;
    private $asociado;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->persona = new PersonaModel();
        $this->asociado = new AsociadoModel();
        error_log('DashBoard::construct -> inicio DashBoard');
    }

    function render()
    {
        $this->persona->get($this->user->getIdPersona());
        $this->asociado->getIdPer($this->user->getIdPersona());
        
        $this->view->render('dashboard/index', [
            'user' => $this->user,
            'persona' => $this->persona,
            'asociado' => $this->asociado,
        ]);
    }


}