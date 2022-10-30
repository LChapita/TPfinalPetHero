<?php

namespace DAO;

use DAO\IReservDAO as IReservDAO;
use DAO\Connection as Connection;
use \Exception as Exception;
use Models\Reserv as Reserv;

class ReservDAO implements IReservDAO{
    private $connection;
    private $tableName="Reservs";

    public function Add(Reserv $reserv)
    {
        try
        {
            $query="INSERT INTO".$this->tableName."(idReserv,idOwner,idKeeper,dateStart,dateFinish) VALUES(:idReserv,:idOwner,:idKeeper,:dateStart,:dateFinish);";
            $parameters["idReserv"] = $reserv->getIdReserv();
            $parameters["idOwner"] = $reserv->getIdOwner();
            $parameters["idKeeper"] = $reserv->getIdKeeper();
            $parameters["dateStart"] = $reserv->getIdKeeper();
            $parameters["dateFinish"] = $reserv->getIdKeeper();

            $this->connection=Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query,$parameters);

            
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
?>

