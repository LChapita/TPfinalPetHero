<?php

namespace Controllers;

//use DAO\OwnerDAO as OwnerDAO;
use SQL\OwnerSQL as OwnerSQL;
use Models\Owner as Owner;
use Models\User as User;

use DAO\PetDAO as PetDAO;

class OwnerController{
    private $ownerSQL;
    //private $ownerDAO;
    private $owner;
    public function __construct()
    {
        //$this->ownerDAO = new OwnerDAO();
        $this->ownerSQL=new OwnerSQL();
    }

    public function MenuOwner()
    {
        require_once(VIEWS_PATH . "validate-session.php");   
        $this->Show();
    }

    public function getDueñoOwner()
    {
        return $this->owner;
    }
    public function setDueñoOwner($owner)
    {
        $this->owner = $owner;
    }

    public function Show($message = "")
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "owners/pet-list.php");
    }
    
    public function ShowAllKeepers($message = "")
    {
        require_once(VIEWS_PATH . "owners/keeper-list.php");
    }

    public function RegisterOwner($email, $password, $name, $lastname, $dni)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);

        $owner = new Owner();
        //$owner->setOwner("Owner");
        
        $owner->setName($name);
        $owner->setSurName($lastname);
        $owner->setDni($dni);
        
        //$owner->setId(2);

        //$this->ownerDAO->Add($user, $owner);
        $this->ownerSQL->Add($user,$owner);

        $this->GoHome();
    }

    public function GoHome()
    {
        header('Location:' . FRONT_ROOT . 'Home/GoFirstPage');
    }

}

?>