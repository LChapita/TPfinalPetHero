<?php

    namespace Controllers;

    use DAO\petDAO ;
    use DAO\ownerDAO ;
    use models\Pet as Pet;
    use models\Owner;
    class invoiceController {
        private $petDAO ;
        
        public function __construct() {
            $this->petDAO  = new petDAO ();
        }


    

        public function ShowListView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            $petDAO  = new petDAO ();
            $petList = $petDAO->GetAll();
            require_once(VIEWS_PATH . "pet-list.php");
        }
     
        public function Remove($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $petDAO = new petDAO();

            if($id != null) {
                $Pet = $petDAO ->GetById($id);
                if($Pet->getVideo()) {
                    $petDAO ->Remove($id);

                    $this->ShowListView();
              
                } else {
                    $this->ShowListView("El id no existe");
                }
            }
        }

            
        public function Add($id,$ownerID,$raza,$name,$vaccinationSchedule,$foto,$video) {
            require_once(VIEWS_PATH . "validate-session.php");
           
                $ownerDAO = new ownerDAO();
            $type = $ownerDAO->Exist(intval($ownerID));
            if($type) {
            $Pet = new Pet();
       
            $Pet->setId($id);
            $Pet->setOwnerId($ownerID);
            $Pet->setRaza($raza);
            $Pet->setName($name);
            $Pet->setVaccinationSchedule($vaccinationSchedule);
            $Pet->setFoto($foto);
            $Pet->setVideo($video);

           
                $this->petDAO ->Add($Pet);
                $this->ShowListView();
            
        }else {
            $this->ShowListView("El owner  ingresado no existe");
        }
        }

    }
?>