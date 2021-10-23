<?php
    include_once 'models/cuota.php';
    class consultacuotaModel extends Model{
        function __construct(){
            parent::__construct();

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