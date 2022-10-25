<?php

namespace DAO;

use DAO\IUserDAO as IUserDAO;
use Models\Owner;
use Models\User as User;
use Models\Keeper as Keeper;

class UserDAO implements IUserDAO{
    
    private $fileName = ROOT . "Data/users.json";
    private $fileKeeper = ROOT . "Data/keepers.json";
    private $userList = array();
    private $keeperList=array();

    public function GetAll()
    {
        
    }
    
    //Owners
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
                $owner->setOwner($content["typeuser"]["type"]);
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
                "type"=>$user->getTypeUserOwner()->getOwner(),
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
    
    public function GetAllOwner()
    {
        
    }
    
    //Keepers
    public function AddKeeper($user, $typeUser)
    {
        $this->RetrieveDataKeeper();

        $user->setId($this->GetNextIdKeeper());
        $typeUser->setId($user->getId());

        $user->setTypeUserKeeper($typeUser);

        array_push($this->keeperList, $user);

        $this->SaveDataKeeper();
    }

    

    private function RetrieveDataKeeper()
    {
        $this->userList = array();

        if (file_exists($this->fileKeeper)) {
            $jsonToDecode = file_get_contents($this->fileKeeper);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {

                $user = new User();
                $user->setEmail($content["email"]);
                $user->setPassword($content["password"]);
                $user->setId($content["id"]);


                $keeper = new Keeper();
                $keeper->setKeeper($content["typeuser"]["type"]);
                $keeper->setId($content["typeuser"]["id"]);
                $keeper->setName($content["typeuser"]["name"]);
                $keeper->setLastname($content["typeuser"]["lastname"]);
                $keeper->setPhoto($content["typeuser"]["photo"]);
                $keeper->setDni($content["typeuser"]["dni"]);
                $keeper->setTuition($content["typeuser"]["tuition"]);
                $keeper->setSex($content["typeuser"]["sex"]);
                $keeper->setAge($content["typeuser"]["age"]);
                $keeper->setDateStart($content["typeuser"]["dateStart"]);
                $keeper->setDateFinish($content["typeuser"]["dateFinish"]);

                $user->setTypeUserKeeper($keeper);


                array_push($this->keeperList, $user);
            }
        }
    }

    
    private function SaveDataKeeper()
    {
        $arrayToEncode = array();
        
        foreach($this->keeperList as $user){

            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(
                "type" => $user->getTypeUserOwner()->getKeeper(),
                "id" => $user->getTypeUserOwner()->getId(),

                "name"=> $user->getTypeUserKeeper()->getName(),
                "lastname"=>$user->getTypeUserKeeper()->getLastname(),
                "photo" => $user->getTypeUserKeeper()->getPhoto(),
                "dni" => $user->getTypeUserKeeper()->getDni(),
                "tuition" => $user->getTypeUserKeeper()->getTuition(),
                "sex"=>$user->getTypeUserKeeper()->getSex(),
                "age" => $user->getTypeUserKeeper()->getAge(),
                "dateStart"=>$user->getTypeUserKeeper()->getDateStart(),
                "dateFinish"=>$user->getTypeUserKeeper()->getDateFinish()
                
            );


            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileKeeper, $fileContent);
    }

    public function GetAllKeeper()
    {
        $this->RetrieveDataKeeper();
        return $this->keeperList;
    }
    /// modify keeper

    public function AddStays($userIn, $keeper)
    {
        $this->RetrieveDataKeeper();

        //$user->setId($this->GetNextIdKeeper());
        //$typeUser->setId($user->getId());

        $this->Remove($userIn->getId());

        $userIn->setTypeUserKeeper($keeper);

        array_push($this->keeperList, $userIn);

        $this->SaveDataKeeper();
    }
    public function Remove($id)
    {
        //$this->RetrieveDataKeeper();

        $this->keeperList = array_filter($this->keeperList, function ($keeper) use ($id) {
            return $keeper->getId() != $id;
        });

        $this->SaveDataKeeper();
    }
    ///
    private function GetNextId()
    {
        $id = 0;
        foreach ($this->userList as $user) {
            $id = ($user->getId() > $id) ? $user->getId() : $id;
        }
        return $id + 1;
    }
    private function GetNextIdKeeper()
    {
        $id = 0;
        foreach ($this->keeperList as $user) {
            $id = ($user->getId() > $id) ? $user->getId() : $id;
        }
        return $id + 1;
    }

    public function getByEmail($email)///owner
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
    
    public function getByEmail2($email)///keepers
    {
        $user = null;

        $this->RetrieveDataKeeper();

        $users = array_filter($this->keeperList, 
        function ($user) use ($email) 
        {
            return $user->getEmail() == $email;
        });

        $users = array_values($users); //Reordering array indexes

        return (count($users) > 0) ? $users[0] : null;
    }
}

?>