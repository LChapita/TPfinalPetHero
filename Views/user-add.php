<?php
require_once('nav-new-user.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">New User</h2>
            <form action="<?php echo FRONT_ROOT . "User/NewUser" ?>" method="POST" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" required>

                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>

                            <a>Select User Type</a>
                            <select name="typeuser" class="form-control">
                                <option value="Owner" required>Owner</option>
                                <option value="Keeper" required>Keeper</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
            </form>
        </div>
    </section>
</main>
<?php
require_once(VIEWS_PATH . "footer.php");
?>