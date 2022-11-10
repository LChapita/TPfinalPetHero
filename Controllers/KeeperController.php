<?php

namespace Controllers;

use Models\Keeper as Keeper;
use Models\User as User;
use SQL\KeeperSQL as KeeperSQL;
use DAO\KeeperDAO as KeeperDAO;

class KeeperController{
    private $keeperSQL;
    private $keeperDAO;
    private $keeper;

    public function __construct()
    {
        $this->keeperDAO = new KeeperDAO();
        $this->keeperSQL=new KeeperSQL();
    }

    public function getKeeperC()
    {
        return $this->keeper;
    }
    public function setKeeperC($keeper)
    {
        $this->keeper = $keeper;
    }
    public function MenuKeeper()
    {
        //MENU DE KEEPER
        require_once(VIEWS_PATH . "validate-session.php");
        require_once(VIEWS_PATH . "keepers/menu-keeper.php");
    }

    public function RegisterKeeper($email, $password, $name, $lastname, $photo, $dni, $tuition,$sizePet ,$price,$sex, $age)
    {
        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        $keeper = new Keeper();

        $keeper->setKeeper("Keeper");

        $keeper->setName($name);
        $keeper->setLastname($lastname);
        
        if(isset($_FILES["photo"])){
            $file=$_FILES["photo"];
            $name=$file["name"];
            $tipo=$file["type"];
            $ruta_provicional=$file["tmp_name"];
            $size=$file["size"];
            $dimensiones=getimagesize($ruta_provicional);
            $width=$dimensiones[0];
            $height=$dimensiones[1];
            $carpeta=VIEWS_PATH.("keepers/photos/");
            /*validaciones de foto */

            
            $src=$carpeta.$name;
            move_uploaded_file($ruta_provicional,$src);
            $imagen= VIEWS_PATH."keepers/photos/".$name;
        }
        
        $keeper->setPhoto($imagen);
        
        $dni=$_POST["dni"];
        $keeper->setDNI($dni);

        $tuition=$_POST["tuition"];
        $keeper->setTuition($tuition);

        if ($_REQUEST["sizePet"] == "small") {
            $keeper->setSizePet($sizePet);
        } elseif ($_REQUEST["sizePet"] == "medium") {
            $keeper->setSizePet($sizePet);
        } else {
            $keeper->setSizePet($sizePet);
        }

        $price=$_POST["price"];
        $keeper->setPrice($price);

        $sexo= $_POST["sex"];
        $keeper->setSex($sexo);

        $edad= $_POST["age"];
        $keeper->setAge($edad);
        
        var_dump($keeper);
        //$this->keeperDAO->Add($user, $keeper);

        $this->keeperSQL->Add($user, $keeper);
        
        $this->GoHome();
    }

    public function ShowAllKeepers($message = "")
    {
        require_once(VIEWS_PATH . "keeper-list.php");
    }
    
    
    public function ShowAddStays(){
        require_once(VIEWS_PATH . "validate-session.php");
        
        require_once(VIEWS_PATH . "keepers/stays.php");
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
            /*

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
            */
        }
        
        //$keeper->setDateStart($dateS);
        //$keeper->setDateFinish($dateF);
        

        //$this->keeperDAO->AddStays($userIn,$keeper);
        


        //var_dump($dateS);
        $this->keeperSQL->AddStays($userIn->getId(),$dateS,$dateF);
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