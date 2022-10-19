<?php
    namespace DAO;

    use DAO\IInvoiceDAO as IInvoiceDAO;
    use Models\Invoice as Invoice;

    class InvoiceDAO implements IInvoiceDAO {
        private $fileName = ROOT."Data/Invoices.json";
        private $invoiceList = array();

        public function GetAll() {
            $this->RetrieveData();
            return $this->invoiceList;
        }

        public function Remove($id) {
            $this->RetrieveData();

            $this->invoiceList = array_filter($this->invoiceList, function($invoice) use($id) {
                return $invoice->getId() != $id;
            });

            $this->SaveData();
        }
        public function Add($invoice) {
            $this->RetrieveData();

            $invoice->setId($this->GetNextId());

            array_push($this->invoiceList, $invoice);
            
            $this->SaveData();
        }


        public function GetById($id) {
            $this->RetrieveData();

            $aux = array_filter($this->invoiceList, function($invoice) use($id) {
                return $invoice->getId() == $id;
            });

            $aux = array_values($aux);

            return (count($aux) > 0 ) ? $aux[0] : null;
        }

        private function SaveData() {
            sort($this->invoiceList);
            $arrayEncode = array();

            foreach($this->invoiceList as $invoice) {
                $value["invoiceId"] = $invoice->getId();
                $value["invoiceCategoryId"] = $invoice->getInvoiceCategoryId();
                $value["number"] = $invoice->getNumber();
                $value["amount"] = $invoice->getAmount();
                $value["dueDate"] = $invoice->getDueDate();
                $value["payed"] = $invoice->getPayed();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
             $this->invoiceList = array();

             if(file_exists($this->fileName))
             {
                 $jsonContent = file_get_contents($this->fileName);
                 $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                 
                 foreach($arrayDecode as $value) {
                    $invoice = new Invoice();
                    $invoice->setId($value["invoiceId"]);
                    $invoice->setInvoiceCategoryId($value["invoiceCategoryId"]);
                    $invoice->setNumber($value["number"]);
                    $invoice->setAmount($value["amount"]);
                    $invoice->setDueDate($value["dueDate"]);
                    $invoice->setPayed($value["payed"]);

                    array_push($this->invoiceList, $invoice);
                 }
             }
        }

        private function GetNextId() { 
            $id = 0;
            foreach($this->invoiceList as $invoice) {
                $id = ($invoice->getId() > $id) ? $invoice->getId() : $id;
            }
            return $id + 1;
        }
    }

    