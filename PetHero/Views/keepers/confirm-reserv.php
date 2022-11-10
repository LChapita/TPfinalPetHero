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

require_once(VIEWS_PATH . "keepers/nav-keeper.php");

?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Confirmar reservas</h2>
            <h2 class="mb-4">Listado de Reservas propias:</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Id Reserva</th>
                    <th>Id Owner</th>
                    <th>Id Keeper</th>
                    <th>Date Start</th>
                    <th>Date Finish</th>
                    <th>Confirm</th>
                    <th>Select Confirmed</th>

                </thead>
                <tbody>
                    <?php

                    $userMenu = new User();
                    $userArr = $_SESSION;
                    foreach ($userArr as $user) {
                        $userMenu->setEmail($user->getEmail());
                        $userMenu->setPassword($user->getPassword());
                        $userMenu->setId($user->getId());
                    }
                    //echo $userMenu->getId();
                    //$ReservDAO = new ReservDAO();
                    //$reserv = new Reserv();
                    //$reservList = $ReservDAO->GetAll();
                    $ReservSQL = new ReservSQL();
                    $reserv = new Reserv();
                    $reservList = $this->reservSQL->GetAll();


                    //var_dump($reservList);
                    
                    foreach ($reservList as $reserv) {
                        if ($userMenu->getId() == $reserv->getIdKeeper()) {
                            if($reserv->getConfirm()==null){
                    ?>

                            <tr>
                                <td><?php echo $reserv->getIdReserv(); ?></td>
                                <td><?php echo $reserv->getIdPet(); ?></td>
                                <td><?php echo $reserv->getIdKeeper(); ?></td>
                                <td><?php echo $reserv->getDateStart(); ?></td>
                                <td><?php echo $reserv->getDateFinish(); ?></td>

                                <form action="<?php echo FRONT_ROOT . "Reserv/Confirm" ?>" method="POST">
                                <td>
                                    
                                    <input type="hidden" name="id_Reserv" value="<?php echo $reserv->getIdReserv(); ?>">
                                    <select name="confirm" class="form-control">
                                        <option value="1" required>Confirmed</option>
                                        <option value="0" required>UnConfirmed</option>
                                    </select>
                                </td>
                                    <td> <button type="submit" name="confirmar" value="confirmar">ACEPTAR</button></td>
                                </form>
                            </tr>

                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>