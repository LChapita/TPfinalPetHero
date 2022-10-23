<?php

    namespace Models;

    class Pet {
        private $foto;
        private $id;
        private $ownerID;
        private $name;
        private $vaccinationSchedule;
        private $raza;
        private $video;

        public function getFoto()
        {
                return $this->foto;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setFoto($foto)
        {
                $this->foto = $foto;

                return $this;
        }

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
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
       public function setName($name){
             $this->name=$name;
             return $this;
 

       }

        /**
         * Get the value of dueDate
         */ 
        public function getVaccinationSchedule()
        {
                return $this->vaccinationSchedule;
        }

        /**
         * Set the value of dueDate
         *
         * @return  self
         */ 
        public function setVaccinationSchedule($vaccinationSchedule)
        {
                $this->vaccinationSchedule = $vaccinationSchedule ;

                return $this;
        }

        /**
         * Get the value of payed
         */ 
        public function getVideo()
        {
                return $this->video;
        }

        /**
         * Set the value of payed
         *
         * @return  self
         */ 
        public function setVideo($video)
        {
                $this->video = $video;

                return $this;
        }
    }
?>