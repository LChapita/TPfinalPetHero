<?php

namespace DAO;

use DAO\IKeeperDAO as IKeeperDAO;
use Models\Keeperhours;
use Models\Keeper as Keeper;

class KeeperDAO implements IKeeperDAO{
    private $fileName = ROOT . "Data/keeper.json";
    private $ListKeeper = array();

    

    private function RetrieveData()
    {
        $this->Listkeeper = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
            foreach ($contentArray as $content) {
                $keeper2 = new Keeper();
                $Keeper2->setTuition($content["tuition"]);
                $Keeper2->setName($content["name"]);
                $keeperhours = new Keeperhours();
                $keeperhours->setDate($content["keeperhours"]["date"]);
                $keeperhours->setNumbersofpets($content["keeperhours"]["numbersofpets"]);
               

                $keeper2->setKeeperhours($keeperhours);

                array_push($this->ListKeeper, $keeper2);
            }
        }
    }

  
     private function SaveData()
    {
        $arrayToEncode= array();
        
        foreach($this->ListKeeper as keeper2){
            $valuesArray=array();
            $valuesArray["tuition"] = $keeper2->getTuition();
            $valuesArray["name"] = $keeper2->getName();
            
            
            $valuesArray["Keeper2"] = array(){
                ["date(format)"] =>$keeper2->getKeeper()->getDate(),
                ["lastname"]=>$keeper2->getKeeper()->getNumnersofpets(),
               
            };


            array_push($arrayToEncodeKeeper, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

        
   
    
    public function AddKeeper($keeper2, $Keeperhours)
    {
        $this->RetrieveData();

        $keeper2->setTuition($this->getTuition()); //??????????????????????????DUDAAAAAA
        $keeper2->setName($keeper2->getName());

        $keeper2->setKeeper($keeper2);

        array_push($this->ListKeeper, $Keeper2);

        $this->SaveData();
    }
   
    public function GetAll()
    {
         $this->RetrieveData();
        return $this->ListKeeper;

    }


   
function holaKeeper($tuition,$name){
    $hola=array();
    $hola["tuition"]=$Keeper2->getTuition();
    $hola["name"]=$Keeper2->getName();
    echo $hola["tuition"]
    echo $hola["name"];

}
?>
