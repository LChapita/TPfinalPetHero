<?php

require_once(VIEWS_PATH . "nav.php");


use Models\Reserv as Reserv;
use DAO\ReservDAO as ReservDAO;
use Models\Owner as Owner;

use DAO\KeeperDAO as KeeperDAO;
use SQL\KeeperSQL as KeeperSQL;
use Models\Keeper as Keeper;
use Models\Pet;
use SQL\PetSQL;
use SQL\ReservSQL;

$userArr = $_SESSION;

foreach ($userArr as $user) {
    $owner = new Owner();
    //$owner->setId($user->getTypeUserOwner()->getId());
    $owner->setId($user->getId());
}

//$petSQL=

//$keeper=new Keeper();
//$keeperDAO=new KeeperDAO();

//$keeper = new Keeper();
//$keeper = $keeperDAO->GetById($idKeeper);

$petSQL = new PetSQL();
$petList = $petSQL->GetPetByOwnerId($owner->getId());

$keeperSQL = new KeeperSQL();
$keeper = $keeperSQL->GetById($idKeeper);


//var_dump($petList);
//var_dump($idKeeper);
?>
<main>
    <section id="agregar" class="mb-7">
        <form action="<?php echo FRONT_ROOT . "Reserv/Add" ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <!-- 

            <label> Hola Owner Bienvenido</label><br>
            <table>
                <thead>
                    <tr>
                        <th>Name : < ?php echo $keeper->getName() ?></th>
                    </tr>
                    <tr>
                        <th>Tuition :< ?php echo $keeper->getTuition() ?></th>
                    </tr>
                </thead>
            </table>
        -->
            <label.colorNegro> Ingrese las Fechas Entre las que desea hacer su Reserva</label><br>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>Date Started</th>
                            <th>Date Finish</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!--  
                            <input type="hidden" name="idKeeper" value="< ?php echo $keeper->getId() ?>">
                            <input type="hidden" name="idOwner" value="< ?php echo $owner->getId()?>">
                             <select name="confirm" class="form-control">
                                        <option value="1" required>Confirmed</option>
                                        <option value="0" required>UnConfirmed</option>
                                    </select>
                        -->

                            <select name="pet" class="form-control">
                                <?php
                                foreach ($petList as $pet) {
                                    echo "<option value=" . $pet->getId() . " required>" . $pet->getName() . "</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="idKeeper" value="<?php echo $idKeeper ?>">
                            <?php
                            $reservSQL = new ReservSQL();
                            $reservList = $reservSQL->GetReservbyIdKeeper($idKeeper);
                            var_dump($reservList);
                            //var_dump($reservList);
                            //var_dump($keeper->getTypeUserKeeper()->getDateStart());
                            //var_dump($keeper->getTypeUserKeeper()->getDateFinish());
                            //var_dump($reservList);
                            if ($reservList == null) {
                            ?>
                                <td>
                                    <input type="date" name="dateStart" min="<?php echo $keeper->getTypeUserKeeper()->getDateStart(); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="START" required>
                                </td>
                                <td>
                                    <input type="date" name="dateFinish" min="<?php echo date('Y-m-d', strtotime($keeper->getTypeUserKeeper()->getDateStart() . "+1 day")); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="FINISH" required>
                                </td>

                                <?php
                            }
                            /* elseif($reservList!=null){
                                //$reserv=new Reserv();
                                var_dump(
                                    end($reservList));
                                foreach ($reservList as $reserv) {//tiene mas de 1
                                    
                                                   ?>
                                            <tbody>
                                        <td>
                                            <input type="date" name="dateStart" 
                                            min="<?php echo date('Y-m-d', strtotime($reserv->getDateFinish() . "+1 day")); ?>" 
                                            max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="START" required>
                                        </td>
                                        
                                        <td>
                                            <input type="date" name="dateFinish" 
                                            min="<?php echo date('Y-m-d', strtotime($reserv->getDateFinish() . "+1 day")); ?>" 
                                            max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="FINISH" required>
                                        </td>
                                    </tbody>
                            <?php
                                    
                                }
                            }*/
                            ?>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <input type="submit" class="btn" value="Add Stay" style="background-color:#DC8E47;color:white;" />
                </div>
        </form>
    </section>
</main>