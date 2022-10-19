<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\InvoiceCategoryDAO;
use Models\Invoice;
use Models\InvoiceCategory;

    require_once('nav.php');
?>
<main class="py-5">
    
     <section id="agregar" class="mb-7">
     <form action="<?php echo FRONT_ROOT . "Invoice/Add"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>      
                <th>Id   </th>
                <th>invoiceCategoryId     </th>
                <th>number     </th>
                <th>amount     </th>
                <th>dueDate   </th>
                <th>payed    </th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td style="max-width: 100px;">
                 <td>
                  <input type="number" name="id" required>
                </td>  
                 <td>
                  <input type="number" name="invoiceCategoryId" required>
                </td>
                <td>
                  <input type="text" name="number" required>
                </td>
                <td>
                  <input type="text" name="amount" required>
                </td>
                <td>
                  <input type="text" name="dueDate" required>
                  <td>
                  <input type="radio" name="payed" boolval="true" checked>Pago
                  <input type="radio" name="payed" boolval="false"> Impago.
                </td>  
             
              </tr>
              </tbody>
          </table>       <div>
            <input type="submit" class="btn" value="Agregar" style="background-color:#DC8E47;color:white;"/>
          </div>
          <div>
            <?php
              
            ?>
          </div>
        </form>
     </section>
</main>