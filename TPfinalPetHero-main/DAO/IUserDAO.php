<?php

namespace DAO;

use Models\User as User;

interface IUserDAO{
    function AddOwner($user,$typeUser);
    function AddKeeper($user, $typeUser);
    function GetAll();
    function GetAllOwner();
    function GetAllKeeper();
}

?>