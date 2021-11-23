<?php
class SessionDb extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function getDefaultsites()
    {
        try{
            $query = $this->query('SELECT name_role, name_permiso FROM permisos INNER JOIN roles INNER JOIN roles_permisos WHERE roles_permisos.id_role = roles.id AND roles_permisos.id_permiso = permisos.id');
            
            $items = [];
            //FIXME: 3 porque son los 3 roles  
            for($i=0;$i<3;$i++){
                $p = $query->fetch(PDO::FETCH_ASSOC);
                $item = $this->from($p);
                array_push($items,$item);
            }
            // var_dump($items);
            // die();
            return $items;
        }catch(PDOException $e){
            return null;
        }
    }

    function getAllSites()
    {
        try{
            $query = $this->query('SELECT name_role, name_permiso FROM permisos INNER JOIN roles INNER JOIN roles_permisos WHERE roles_permisos.id_role = roles.id AND roles_permisos.id_permiso = permisos.id');
            
            $items = [];
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = $this->from($p);
                array_push($items,$item);
            }
            // var_dump($items);
            // die();
            return $items;
        }catch(PDOException $e){
            return null;
        }
    }

    function from($array)
    {   
        $nameRole = $array['name_role'];
        $namePermiso = $array['name_permiso'];

        return [$nameRole => $namePermiso];
    }
}
?>