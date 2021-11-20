<?php
    include_once 'models/consultaasmodel.php';
    include_once 'controllers/nuevocuota.php';
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
            
            $tasa = $tasa_interes/100;
            $dia_pago = date("Y-m-d", strtotime($fecha_desembolso. "+ 1 month"));
            $valor_cuota =$valor_credito*($tasa*(pow($tasa+1,$num_cuotas))/(pow($tasa+1,$num_cuotas)-1));
            $saldo = $num_cuotas*$valor_cuota;
            // var_dump($saldo);
            // die();
            $id_asociado = $consmodel->getByCedula($cedula);
            $mensaje = "";
            $id_credito = $this->model->insertarCredito([
                                                        'id_asociado' => $id_asociado,
                                                        'dia_pago'   => $dia_pago,
                                                        'valor_credito' => $valor_credito,
                                                        'nro_cuotas' => $num_cuotas,
                                                        'tasa_interes' => $tasa_interes,
                                                        'tasa_mora' => $tasa_mora,
                                                        'fecha_credito' => $fecha_credito,
                                                        'fecha_desembolso' => $fecha_desembolso,
                                                        'saldo' => $saldo,
                                                        'valor_cuota' => $valor_cuota
                                                         ]);

                                                                    
            if($id_credito){
                
                $cuota = new nuevoCuota();
                $cuota->insertCuota($id_credito);
                
                $mensaje = "Credito Aprovado";
            }else{
                $mensaje = "Credito falló";
            }
            $this->view->mensaje = $mensaje;
            $this->render();


        }
    }
