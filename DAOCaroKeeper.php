<?php

namespace DAO;

use DAO\IUserDAO as IUserDAO;
use Models\Owner;
use Models\Keeper;
use Models\User as User;

class UserDAO implements IUserDAO{
    private $fileName = ROOT . "Data/users.json";
    private $userList = array();

    

    private function RetrieveDataOwner()
    {
        $this->userListOwner = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {
                $user = new User();
                $user->setEmail($content["email"]);
                $user->setPassword($content["password"]);
                $user->setId($content["id"]);

                $owner = new Owner();
                $owner->setId($content["typeuser"]["id"]);
                $owner->setName($content["typeuser"]["name"]);
                $owner->setSurName($content["typeuser"]["surName"]);
                $owner->setDni($content["typeuser"]["dni"]);

                $user->setTypeUserOwner($owner);

                array_push($this->userListOwner, $user);
            }
        }
    }

     private function RetrieveDataKeeper()
    {
        $this->userListKeeper = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {
                $user = new User();
                $user->setEmail($content["email"]);
                $user->setPassword($content["password"]);
                $user->setId($content["id"]);


                 $Keeper = new Keeper();
                $Keeper->setName($content["typeuser"]["name"]);
                $Keeper->setLastname($content["typeuser"]["lastname"]);
                $Keeper->setPhotp($content["typeuser"]["photo"]);
                $Keeper->setDni($content["typeuser"]["dni"]);
                $Keeper->setTuition($content["typeuser"]["tuition"]);
                $Keeper->setSex($content["typeuser"]["sex"]);
                $Keeper->setAge($content["typeuser"]["age"]);

                $user->setTypeUserKeeper($Keeper);


                array_push($this->userListKeeper, $user);
            }
        }
    }

    private function SaveDataOwner()
    {
        $arrayToEncodeOwner = array();
        
        foreach($this->userList as $user){
            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(){
                ["id"] => $user->getTypeUserOwner()->getId(),
                ["name"]=>$user->getTypeUserOwner()->getName(),
                ["surName"] => $user->getTypeUserOwner()->getSurName(),
                ["dni"] => $user->getTypeUserOwner()->getDni(),
            };


            array_push($arrayToEncodeOwner, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncodeOwner, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

     private function SaveDataKeeper()
    {
        $arrayToEncodeKeepeer= array();
        
        foreach($this->userList as $user){
            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(){
                ["name"] => $user->getTypeUserKeeper()->getName(),
                ["lastname"]=>$user->getTypeUserKeeper()->getLastname(),
                {"photo"] => $user->getTypeUserKeeper()->getPhoto(),
                ["dni"] => $user->getTypeUserKeeper()->getDni(),
                ["tuition"] => $user->getTypeUserKeeper()->getTuition(),
                ["sex"]=>$user->getTypeUserKeeper()->getSex(),
                ["age"] => $user->getTypeUserKeeper()->getAge(),
                
            };


            array_push($arrayToEncodeKeeper, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncodeKeeper, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

        
    public function AddOwner($user,$typeUser)
    {
        $this->RetrieveDataOwner();

        $user->setId($this->GetNextId());
        $typeUser->setId($user->getId());

        $user->setTypeUserOwner($typeUser);
        
        array_push($this->userListOwner, $user);

        $this->SaveDataOwner();
    }
    
    public function AddKeeper($user, $typeUser)
    {
        ///$this->RetrieveData();

        $user->setId($this->GetNextId());
        $typeUser->setId($user->getId());

        $user->setTypeUserKeeper($typeUser);

        array_push($this->userListKeeper, $user);

        //$this->SaveData();
    }
    public function GetAllOwnwe()
    {
        $this->RetrieveDataOwner();
        return $this->$userListOwner;
    }
    public function GetAllKeeper()
    {
         $this->RetrieveDataKeeper();
        return $this->$userListKeeper;

    }


    private function GetNextId()
    {
        $id = 0;
        foreach ($this->userList as $user) {
            $id = ($user->getId() > $id) ? $user->getId() : $id;
        }
        return $id + 1;
    }

    public function getByEmail($email)
    {
        $user = null;

        $this->RetrieveDataOwner();

        $users = array_filter($this->userList, 
        function ($user) use ($email) 
        {
            return $user->getEmail() == $email;
        });

        $users = array_values($users); //Reordering array indexes

        return (count($users) > 0) ? $users[0] : null;
    }
}

?>
Pie de página
© 2022 GitHub, Inc.
Pie de página de navegación
Términos
Privacidad
Seguridad
Estado
Documentos
Póngase en contacto con GitHub
Precios
API
Capacitación
Blog
Sobre
