<?php
    include_once 'models/consultaasmodel.php';
    class Nuevocredito extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje ="";
        }

        function render(){
            $this->view->render('nuevocredito/index');
        }

        function crearCredito(){
            $consmodel = new consultaasModel();
            $cedula = $_POST['cedula'];
            $valor_credito = $_POST['valor_credito'];
            $num_cuotas = $_POST['num_cuotas'];
            $tasa_interes = $_POST['tasa_interes'];
            $tasa_mora = $_POST['tasa_mora'];
            $fecha_credito = $_POST['fecha_credito'];
            $fecha_desembolso = $_POST['fecha_desembolso'];
            
            $id_asociado = $consmodel->getByCedula($cedula);
            $mensaje = "";

            if($this->model->insertarCredito([
                                                'id_asociado' => $id_asociado,
                                                'valor_credito' => $valor_credito,
                                                'nro_cuotas' => $num_cuotas,
                                                'tasa_interes' => $tasa_interes,
                                                'tasa_mora' => $tasa_mora,
                                                'fecha_credito' => $fecha_credito,
                                                'fecha_desembolso' => $fecha_desembolso])){
                $mensaje = "Credito Aprovado";
            }else{
                $mensaje = "Credito falló";
            }
            $this->view->mensaje = $mensaje;
            $this->render();


        }
    }
