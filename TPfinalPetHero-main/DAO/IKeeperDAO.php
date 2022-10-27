<?php

namespace DAO;
use Models\Keeper as Keeper;

interface IKeeperDAO{
    function Add($keeper);
    function GetAllKeepers();
}

?>