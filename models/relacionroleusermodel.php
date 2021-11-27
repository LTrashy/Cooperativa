<?php

class RelacionRoleUserModel extends Model implements IModel{

    private $id;
    private $idUser;
    private $idRole;
    
    function __construct()
    {
        parent::__construct();
        $this->idRole = 2;
    }

    public function save()
    {
        try{
            $connection = $this->db->connect();
            $query = $connection->prepare('INSERT INTO user_roles(id_role, id_user) VALUES (:id_role, :id_user)');
            $query->execute([
                'id_role' => $this->idRole,
                'id_user' => $this->idUser,
            ]);

            $this->setId($connection->lastInsertId());
            return $this->getId();
        }catch(PDOException $e){
            return false;
        }
    }
    public function getAll(){}
    public function get($id){}
    public function delete($id){}
    public function update(){}
    public function from($array){}

    public function getRoleById($id)
    {
        try{
            $query = $this->prepare('SELECT name_role FROM roles INNER JOIN user_roles INNER JOIN users WHERE roles.id = user_roles.id_role AND users.id = user_roles.id_user AND users.id = :id');

            $query->execute(['id' => $id]);
            // var_dump($id);
            // var_dump($query->fetch(PDO::FETCH_ASSOC));
            // die();
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return null;
        }
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
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of idRole
     */ 
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set the value of idRole
     *
     * @return  self
     */ 
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }
}