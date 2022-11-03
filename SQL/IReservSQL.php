<?php

namespace DAO;

use Models\Reserv as Reserv;
use DAO\Connection as Connection;

interface IReservSQL
{
    function Add(Reserv $reserv);
    function GetAll();
}
?>