<?php

namespace SQL;

use SQL\IKeeperSQL as IKeeperSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\User as User;
use Models\Keeper as Keeper;

class KeeperSQL implements IKeeperSQL{
    private $connection;
    private $tableName = "keeper";

    public function Add(User $user, Keeper $keeper)
    {
        
        try {
            $query = "CALL Keeper_Add(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $parameters["email"]=$user->getEmail();
            $parameters["password"]=$user->getPassword();

            $parameters["id_Keeper"]=$keeper->getId();

            $parameters["name"]=$keeper->getName();
            $parameters["lastname"] = $keeper->getLastname();
            $parameters["photo"] = $keeper->getPhoto();
            $parameters["dni"] = $keeper->getDNI();
            $parameters["tuition"] = $keeper->getTuition();
            $parameters["sizepet"] = $keeper->getSizePet();
            $parameters["price"] = $keeper->getPrice();
            $parameters["sex"] = $keeper->getSex();
            $parameters["age"] = $keeper->getAge();
            $parameters["dateStart"] = $keeper->getDateStart();
            $parameters["dateFinish"] = $keeper->getDateFinish();
            

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetAll()
    {
        try {
            //$reservList = array();
            $keeperList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row) {
                /*
                $reserv = new Reserv();
                $reserv->setIdReserv($row["idReserv"]);
                $reserv->setIdOwner($row["idOwner"]);
                $reserv->setIdKeeper($row["idKeeper"]);

                $reserv->setDateStart($row["dateStart"]);
                $reserv->setDateFinish($row["dateFinish"]);

                array_push($reservList, $reserv);
                */
                /*
                $user = new User();
                $user->setEmail($row["email"]);
                $user->setPassword($row["password"]);
                $user->setId($row["id"]);

                $keeper=new Keeper();

                $keeper->setKeeper($row["typeuser"]["type"]);
                $keeper->setId($row["typeuser"]["id"]);

                $keeper->setName($row["typeuser"]["name"]);
                $keeper->setLastname($row["typeuser"]["lastname"]);
                $keeper->setPhoto($row["typeuser"]["photo"]);
                $keeper->setDNI($row["typeuser"]["dni"]);
                $keeper->setTuition($row["typeuser"]["tuition"]);
                $keeper->setSizePet($row["typeuser"]["sizepet"]);
                $keeper->setPrice($row["typeuser"]["price"]);
                $keeper->setSex($row["typeuser"]["sex"]);
                $keeper->setAge($row["typeuser"]["age"]);
                $keeper->setDateStart($row["typeuser"]["dateStart"]);
                $keeper->setDateFinish($row["typeuser"]["dateFinish"]);

                $user->setTypeUserKeeper($keeper);
                array_push($keeperList,$user);
                */
            }


            //return $reservList;
            return $keeperList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
?>