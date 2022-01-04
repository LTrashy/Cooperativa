<?php

class AsociadoModel extends Model implements IModel{

    private $id;
    private $idPersona;
    private $createTime;
    private $totalAportes;

    function __construct()
    {
        parent::__construct();
        $this->createTime = null;
        $this->totalAportes = 0;
    }

    public function save()
    {
        try{
            $conexion = $this->db->connect();
            $query = $conexion->prepare('INSERT INTO asociados(id_persona, create_time, total_aportes)
                                        VALUES (:id_persona, :create_time, :total_aportes)');
            $query->execute([
                'id_persona' => $this->idPersona,
                'create_time' => date('Y-m-d'),
                'total_aportes' => $this->totalAportes
            ]);                  
            $this->setId($conexion->lastInsertId());
            return $this->getId();
        }catch(PDOException $e){
            var_dump($e);
            die();
            return false;
        }
    }

    public function getAll()
    {
        $items = [];
        try{
            $query = $this->query('SELECT * FROM asociados');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new AsociadoModel();
                $item->setId($p['id']);
                $item->setIdPersona($p['id_persona']);
                $item->setCreateTime($p['create_time']);
                $item->setTotalAportes($p['total_aportes']);

                array_push($items, $item);
            }
            
            return $items;
        }catch(PDOException $e){
            var_dump($e->getMessage());
            die();
            return false;
        }
    }

    public function get($id)
    {
        try{
            $query = $this->prepare('SELECT * FROM asociados WHERE id = :id');
            $query->execute(['id' => $id]);

            $p = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($p['id']);
            $this->setIdPersona($p['id_persona']);
            $this->setCreateTime($p['create_time']);
            $this->setTotalAportes($p['total_aportes']);

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getIdPer($idPersona)
    {
        try{
            $query = $this->prepare('SELECT * FROM asociados WHERE id_persona = :id');
            $query->execute(['id' => $idPersona]);

            $p = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($p['id']);
            $this->setIdPersona($p['id_persona']);
            $this->setCreateTime($p['create_time']);
            $this->setTotalAportes($p['total_aportes']);

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id)
    {
        try{
            $query = $this->prepare('DELETE FROM asociados WHERE id = :id');
            $query->execute(['id' => $id]);

            return true;

        }catch(PDOException $e){
            return false;
        }
    }

    public function update()
    {
        try{
            $query = $this->prepare('UPDATE asociados SET total_aportes = :total_aportes WHERE id = :id');
            $query->execute([
                'total_aportes' => $this->totalAportes,
                'id' => $this->id
            ]);

            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function from($array)
    {
        $this->id = $array['id'];
        $this->idPersona = $array['id_persona'];
        $this->createTime = $array['create_time'];
        $this->totalAportes = $array['total_aportes'];
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
     * Get the value of idPersona
     */ 
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set the value of idPersona
     *
     * @return  self
     */ 
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get the value of createTime
     */ 
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set the value of createTime
     *
     * @return  self
     */ 
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get the value of totalAportes
     */ 
    public function getTotalAportes()
    {
        return $this->totalAportes;
    }

    /**
     * Set the value of totalAportes
     *
     * @return  self
     */ 
    public function setTotalAportes($totalAportes)
    {
        $this->totalAportes = $totalAportes;

        return $this;
    }
}



?>
