<?php

require_once(VIEWS_PATH . "nav.php");


use Models\Reserv as Reserv;
use DAO\ReservDAO as ReservDAO;
use Models\Owner as Owner;

use DAO\KeeperDAO as KeeperDAO;
use Models\Keeper as Keeper;

$userArr=$_SESSION;

foreach($userArr as $user){
    $owner=new Owner();
    $owner->setId($user->getTypeUserOwner()->getId());
}

$keeper=new Keeper();
$keeperDAO=new KeeperDAO();

$keeper = $keeperDAO->GetById($idKeeper);

var_dump($keeper);
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
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th>Date Started</th>
                        <th>Date Finish</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="idOwner" value="<?php echo $owner->getId()?>">
                        <input type="hidden" name="idKeeper" value="<?php echo $keeper->getId() ?>">
                        <td>
                            <input type="date" name="dateStart" placeholder="START" required>
                        </td>
                        <td>
                            <input type="date" name="dateFinish" placeholder="FINISH" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <input type="submit" class="btn" value="Add Stay" style="background-color:#DC8E47;color:white;" />
            </div>
        </form>
    </section>
</main>