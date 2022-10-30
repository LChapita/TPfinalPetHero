<?php
    namespace Controllers;

    use DAO\PetDAO as PetDAO;
    use Models\Owner as Owner;
    use Models\Pet;
    use Models\User as User;

    class PetController
    {
        private $petDAO;

        public function __construct()
        {
            $this->petDAO = new PetDAO();
        }

        public function RegisterPet($name,$race,$vaccinationschendle,$photo,$video)
        {

            $userArr = new User();

            $userArr = $_SESSION;
            foreach ($userArr as $user) {
                
                $owner= new Owner();
    
                $owner->setOwner($user->getTypeUserOwner()->getOwner());
                $owner->setId($user->getTypeUserOwner()->getId());
                $owner->setName($user->getTypeUserOwner()->getName());
                $owner->setSurName($user->getTypeUserOwner()->getSurName());
                $owner->setDni($user->getTypeUserOwner()->getDni());
            }

            //var_dump($owner);

            $pet=new Pet();
            
            $pet->setName($name);
            $pet->setRaza($race);
            $pet->setVaccinationSchedule($vaccinationschendle);    
            $pet->setFoto($photo);
            $pet->setVideo($video);

            $pet->setOwnerID($owner->getId());
            
            $pet->setOwneR($owner);

            
            $this->petDAO->Add($pet);

            $this->ShowView();
        }
        
        public function ShowView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "owners/pet-list.php");
        }
        public function ShowAdd($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "owners/add-pet.php");
            require_once(VIEWS_PATH . "owners/pet-list.php");
        }
        
    }

?>