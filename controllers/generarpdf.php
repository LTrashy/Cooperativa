<?php
    include_once 'models/credito.php';
    //include_once 'models/consultacreditomodel.php';
    //require_once 'models/generarpdfmodel.php';
    //include_once 'models/consultacuotamodel.php';
    include_once 'models/asociado.php';
    include_once 'models/consultaasmodel.php';

    class generarpdf extends Controller{
        
        
        function __construct(){
            parent::__construct();
            //$this->view->credito ;
            $this->view->cuotas = [] ;
            //$this->view->asociado ;
            
        }
        
        function render(){
            $this->view->mensaje="";
            $this->view->render('pdf/index');
        }
        
        function verPDF($param){
            
            
            include_once 'models/consultacreditomodel.php';

            $modelcredito = new consultacreditoModel();
            $this->view->credito = $modelcredito->getById($param[0]);
            //$this->view->credito = $credito;

            include_once 'models/consultacuotamodel.php';
            $modelcuota = new consultacuotaModel();
            $cuotas = $modelcuota->getByIdCuotas($param[0]);
            $this->view->cuotas = $cuotas ;

            
            $id_asociado = $modelcredito->getAllId($param[0]);
            
            $asociado = new Asociado();
            $modelasociado = new consultaasModel();
            $asociado = $modelasociado->getById($id_asociado);
            $this->view->asociado = $asociado;
            
            $this->view->mensaje="";
            $this->view->render('generarpdf/index');
        }

        

    }