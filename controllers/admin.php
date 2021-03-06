<?php
include_once 'models/personamodel.php';
include_once 'models/usermodel.php';
include_once 'models/asociadomodel.php';
include_once 'models/aportemodel.php';

class Admin extends SessionController{

    private $user;
    private $persona;
    private $asociados;
    private $aportes;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->persona = new PersonaModel();
        error_log('Admin::construct -> inicio Admin');

    }

    function render()
    {

        $this->persona->get($this->user->getIdPersona());
        $asociados = new AsociadoModel();
        $this->asociados = $asociados->getAll();
        $this->view->render('admin/index', [
            'user' => $this->user,
            'persona' => $this->persona,
            'asociados' => $this->asociados,
        ]);
    }
}