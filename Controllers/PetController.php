<?php
    namespace Controllers;

    use DAO\PetDAO as PetDAO;
    use SQL\PetSQL as PetSQL;
    use Models\Owner as Owner;
    use Models\Pet as Pet;
    use Models\User as User;

    class PetController
    {
        private $petDAO;
        private $petSQL;
        public function __construct()
        {
            //$this->petDAO = new PetDAO();
            $this->petSQL = new PetSQL();
        }

        public function RegisterPet($name,$race,$vaccinationschendle,$photo,$video,$sizePet)
        {
            require_once(VIEWS_PATH . "validate-session.php");
            $userArr = new User();
            
            $userArr = $_SESSION;
        /*
            foreach ($userArr as $user) {
                
                $owner= new Owner();
                
                //$owner->setOwner($user->getTypeUserOwner()->getOwner());
                $owner->setId($user->getTypeUserOwner()->getId());
                $owner->setName($user->getTypeUserOwner()->getName());
                $owner->setSurName($user->getTypeUserOwner()->getSurName());
                $owner->setDni($user->getTypeUserOwner()->getDni());
            }
            */
            foreach ($userArr as $user) {
                $owner = new Owner();
                $owner->setId($user->getId());
            }
            //var_dump($userArr);
            //var_dump($owner);
        
            
            $pet=new Pet();
            
            $pet->setName($name);
            $pet->setRace($race);
            $pet->setVaccinationSchedule($vaccinationschendle);    
            $pet->setPhoto($photo);
            $pet->setVideo($video);
            
            if ($_REQUEST["sizePet"] == "small") {
                $pet->setSizePet($sizePet);
            } elseif ($_REQUEST["sizePet"] == "medium") {
                $pet->setSizePet($sizePet);
            } else {
                $pet->setSizePet($sizePet);
            }
            
            $pet->setOwnerID($owner->getId());
            
            $pet->setOwneR($owner);

            
            //$this->petDAO->Add($pet);
            $this->petSQL->Add($owner,$pet);
            echo "<script>alert('se agrego correctamente')</script>";
            //$this->ShowView();
            //$this->ShowAdd();
            $this->GoMyProfile();
        }
        
        public function ShowView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "owners/pet-list.php");
        }
        public function ShowAdd($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            require_once(VIEWS_PATH . "owners/add-pet.php");
            
            //require_once(VIEWS_PATH . "owners/pet-list.php");
        }
        public function GoMyProfile(){
             require_once(VIEWS_PATH . "owners/menu-owner.php");
        }
    }

?>