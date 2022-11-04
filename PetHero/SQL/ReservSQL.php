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

            $parameters["idReserv"] = $reserv->getIdReserv();
            $parameters["idOwner"] = $reserv->getIdOwner();
            $parameters["idKeeper"] = $reserv->getIdKeeper();
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
                $reserv->setIdReserv($row["idReserv"]);
                $reserv->setIdOwner($row["idOwner"]);
                $reserv->setIdKeeper($row["idKeeper"]);
                
                $reserv->setDateStart($row["dateStart"]);
                $reserv->setDateFinish($row["dateFinish"]);
                
                array_push($reservList, $reserv);
                }

                
                return $reservList;
         }
        catch(Exception $ex)
        {
                throw $ex;
        }
    
    }
    public function GetOwnerbyId($id)
    {
        try{
            $reservList = array();

            $query = "SELECT * FROM " . $this->tableName ."WHERE idOwner=".$id;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

             foreach ($resultSet as $row)
                {                
                    $reserv = new Reserv();
                    $reserv->setIdReserv($row["idReserv"]);
                    $reserv->setIdReserv($row["idOwner"]);
                    $reserv->setIdReserv($row["idKeeper"]);

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
}
