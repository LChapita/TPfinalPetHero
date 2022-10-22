<?php

    namespace DAO;

    use Models\Owner;

    class ownerDAO implements OownerDAO {
        private $fileName = ROOT . "Data/Owner.json";
        private $ownerList = array();

        public function GetById($id) {
            $this->RetrieveData();

            $aux = array_filter($this->ownerList, function($Owner) use($id) {
                return $Owner->getId() == $id;
            });

            $aux = array_values($aux);

            return (count($aux) > 0 ) ? $aux[0] : null;
        }

        private function SaveData() {
            sort($this->ownerList);
            $arrayEncode = array();

            foreach($this->ownerList as $Owner) {
                $value["invoiceCategoryId"] = $Owner->getId();
                $value["description"] = $Owner->getDescription();
                $value["active"] = $Owner->getActive();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
             $this->ownerList = array();

             if(file_exists($this->fileName))
             {
                 $jsonContent = file_get_contents($this->fileName);
                 $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                 
                 foreach($arrayDecode as $value) {
                    $Owner = new Owner();
                    $Owner->setId($value["ownerID"]);
                    $Owner->setName($value["name"]);
                    $Owner->setActive($value["active"]);

                    array_push($this->ownerList, $Owner);
                 }
             }
        }
        public function Exist($id) {
            $rta = null;
            $this->RetrieveData();

            foreach($this->ownerList as $Owner) {
                if($Owner->getId() == $id) {
                    $rta =$Owner;
                }
            }
            return $rta;
        }
    }
?>