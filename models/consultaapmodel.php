<?php
    include_once 'models/aporte.php';
    class consultaapModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function get(){
            $items =[];

            try{
                $query = $this->db->connect()->query('SELECT  aportes.create_time AS fecha , aportes.*, asociados.* FROM aportes INNER JOIN asociados ON aportes.id_asociado = asociados.id');
                while($row = $query->fetch()){
                    $item = new Aporte();
                    $item->id_asociado = $row['id_asociado'];
                    $item->id_persona = $row['id_persona'];
                    $item->create_time_aso = $row['create_time'];
                    $item->total_aportes = $row['total_aportes'];
                    $item->id = $row['id'];
                    $item->valor_aporte = $row['valor_aporte'];
                    $item->create_time_apo = $row['fecha'];
                    
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return [];

            }

        }
        
        
    }