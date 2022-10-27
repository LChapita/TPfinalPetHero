<?php 
namespace DAO;
use Models\User as User;
use Models\Owner as Owner;
use DAO\IOwnerDAO as IOwnerDAO;

class OwnerDAO implements IOwnerDAO
{
    private $fileName = ROOT . "Data/Owner.json";
    private $OwnerList = array();

    public function Add($owner)
    {
        $this->RetrieveData();

        $owner->setId($this->GetNextId());

        array_push($this->OwnerList,$owner);

        $this->SaveData();
        
    }
    
    
            

    private function RetrieveData()
    {
        $this->OwnerList = array();

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
                $owner->setSurName($content["typeuser"]["surname"]);
                $owner->setDni($content["typeuser"]["dni"]);

                $user->setTypeUserOwner($owner);


                array_push($this->OwnerList, $user);
            }
        }
    }

    
    private function SaveData()
    {
        $arrayToEncode = array();
        
        foreach($this->OwnerList as $user){

            $valuesArray=array();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["id"] = $user->getId();
            
            $valuesArray["typeuser"] = array(
                "type" => $user->getTypeUserOwner()->GetOwner(),
                "id" => $user->getTypeUserOwner()->getId(),

                "name"=> $user->getTypeUserOwner()->getName(),
                "surname"=>$user->getTypeUserOwner()->getSurname(),
                "dni" => $user->getTypeUserOwner()->getDni(),
                
            );


            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileOwner, $fileContent);
    }

    public function GetAllOwner()
    {
        $this->RetrieveData();
        return $this->OwnerList;
    }
    public function GetById($id)
    {
        $this->RetrieveData();

        $aux = array_filter($this->OwnerList, function ($owner) use ($id) {
            return $owner->getId() == $id;
        });

        $aux = array_values($aux);

        return (count($aux) > 0) ? $aux[0] : null;
    }
    
   /*public function Remove($id)
    {
        $this->RetrieveData();

        $this->petList = array_filter($this->petList, function ($Pet) use ($id) {
            return $Pet->getId() != $id;
        });

        $this->SaveDataPet();
    }*/
    
    private function GetNextId()
    {
        $id = 0;
        foreach ($this->OwnerList as $owner) {
            $id = ($owner->getId() > $id) ? $owner->getId() : $id;
        }
        return $id + 1;
    }
}

?>