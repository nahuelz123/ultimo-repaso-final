
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar book</h2>
               <form action="<?php echo FRONT_ROOT ?>Books/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                       
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">title</label>
                                   <input type="text" name="title" value="" require class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">price</label>
                                   <input type="number" name="price" value="" require class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar book</button>
               </form>
          </div>
     </section>
</main>