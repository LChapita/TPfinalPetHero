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
            <label.colorNegro> Enter the dates between you want to make your reservation</label><br>
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
                            //var_dump($reservList);
                            //var_dump($reservList);
                            //var_dump($keeper->getTypeUserKeeper()->getDateStart());
                            //var_dump($keeper->getTypeUserKeeper()->getDateFinish());
                            //var_dump($reservList);
                            if ($reservList == null) {//este primero
                            ?>
                                <td>
                                    <input type="date" name="dateStart" min="<?php echo $keeper->getTypeUserKeeper()->getDateStart(); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="START" required>
                                </td>
                                <td>
                                    <input type="date" name="dateFinish" min="<?php echo date('Y-m-d', strtotime($keeper->getTypeUserKeeper()->getDateStart() . "+1 day")); ?>" max="<?php echo $keeper->getTypeUserKeeper()->getDateFinish(); ?>" placeholder="FINISH" required>
                                </td>

                                <?php
                            }
                            elseif($reservList!=null){
                                sort($reservList);
                                $fechasKeeper=array();
                                
                                for ($i = $keeper->getTypeUserKeeper()->getDateStart();
                                $i <= $keeper->getTypeUserKeeper()->getDateFinish(); 
                                $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                                    array_push($fechasKeeper, $i);
                                }
                                
                                
                                $reservas=array();
                                $reserv=new Reserv();
                                foreach ($reservList as $reserv) { //tiene mas de 1
                                for (
                                    $i = $reserv->getDateStart();
                                    $i <= $reserv->getDateFinish();
                                    $i = date("Y-m-d", strtotime($i . "+ 1 days"))
                                ) {
                                    array_push($reservas,$i);
                                }
                                }
                                var_dump($fechasKeeper);
                                var_dump($reservas);

                                    $libres=array_diff($fechasKeeper,$reservas);//0,1,/5,6

                                    $aceptados=array();
                                    echo "libres";
                                    var_dump($libres);
                                    
                                    foreach($libres as $key=>$value){
                                        array_push($aceptados, $libres[$key]);
                                    }
                                    echo "aceptados";
                                    var_dump($aceptados);

                                    $otro=array();
                                    $unaVez=0;

                                    if($libres!=null){
                                        error_reporting(E_ALL ^ E_NOTICE);
                                        foreach($aceptados as $key=>$ace){
                                            if($ace==$libres[$key] && $unaVez==0){
                                                array_push($otro,$libres[$key]);
                                            }else{
                                                $unaVez=1;
                                            }
                                        }

                                    var_dump($otro);

                                    if($otro!=null){

                                        $min=min($otro);
                                        $max=max($otro);
                                        error_reporting(E_ALL ^ E_NOTICE);
                                        foreach ($aceptados as $ace) {
                                            if ($ace == $libres[$key] && $unaVez == 0) {
                                                array_push($otro, $libres[$key]);
                                            } else {
                                                $unaVez = 1;
                                            }
                                        }
                                        var_dump($otro);
                                        ?>
                                            <tbody>
                                                <td>
                                                    <input type="date" name="dateStart" 
                                                    min="<?php echo $min; ?>" 
                                                    max="<?php echo $max; ?>" placeholder="START" required>
                                                </td>
                                                
                                        <td>
                                            <input type="date" name="dateFinish" 
                                            min="<?php echo $min; ?>" 
                                            max="<?php echo $max; ?>" placeholder="FINISH" required>
                                        </td>
                                    </tbody>
                                    <?php
                                    }else{
                                        //echo "macaco";
                                        error_reporting(E_ALL ^ E_NOTICE);
                                        
                                        $fechaFija=date("Y-m-d",strtotime($aceptados[0]."- 1 days"));
                                        $fechaAcumulada=date("Y-m-d", strtotime($fechaFija));
                                        
                                        foreach($aceptados as $acept) {
                                            $fechaAcumulada++;
                                                if($acept==$fechaAcumulada){
                                                    array_push($otro, $acept);
                                            }
                                        }
                                        var_dump($fechaAcumulada);
                                        $min=min($otro);
                                        $max=max($otro);
                                        ?>
                                            <tbody>
                                                <td>
                                                    <input type="date" name="dateStart" 
                                                    min="<?php echo $min; ?>" 
                                                    max="<?php echo $max; ?>" placeholder="START" required>
                                                </td>
                                                
                                        <td>
                                            <input type="date" name="dateFinish" 
                                            min="<?php echo $min; ?>" 
                                            max="<?php echo $max; ?>" placeholder="FINISH" required>
                                        </td>
                                    </tbody>
                                    <?php
                                    }
                                    }
                            }
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
<?php
clearstatcache();
?>