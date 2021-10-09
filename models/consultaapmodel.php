<?php
    include_once 'models/aporte.php';
    class consultaapModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function get(){
            $items =[];

            try{
                $query = $this->db->connect()->query('SELECT  aportes.create_time AS fecha, aportes.id AS id_aporte , aportes.*, asociados.* FROM aportes INNER JOIN asociados ON aportes.id_asociado = asociados.id');
                while($row = $query->fetch()){
                    $item = new Aporte();
                    $item->id_asociado = $row['id_asociado'];
                    $item->id_persona = $row['id_persona'];
                    $item->create_time_aso = $row['create_time'];
                    $item->total_aportes = $row['total_aportes'];
                    $item->id_aporte = $row['id_aporte'];
                    $item->valor_aporte = $row['valor_aporte'];
                    $item->create_time_apo = $row['fecha'];
                    
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return [];

            }

        }
        public function getByIdAp($data){
            $items =[];
            try{
                $query = $this->db->connect()->prepare('SELECT  aportes.id AS idap, aportes.create_time AS fechaap, asociados.id AS idas, asociados.create_time AS fechaas , asociados.*, aportes.*  FROM aportes INNER JOIN asociados ON asociados.id = aportes.id_asociado WHERE aportes.id_asociado = :id_asociado ' . (empty($data['field']) ? '' : 'ORDER BY ' . $data['field'] . ' ' . $data['sentido']));
                $query->execute(['id_asociado' => $data['id_asociado']]);
                
                while($row = $query->fetch()){
                    $item = new Aporte();
                    $item->id_aporte = $row['idap'];
                    $item->id_asociado = $row['idas'];
                    $item->valor_aporte = $row['valor_aporte'];
                    $item->create_time_apo = $row['fechaap'];
                    $item->id_persona = $row['id_persona'];
                    $item->create_time_aso = $row['fechaas'];
                    $item->total_aportes = $row['total_aportes'];
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return null;
            }

        }
        
        
    }