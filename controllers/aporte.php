<?php
include_once 'models/personamodel.php';
include_once 'models/asociadomodel.php';

class Aporte extends SessionController{

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
        // $this->aporte = $this->model;
        error_log('Aportes::construct -> inicio Aportes');
    }

    function render()
    {
        $this->persona->get($this->user->getIdPersona());
        $this->asociado->getIdPer($this->user->getIdPersona());
        $this->aporte = $this->model->get($this->asociado->getId());
        // var_dump($this->aporte);
        // die();

        $this->view->render('aportes/index', [
            'user' => $this->user,
            'persona' => $this->persona,
            'asociado' => $this->asociado,
            'aporte' => $this->aporte,
        ]);
    }

    
    function order($param = null){
        
        if(isset($param[0])){
            $data = json_decode($param[0],true);
            
            // var_dump($data['id']);
            // die();

            $this->aporte = $this->model->getByOrder([
                'field' => $this->transCampos($data['field']),
                'sentido' => $data['sentido'],
                'id_asociado' => $data['id'],
            ]);
            
            var_dump($this->aporte);
            die();
            
        }
        
    }

    private function transCampos($campo)
    {
        $field = '';
            switch($campo){
                case 'fecha':
                    $field = 'create_time';
                    break;
                case 'valor':
                    $field = 'valor_aporte';
                    break;
                default:
                    $field = '';
                
            }
            return $field;  
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of persona
     */ 
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set the value of persona
     *
     * @return  self
     */ 
    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get the value of asociado
     */ 
    public function getAsociado()
    {
        return $this->asociado;
    }

    /**
     * Set the value of asociado
     *
     * @return  self
     */ 
    public function setAsociado($asociado)
    {
        $this->asociado = $asociado;

        return $this;
    }

    /**
     * Get the value of aporte
     */ 
    public function getAporte()
    {
        return $this->aporte;
    }

    /**
     * Set the value of aporte
     *
     * @return  self
     */ 
    public function setAporte($aporte)
    {
        $this->aporte = $aporte;

        return $this;
    }
}