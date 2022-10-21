<?php

    namespace Models;

    class Pet {
        private $id;
        private $ownerID;
        private $raza;
        private $tamaño;
        private $observaciones;
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
         * Get the value of OwnerID
         */ 
        public function getOwnerID()
        {
                return $this->ownerID;
        }

        /**
         * Set the value of invoiceCategoryId
         *
         * @return  self
         */ 
        public function setOwnerID($ownerID)
        {
                $this->ownerID = $ownerID;

                return $this;
        }

        /**
         * Get the value of number
         */ 
        public function getRaza()
        {
                return $this->raza;
        }

        /**
         * Set the value of number
         *
         * @return  self
         */ 
        public function setRaza($raza)
        {
                $this->raza = $raza;

                return $this;
        }

        /**
         * Get the value of amount
         */ 
        public function getTamaño()
        {
                return $this->tamaño;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
       public function setTamaño($tamaño){
             $this->tamaño=$tamaño;
             return $this;
 

       }

        /**
         * Get the value of dueDate
         */ 
        public function getObservations()
        {
                return $this->observaciones;
        }

        /**
         * Set the value of dueDate
         *
         * @return  self
         */ 
        public function setObservations($observaciones)
        {
                $this->observaciones = $observaciones ;

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