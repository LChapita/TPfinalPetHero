<?php

namespace DAO;

use Models\Keeper as Keeper;

interface KeeperDAO{
    function AddKeeper($keeper2,$Keeperhours);
  
    function GetAll();
    function holakeeper($tuition,$name);
}

?>