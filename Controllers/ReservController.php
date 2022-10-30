<?php

namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use Models\Reserv as Reserv;

class ReservController{
    private $reservDAO;

    public function __construct()
    {
        $this->reservDAO=new ReservDAO();
    }
    
    
    public function ShowAddView(){
        //require_once(VIEWS_PATH."formreserva.php");
        require_once(VIEWS_PATH . "formreserva.php");
    }
    
    public function ShowListView(){
        $reservList=$this->reservDAO->GetAll();
        //require_once(VIEWS_PATH."reserv-list.php");        
    }
    public function Add(/*$idOwner,$idKeeper,$dateStart,$dateFinish*/){
        $reserv=new Reserv();

        $reserv->setIdOwner(1);
        $reserv->setIdKeeper(1);
        $reserv->setDateStart("2022-10-01");
        $reserv->setDateFinish("2022-11-01");

        $this->reservDAO->Add($reserv);

        $this->ShowAddView();
        
    }
}
?>