<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\PetDAO as PetDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;
use SQL\PetSQL;

require_once(VIEWS_PATH . "nav.php");

?>
<main class="py-5">
    <section class="mb-5">
        <div class="container">
            <h2 class="mb-4">Pet List</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Pet id</th>
                    <th>Owner</th>
                    <th>Name Pet</th>
                    <th>Race</th>
                    <th>Vaccination</th>
                    <th>Photo</th>
                    <th>Videos</th>
                    <th>Size Pet</th>
                </thead>
                <tbody>
                    <?php

                    //$petDAO = new petDAO();
                    //$petList = $petDAO->GetAllPets();
                    $petSQL=new PetSQL();
                    $petList=$petSQL->GetAll();
                    
                    $userArr = $_SESSION;
                    foreach ($userArr as $user) {
                        $owner = new Owner();
                        //$owner->setId($user->getTypeUserOwner()->getId());
                        $owner->setId($user->getId());
                    }
                    
                    //var_dump($owner);
                    
                    foreach ($petList as $pet) {
                        //var_dump($pet);
                        if ($pet->getOwnerID() == $owner->getId()) {

                    ?>
                            <tr>
                                <td><?php echo $pet->getId() ?></td>
                                <td><?php echo $pet->getOwnerID() ?></td>
                                <td><?php echo $pet->getName() ?></td>
                                <td><?php echo $pet->getRace() ?></td>
                                <td><a href="<?php echo $pet->getVaccinationSchedule() ?>">Vaccination</a></td>
                                <td><a href="<?php echo $pet->getPhoto() ?>">Photo</a></td>
                                <td><a href="<?php echo $pet->getVideo() ?>">Video</a></td>
                                <td><?php echo $pet->getSizePet() ?></td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- 

        
        <section id="eliminar" class="mb-5">
            <form action="< ?php echo FRONT_ROOT . "Pet/Remove" ?>" method="post">
            <div class="container">
                <h3 class="mb-3">Delete Pet </h3>
                <div class="bg-light p-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="id">Id</label>
                            <input type="number" name="id" id="id" class="form-control form-control-ml" required>
                        </div>
                        <div class="col-lg-3">
                            <span>&nbsp;</span>
                            <button type="submit" name="btn" class="btn btn-danger ml-auto d-block">Eliminar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div>
                < ?php
                if ($message != "") {
                    echo "<div class='container alert alert-danger mt-3 p-3 text-center'>
                    <p><strong>" . $message . "</strong></p>
                    </div>";
                }
                ?>
            </div>
        </form>
    </section>
-->
</main>

<?php

require_once(VIEWS_PATH."footer.php");
?>