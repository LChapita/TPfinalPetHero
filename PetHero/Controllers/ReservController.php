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
    
    
    public function ShowAddView($idKeeper){
        //var_dump($idKeeper);
        require_once(VIEWS_PATH. "owners/form-reserv.php");
    }
    
    public function ShowListView(){
        $reservList=$this->reservDAO->GetAll();
        require_once(VIEWS_PATH."owners/list-reserv.php");        
    }
    public function Add($idOwner,$idKeeper,$dateStart,$dateFinish){
        
        $reserv=new Reserv();

        $reserv->setIdOwner($idOwner);
        $reserv->setIdKeeper($idKeeper);
        $reserv->setDateStart($dateStart);
        $reserv->setDateFinish($dateFinish);

        //var_dump($reserv);
        $this->reservDAO->Add($reserv);

        $this->ShowAddView($idKeeper);
        
    }
}
?>