<?php
class PersonaModel extends Model implements IModel{
    
    private $id;
    private $cedula;
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $birthDate;

    function __construct()
    {
        parent::__construct();
        $this->nombre = '';
        $this->direccion = '';
        $this->telefono = 0;
        $this->email = '';
        //$this->birthDate = '';
    }

    public function save()
    {
        try{
            $connection = $this->db->connect();
            $query = $connection->prepare('INSERT INTO personas(cedula, nombre, direccion, telefono, email, birth_date) VALUES (:cedula, :nombre, :direccion, :telefono, :email, :birth_date)');
            
            $query->execute([
                'cedula' => $this->cedula,
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'birth_date' => $this->birthDate,
            ]);
            
            //var_dump($this->lastIn());
            //var_dump($connection->lastInsertId());
            //die();
            $this->setId($connection->lastInsertId());
            return $this->getId();

        }catch(PDOException $e){
            // var_dump($e);
            // die();
            return false;
        }
    }

    public function getAll()
    {
        $items=[];
            try{
                $query = $this->query('SELECT * FROM personas');
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new PersonaModel();
                    $item->setId($p['id']);
                    $item->setCedula($p['cedula']);
                    $item->setNombre($p['nombre']);
                    $item->setDireccion($p['direccion']);
                    $item->setTelefono($p['telefono']);
                    $item->setEmail($p['email']);
                    $item->setBirthDate($p['birth_date']);
                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                error_log('UserModel::getAll->PDOException ' .$e);
                return false;
            }
    }
    public function get($id)
    {
        try{
            $query = $this->prepare('SELECT * FROM personas WHERE id = :id');
            $query->execute(['id' => $id]);
            
            $user = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->setId($user['id']);
            $this->setCedula($user['cedula']);
            $this->setNombre($user['nombre']);
            $this->setDireccion($user['direccion']);
            $this->setTelefono($user['telefono']);
            $this->setEmail($user['email']);
            $this->setBirthDate($user['birth_date']);
            
            return $this;
        }catch(PDOException $e){
            error_log('UserModel::get->PDOException ' .$e);
            return false;
        }
    }
    public function delete($id)
    {
        try{
            $query = $this->prepare('DELETE FROM personas WHERE id = :id');
            $query->execute(['id' => $id]);
            
            return true;
        }catch(PDOException $e){
            error_log('UserModel::delete->PDOException ' .$e);
            return false;
        }
    }
    public function update()
    {
        try{
            $query = $this->prepare('UPDATE personas SET 
                                        nombre = :nombre,
                                        direccion = :direccion,
                                        telefono = :telefono,
                                        email = :email,
                                        birth_date = :birth_date
                                    WHERE id = :id');
            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'birth_date' => $this->birthDate,
            ]);
            // var_dump($this->id);
            // die();
            return true;
        }catch(PDOException $e){
            // var_dump($e);
            // die();
            error_log('UserModel::get->PDOException ' .$e);
            return false;
        }
    }
    public function from($array)
    {
        $this->id = $array['id'];
        $this->cedula = $array['cedula'];
        $this->nombre = $array['nombre'];
        $this->direccion = $array['direccion'];
        $this->telefono = $array['telefono'];
        $this->email = $array['email'];
        $this->birthDate = $array['birth_date'];
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cedula
     */ 
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     *
     * @return  self
     */ 
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of birthDate
     */ 
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @return  self
     */ 
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}