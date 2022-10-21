<?php
    namespace DAO;

    use DAO\ppetDAO as ppetDAO;
    use Models\Pet as Pet;

    class petDAO implements ppetDAO {
        private $fileName = ROOT."Data/pets.json";
        private $petList = array();

        public function GetAll() {
            $this->RetrieveData();
            return $this->petList;
        }

        public function Remove($id) {
            $this->RetrieveData();

            $this->petList = array_filter($this->petList, function($Pet) use($id) {
                return $Pet->getId() != $id;
            });

            $this->SaveData();
        }
        public function Add($Pet) {
            $this->RetrieveData();

            $Pet->setId($this->GetNextId());

            array_push($this->petList, $Pet);
            
            $this->SaveData();
        }


        public function GetById($id) {
            $this->RetrieveData();

            $aux = array_filter($this->petList, function($Pet) use($id) {
                return $Pet->getId() == $id;
            });

            $aux = array_values($aux);

            return (count($aux) > 0 ) ? $aux[0] : null;
        }

        private function SaveData() {
            sort($this->petList);
            $arrayEncode = array();

            foreach($this->petList as $Pet) {
                $value["invoiceId"] = $Pet->getId();
                $value["ownerID"] =$Pet->getOwnerID();
                $value["raza"] = $Pet->getRaza();
                $value["tamaño"] = $Pet->getTamaño();
                $value["observaciones"] = $Pet->getObservations();
                $value["payed"] = $Pet->getPayed();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
             $this->petList = array();

             if(file_exists($this->fileName))
             {
                 $jsonContent = file_get_contents($this->fileName);
                 $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                 
                 foreach($arrayDecode as $value) {
                    $Pet = new Pet();
                    $Pet->setId($value["invoiceId"]);
                    $Pet->setOwnerID($value["ownerID"]);
                    $Pet->setRaza($value["raza"]);
                    $Pet->setTamaño($value["tamaño"]);
                    $Pet->setObservations($value["observaciones"]);
                    $Pet->setPayed($value["payed"]);

                    array_push($this->petList, $Pet);
                 }
             }
        }

        private function GetNextId() { 
            $id = 0;
            foreach($this->petList as $Pet) {
                $id = ($Pet->getId() > $id) ? $Pet->getId() : $id;
            }
            return $id + 1;
        }
    }

    