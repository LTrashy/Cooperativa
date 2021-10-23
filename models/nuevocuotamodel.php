<?php
    class nuevocuotaModel extends Model{
        function __construct(){
            parent::__construct();
            
        }

        public function insertarCuota($data){
            $coneccion = $this->db->connect();

            $query = $coneccion->prepare('INSERT INTO cuota(
                                                            id_credito,abono_capital,interes_corriente,
                                                            interes_mora,fecha_proyeccion,fecha_pago,
                                                            saldo_cuota,num_cuota
                                                           )
                                        VALUES (
                                                :id_credito,:abono_capital,:interes_corriente,
                                                :interes_mora,:fecha_proyeccion,:fecha_pago,
                                                :saldo_cuota,:num_cuota
                                                )');

            try{
                $query->execute([
                                    'id_credito' => $data['id_credito'],
                                    'abono_capital' => $data['abono_capital'],
                                    'interes_corriente' => $data['interes_corriente'],
                                    'interes_mora' => $data['interes_mora'],
                                    'fecha_proyeccion' => $data['fecha_proyeccion'],
                                    'fecha_pago' => $data['fecha_pago'],
                                    'saldo_cuota' => $data['saldo_cuota'],
                                    'num_cuota' => $data['num_cuota'],
                                ]);
                $id_cuota=$coneccion->lastInsertId();
                return $id_cuota;
            }catch(PDOException $e){
                return false;
            }                                                
        }

        
    }