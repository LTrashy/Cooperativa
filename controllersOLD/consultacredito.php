<?php
    include_once 'models/consultaasmodel.php';
    class ConsultaCredito extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->creditos=[];
        }
        function render(){
            $this->view->mensaje="";
            $this->view->render('consultacredito/index');
        }
        function verCreditos($param = null){

            if(isset($param[0])){
                
                $conscredmodel = new consultaasModel();
    
                $id_asociado = $conscredmodel->getByCedula($param[0]);
                $creditos = $this->model->getByIdCred(['id_asociado' => $id_asociado]);
                $this->view->creditos = $creditos;
                $this->view->mensaje ="";

                include_once 'models/credito.php';
                foreach($this->view->creditos as $row){
                    $credito = new Credito();
                    $credito = $row;
                    //$tasa = $credito->tasa_interes/100;
                    //$num_cuotas = $credito->nro_cuotas;
                    //$credito->valor_cuota = $credito->valor_credito*($tasa*(pow($tasa+1,$num_cuotas))/(pow($tasa+1,$num_cuotas)-1));

                    echo '<td class="center"><a class="href" href="'.constant('URL')."consultacuota/verCuotas/".$credito->id_credito.'">Ver Cuotas</a></td>';
                    echo '<td data-titulo="Dia de pago">'.$credito->dia_pago.'</td>';
                    echo '<td data-titulo="Valor del credito">'.$credito->valor_credito.'</td>';
                    echo '<td data-titulo="Numero de cuotas">'.$credito->nro_cuotas.'</td>';
                    echo '<td data-titulo="Tasa interes %">'.$credito->tasa_interes.'</td>';
                    echo '<td data-titulo="Tasa Mora %">'.$credito->tasa_mora.'</td>';
                    echo '<td data-titulo="Fecha creacion">'.$credito->fecha_credito.'</td>';
                    echo '<td data-titulo="Fecha de desembolso">'.$credito->fecha_desembolso.'</td>';
                    echo '<td data-titulo="Saldo">'.$credito->saldo.'</td>';
                    echo '</tr>';
                }
            }
        }

        // function verCredito($param = null){
        //     if(isset($param[0])){
        //         $id_credito = $param[0];
                
        //     }
        // }
    }