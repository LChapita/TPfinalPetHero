<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\userDAO;
use Models\User;
use Models\Keeper;
use Models\Owner;
use Models\Reserv as Reserv;
use DAO\ReservDAO;
use SQL\ReservSQL;

require_once(VIEWS_PATH."nav.php");

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Reservas</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Id Reserva</th>
                    <th>Id Owner</th>
                    <th>Id Keeper</th>
                    <th>Date Start</th>
                    <th>Date Finish</th>
                   
                </thead>
                <tbody>
                    <?php

                    //$ReservDAO=new ReservDAO();
                    //$reserv = new Reserv();
                    //$reservList = $ReservDAO->GetAll();
                    $reservSQL=new ReservSQL();
                    $reserv=new Reserv();
                    $reservList=$reservSQL->GetAll();
                    
                    foreach ($reservList as $reserv) { 
                    //var_dump($reserv);
                    ?>
                        <tr>
                            <td><?php echo $reserv->getIdReserv(); ?></td>
                            <td><?php echo $reserv->getIdOwner(); ?></td>
                            <td><?php echo $reserv->getIdKeeper(); ?></td>
                            <td><?php echo $reserv->getDateStart(); ?></td>
                            <td><?php echo $reserv->getDateFinish(); ?></td>

                        </tr>

                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>