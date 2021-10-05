<?php
    class nuevoasModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function insertPersona($data){
            $query = $this->db->connect()->prepare('INSERT INTO personas (id,nombre,direccion,telefono,email,birth_date)
                                                    VALUES (:id, :nombre, :direccion ,:telefono ,:email ,:birth_date) ');

            try{
                $query->execute(['id' => $data['id_persona'],
                                'nombre' => $data['nombre'],
                                'direccion' => $data['direccion'],
                                'telefono' => $data['telefono'],
                                'email' => $data['email'],
                                'birth_date' => $data['birth_date']]);
                return true;                                
            }catch(PDOException $e){
                return false;
            }                                                    
        }

        public function insertAsociado($data){
            $query = $this->db->connect()->prepare('INSERT INTO asociados (id,id_persona,create_time,total_aportes)
                                                    VALUES (:id, :id_persona, :create_time ,:total_aportes ) ');

            try{
                $query->execute(['id' => $data['id_asociado'],
                                'id_persona' => $data['id_persona'],
                                'create_time' => $data['create_time'],
                                'total_aportes' => $data['total_aportes']]);
                return true;                                
            }catch(PDOException $e){
                return false;
            }                                                    
        }

    }