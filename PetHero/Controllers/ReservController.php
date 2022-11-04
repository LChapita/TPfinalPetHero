<?php

namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use SQL\ReservSQL as ReservSQL;
use Models\Reserv as Reserv;

class ReservController{
    private $reservDAO;
    private $reservSQL;

    public function __construct()
    {
        //$this->reservDAO=new ReservDAO();
        $this->reservSQL= new ReservSQL();
    }


    public function ShowAddView($idKeeper)
    {
        //var_dump($idKeeper);
        require_once(VIEWS_PATH . "owners/form-reserv.php");
    }

    public function ShowListView()
    {
        $reservList = $this->reservDAO->GetAll();
        require_once(VIEWS_PATH . "owners/list-reserv.php");
    }
<<<<<<< HEAD

    public function ShowListConfirm()
    {
        //$reservList = $this->reservDAO->GetAll();
        $reservList = $this->reservSQL->GetAll();
        require_once(VIEWS_PATH . "keepers/confirm-reserv.php");
    }
    public function ShowAddConfirm()
    {
        //$reservList = $this->reservDAO->GetAll();
        $reservList = $this->reservSQL->GetAll();
        require_once(VIEWS_PATH . "keepers/confirm-reserv.php");
    }

=======
  
    public function ShowListConfirm(){
        $reservList=$this->reservDAO->GetAll();
        require_once(VIEWS_PATH."keepers/confirm-reserv.php");        
    }
    public function ShowAddConfirm(){
        $reservList=$this->reservDAO->GetAll();
        require_once(VIEWS_PATH."keepers/confirm-reserv.php");        
    }


>>>>>>> 5d0c3f4b4f76fad46487a609c9ad8069065d7c2e
    public function Add($idOwner,$idKeeper,$dateStart,$dateFinish){
        ///falta ver bien esto
        $reserv=new Reserv();

        $reserv->setIdOwner($idOwner);
        $reserv->setIdKeeper($idKeeper);
        $reserv->setDateStart($dateStart);
        $reserv->setDateFinish($dateFinish);

        //var_dump($reserv);
        //$this->reservDAO->Add($reserv);
        $this->reservSQL->Add($reserv);
        $this->ShowAddView($idKeeper);
        
    }
}
?>