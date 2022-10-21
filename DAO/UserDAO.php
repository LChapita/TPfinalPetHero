<?php

namespace DAO;

use DAO\IUserDAO as IUserDAO;
use Models\Owner;
use Models\User as User;

class UserDAO implements IUserDAO{
    private $fileName = ROOT . "Data/users.json";
    private $userList = array();

    

    private function RetrieveDataOwner()
    {
        $this->userList = array();

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

                array_push($this->userList, $user);
            }
        }
    }

    private function SaveDataOwner()
    {
        $arrayToEncode = array();
        
        foreach($this->userList as $user){
            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(
                "id" => $user->getTypeUserOwner()->getId(),
                "name"=>$user->getTypeUserOwner()->getName(),
                "surName" => $user->getTypeUserOwner()->getSurName(),
                "dni" => $user->getTypeUserOwner()->getDni(),
            );


            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

        
    public function AddOwner($user,$typeUser)
    {
        $this->RetrieveDataOwner();

        $user->setId($this->GetNextId());
        $typeUser->setId($user->getId());

        $user->setTypeUserOwner($typeUser);
        
        array_push($this->userList, $user);

        $this->SaveDataOwner();
    }
    
    public function AddKeeper($user, $typeUser)
    {
        ///$this->RetrieveData();

        $user->setId($this->GetNextId());
        $typeUser->setId($user->getId());

        $user->setTypeUserKeeper($typeUser);

        array_push($this->userList, $user);

        //$this->SaveData();
    }
    public function GetAll()
    {
        
    }

    private function RetrieveDataKeeper(){

    }
    private function SaveDataKeeper()
    {
        
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