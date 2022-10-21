<?php
    namespace Controllers;

    use DAO\InvoiceDAO;

    class HomeController
    {
        public function Index($message = "") {
            require_once(VIEWS_PATH."index.php");
        }

        public function ShowListView($message = "") {
            require_once(VIEWS_PATH . "validate-session.php");
            $invoiceDAO = new InvoiceDAO();
            $invoiceList = $invoiceDAO->GetAll();
            require_once(VIEWS_PATH . "invoice-list.php");
        }

        public function Login($email, $password) {
            require_once(VIEWS_PATH . "validate-session.php");

            if($email=== "user@myapp.com") {
                if($password === "123456") {
                    $user = array();
                    $user["email"] = $email;
                    $user["password"] = $password;

                    $_SESSION["loggedUser"] = $user;

                    $this->ShowListView();
                  /* $this->ShowAddView();*/
            }
        }
    }
        public function Logout() {
            session_destroy();

            $this->Index();
        }
    
    }
?>