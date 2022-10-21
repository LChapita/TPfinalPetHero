<?php
    namespace Controllers;


    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    
    class HomeController
    {
        private $userDAO;
        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }
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
        public function EnterUser($email,$password){
            $user =$this->userDAO->getByEmail($email);

            if(($user != null)&&($user->getPassword()==$password))
            {
                $_SESSION["loggedUser"]=true;
                require_once(VIEWS_PATH . "formmascota.php");
            } else
            $this->Index("Usuario y/o Contraseña incorrectos");
        }
        

    }
?>