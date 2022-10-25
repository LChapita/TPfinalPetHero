<?php

use DAO\BeerTypeDAO;

 include('nav-bar.php');
 require_once(VIEWS_PATH . "validate-session.php");
?>

<div class="wrapper row4">
<main class="container clear"> 
    <div class="content"> 
      <div id="comments" >
        <h2>MODIFY BEER</h2>
        <form action="<?php echo FRONT_ROOT . "Beer/Modify"?>" method="post"  style="background-color: #EAEDED;padding: 2rem !important;">
          <table> 
            <thead>
              <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Density</th>
                <th>BeerType</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody align="center">
              <tr>
                <td style="max-width: 100px;">
                  <input type="hidden" name="id" value="<?php echo $beer->getId() ?>">
                  <input type="number" name="code" value="<?php echo $beer->getCode() ?>" required>
                </td>
                <td>
                  <input type="text" name="description" value="<?php echo $beer->getDescription() ?>" required>
                </td>
                <td>
                  <input type="text" name="density" value="<?php echo $beer->getDensity() ?>" required>
                </td>
                <td>
                  <select name="beerType" id="beerType" class="select">
                      <?php
                        $beerTypeDAO = new BeerTypeDAO();
                        $beerTypeList = $beerTypeDAO->GetAll();

                        foreach($beerTypeList as $beerType) {
                          if($beerType->getId() == $beer->getBeerType()->getId()) {
                            echo "<option selected value=". $beerType->getId() .">
                            ". $beerType->getName(). "
                            </option>";
                          } else {
                            echo "<option value=". $beerType->getId() .">
                            ". $beerType->getName(). "
                            </option>";
                          }
                        }
                      ?>
                  </select>
                </td>   
                <td>
                  <input type="text" name="price" value="<?php echo $beer->getPrice() ?>" required>
                </td>      
              </tr>
              </tbody>
          </table>
          <div>
            <input type="submit" class="btn" value="Modificar" style="background-color:#DC8E47;color:white;"/>
          </div>
          <div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
<!-- ################################################################################################ -->

<?php 
  include('footer.php');
?>