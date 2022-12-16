
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">login</h2>
               <form action=<?php	echo FRONT_ROOT?>Session\Login method="POST" class="login-form bg-dark-alpha p-5 bg-light">
               <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="email" name="email" class="form-control form-control-lg" require placeholder="Ingresar usuario">
               </div>
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" require placeholder="Ingresar constraseña">
               </div>
               <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
             
          </form>
          </div>
     </section>
</main>