<?php
    namespace Controllers;

    use DAO\PetDAO as PetDAO;
    use Models\Owner as Owner;
    use Models\Pet;
    use Models\User as User;

    class PetController
    {
        private $petDAO;
        private $dueñoPet;

        public function __construct()
        {
            $this->petDAO = new PetDAO();
            $this->dueñoPet=new Owner();
        }

        
        public function newPet(){
            
            $userArr=new User();

            $userArr=$_SESSION;
            
            foreach($userArr as $user){
                $this->setDueñoPet($user->getTypeUserOwner());
            }
            //var_dump($this->getDueñoPet());
            require_once(VIEWS_PATH . "formmascota.php");
        }

        public function RegisterPet($foto,$name, $vaccinationschendle,$raza,$video)
        {   

            $pet=new Pet();
            $pet->setFoto($foto);
            $pet->setName($name);
            $pet->setVaccinationSchedule($vaccinationschendle);    
            $pet->setRaza($raza);
            $pet->setVideo($video);
            
            $dueño= new Owner();
            /*
            $dueño->setOwner($this->dueñoPet->getOwner());
            $dueño->setId($this->dueñoPet->getId());
            $dueño->setName($this->dueñoPet->getName());
            $dueño->setSurName($this->dueñoPet->getSurName());
            $dueño->setDni($this->dueñoPet->getDni());
            */
            
            $this->petDAO->AddPet($pet, $dueño);
            
            $this->newPet();
        }

        public function getDueñoPet()
        {
                return $this->dueñoPet;
        }
        public function setDueñoPet(Owner $dueñoPet)
        {
                $this->dueñoPet = $dueñoPet;
        }
        public function getOwnerSession($user){

            foreach($user as $content){
                $owner= new Owner();

            }
        }
    }

?>