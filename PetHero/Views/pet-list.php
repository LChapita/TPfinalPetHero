<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\ownerDAO;
use Models\Pet;
use Models\Owner;

    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Mascotas</h2>
               <table class="table bg-light text-center">
                    <thead class="bg-dark text-white">
                         <th>Pet id</th>
                         <th>Owner Id</th>
                         <th>Dueño</th>
                         <th>Raza</th>
                         <th>Nombre mascota</th>
                         <th>Vacunaciones</th>
                         <th>Foto</th>
                         <th>Videos</th>
                    </thead>
                    <tbody>
                    <?php
                         $ownerDAO = new ownerDAO ();
                         $Owner = new Owner();

                         foreach($petList as $Pet) {
                              $Owner = $ownerDAO->GetById($Pet->getOwnerId());

                              if($Owner->getActive()) {
                              
                    ?>
                    <tr>
                         
                        
                         <td><?php echo $Pet->getId() ?></td>
                         <td><?php echo $Pet->getOwnerId() ?></td>
                         <td><?php echo $Owner->getName() ?></td>
                         <td><?php echo $Pet->getRaza() ?></td>
                         <td><?php echo $Pet->getName() ?></td>
                         <td><?php echo $Pet->getVaccinationSchedule() ?></td>
                         <td><?php echo $Pet->getFoto() ?></td>
                         <td><?php
                              if($Pet->getVideo()) {
                                   echo "Link Video";
                              } else {
                                    echo "No tiene video";
                              }?></td>
                    </tr>

                    <?php
                         }
                         }
                    ?>
                    </tbody>
               </table>
          </div>
     </section>
     <section id="agregar" class="mb-5">
          <form action="<?php echo FRONT_ROOT . "Invoice/Remove"?>" method="post">
          <div class="container">
               <h3 class="mb-3">Eliminar Mascota</h3>
               <div class="bg-light p-4">
                    <div class="row">
                         <div class="col-lg-3">
                              <label for="id">Id</label>
                              <input type="number" name="id" id="id"class="form-control form-control-ml" required>
                         </div>
                         <div class="col-lg-3">
                              <span>&nbsp;</span>
                              <button type="submit" name="btn" class="btn btn-danger ml-auto d-block">Eliminar</button>
                         </div>

                    </div>                    
               </div>
          </div>
          <div>
               <?php
                    if($message != "") {
                         echo "<div class='container alert alert-danger mt-3 p-3 text-center'>
                         <p><strong>" . $message . "</strong></p>
                         </div>";
                    }
               ?>
          </div>
          </form>
     </section>
     <section id="agregar" class="mb-7">
     <form action="<?php echo FRONT_ROOT . "Invoice/Add"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>      
              <th>  </th>
       
              <th>Pet id</th>
                         <th>Owner Id</th>
                         <th>Raza</th>
                         <th>Nombre mascota</th>
                         <th>Vacunaciones</th>
                         <th>Link de Fotos</th>
                         <th> Videos</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td style="max-width: 100px;">
                 <td>
                  <input type="number" name="id" required>
                </td>  
                 <td>
                  <input type="number" name="ownerID" required>
                </td>
                <td>
                  <input type="text" name="raza" required>
                </td>
                <td>
                  <input type="text" name="Pet Name" required>
                </td>
                <td>
                  <input type="text" name="Vacunaciones" required>
               </td>
               <td>
                  <input type="text" name="Fotos" required>
               </td>
               <td>
              
                  <input type="radio" name="payed" boolval=true checked>Tiene video
                  <input type="radio" name="payed" boolval=false> No Tiene video
                </td>  
             
              </tr>
              </tbody>
          </table>       <div>
            <input type="submit" class="btn" value="Agregar mascota" style="background-color:#DC8E47;color:white;"/>
          </div>
          <div>
            <?php
                if($message != "") {
                  echo "<div>
                    <p>". $message ."</p>
                  </div>";
                }
            ?>
          </div>
        </form>
     </section>
</main>