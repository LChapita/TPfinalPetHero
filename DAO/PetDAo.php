<?php

namespace DAO;

//use Models\User as User;
//use DAO\UserDAO as UserDAO;
use DAO\IPetDAO as IPetDAO;
use Models\Owner as Owner;
use Models\Pet;

class PetDAO implements IPetDAO
{
    private $fileName = ROOT . "Data/pets.json";
    private $petList = array();

    public function AddPet($pet,$owner)
    {
        $this->RetrieveDataPet();
        
        $pet->setDueño($owner);
        array_push($this->petList,$pet);
        
        $this->SaveDataPet();
        
    }
    public function GetAllPets()
    {
        
    }
    private function RetrieveDataPet()
    {
        $this->petList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {
                $pet = new Pet();

                $pet->setFoto($content["foto"]);
                $pet->setId($content["id"]);
                $pet->setName($content["name"]);
                $pet->setVaccinationSchedule($content["vaccinationSchedule"]);
                $pet->setRaza($content["raza"]);
                $pet->setVideo($content["video"]);

                $owner = new Owner();

                $owner->setOwner($content["dueño"]["type"]);
                $owner->setId($content["dueño"]["id"]);
                $owner->setName($content["dueño"]["name"]);
                $owner->setSurName($content["dueño"]["surName"]);
                $owner->setDni($content["dueño"]["dni"]);
                
                $pet->setDueño($owner);

                array_push($this->petList, $pet);
            }
        }
    }
    private function SaveDataPet()
    {
        $arrayToEncode = array();

        foreach ($this->petList as $pet) {
            $valuesArray = array();
            $valuesArray["foto"] = $pet->getFoto();
            $valuesArray["id"] = $pet->getId();
            $valuesArray["name"] = $pet->getId();
            $valuesArray["vaccinationSchedule"] = $pet->getId();
            $valuesArray["raza"] = $pet->getId();
            $valuesArray["video"] = $pet->getId();

            $valuesArray["dueño"] = array(
                "type" => $pet->getDueño()->getOwner(),
                "id" => $pet->getDueño()->getId(),
                "name" => $pet->getDueño()->getName(),
                "surName" => $pet->getDueño()->getSurName(),
                "dni" => $pet->getDueño()->getDni(),
            );


            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

}

?>