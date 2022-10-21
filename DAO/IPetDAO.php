<?php

namespace DAO;
use Models\User as User;

interface IPetDAO{
    function AddPet($pet, $owner);
    function GetAllPets();
}

?>