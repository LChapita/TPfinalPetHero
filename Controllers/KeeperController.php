<?php

namespace Controllers;

use Controllers\PetController as PetController;

use Models\Owner as Owner;
use Models\Keeper as Keeper;
use Models\Pet as Pet;
use Models\User as User;

use DAO\PetDAO as PetDAO;
use DAO\UserDAO as UserDAO;

class KeeperController{

    private $keeper;
    
    public function MenuKeeper()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "menu-keeper.php");
        
        //MENU DE KEEPER
        //require_once(VIEWS_PATH."formmascota.php");
        //require_once(VIEWS_PATH . "pet-list.php");
    }
    
    
    public function getKeeper()
    {
        return $this->keeper;
    }
    public function setKeeper($keeper)
    {
        $this->keeper = $keeper;
    }
}
?>