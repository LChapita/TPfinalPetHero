<main class="d-flex align-items-center justify-content-center height-100" >
     <div class="content">
          <header class="text-center">
          <section id="listado" class=" bg-dark text-white"> <center>
            <h2 class="mb-3 text-white"> Login </h1>  </section id="listado" class="mb-5">
</center>
          </header>
          <form action="<?php echo FRONT_ROOT. "Home/EnterUser" ?>" method="POST" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="userName" class="form-control form-control-lg" placeholder="Ingresar usuario" required>
               </div>
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" required>
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
          </form>
     </div>
</main>