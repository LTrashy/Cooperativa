<?php

class RelacionRoleUserModel extends Model implements IModel{

    function __construct()
    {
        parent::__construct();
    }

    public function save(){}
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
}