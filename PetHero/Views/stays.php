<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\UserDAO;
use Models\User;
use Models\Keeper;

$userArr = $_SESSION;
foreach ($userArr as $user) {
    $keeper = new Keeper();
    $keeper->setName($user->getTypeUserKeeper()->getName());
    $keeper->setLastname($user->getTypeUserKeeper()->getLastname());
    $keeper->setPhoto($user->getTypeUserKeeper()->getPhoto());
    $keeper->setDNI($user->getTypeUserKeeper()->getDNI());
    $keeper->setTuition($user->getTypeUserKeeper()->getTuition());
    $keeper->setSex($user->getTypeUserKeeper()->getSex());
    $keeper->setAge($user->getTypeUserKeeper()->getAge());
    $keeper->setId($user->getTypeUserKeeper()->getId());
    $keeper->setKeeper($user->getTypeUserKeeper()->getId());
}

require_once('nav-keeper.php');
?>
<main>
    <section id="agregar" class="mb-7">
        <form action="<?php echo FRONT_ROOT . "Keeper/RegisterStays" ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <label> Hola Keeper Bienvenido</label><br>
            <table>
                <thead>
                    <tr>
                        <th>Name : <?php echo $keeper->getName() ?></th>
                    </tr>
                    <tr>
                        <th>Tuition :<?php echo $keeper->getTuition() ?></th>
                    </tr>
                </thead>
            </table>
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
                        <td>
                            <input type="date" name="dateS" placeholder="START" required>
                        </td>
                        <td>
                            <input type="date" name="dateF" placeholder="FINISH" required>
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