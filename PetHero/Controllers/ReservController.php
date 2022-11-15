<?php

namespace Controllers;

use DAO\ReservDAO as ReservDAO;
use SQL\ReservSQL as ReservSQL;
use Models\Reserv as Reserv;
use SQL\KeeperSQL;

class ReservController{
    private $reservDAO;
    private $reservSQL;
    private $idKeeper;

    public function __construct()
    {
        //$this->reservDAO=new ReservDAO();
        $this->reservSQL= new ReservSQL();
    }


    public function ShowAddView($idKeeper)
    {
        require_once(VIEWS_PATH . "owners/form-reserv.php");   
    }

    public function ShowListView()
    {
        //$reservList = $this->reservDAO->GetAll();
        $reservList=$this->reservSQL->GetAll();
        require_once(VIEWS_PATH . "owners/list-reserv.php");
    }

    public function ShowListConfirm()
    {
        //$reservList = $this->reservDAO->GetAll();
        $reservList = $this->reservSQL->GetAll();
        require_once(VIEWS_PATH . "keepers/confirm-reserv.php");
    }

    public function HistoryReservs()
    {
        //$reservList = $this->reservDAO->GetAll();
        $reservList = $this->reservSQL->GetAll();

        require_once(VIEWS_PATH . "keepers/history-reserv.php");
    }
    public function Add($idPet,$idKeeper,$dateStart,$dateFinish){
        ///falta ver bien esto
        $reserv=new Reserv();

        $reserv->setIdPet($idPet);
        $reserv->setIdKeeper($idKeeper);
        $reserv->setDateStart($dateStart);
        $reserv->setDateFinish($dateFinish);

        //var_dump($reserv);
        //$this->reservDAO->Add($reserv);
        ///verificar
        if($this->reservSQL->VerificReserv($reserv,$idPet,$idKeeper)==0){
            echo "<script> alert('Reserva Realizada, Aguarde por la Confirmacion del Keeper'); </script>";
            $this->reservSQL->Add($reserv);
            require_once(VIEWS_PATH . "owners/menu-owner.php");
        }else{
            echo "<script> alert('Esta Reserva Esta en espera de que un Keeper la Acepte'); </script>";
            require_once(VIEWS_PATH . "owners/menu-owner.php");
        }

        //$this->ShowAddView(1);

        //var_dump($reserv);

    }
    public function Confirm($id_Reserv,$confim)
    {
        ///falta ver bien esto
        $reserv = new Reserv();
        //$reservC = $this->reservSQL->GetPetbyId($id_Reserv);

        if($_REQUEST["confirm"] == 1) {
            $reserv->setConfirm(1);
        } else{
            $reserv->setConfirm(0);
        }

        //var_dump($id_Reserv);
        //$this->reservDAO->Add($reserv);
        
        $this->reservSQL->Confirm($reserv,$id_Reserv);
        $keeperSQL=new KeeperController();
        $keeperSQL->MenuKeeper();
    }
}
?>