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

    public function RegisterKeeper($email, $password, $name, $lastname, $photo, $dni, $tuition, $sex, $age)
    {
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $keeper = new Keeper();

        $keeper->setKeeper("Keeper");

        $keeper->setName($name);
        $keeper->setLastname($lastname);
        $keeper->setPhoto($photo);
        $keeper->setDNI($dni);

        $keeper->setTuition($tuition);

        if ($_REQUEST["sex"] == "Female") {
            $keeper->setSex($sex);
        } elseif ($_REQUEST["sex"] == "Male") {
            $keeper->setSex($sex);
        } else {
            $keeper->setSex($sex);
        }

        if ($_REQUEST["age"] > 17) {
            $keeper->setAge($age);
        } else {
            $keeper->setAge($age);
        }

        $this->userDAO->AddKeeper($user, $keeper);

        $this->GoHome();
    }

    public function ShowAllKeepers($message = "")
    {
        require_once(VIEWS_PATH . "keeper-list.php");
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

        $this->MenuKeeper();

    }

    public function GoHome()
    {
        header('Location:' . FRONT_ROOT . 'Home/GoFirstPage');
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