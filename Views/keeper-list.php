<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\userDAO;
use Models\User;
use Models\Keeper;

require_once('nav.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Keepers</h2>
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
                    <th>Date Start</th>
                    <th>Date Finish</th>
                </thead>
                <tbody>
                    <?php

                    $userDAO = new userDAO();
                    //$user = new User();
                    $keeperList = $userDAO->GetAllKeeper();

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
