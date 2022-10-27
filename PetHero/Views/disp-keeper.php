<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\userDAO;
use Models\Keeper;

    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Keepers Disponibles entre esas fechas </h2>
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
                    </thead>
                    <tbody>
                    <?php
                           $userDAO = new userDAO ();
                           $User = new User();
                         private $start; /* Se ingresa primer fecha por teclado*/
                         private $finish;  /* Se ingresa segunda  fecha por teclado*/
                           foreach($keeperList as $Keeper) {             
                 if (($start >= $Keeper->getDateStart() && $finish <= $Keeper->getDateFinish())) {     
                    ?>
                    <tr>               
                         <td><?php echo $Keeper->getName() ?></td>
                         <td><?php echo $Keeper>getLastname() ?></td>
                         <td><?php echo $Keeper->getPhoto() ?></td>
                         <td><?php echo $Keeper->getDNI() ?></td>
                         <td><?php echo $Keeper->getTuition() ?></td>
                         <td><?php echo $Keeper->GetSex() ?></td>
                         <td><?php echo $Keeper->getAge() ?></td>
                         <td><?php echo $Keeper->getId() ?></td>
                         <td><?php echo $Keeper->getDateStart() ?></td>
                         <td><?php echo $Keeper->getDateFinish() ?></td>
                    </tr>

                    <?php
                                   }else {
                                    echo "No hay Keepers disponibles";
                                }
                         }
                    ?>
                    </tbody>
               </table>
          </div>
     </section>
    