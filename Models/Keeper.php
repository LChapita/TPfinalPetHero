<?php
///dependiendo de si el usuario es owner y tambien keeper tengo hasta este momento 2 opciones
/// 1. reservar el ide de keeper para su posterior "uso"
/// 2. borrar todo a la mrd y hacer todo de nuevo 
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