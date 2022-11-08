<main class="d-flex align-items-center justify-content-center height-100">
    <div class="content">
        <header class="text-center">
            <h2>Welcome to Pet Hero</h2>
        </header>
        <form action="<?php echo FRONT_ROOT . "Home/itsOwner" ?>" method="POST" class="login-form bg-dark-alpha p-5 bg-light">
            <!-- pasa el owner -->
            
            <input type="hidden" name="email" value="<?php echo $this->isOwner->getEmail() ?>">
            <button name="owner" class="btn btn-primary btn-block btn-lg">
                Owner
            </button>
        </form>
        <form action="<?php echo FRONT_ROOT . "Home/itsKeeper" ?>" class="login-form bg-dark-alpha p-5 bg-light">
            
            <input type="hidden" name="email" value="<?php echo $this->isKeeper->getEmail() ?>">
            <button name="keeper" class="btn btn-primary btn-block btn-lg">
                Keeper
            </button>
        </form>
    </div>
</main>