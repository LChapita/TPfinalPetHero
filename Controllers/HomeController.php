<?php
    namespace Controllers;


    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\Owner as Owner;
    
    use Controllers\OwnerController as OwnerController;
    use Controllers\KeeperController as KeeperController;
    class HomeController
    {
        private $userDAO;
        private $ownerP;

        private $isOwner;
        private $isKeeper;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->isOwner=new User();
            $this->isKeeper=new User();
        }
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }
        public function GoFirstPage(){
            header('Location:../index.php');
        }
        
        //validacion

        public function EnterUser($email,$password){
            $user =$this->userDAO->getByEmail($email);

            $keeper=$this->userDAO->getByEmail2($email);

            if((($user != null)&&($user->getPassword()==$password)) && (($keeper != null) && ($keeper->getPassword() == $password)))
            {
            ///validar si es keeper o owner
                $this->isOwner=$user;
                $this->isKeeper=$keeper;
                $this->OwnerOrKeeper();
            } 
            else{
                if(($user != null) && ($user->getPassword() == $password)){
                    $user = $this->userDAO->getByEmail($email);
                    $_SESSION["loggedUser"] = $user;

                    $owner = new Owner();
                    $owner->setOwner($user->getTypeUserOwner()->getOwner());
                    $owner->setId($user->getTypeUserOwner()->getId());
                    $owner->setName($user->getTypeUserOwner()->getName());
                    $owner->setSurName($user->getTypeUserOwner()->getSurName());
                    $owner->setDni($user->getTypeUserOwner()->getDni());

                    $this->InLogin("Welcome", $owner);
                }
                else
                {
                    if(($keeper!=null)&&($keeper->getPassword()==$password)){
                        $keeper = $this->userDAO->getByEmail2($email);
                        $_SESSION["loggedUser"] = $keeper;
                        $this->InKeeper("Welcome", $keeper);
                    }else
                    {
                        echo "<script> alert('error'); </script>";
                        $this->Index();
                    }
                }
            }
        }
        
        public function OwnerOrKeeper(){
            require_once(VIEWS_PATH."orsetuser.php");
        }

        public function itsOwner($email){
            $user = $this->userDAO->getByEmail($email);
            $_SESSION["loggedUser"] = $user;
            //$user=$_SESSION["loggedUser"];
            
            $owner= new Owner();
            $owner->setOwner($user->getTypeUserOwner()->getOwner());
            $owner->setId($user->getTypeUserOwner()->getId());
            $owner->setName($user->getTypeUserOwner()->getName());
            $owner->setSurName($user->getTypeUserOwner()->getSurName());
            $owner->setDni($user->getTypeUserOwner()->getDni());
               
            $this->InLogin("Welcome",$owner);
        }

        public function itsKeeper($email){
            $keeper = $this->userDAO->getByEmail2($email);
            $_SESSION["loggedUser"] = $keeper;
            $this->InKeeper("Welcome",$keeper);
        }

        ///logueado y menu owner
        public function InLogin($message = "",$owner) {
            require_once(VIEWS_PATH . "validate-session.php");
            
            $dueño=new OwnerController();
            $dueño->setDueñoOwner($owner);
            $dueño->MenuOwner();
        }
        /// login de keeper
        public function InKeeper($message = "",$keeper) {
            require_once(VIEWS_PATH . "validate-session.php");
            $keeperM=new KeeperController();
            $keeperM->setKeeper($keeper);
            $keeperM->MenuKeeper();
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