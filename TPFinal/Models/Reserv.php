<?php

namespace Models;

class Reserv{

    private $idReserv;
    private $idOwner;
    private $idKeeper;

    private $dateStart;
    private $dateFinish;
    
    public function getIdReserv()
    {
        return $this->idReserv;
    }
    public function setIdReserv($idReserv)
    {
        $this->idReserv = $idReserv;
    }
    
    public function getIdOwner()
    {
        return $this->idOwner;
    }
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;
    }

    public function getIdKeeper()
    {
        return $this->idKeeper;
    }
    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;
    }
    
    

    public function getDateStart()
    {
        return $this->dateStart;
    }
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    public function getDateFinish()
    {
        return $this->dateFinish;
    }
    public function setDateFinish($dateFinish)
    {
        $this->dateFinish = $dateFinish;
    }
}
?>