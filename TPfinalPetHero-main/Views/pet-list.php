<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\PetDAO as PetDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;

require_once('nav.php');
?>
<main class="py-5">
    <section  class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de Mascotas</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Pet id</th>
                    <th>Dueño</th>
                    <th>Nombre mascota</th>
                    <th>Raza</th>
                    <th>Vacunaciones</th>
                    <th>Foto</th>
                    <th>Videos</th>
                </thead>
                <tbody>
                    <?php
                        $petDAO = new petDAO();
                        $petList = $petDAO->GetAllPets();
                        $userArr=$_SESSION;
                        foreach($userArr as $user){
                            $owner=new Owner();
                            $owner->setId($user->getTypeUserOwner()->getId());
                        }

                        foreach ($petList as $pet) {
                            //var_dump($pet);
                            if($pet->getOwnerID()== $owner->getId()){

                                ?>
                        <tr>
                            <td><?php echo $pet->getId() ?></td>
                            <td><?php echo $pet->getOwnerID() ?></td>
                            <td><?php echo $pet->getName() ?></td>
                            <td><?php echo $pet->getRaza() ?></td>
                            <td><?php echo $pet->getVaccinationSchedule() ?></td>
                            <td><?php echo $pet->getFoto() ?></td>
                            <td><?php echo $pet->getVideo() ?></td>
                        </tr>
                        
                        <?php
                    }

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
        
        <section id="eliminar" class="mb-5">
            <form action="<?php echo FRONT_ROOT . "Pet/Remove" ?>" method="post">
            <div class="container">
                <h3 class="mb-3">Eliminar Mascota</h3>
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
                <?php
                if ($message != "") {
                    echo "<div class='container alert alert-danger mt-3 p-3 text-center'>
                    <p><strong>" . $message . "</strong></p>
                    </div>";
                }
                ?>
            </div>
        </form>
    </section>
    <!-- 

        <section id="agregar" class="mb-7">
            <form action="< ?php echo FRONT_ROOT . "Pet/RegisterPet" ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
                <thead>
                    <tr>
                        <th>Nombre mascota</th>
                        <th>Raza</th>
                        <th>Vacunaciones</th>
                        <th>Link de Fotos</th>
                        <th> Videos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="name" area required>
                        </td>
                        <td>
                            <input type="text" name="race" required>
                        </td>
                        <td>
                            <input type="text" name="vaccinationschendle" required>
                        </td>
                        <td>
                            <input type="file" name="photo" required>
                        </td>
                        <td>
                            <input type="file" name="video">
                        </td>
                        
                    </tr>
                </tbody>
            </table>
            <div>
                <input type="submit" class="btn" value="Agregar mascota" style="background-color:#DC8E47;color:white;" />
            </div>
        </form>
    </section>
-->
    
</main>