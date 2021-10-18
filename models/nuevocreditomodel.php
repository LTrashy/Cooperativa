<?php
    class NuevocreditoModel extends Model{
        function __construct(){
            parent::__construct();

        }

        public function insertarCredito($data){
            $coneccion = $this->db->connect();

            $query = $coneccion->prepare('INSERT INTO creditos (
                                                                id_asociado,valor_credito,                    nro_cuotas,tasa_interes,
                                                                tasa_mora,fecha_credito,
                                                                fecha_desembolso
                                                                )
                                        VALUES (
                                                :id_asociado,:valor_credito,
                                                :nro_cuotas,:tasa_interes,
                                                :tasa_mora,:fecha_credito,
                                                :fecha_desembolso
                                                )
                                        ');
            try{
                $query->execute([
                    'id_asociado' => $data['id_asociado'],
                    'valor_credito' => $data['valor_credito'],                
                    'nro_cuotas' => $data['nro_cuotas'],                
                    'tasa_interes' => $data['tasa_interes'],                
                    'tasa_mora' => $data['tasa_mora'],                
                    'fecha_credito' => $data['fecha_credito'],                
                    'fecha_desembolso' => $data['fecha_desembolso']          
                ]);
                $id_credito = $coneccion->lastInsertId();
                return $id_credito;
            }catch(PDOException $e){
                return false;
            }
        }
    }