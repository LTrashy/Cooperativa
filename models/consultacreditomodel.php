<?php
    include_once 'models/credito.php';
    class consultacreditoModel extends Model{
        function __construct(){
            parent::__construct();
        }
        
        public function getByIdCred($data){
            $items = [];
            try{
                $query = $this->db->connect()->prepare('SELECT creditos.id AS idcr , asociados.id AS idas, asociados.*,creditos.* FROM creditos INNER JOIN asociados ON asociados.id = creditos.id_asociado WHERE creditos.id_asociado = :id_asociado');
                $query->execute(['id_asociado' => $data['id_asociado']]);
                while($row = $query->fetch()){
                    $item = new Credito();
                    $item->id_credito = $row['idcr'];
                    $item->id_asociado = $row['idas'];
                    $item->dia_pago = $row['dia_pago'];
                    $item->valor_credito = $row['valor_credito'];
                    $item->nro_cuotas = $row['nro_cuotas'];
                    $item->tasa_interes = $row['tasa_interes'];
                    $item->tasa_mora = $row['tasa_mora'];
                    $item->fecha_credito = $row['fecha_credito'];
                    $item->fecha_desembolso = $row['fecha_desembolso'];
                    $item->saldo = $row['saldo'];
                    $item->valor_cuota = $row['valor_cuota'];
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return null;
            }
        }

        public function getById($data){
            $item = new Credito();
            try{
                $query = $this->db->connect()->prepare
                                                    ('SELECT * FROM creditos WHERE id = :id');
                $query->execute(['id' => $data]);
                while($row = $query->fetch()){
                    $item->id_credito = $row['id'];
                    $item->id_asociado = $row['id_asociado'];
                    $item->dia_pago = $row['dia_pago'];
                    $item->valor_credito = $row['valor_credito'];
                    $item->nro_cuotas = $row['nro_cuotas'];
                    $item->tasa_interes = $row['tasa_interes'];
                    $item->tasa_mora = $row['tasa_mora'];
                    $item->fecha_credito = $row['fecha_credito'];
                    $item->fecha_desembolso = $row['fecha_desembolso'];
                    $item->saldo = $row['saldo'];
                    $item->valor_cuota = $row['valor_cuota'];
                }       
                return $item;                                             
            }catch(PDOException $e){
                return null;
            }

        }

        function getAllId($id_credito){
            $item=new Asociado();
            try{
                $query = $this->db->connect()->prepare(
                                    'SELECT id_asociado FROM creditos INNER JOIN asociados ON asociados.id = creditos.id_asociado WHERE id = :id'
                                                    );
                $query->execute(['id' => $id_credito]);                                                    
                while($row = $query->fetch()){
                    $item = $row['id_asociado'];
                }
                
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }
    }