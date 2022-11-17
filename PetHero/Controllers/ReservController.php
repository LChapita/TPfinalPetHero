<?php

namespace Controllers;

use DAO\PetDAO;
use DAO\ReservDAO as ReservDAO;
use Models\Keeper;
use Models\Owner;
use Models\Pet;
use SQL\ReservSQL as ReservSQL;
use Models\Reserv as Reserv;
use SQL\KeeperSQL;
use SQL\OwnerSQL;
use SQL\PetSQL;

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
        require_once(VIEWS_PATH . "validate-session.php");

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
        //var_dump($dateStart);
        if(($dateStart && $dateFinish)!=0){

            if($this->reservSQL->VerificReserv($reserv,$idPet,$idKeeper)==0){
                echo "<script> alert('Reserva Realizada, Aguarde por la Confirmacion del Keeper'); </script>";
                $this->reservSQL->Add($reserv);
                require_once(VIEWS_PATH . "owners/menu-owner.php");
            }else{
                echo "<script> alert('Esta Reserva Esta en espera de que un Keeper la Acepte'); </script>";
                require_once(VIEWS_PATH . "owners/menu-owner.php");
            }
        }else{
            echo "<script> alert('No more available Dates from the Keeper'); </script>";
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

    public function GenerateCoupon($id_Reserv){
        require_once(VIEWS_PATH . "validate-session.php");
        $reserv=$this->reservSQL->GetReservbyId($id_Reserv);

        $userKeeper=new Keeper();
        $keeperSQL=new KeeperSQL();
        $userKeeper=$keeperSQL->GetById($reserv->getIdKeeper());

        $pet=new Pet();
        $petSQL=new PetSQL();
        $pet=$petSQL->GetPetById($reserv->getIdPet());

        $userOwner=new Owner();
        $ownerSQL=new OwnerSQL();
        $userOwner=$ownerSQL->GetById($pet->getOwnerID());

        $date1 =$reserv->getDateFinish();
        $date2 = $reserv->getDateStart();

        $diff = strtotime($date1)-strtotime($date2);
        $days=$diff/86400;
        $monto = ($userKeeper->getTypeUserKeeper()->getPrice()*$days)*0.5;
        $vencimiento=$monto+($monto*0.1);
        //var_dump($monto);
        require_once(VIEWS_PATH . "owners/cupon de pago mejorado.php");
    }
    public function ShowPay($monto){
        $montPay=$monto;
        
        require_once(VIEWS_PATH . "owners/pago.php");
    }
    public function Simulated(){
        echo "<script> alert('Coupon paid Successfully'); </script>";
        echo "<script> alert('You will be directed to your Profile'); </script>";
        require_once(VIEWS_PATH . "owners/menu-owner.php");
    }
    
}
?>