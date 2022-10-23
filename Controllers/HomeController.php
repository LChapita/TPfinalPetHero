<?php
    namespace Controllers;


    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\Owner as Owner;
    
    use Controllers\OwnerController as OwnerController;

    class HomeController
    {
        private $userDAO;
        private $ownerP;
        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }
        public function GoFirstPage(){
            header('Location:../index.php');
        }
        
        
        public function EnterUser($email,$password){
            $user =$this->userDAO->getByEmail($email);
            
            if(($user != null)&&($user->getPassword()==$password))
            {
                $_SESSION["loggedUser"]=$user;
                
                $owner= new Owner();
                $owner->setOwner($user->getTypeUserOwner()->getOwner());
                $owner->setId($user->getTypeUserOwner()->getId());
                $owner->setName($user->getTypeUserOwner()->getName());
                $owner->setSurName($user->getTypeUserOwner()->getSurName());
                $owner->setDni($user->getTypeUserOwner()->getDni());
                
                $this->InLogin("Welcome",$owner);
                
                //require_once(VIEWS_PATH . "formmascota.php");
            } else
            $this->Index("Usuario y/o Contraseña incorrectos");
        }
        
        
        public function InLogin($message = "",$owner) {
            require_once(VIEWS_PATH . "validate-session.php");
            $dueño=new OwnerController();
            $dueño->setDueñoOwner($owner);
            $dueño->MenuOwner();
        }
                    
        //botones de registro o login
        public function LogIn(){
            require_once(VIEWS_PATH."index.php");
        }
        
        public function SignIn(){
            require_once(VIEWS_PATH."user-add.php");
        }
        
        public function Logout()
        {
            require_once(VIEWS_PATH."logout.php");
        } 
    }
?>