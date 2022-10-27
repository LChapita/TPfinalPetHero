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
                $this->NewUserOwner();
                
            }else{
                $this->aux->setEmail($email);
                $this->aux->setPassword($password);
                $this->NewUserKeeper();
            }
        }

        //Owners
        public function NewUserOwner()
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
        //Keepers
        public function NewUserKeeper()
        {
            require_once(VIEWS_PATH."new-keeper.php");
            
        }
        
        public function RegisterKeeper($email,$password,$name,$lastname,$photo,$dni, $tuition,$sex,$age){
            $user=new User();

            $user->setEmail($email);
            $user->setPassword($password);

            $keeper=new Keeper();
            
            $keeper->setKeeper("Keeper");

            $keeper->setName($name);
            $keeper->setLastname($lastname);
            $keeper->setPhoto($photo);
            $keeper->setDNI($dni);

            $keeper->setTuition($tuition);

            if($_REQUEST["sex"]=="Female"){
                $keeper->setSex($sex);
            }elseif($_REQUEST["sex"] == "Male"){
                $keeper->setSex($sex);
            }else{
                $keeper->setSex($sex);
            }
            
            if($_REQUEST["age"]>17){
                $keeper->setAge($age);
            }else{
                $keeper->setAge($age);
            }

            $this->userDAO->AddKeeper($user,$keeper);

            $this->GoHome();
        }

        public function ShowAllKeepers($message = "")
        {
            require_once(VIEWS_PATH . "keeper-list.php");
        }
        

        public function GoHome()
        {
            header('Location:'.FRONT_ROOT. 'Home/GoFirstPage');
        }
        
    }
?>