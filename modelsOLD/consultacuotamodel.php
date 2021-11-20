<?php
    include_once 'models/cuota.php';
    class consultacuotaModel extends Model{
        function __construct(){
            parent::__construct();

        }
        function update($data){
            // var_dump($data);
            // die();
            $query = $this->db->connect()->prepare('UPDATE cuota INNER JOIN creditos 
                                    ON cuota.id_credito = creditos.id SET
                                    cuota.interes_mora = :interes_mora,
                                    cuota.fecha_pago = :fecha_pago,
                                    cuota.saldo_cuota = :saldo_cuota,
                                    creditos.dia_pago = :dia_pago,
                                    creditos.saldo = :saldo
                                    WHERE cuota.id = :id_cuota');
            try{
                $query->execute([
                    'id_cuota' => $data['id_cuota'],
                    'interes_mora' => $data['interes_mora'],
                    'fecha_pago' => $data['fecha_pago'],
                    'saldo_cuota' => $data['saldo_cuota'],
                    'dia_pago' => $data['dia_pago'],
                    'saldo' => $data['saldo']]);

                    return true;
            }catch(PDOException $e){
                
                return false;
            }
        }
        function getById($id_cuota){
            $item = new Cuota();
            try{    
                $query = $this->db->connect()->prepare('SELECT * FROM cuota WHERE id=:id');
                $query->execute(['id'=>$id_cuota]);

                while($row = $query->fetch()){
                    $item->id_cuota = $row['id'];
                    $item->id_credito = $row['id_credito'];
                    $item->abono_capital = $row['abono_capital'];
                    $item->interes_corriente = $row['interes_corriente'];
                    $item->interes_mora = $row['interes_mora'];
                    $item->fecha_proyeccion = $row['fecha_proyeccion'];
                    $item->fecha_pago = $row['fecha_pago'];
                    $item->saldo_cuota = $row['saldo_cuota'];
                    $item->num_cuota = $row['num_cuota'];
                }
                return $item;
            }catch(PDOException $e){
                return false;
            }
        }

        function getByIdCuotas($id){
            $items = [];
            try{
                $query = $this->db->connect()->prepare('SELECT creditos.id AS idcr , cuota.id AS idcu,         creditos.*, cuota.* FROM cuota INNER JOIN creditos ON creditos.id = cuota.id_credito WHERE cuota.id_credito =:id_credito');

                $query->execute(['id_credito' => $id]);
                while($row = $query->fetch()){
                    $item = new Cuota();
                    $item->id_cuota = $row['idcu'];
                    $item->id_credito = $row['idcr'];
                    $item->abono_capital = $row['abono_capital'];
                    $item->interes_corriente = $row['interes_corriente'];
                    $item->interes_mora = $row['interes_mora'];
                    $item->fecha_proyeccion = $row['fecha_proyeccion'];
                    $item->fecha_pago = $row['fecha_pago'];
                    $item->saldo_cuota = $row['saldo_cuota'];
                    $item->num_cuota = $row['num_cuota'];
                    array_push($items,$item);
                }
                
                return $items;
            }catch(PDOException $e){
                return null;
            }
        }
    }