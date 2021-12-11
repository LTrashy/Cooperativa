<?php

class AporteModel extends Model implements IModel{

    private $id;
    private $idAsociado;
    private $valorAporte;
    private $createTime;

    function __construct()
    {
        parent::__construct();
        $this->valorAporte = 0;
        $this->createTime = null;
    }

    public function save()
    {
        try{
            $conexion = $this->db->connect();
            $query = $conexion->prepare('INSERT INTO aportes(id_asociado, valor_aporte, create_time) VALUES (:id_asociado, :valor_aporte, :create_time) ');

            $query2 = $conexion->prepare('UPDATE asociados SET total_aportes = total_aportes + (:valor_aporte) WHERE id = :id_asociado');

            $query->execute([
                'id_asociado' => $this->idAsociado,
                'valor_aporte' => $this->valorAporte,
                'create_time' => date('Y-m-d'),
            ]);

            $this->setId($conexion->lastInsertId());

            $query2->execute([
                'valor_aporte' => $this->valorAporte,
                'id_asociado' => $this->idAsociado,
            ]);

            return $this->getId();

        }catch(PDOException $e){
            return false;
        }
    }

    public function getAll()
    {
        $items = [];
        try{
            $query = $this->query('SELECT * FROM aportes');
            
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new AporteModel();
                $item->setId($p['id']);
                $item->setIdAsociado($p['id_asociado']);
                $item->setValorAporte($p['valor_aporte']);
                $item->setCreateTime($p['create_time']);
                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return null;
        }
    }
    public function get($idAsoc)
    {
        $items = [];
        try{
            $query = $this->prepare('SELECT * FROM aportes WHERE id_asociado = :id_asociado');
            $query->execute(['id_asociado' => $idAsoc]);

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new AporteModel();
                $item->setId($p['id']);
                $item->setIdAsociado($p['id_asociado']);
                $item->setValorAporte($p['valor_aporte']);
                $item->setCreateTime($p['create_time']);
                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return null;
        }
    }

    public function getByOrder($data = null){
        try{
            // var_dump($data);
            // die();
            $query = $this->prepare('SELECT * FROM aportes WHERE id_asociado = :id_asociado ORDER BY :field :sentido');
            $query->execute([
                'id_asociado' => $data['id_asociado'],
                'field' => $data['field'],
                'sentido' => $data['sentido'],
            ]);

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new AporteModel();
                $item->setId($p['id']);
                $item->setIdAsociado($p['id_asociado']);
                $item->setValorAporte($p['valor_aporte']);
                $item->setCreateTime($p['create_time']);
                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            var_dump($e->getMessage());
            die();
            return null;
        }
    }

    public function delete($id)
    {

    }
    public function update()
    {

    }
    public function from($array)
    {
        
    }

    public function getLast($idA){
        try{

            $query = $this->prepare('SELECT * FROM aportes WHERE id_asociado = :id ORDER BY create_time DESC LIMIT 1');

            $query->execute([
                'id' => $idA,
            ]);
            $p = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($p['id']);
            $this->setIdAsociado($p['id_asociado']);
            $this->setValorAporte($p['valor_aporte']);
            $this->setCreateTime($p['create_time']);
            

            return $this;
        }catch(PDOException $e){
            // var_dump($e);
            // die();
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
     * Get the value of idAsociado
     */ 
    public function getIdAsociado()
    {
        return $this->idAsociado;
    }

    /**
     * Set the value of idAsociado
     *
     * @return  self
     */ 
    public function setIdAsociado($idAsociado)
    {
        $this->idAsociado = $idAsociado;

        return $this;
    }

    /**
     * Get the value of valorAporte
     */ 
    public function getValorAporte()
    {
        return $this->valorAporte;
    }

    /**
     * Set the value of valorAporte
     *
     * @return  self
     */ 
    public function setValorAporte($valorAporte)
    {
        $this->valorAporte = $valorAporte;

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
}


?>