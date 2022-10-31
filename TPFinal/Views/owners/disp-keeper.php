<?php
///esto lo hace el owner
require_once(VIEWS_PATH . "validate-session.php");

use DAO\KeeperDAO;
use DAO\UserDAO;
use Models\User;
use Models\Keeper;


require_once(VIEWS_PATH . "nav.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Keepers Disponibles entre fechas ingresadas</h2>
               <table class="table bg-light text-center">
                    <thead class="bg-dark text-white">
                         <th>Name</th>
                         <th>Lastname</th>
                         <th>Photo</th>
                         <th>DNI</th>
                         <th>Tuition</th>
                         <th>Sex</th>
                         <th>Age</th>
                         <th>Id</th>
                         <th>Date Start</th>
                         <th>Date Finish</th>

                    <tbody>
                         <form method="post" action="">
                              <label>
                                   <h5>Add first Date: </5>
                              </label>
                              <input type="date" name=start required>
                              <label>
                                   <h5>Add finish Date: </5>
                              </label>
                              <input type="date" name="finish" required>
                              <button type="submit" name="consultar" value="consultar">Consultar</button>
                         </form>
                         
                         <?php

                         error_reporting(E_ALL ^ E_NOTICE);
                         $start = $_POST['start'];
                         $finish = $_POST['finish'];



                         $keeperDAO = new KeeperDAO();
                         //$keeper = new Keeper();
                         $keeperList = $keeperDAO->GetAllKeepers();
                         //
                         //private $start; /* Se ingresa primer fecha por teclado*/
                         //private $finish;  /* Se ingresa segunda  fecha por teclado*/
                         //
                         foreach ($keeperList as $keeper) {
                              //var_dump($keeper);
                              if ((($keeper->getTypeUserKeeper()->getDateStart()) &&  ($keeper->getTypeUserKeeper()->getDateFinish())) != null) {
                                   if (($start <= $keeper->getTypeUserKeeper()->getDateStart() && $finish >= $keeper->getTypeUserKeeper()->getDateFinish())) {
                         ?>
                                        <tr>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getName() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getLastname() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getPhoto() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getDNI() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getTuition() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getSex() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getAge() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getId() ?></td>

                                             <td><?php echo $keeper->getTypeUserKeeper()->getDateStart() ?></td>
                                             <td><?php echo $keeper->getTypeUserKeeper()->getDateFinish() ?></td>


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