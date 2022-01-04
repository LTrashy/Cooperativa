<?php
include_once 'models/personamodel.php';
include_once 'models/adminmodel.php';
class Asociado extends SessionController{

    private $user;
    private $persona;
    private $asociados;

    public function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->persona = new PersonaModel();
    }

    function render()
    {
        $admin = new AdminModel();
        $this->asociados = $admin->getAsociadosPersona();
        
        $this->persona->get($this->user->getIdPersona());
        $this->view->render('asociados/index', [
            'user' => $this->user,
            'persona' => $this->persona,
            'asociados' => $this->asociados,

        ]);

    }
}