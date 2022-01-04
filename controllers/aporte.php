<?php
include_once 'models/personamodel.php';
include_once 'models/asociadomodel.php';

class Aporte extends SessionController{

    private $user;
    private $role;
    private $persona;
    private $asociado;
    private $aporte;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->role = $this->getUserSessionData()['role'];
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
            'role' => $this->role['name_role'],
        ]);
    }

    function renderPerId($param = null)
    {
        if(isset($param[0])){
                        
            $this->persona->get($this->user->getIdPersona());
            $this->asociado->get((int) $param[0]);
            $this->aporte = $this->model->get($this->asociado->getId());

            // var_dump($this->role);
            // die();
            
            $this->view->render('aportes/index', [
                'user' => $this->user,
                'persona' => $this->persona,
                'asociado' => $this->asociado,
                'aporte' => $this->aporte,
                'role' => $this->role['name_role'],
            ]);
        }
        
    }

    
    function order($param = null){
        
        if(isset($param[0])){
            $data = json_decode($param[0],true);
            
            $this->aporte = $this->model->getByOrder([
                'field' => $this->transCampos($data['field']),
                'sentido' => $data['sentido'],
                'id_asociado' => (int)$data['id'],
            ]);
            
            foreach($this->aporte as $row){
                echo '<tr>';
                    echo'<td>' . $row->getValorAporte() . '</td>';
                    echo'<td>' . $row->getCreateTime() . '</td>';
                echo'</tr>';
            }
            
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