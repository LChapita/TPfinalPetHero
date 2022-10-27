<?php

namespace Controllers;

use Controllers\PetController as PetController;

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
        //$petDAO = new petDAO();
        //var_dump($_SESSION);
        //$petList = $petDAO->GetAllPets();
        //$petControl = new PetController();
        require_once(VIEWS_PATH . "pet-list.php");
    }


}

?>