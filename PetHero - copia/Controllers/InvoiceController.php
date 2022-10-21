<?php

    namespace Controllers;

    use DAO\InvoiceDAO;
    use DAO\InvoiceCategoryDAO;
    use models\Invoice as Invoice;
    use models\InvoiceCategory;
    class InvoiceController {
        private $InvoiceDAO;
        
        public function __construct() {
            $this->invoiceDAO = new invoiceDAO();
        }


    

        public function ShowListView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            $invoiceDAO = new InvoiceDAO();
            $invoiceList = $invoiceDAO->GetAll();
            require_once(VIEWS_PATH . "invoice-list.php");
        }
     
        public function Remove($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $invoiceDAO = new InvoiceDAO();

            if($id != null) {
                $invoice = $invoiceDAO->GetById($id);
                if($invoice->getPayed()) {
                    $invoiceDAO->Remove($id);

                    $this->ShowListView();
              
                } else {
                    $this->ShowListView("La factura que intenta eliminar aun no esta paga");
                }
            }
        }

            
        public function Add($id,$invoiceCategoryId,$number,$amount,$dueDate,$payed) {
            require_once(VIEWS_PATH . "validate-session.php");
           
                $invoiceCategoryDAO = new InvoiceCategoryDAO();
            $type = $invoiceCategoryDAO->Exist(intval($invoiceCategoryId));
            if($type) {
            $invoice = new Invoice();
                $invoice->setId($id);
                $invoice->setInvoiceCategoryId($invoiceCategoryId);
                $invoice->setNumber($number);
                $invoice->setAmount($amount);
                $invoice->setDueDate($dueDate);
                $invoice->setPayed($payed);

       
                $this->invoiceDAO->Add($invoice);
                $this->ShowListView();
            
        }else {
            $this->ShowListView("El tipo de cerveza ingresado no existe");
        }
        }

    }
?>