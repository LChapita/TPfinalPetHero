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
    private $userDAO;
    private $keeper;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        $this->keeper= new Keeper();
    }
    public function MenuKeeper()
    {
        //MENU DE KEEPER
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "menu-keeper.php");
        

    }
    
    public function ShowAddStays(){
        require_once(VIEWS_PATH . "validate-session.php");
        
        require_once(VIEWS_PATH . "stays.php");
    }
    
    public function WelcomeKeeper(){
        $this->ShowAddStays();
    }

    public function RegisterStays($dateS,$dateF)
    {
        $userIn=new User();

        $userArr = $_SESSION;
        foreach ($userArr as $user) {
            $userIn->setEmail($user->getEmail());
            $userIn->setPassword($user->getPassword());
            $userIn->setId($user->getId());

            $keeper = new Keeper();
            $keeper->setName($user->getTypeUserKeeper()->getName());
            $keeper->setLastname($user->getTypeUserKeeper()->getLastname());
            $keeper->setPhoto($user->getTypeUserKeeper()->getPhoto());
            $keeper->setDNI($user->getTypeUserKeeper()->getDNI());
            $keeper->setTuition($user->getTypeUserKeeper()->getTuition());
            $keeper->setSex($user->getTypeUserKeeper()->getSex());
            $keeper->setAge($user->getTypeUserKeeper()->getAge());
            $keeper->setId($user->getTypeUserKeeper()->getId());
            $keeper->setKeeper($user->getTypeUserKeeper()->getId());
        }

        $keeper->setDateStart($dateS);
        $keeper->setDateFinish($dateF);
        
        

        $this->userDAO->AddStays($userIn,$keeper);

        //var_dump($_SESSION);
        $this->MenuKeeper();

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