<?php
    include_once 'models/consultacreditomodel.php';
    include_once 'models/nuevocuotamodel.php';
    class nuevocuota extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje ="";
        }

        function render(){
            $this->view->render('consultacredito/cuota');
        }
        
        function insertCuota($id_credito){
            $credmodel = new consultacreditoModel();
            $credito = $credmodel->getById($id_credito);
            
            $this->view->credito = $credito;
            
            $id_credito = $credito->id_credito;
            $nro_cuotas = $credito->nro_cuotas;
            $saldo = $credito->saldo;
            
            $fechaC = $credito->fecha_desembolso;
            
            
            for($i=1;$i<$nro_cuotas+1;$i++){
                $cuotamodel = new nuevocuotamodel();
                $interes_corriente = $saldo*$credito->tasa_interes/100;
                $abono_capital = $credito->valor_cuota - $interes_corriente;
                $saldo -= $credito->valor_cuota;
                $fecha_proyeccion = date("Y-m-d", strtotime($fechaC. "+ ".$i." month"));
                $fecha_pago = null;
                $interes_mora= 0;
                $num_cuota =$i;
                $saldo_cuota=$credito->valor_cuota;

                $id_cuota=$cuotamodel->insertarCuota([
                                                'id_credito' => $id_credito,
                                                'abono_capital' => $abono_capital,
                                                'interes_corriente' => $interes_corriente,
                                                'interes_mora' => $interes_mora,
                                                'fecha_proyeccion' => $fecha_proyeccion,
                                                'fecha_pago' => $fecha_pago,
                                                'saldo_cuota' => $saldo_cuota,
                                                'num_cuota' => $num_cuota

                                            ]);
                //var_dump($id_cuota);
                
                
            }
            //die();
            
        }
    }