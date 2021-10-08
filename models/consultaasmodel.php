<?php
    include_once 'models/asociado.php';
    class consultaasModel extends Model{
        function __construct(){
            parent::__construct();
            
        }

        public function getByCedula($data){
            $query = $this->db->connect()->prepare('SELECT asociados.id FROM personas INNER JOIN asociados ON personas.id = asociados.id_persona AND personas.cedula = :cedula');
            $query->execute(['cedula' => $data]);
            while($row = $query->fetch()){
                $id_asociado = $row['id'];
            }
            return $id_asociado;
        }

        public function get(){
            $items =[];

            try{
                $query = $this->db->connect()->query('SELECT * FROM asociados INNER JOIN personas ON asociados.id_persona = personas.id');
                 //var_dump($query->fetch());
                 //die();
                while($row = $query->fetch()){
                    $item = new Asociado();
                    $item->id_persona = $row['id_persona'];
                    $item->cedula = $row['cedula'];
                    $item->nombre = $row['nombre'];
                    $item->direccion = $row['direccion'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                    $item->birth_date= $row['birth_date'];
                    $item->id_asociado= $row['id'];
                    $item->create_time= $row['create_time'];
                    $item->total_aportes= $row['total_aportes'];

                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        public function getById($id){
            $item = new Asociado();
            try{
               $query = $this->db->connect()->prepare('SELECT personas.nombre, personas.cedula, personas.direccion, personas.telefono, personas.email, personas.birth_date, asociados.id AS idAsociados, asociados.total_aportes, asociados.create_time FROM asociados INNER JOIN personas ON asociados.id_persona = personas.id WHERE id_persona = :id_persona');
               $query->execute(['id_persona' => $id]);

                while($row = $query->fetch()){
                    $item->nombre = $row['nombre'];
                    $item->cedula = $row['cedula'];
                    $item->direccion = $row['direccion'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                    $item->birth_date = $row['birth_date'];
                    $item->id_asociado = $row['idAsociados'];
                    $item->total_aportes = $row['total_aportes'];
                    $item->create_time = $row['create_time'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }

        }
        public function update($item){
            $query = $this->db->connect()->prepare('UPDATE personas SET 
                                personas.cedula = :cedula,
                                personas.nombre = :nombre,
                                personas.direccion = :direccion,
                                personas.telefono =:telefono,
                                personas.email=:email,
                                personas.birth_date=:birth_date
                                WHERE personas.id = :id_persona');
            try{
                $query->execute([
                    'id_persona' => $item['id_persona'],
                    'cedula' => $item['cedula'],
                    'nombre' => $item['nombre'],
                    'direccion' => $item['direccion'],
                    'telefono' => $item['telefono'],
                    'email' => $item['email'],
                    'birth_date' => $item['birth_date']]);

                return true;
            }catch(PDOException $e){
                return false;
            }

                                            
        }
        function delete($id){
            $query = $this->db->connect()->prepare('DELETE ');
        }
    }