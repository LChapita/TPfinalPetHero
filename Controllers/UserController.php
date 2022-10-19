<?php
    namespace Controllers;
    
    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\Owner as Owner;
    use Models\Keeper as Keeper; 

    class UserController
    {
        private $userDAO;
        
        public function NewUser($email,$password,$typeuser){
            if($_REQUEST["typeuser"]=="Owner"){
                $this->NewUserOwner($email,$password);
            }else{
                $this->NewUserKeeper($email, $password);
            }
        }
        public function NewUserOwner($email, $password)
        {
            require_once(VIEWS_PATH."new-owner.php");
            $this->Register($email,$password,$name,$lastname,$dni);
        }

        public function NewUserKeeper(){
            require_once(VIEWS_PATH . "new-keeper.php");
        }
        public function RegisterOwner($email,$password,$name,$lastname,$dni){
            $user=new User();
            $user->setEmail($email);
            $user->setPassword($password);
            
            $owner=new Owner();
            $owner->setName($name);
            $owner->setSurName($lastname);
            $owner->setDni($dni);
        }        
    }
?>