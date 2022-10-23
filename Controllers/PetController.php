<?php
    namespace Controllers;

    use DAO\PetDAO as PetDAO;
    use Models\User as User;
    use Models\Owner as Owner;
use Models\Pet;

    class HomeController
    {
        private $petDAO;
        private $owner;

        public function __construct()
        {
            $this->petDAO = new PetDAO();
        }
        public function RegisterPet($user,$foto,$name, $vaccinationschendle,$raza,$video)
        {   
            $pet=new Pet();
            $pet->setFoto($foto);
            $pet->setName($name);
            $pet->setVaccinationSchedule($vaccinationschendle);    
            $pet->setRaza($raza);
            $pet->setVideo($video);

            $owner= new Owner();
            $owner->setOwner($user->getTypeUserOwner()->getOwner());
            $owner->setId($user->getTypeUserOwner()->getId());
            $owner->setName($user->getTypeUserOwner()->getName());
            $owner->setSurName($user->getTypeUserOwner()->getSurName());
            $owner->setDni($user->getTypeUserOwner()->getDni());
            
            $this->petDAO->AddPet($pet,$owner);

        }
    }

?>