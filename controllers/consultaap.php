<?php
    include_once 'models/consultaasmodel.php';
    class Consultaap extends Controller{
        
        function __construct(){
            parent::__construct();
            
            $this->view->aportes = [];
        }
        function render(){
            //$aportes = $this->model->get();
            //$this->view->aportes= $aportes;
            $this->view->mensaje="";
            $this->view->render('consultaap/index');
        }

        function transCampos($campo){
            $field = '';
            switch($campo){
                case 'fecha':
                    $field = 'fechaap';
                    break;
                case 'valor':
                    $field = 'valor_aporte';
                    break;
                default:
                    $field = '';
                
            }
            return $field;
        }
        function verAporte($param = null){ 
            
            if(isset($param[0])){
                $data = json_decode($param[0],true);
                

                $consasmodel = new consultaasModel();
                
                $id_asociado = $consasmodel->getByCedula($data['id']);
                // var_dump([
                //     'id_asociado' => $id_asociado,
                //     'field' => $this->transCampos($data['field']),
                //     'sentido' => $data['sentido']
                // ]);
                // die();
                
                $aportes = $this->model->getByIdAp([
                    'id_asociado' => $id_asociado,
                    'field' => $this->transCampos($data['field']),
                    'sentido' => $data['sentido']
                ]);

                
                $this->view->aportes= $aportes;
                $this->view->mensaje="";

                
                //$this->view->render('consultaap/index');
                
                include_once 'models/aporte.php';
                foreach ($this->view->aportes as $row) {
                    $aporte = new Aporte();
                    $aporte = $row;
            

                    //echo '<tr id="fila-'. $aporte->id_asociado . '">';
                    //echo '<td>'.$aporte->id_aporte.'</td>';
                    //echo '<td>'.$aporte->id_asociado.'</td>';
                    echo '<td>'.$aporte->valor_aporte.'</td>';
                    echo '<td>'.$aporte->create_time_apo.'</td>';
                    echo '</tr>';
                    } 
            }
        }
            //var_dump($this->view->aportes);
            //die();
                  
    }
    