<?php

namespace Models;

class Owner{

    private $petList=array();
    private $idOwner;
    private $name;
    private $surName;
    private $dni;
    
    public function getIdOwner()
    {
        return $this->idOwner;
    }
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getSurName()
    {
        return $this->surName;
    }
    public function setSurName($surName)
    {
        $this->surName = $surName;
    }
    

    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    private function GetNextId()
    {
        $id = 0;
        foreach ($this->invoiceList as $invoice) {
            $id = ($invoice->getId() > $id) ? $invoice->getId() : $id;
        }
        return $id + 1;
    }
}
?>