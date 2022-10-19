<?php

namespace Models;

class User{
    private $email;
    private $password;
    private $id;
    private $typeUser;
    //private $user;

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
     
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

    }
    public function getTypeUser()
    {
        return $this->typeUser;
    }
    public function setTypeUser($typeUser)
    {
        $this->typeUser = $typeUser;
    }
   
}
?>