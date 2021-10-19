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
        function verCredito($param = null){

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
                    echo '<tr>';
                    echo '<td>'.$credito->id_credito.'</td>';
                    echo '<td>'.$credito->dia_pago.'</td>';
                    echo '<td>'.$credito->valor_credito.'</td>';
                    echo '<td>'.$credito->num_cuotas.'</td>';
                    echo '<td>'.$credito->tasa_interes.'</td>';
                    echo '<td>'.$credito->tasa_mora.'</td>';
                    echo '<td>'.$credito->fecha_credito.'</td>';
                    echo '<td>'.$credito->fecha_desembolso.'</td>';
                    echo '<td>'.$credito->saldo.'</td>';
                    echo '</tr>';
                }
            }
        }
    }