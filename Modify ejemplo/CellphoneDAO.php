<?php

    namespace DAO;

    use Models\CellPhone;

    class CellphoneDAO implements ICellphoneDAO {
        private $fileName = ROOT . "/Data/cellphones.json";
        private $cellphoneList = array();

 

        public function Modify(Cellphone $cellphone) {
            $this->RetrieveData();

            $this->Remove($cellphone->getId());

            array_push($this->cellphoneList, $cellphone);

            $this->SaveData();
        }

      
        private function RetrieveData() {
            $this->cellphoneList = array();

            if(file_exists($this->fileName)) {
                $jsonContent = file_get_contents($this->fileName);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value) {
                    $cellphone = new CellPhone();
                    $cellphone->setId($value["id"]);
                    $cellphone->setCode($value["code"]);
                    $cellphone->setBrand($value["brand"]);
                    $cellphone->setModel($value["model"]);
                    $cellphone->setPrice($value["price"]);

                    array_push($this->cellphoneList, $cellphone);
                }
            }
        }

        private function GetNextId() {
            $id = 0;

            foreach($this->cellphoneList as $cellphone) {
                $id = ($cellphone->getId() > $id) ? $cellphone->getId() : $id;
            }

            return $id + 1;
        }
    }
?>