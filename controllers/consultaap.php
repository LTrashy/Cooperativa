<?php
    class Consulaap extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->aportes = [];
        }
        function render(){
            $aportes = $this->model->get();
            $this->view->aportes= $aportes;
            $this->view->mensaje="";
            $this->view->render('consultaap/index');
        }
        function verAporte($param = null){
            $idAporte= $param[0];
            $aporte = $this->model->getById($idAporte);

            $aporte->id_asociado = $idAporte;
                      
        }
    }