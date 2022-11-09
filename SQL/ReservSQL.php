<?php

namespace SQL;

use SQL\IReservSQL as IReservSQL;
use SQL\Connection as Connection;
use \Exception as Exception;
use Models\Reserv as Reserv;

class ReservSQL implements IReservSQL{
    private $connection;
    private $tableName="reserv";

    public function Add(Reserv $reserv)
    {
        try
        {
            $query = "CALL Reserv_Add(?, ?, ?, ?, ?)";

            $parameters["id_Reserv"] = $reserv->getIdReserv();
            $parameters["id_Pet"] = $reserv->getIdPet();
            $parameters["id_Keeper"] = $reserv->getIdKeeper();
            $parameters["dateStart"] = $reserv->getDateStart();
            $parameters["dateFinish"] = $reserv->getDateFinish();

            $this->connection=Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);

            
        }catch(Exception $ex){
            throw $ex;
        }
    }
    
    public function GetAll()
    {
        try{
            $reservList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row)
            {                
                $reserv = new Reserv();
                $reserv->setIdReserv($row["id_Reserv"]);
                $reserv->setIdPet($row["id_Pet"]);
                $reserv->setIdKeeper($row["id_Keeper"]);
                
                $reserv->setDateStart($row["dateStart"]);
                $reserv->setDateFinish($row["dateFinish"]);

                $reserv->setConfirm($row["confirm"]);
                
                array_push($reservList, $reserv);
                }

                
                return $reservList;
         }
        catch(Exception $ex)
        {
                throw $ex;
        }
    
    }
    public function GetPetbyId($id)
    {
        try{
            $reservList = array();

            $query = "SELECT * FROM " . $this->tableName ."WHERE id_Pet=".$id;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

             foreach ($resultSet as $row)
                {                
                    $reserv = new Reserv();
                    $reserv->setIdReserv($row["id_Reserv"]);
                    $reserv->setIdReserv($row["id_Pet"]);
                    $reserv->setIdReserv($row["id_Keeper"]);

                    $reserv->setIdReserv($row["dateStart"]);
                    $reserv->setIdReserv($row["dateFinish"]);

                    array_push($reservList, $reserv);
                }

                return $reservList;
        
         }
        catch(Exception $ex)
        {
                throw $ex;
        }
    
    }
    public function GetReservbyId($id_Reserv)
    {
        try {
            $reservList = array();

            $query = "SELECT * FROM " . $this->tableName . "WHERE id_Reserv=" . $id_Reserv;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $reserv = new Reserv();
                $reserv->setIdReserv($row["id_Reserv"]);
                $reserv->setIdPet($row["id_Pet"]);
                $reserv->setIdKeeper($row["id_Keeper"]);

                $reserv->setDateStart($row["dateStart"]);
                $reserv->setDateFinish($row["dateFinish"]);

                $reserv->setConfirm($row["confirm"]);

                //array_push($reservList, $reserv);
            }

            return $reserv;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetReservbyIdKeeper($idKeeper)
    {
        try {
            $reservList = array();

            $query = "SELECT * FROM " . $this->tableName
            . " WHERE id_Keeper=" . "'" . $idKeeper . "'";
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $reserv = new Reserv();
                $reserv->setIdReserv($row["id_Reserv"]);
                $reserv->setIdPet($row["id_Pet"]);
                $reserv->setIdKeeper($row["id_Keeper"]);

                $reserv->setDateStart($row["dateStart"]);
                $reserv->setDateFinish($row["dateFinish"]);

                $reserv->setConfirm($row["confirm"]);

                array_push($reservList, $reserv);
            }
            //var_dump($reservList);
            return $reservList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function Confirm(Reserv $reserv,$id_Reserv)
    {
        try {
            $query = "CALL Reserv_Confirm(?,?)";

            $parameters["confirm"] = $reserv->getConfirm();
            $parameters["id_Reserv"] = $id_Reserv;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
