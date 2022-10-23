<?php

namespace Controllers;

use Models\Owner as Owner;
use Models\Keeper as Keeper;
use Models\Pet as Pet;
use Models\User as User;

use DAO\PetDAO as PetDAO;
use DAO\UserDAO as UserDAO;

class OwnerController{

    private $owner;

    public function MenuOwner()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $petDAO = new PetDAO();
        $petList = $petDAO->GetAllPets();
        $dueño = new Owner();
        $dueño = $this->getDueñoOwner();
        require_once(VIEWS_PATH."formmascota.php");
        //require_once(VIEWS_PATH . "pet-list.php");
    }

    public function getDueñoOwner()
    {
        return $this->owner;
    }
    public function setDueñoOwner($owner)
    {
        $this->owner = $owner;
    }
}

?>