<?php
    class nuevoasModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function insertPersona($data){
            $coneccion = $this->db->connect();
            $query = $coneccion->prepare('INSERT INTO personas (cedula,nombre,direccion,telefono,email,birth_date)
                                                    VALUES (:id, :nombre, :direccion ,:telefono ,:email ,:birth_date) ');

            try{
                $query->execute(['id' => $data['cedula'],
                                'nombre' => $data['nombre'],
                                'direccion' => $data['direccion'],
                                'telefono' => $data['telefono'],
                                'email' => $data['email'],
                                'birth_date' => $data['birth_date']]);
                return $coneccion->lastInsertId();                                
            }catch(PDOException $e){
                return false;
            }                                                    
        }

        public function insertAsociado($data){
            $coneccion = $this->db->connect();
            $query = $coneccion->prepare('INSERT INTO asociados (id_persona,create_time,total_aportes)
                                                    VALUES (:idPersona, :create_time ,:total_aportes ) ');

            try{
                $query->execute(['idPersona' => $data['id_persona'],
                                'create_time' => $data['create_time'],
                                'total_aportes' => $data['total_aportes']]);
                return $coneccion->lastInsertId();                               
            }catch(PDOException $e){
                //var_dump($e);
                return false;
            }                                                    
        }

    }