<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        } 
        
        public function Logout()
        {
            require_once(VIEWS_PATH."logout.php");
        } 

        public function LogIn(){
            require_once(VIEWS_PATH."index.php");
        }
        public function SignIn(){
            require_once(VIEWS_PATH."user-add.php");
        }
        public function EnterUser($userName,$password){
            if($userName=="m" && $password == '123'){
                $_SESSION["loggedUser"]=true;
                require_once(VIEWS_PATH."user-add.php");
            } else
            $this->Index("Usuario y/o Contraseña incorrectos");
        }
    }
?>