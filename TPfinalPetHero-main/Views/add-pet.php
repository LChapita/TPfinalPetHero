<?php

require_once(VIEWS_PATH . "validate-session.php");

use DAO\PetDAO as PetDAO;
use Controllers\PetController;
use Models\Pet as Pet;
use Models\Owner as Owner;

require_once('nav.php');
?>
<main>
    <section id="agregar" class="mb-7">
        <form action="<?php echo FRONT_ROOT . "Pet/RegisterPet" ?>" method="post" style="background-color: #EAEDED;padding: 2rem !important;">
            <table>
                <thead>
                    <tr>
                        <th>Nombre mascota</th>
                        <th>Raza</th>
                        <th>Vacunaciones</th>
                        <th>Link de Fotos</th>
                        <th>Videos</th>
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
</main>
