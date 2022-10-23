<?php
    namespace Controllers;
    
    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\Owner as Owner;
    use Models\Keeper as Keeper; 

    class UserController
    {
        private $userDAO;
        private $aux;

        private $owner;
        private $keeper;

        public function __construct()
        {
            $this->userDAO=new UserDAO();
            $this->aux= new User();
            
        }
        
        public function NewUser($email,$password){
            if($_REQUEST["typeuser"]=="Owner"){
                $this->aux->setEmail($email);
                $this->aux->setPassword($password);
                $this->NewUserOwner($email);
                
            }
        }
        public function NewUserOwner($email)
        {
            require_once(VIEWS_PATH."new-owner.php");
            
        }
        
        public function RegisterOwner($email,$password,$name,$lastname,$dni){
            $user=new User();

            $user->setEmail($email);
            $user->setPassword($password);

            $owner=new Owner();
            $owner->setOwner("Owner");
            $owner->setName($name);
            $owner->setSurName($lastname);
            $owner->setDni($dni);

            $this->userDAO->AddOwner($user,$owner);


            $this->GoHome();
        }

        public function GoHome()
        {
            header('Location:'.FRONT_ROOT. 'Home/GoFirstPage');
        }
        
    }
?>