<?php

namespace Models;

class Keeper{
    private $id;
    private $name;
    private $lastName;
    private $dni;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
}

?>