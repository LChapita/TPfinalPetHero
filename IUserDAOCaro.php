<?php

namespace DAO;

use Models\User as User;

interface IUserDAO{
    function AddOwner($user,$typeUser);
    function AddKeeper($user, $typeUser);
    function GetAllOwner();
    function GetAllKeeper();
}

?>