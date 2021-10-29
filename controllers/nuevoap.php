<?php
    class Nuevoap extends Controller{
        function __construct(){
            parent:: __construct();
            $this->view->mensaje = "";
        }
        function render(){
            $this->view->render('nuevoap/index');
        }
        function registrarAporte(){
            $consmodel = new consultaasModel();
            
            $cedula = $_POST['cedula'];
            $aporte = $_POST['aporte'];
            $create_time = $_POST['create_time'];
            
            $id_asociado = $consmodel->getByCedula($cedula);
            $mensaje="";
            if($this->model->insertarAporte(['id_asociado' => $id_asociado,
            'aporte' => $aporte,
            'create_time' => $create_time])){
                $mensaje = "Aporte realizado";
            }else{
                $mensaje = "No se pudo realizar el aporte";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }
        function registrarPrimerAporte($data){
            include_once 'models/nuevoapmodel.php';
            $aportemodel = new nuevoapModel();
            $aportemodel->insertarPrimerAporte([
                'id_asociado' => $data['id_asociado'],
                'aporte' => $data['aporte'],
                'create_time' => $data['create_time']
            ]);
        }
    }