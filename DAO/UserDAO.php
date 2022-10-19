<?php

namespace DAO;

use DAO\IUserDAO as IUserDAO;
use Models\User as User;

class UserDAO implements IUserDAO{
    private $fileName = ROOT . "Data/users.json";
    private $userList = array();
    
    private function RetrieveData(){

    }
    private function SaveData()
    {
        
    }
    public function Add($user)
    {
        $this->RetrieveData();

        $user->setId($this->GetNextId());

        array_push($this->userList, $user);

        $this->SaveData();
    }
    public function GetAll()
    {
        
    }


    private function GetNextId()
    {
        $id = 0;
        foreach ($this->invoiceList as $invoice) {
            $id = ($invoice->getId() > $id) ? $invoice->getId() : $id;
        }
        return $id + 1;
    }
}

?>