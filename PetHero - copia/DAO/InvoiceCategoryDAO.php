<?php

    namespace DAO;

    use Models\InvoiceCategory;

    class InvoiceCategoryDAO implements IInvoiceCategoryDAO {
        private $fileName = ROOT . "Data/InvoiceCategories.json";
        private $invoiceCategoryList = array();

        public function GetById($id) {
            $this->RetrieveData();

            $aux = array_filter($this->invoiceCategoryList, function($invoiceCategory) use($id) {
                return $invoiceCategory->getId() == $id;
            });

            $aux = array_values($aux);

            return (count($aux) > 0 ) ? $aux[0] : null;
        }

        private function SaveData() {
            sort($this->invoiceCategoryList);
            $arrayEncode = array();

            foreach($this->invoiceCategoryList as $invoiceCategory) {
                $value["invoiceCategoryId"] = $invoiceCategory->getId();
                $value["description"] = $invoiceCategory->getDescription();
                $value["active"] = $invoiceCategory->getActive();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
             $this->invoiceCategoryList = array();

             if(file_exists($this->fileName))
             {
                 $jsonContent = file_get_contents($this->fileName);
                 $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                 
                 foreach($arrayDecode as $value) {
                    $invoiceCategory = new InvoiceCategory();
                    $invoiceCategory->setId($value["invoiceCategoryId"]);
                    $invoiceCategory->setDescription($value["description"]);
                    $invoiceCategory->setActive($value["active"]);

                    array_push($this->invoiceCategoryList, $invoiceCategory);
                 }
             }
        }
        public function Exist($id) {
            $rta = null;
            $this->RetrieveData();

            foreach($this->invoiceCategoryList as $invoiceCategory) {
                if($invoiceCategory->getId() == $id) {
                    $rta = $invoiceCategory;
                }
            }
            return $rta;
        }
    }
?>