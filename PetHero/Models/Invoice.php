<?php

    namespace Models;

    class Invoice {
        private $id;
        private $invoiceCategoryId;
        private $number;
        private $amount;
        private $dueDate;
        private $payed;

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of invoiceCategoryId
         */ 
        public function getInvoiceCategoryId()
        {
                return $this->invoiceCategoryId;
        }

        /**
         * Set the value of invoiceCategoryId
         *
         * @return  self
         */ 
        public function setInvoiceCategoryId($invoiceCategoryId)
        {
                $this->invoiceCategoryId = $invoiceCategoryId;

                return $this;
        }

        /**
         * Get the value of number
         */ 
        public function getNumber()
        {
                return $this->number;
        }

        /**
         * Set the value of number
         *
         * @return  self
         */ 
        public function setNumber($number)
        {
                $this->number = $number;

                return $this;
        }

        /**
         * Get the value of amount
         */ 
        public function getAmount()
        {
                return $this->amount;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
       public function setAmount($amount){
             $this->amount=$amount;
             return $this;
 

       }

        /**
         * Get the value of dueDate
         */ 
        public function getDueDate()
        {
                return $this->dueDate;
        }

        /**
         * Set the value of dueDate
         *
         * @return  self
         */ 
        public function setDueDate($dueDate)
        {
                $this->dueDate = $dueDate;

                return $this;
        }

        /**
         * Get the value of payed
         */ 
        public function getPayed()
        {
                return $this->payed;
        }

        /**
         * Set the value of payed
         *
         * @return  self
         */ 
        public function setPayed($payed)
        {
                $this->payed = $payed;

                return $this;
        }
    }
?>