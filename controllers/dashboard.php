<?php
include_once 'models/personamodel.php';
include_once 'models/asociadomodel.php';
include_once 'models/aportemodel.php';
class Dashboard extends SessionController{
     
    private $user;
    private $persona;
    private $asociado;
    private $aporte;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->persona = new PersonaModel();
        $this->asociado = new AsociadoModel();
        $this->aporte = new AporteModel();
        error_log('DashBoard::construct -> inicio DashBoard');
    }

    function render()
    {
        $this->persona->get($this->user->getIdPersona());
        $this->asociado->getIdPer($this->user->getIdPersona());
        $this->aporte->getLast($this->asociado->getId());
        
        $this->view->render('dashboard/index', [
            'user' => $this->user,
            'persona' => $this->persona,
            'asociado' => $this->asociado,
            'aporte' => $this->aporte,
        ]);
    }


}