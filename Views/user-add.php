<?php
require_once('nav-new-user.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">New User</h2>
            <form class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="" class="form-control" require>

                            <label for="">Password</label>
                            <input type="password" value="" class="form-control" require>
                            <a>Select User Type</a>
                            <select name="TypeUser" class="form-control">
                                <option value="Owner">Owner</option>
                                <option value="Keeper">Keeper</option>
                            </select>
                            <label for="">Name</label>
                            <input type="text" value="" class="form-control" require>

                            <label for="">Surname</label>
                            <input type="text" value="" class="form-control" require>

                            <label for="">DNI</label>
                            <input type="text" value="" class="form-control" require>
                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
            </form>
        </div>
    </section>
</main>