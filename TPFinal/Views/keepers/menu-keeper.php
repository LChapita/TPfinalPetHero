<?php
require_once("nav-keeper.php");

use DAO\KeeperDAO;
use Models\User;
use Models\Keeper;

$keeperDAO=new KeeperDAO();
$userMenu = new User();
$userArr = $_SESSION;

foreach ($userArr as $user) {
    $userMenu->setEmail($user->getEmail());
    $userMenu->setPassword($user->getPassword());
    $userMenu->setId($user->getId());

}
$keeper=$keeperDAO->getByEmail($userMenu->getEmail());
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
                        <td><?php echo $keeper->getTypeUserKeeper()->getName() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getLastname() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getPhoto() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getDNI() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getTuition() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getSex() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getAge() ?></td>
                </tbody>

                <thead class="bg-dark text-white">
                    <th>Date Stays Started</th>
                    <th>Date Stays Finished</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $keeper->getTypeUserKeeper()->getDateStart() ?></td>
                        <td><?php echo $keeper->getTypeUserKeeper()->getDateFinish() ?></td>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php
    require_once(VIEWS_PATH."footer.php");
?>