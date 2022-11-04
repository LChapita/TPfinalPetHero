<?php

namespace SQL;

use SQL\IOwnerSQL as IOwnerSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\User as User;
use Models\Owner as Owner;


class OwnerSQL implements IOwnerSQL{
    public function Add(User $user, Owner $owner)
    {
        try 
        {
            $query="CALL Owner_Add(?,?,?,?,?,?)";

            $parameters["email"]=$user->getEmail();
            $parameters["password"]=$user->getPassword();
            $parameters["id_Owner"]=$owner->getId();

            $parameters["name"]=$owner->getName();
            $parameters["surname"]=$owner->getSurName();
            $parameters["dni"]=$owner->getDni();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);

        }catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetAll()
    {
        
    }
}

?>