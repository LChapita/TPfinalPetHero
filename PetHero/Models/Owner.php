<?php

    namespace Models;

    class Owner {
        private $petList=array();
        private $id;
        private $name;
        private $surname;
        private $dni;
        private $active;

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
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of dname
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
        public function getSurname()
        {
                return $this->surname;
        }

        /**
         * Set the value of dname
         *
         * @return  self
         */ 
        public function setSurname($surname)
        {
                $this->surname = $surname;

                return $this;
        }
        public function getDnie()
        {
                return $this->dni;
        }

        /**
         * Set the value of dname
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni= $dni;

                return $this;
        }
        /**
         * Get the value of active
         */ 
        public function getActive()
        {
                return $this->active;
        }

        /**
         * Set the value of active
         *
         * @return  self
         */ 
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    }
?>