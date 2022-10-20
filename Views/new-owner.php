<?php
require_once('nav-new-user.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Enter Data</h2>
            <form action="<?php echo FRONT_ROOT . "User/RegisterOwner"  ?>" method="POST" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input type="hidden" name="email" value="<?php echo $this->aux->getEmail() ?>">
                            <input type="hidden" name="password" value="<?php echo $this->aux->getPassword() ?>">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" require>

                            <label for="">Last Name</label>
                            <input type="text" name="lastname" class="form-control" require>

                            <label for="">DNI</label>
                            <input type="number" name="dni" class="form-control" require>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
            </form>
        </div>
    </section>
</main>
<?php
require_once(VIEWS_PATH."footer.php");
?>