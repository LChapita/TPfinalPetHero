<?php
require_once(VIEWS_PATH."nav.php");

use DAO\KeeperDAO;
use Models\User;
use Models\Keeper;
use SQL\KeeperSQL;
use SQL\OwnerSQL;
//$keeperDAO=new KeeperDAO();
$ownerSQL = new OwnerSQL();
$userMenu = new User();
$userArr = $_SESSION;

foreach ($userArr as $user) {
    $userMenu->setEmail($user->getEmail());
    $userMenu->setPassword($user->getPassword());
    $userMenu->setId($user->getId());
}
//$owner=$keeperDAO->getByEmail($userMenu->getEmail());
$owner = $ownerSQL->GetByEmail($userMenu->getEmail());

//var_dump($owner);



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
                    <th>Sur Name</th>
                    <th>DNi</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $owner->getTypeUserKeeper()->getName() ?></td>
                        <td><?php echo $owner->getTypeUserKeeper()->getSurname() ?></td>
                        <td><?php echo $owner->getTypeUserKeeper()->getDNI() ?></td>
                </tbody>
         </table>
        </div>
    </section>
</main>
<?php
require_once(VIEWS_PATH . "footer.php");
?>