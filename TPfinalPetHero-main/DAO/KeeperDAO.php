<?php 
namespace DAO;
use Models\User as User;
use Models\Keeper as Keeper;
use DAO\IKeeperDAO as IKeeperDAO;

class KeeperDAO implements IKeeperDAO
{
    private $fileName = ROOT . "Data/keepers.json";
    private $keeperList = array();

    public function Add($keeper)
    {
        $this->RetrieveData();

        $keeper->setId($this->GetNextId());

        array_push($this->keeperList,$keeper);

        $this->SaveData();
        
    }
    public function GetAllKeepers()
    {
        $this->RetrieveData();
        return $this->keeperList;
    
    }
    
            

    private function RetrieveData()
    {
        $this->keeperList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

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

    
    private function SaveData()
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

   
    public function GetById($id)
    {
        $this->RetrieveData();

        $aux = array_filter($this->keeperList, function ($Keeper) use ($id) {
            return $Keeper->getId() == $id;
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
        foreach ($this->keeperList as $keeper) {
            $id = ($keeper->getId() > $id) ? $keeper->getId() : $id;
        }
        return $id + 1;
    }
}

?>