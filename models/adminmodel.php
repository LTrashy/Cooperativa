<?php

class AdminModel extends Model {

    private $idPersona;
    private $cedula;
    private $nombre;
    private $idAsociado;
    private $createTime;
    private $totalAportes;

    public function getAsociadosPersona(){
        $items = [];
        try{
            $query = $this->query('SELECT *,asociados.id as id_asociado FROM asociados INNER JOIN personas ON asociados.id_persona = personas.id AND asociados.total_aportes != 0');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new AdminModel();
                $item->setIdPersona($p['id_persona']);
                $item->setCedula($p['cedula']);
                $item->setNombre($p['nombre']);
                $item->setIdAsociado($p['id_asociado']);
                $item->setCreateTime($p['create_time']);
                $item->setTotalAportes($p['total_aportes']);

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return false;
        }
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