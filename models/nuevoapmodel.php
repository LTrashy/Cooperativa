<?php
    include_once 'models/consultaasmodel.php';
    class nuevoapModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function insertarPrimerAporte($data){
            $coneccion = $this->db->connect();
            $query = $coneccion->prepare('INSERT INTO aportes (id_asociado,valor_aporte,create_time) VALUES
                                            (:id_asociado,:valor_aporte,:create_time)');

            try{
                $query->execute([
                    'id_asociado' => $data['id_asociado'],
                    'valor_aporte' => $data['aporte'],
                    'create_time' => $data['create_time']
                ]);
                $id_aporte =$coneccion->lastInsertId();
                return $id_aporte;
            }catch(PDOException $e){
                
                return false;
            }                                               
        }
        public function insertarAporte($data){
                        
            $coneccion = $this->db->connect();
            
            $query = $coneccion->prepare('INSERT INTO aportes (id_asociado,valor_aporte,create_time) VALUES
                                            (:id_asociado,:valor_aporte,:create_time)');
            $query2 = $coneccion->prepare('UPDATE asociados SET total_aportes=total_aportes+(:valor_aporte)                WHERE asociados.id=:id_asociado');
            

            
            try{
                $query->execute([
                    'id_asociado' => $data['id_asociado'],
                    'valor_aporte' => $data['aporte'],
                    'create_time' => $data['create_time']
                ]);
                $id_aporte =$coneccion->lastInsertId();
                $query2->execute([
                    'valor_aporte' => $data['aporte'],
                    'id_asociado' => $data['id_asociado']
                ]);                                 
                                                 
                return $id_aporte;


            }catch(PDOException $e){
                
                return false;
            }                                            
        }
    }