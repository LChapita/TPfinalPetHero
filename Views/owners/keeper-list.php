<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\userDAO;
use Models\User;
use Models\Keeper;
use SQL\KeeperSQL;

require_once(VIEWS_PATH . "nav.php");

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <section id="listado" class="bg-dark text-white">
                <center>
                    <h2 class="mb-4 text-white"> Keepers List</h2>
                    <h6 class="mb-4 text-white"> These are all the keepers available in our database </h6>
            </section id="listado" class="mb-5">
            </center>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Photo</th>
                    <th>DNI</th>
                    <th>Tuition</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <!-- 
                        <th>Id</th>

                     -->
                    <th>Size Pet</th>
                    <th>Date Start</th>
                    <th>Date Finish</th>
                </thead>
                <tbody>
                    <?php

                    //$keeperDAO=new KeeperDAO();
                    //$user = new User();
                    //$keeperList = $keeperDAO->GetAllKeepers();
                    $keeperSQL = new KeeperSQL();
                    $keeperList = $keeperSQL->GetAll();

                    foreach ($keeperList as $keeper) { //ensi es un user
                    ?>
                        <tr>
                            <td><?php echo $keeper->getTypeUserKeeper()->getName() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getLastname() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getPhoto() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getDNI() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getTuition() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->GetSex() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getAge() ?></td>
                            <!-- 
                            <td>< ?php echo $keeper->getTypeUserKeeper()->getId() ?></td>
                            -->
                            <td>
                                <?php echo $keeper->getTypeUserKeeper()->getSizePet() ?>
                            </td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getDateStart() ?></td>
                            <td><?php echo $keeper->getTypeUserKeeper()->getDateFinish() ?></td>

                        </tr>

                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>