<?php

    namespace Controllers;

    use DAO\userDAO;
    use Models\Keeper;

    class KeeperController {
        private $userDAO;

        public function __construct() {
            $this->userDAO = new userDAO();
        }

    
        public function ShowModifyView($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeper = $this->userDAO->GetById($id);
            require_once(VIEWS_PATH . "modify-keeper.php");
        }

  

        public function Modify($id, $code, $brand, $model, $price) {
            $keeper = new Keeper();

            $keeper->setName($name);
            $keeper->setLastname($lastname);
            $keeper->setPhoto($photo);
            $keeper->setDNI($DNI);
            $keeper->setSex($sex);
            $keeper->setAge($age);
            $keeper->(intval($id));
            $keeper->setKeeper($keeper);


            $this->userDAO->Modify($keeper);

            $this->ShowListView();
        }
    }
?>