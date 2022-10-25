<?php
require_once("nav-keeper.php");

use DAO\UserDAO;
use Models\User;
use Models\Keeper;

$userMenu = new User();
$userArr = $_SESSION;
foreach ($userArr as $user) {
    $userMenu->setEmail($user->getEmail());
    $userMenu->setPassword($user->getPassword());
    $userMenu->setId($user->getId());

    $keeper = new Keeper();
    $keeper->setName($user->getTypeUserKeeper()->getName());
    $keeper->setLastname($user->getTypeUserKeeper()->getLastname());
    $keeper->setPhoto($user->getTypeUserKeeper()->getPhoto());
    $keeper->setDNI($user->getTypeUserKeeper()->getDNI());
    $keeper->setTuition($user->getTypeUserKeeper()->getTuition());
    $keeper->setSex($user->getTypeUserKeeper()->getSex());
    $keeper->setAge($user->getTypeUserKeeper()->getAge());
    $keeper->setId($user->getTypeUserKeeper()->getId());
    $keeper->setKeeper($user->getTypeUserKeeper()->getId());
    $keeper->setDateStart($user->getTypeUserKeeper()->getDateStart());
    $keeper->setDateFinish($user->getTypeUserKeeper()->getDateFinish());
}
//var_dump($user);
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
                        <td><?php echo $userMenu->getEmail() ?></td>
                        <td><?php echo $userMenu->getPassword() ?></td>
                        <td><?php echo $userMenu->getId() ?></td>
                </tbody>
                <br>
                <thead class="bg-dark text-white">
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
                        <td><?php echo $keeper->getName() ?></td>
                        <td><?php echo $keeper->getLastname() ?></td>
                        <td><?php echo $keeper->getPhoto() ?></td>
                        <td><?php echo $keeper->getDNI() ?></td>
                        <td><?php echo $keeper->getTuition() ?></td>
                        <td><?php echo $keeper->getSex() ?></td>
                        <td><?php echo $keeper->getAge() ?></td>
                        <td><?php echo $keeper->getAge() ?></td>
                </tbody>

                <thead class="bg-dark text-white">
                    <th>Date Stays Started</th>
                    <th>Date Stays Finished</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $keeper->getDateStart() ?></td>
                        <td><?php echo $keeper->getDateFinish() ?></td>
                </tbody>
            </table>
        </div>
    </section>
</main>