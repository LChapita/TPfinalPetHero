<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\ownerDAO;
use Models\Pet;
use Models\Owner;

    require_once('nav.php');
?>
<main class="py-5">
    
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