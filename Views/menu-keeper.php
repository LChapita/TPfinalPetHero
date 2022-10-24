<?php
require_once("nav-keeper.php");

use DAO\UserDAO;
use Models\User;
use Models\Keeper;
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">My Data</h2>
            <table class="table bg-light text-center">
                <thead class="bg-dark text-white">
                    <th>Email</th>
                    <th>Password</th>
                    <th>ID</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $this->keeper->getEmail() ?></td>
                        <td><?php echo $this->keeper->getPassword() ?></td>
                        <td><?php echo $this->keeper->getId() ?></td>
                </tbody>
                <br>
                <thead>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Photo</th>
                    <th>DNi</th>
                    <th>Tuition</th>
                    <th>Sex</th>
                    <th>Age</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getName() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getLastname() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getPhoto() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getDNI() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getTuition() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getSex() ?></td>
                        <td><?php echo $this->keeper->getTypeUserKeeper()->getAge() ?></td>
                </tbody>
            </table>
        </div>
    </section>
</main>