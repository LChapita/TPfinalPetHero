<?php

    namespace Controllers;

    use DAO\CellphoneDAO;
    use Models\CellPhone;

    class CellphoneController {
        private $cellphoneDAO;

        public function __construct() {
            $this->cellphoneDAO = new CellphoneDAO();
        }

    
        public function ShowModifyView($id) {
            require_once(VIEWS_PATH . "validate-session.php");
            $cellphone = $this->cellphoneDAO->GetById($id);
            require_once(VIEWS_PATH . "modify-cellphone.php");
        }

  

        public function Modify($id, $code, $brand, $model, $price) {
            $cellphone = new CellPhone();

            $cellphone->setId(intval($id));
            $cellphone->setCode($code);
            $cellphone->setBrand($brand);
            $cellphone->setModel($model);
            $cellphone->setPrice($price);

            $this->cellphoneDAO->Modify($cellphone);

            $this->ShowListView();
        }
    }
?>