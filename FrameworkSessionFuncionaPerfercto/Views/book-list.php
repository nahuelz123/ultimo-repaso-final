
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de clientes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>title</th>
                         <th>price</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($booksList as $book)
                              {
                                   ?>
                                     <?php
                                  $code = $book->getCode();
                                   ?>
                                        <tr>
                                             <td><?php echo $book->getTitle(). "<br>" ?></td>
                                             <td><?php echo $book->getPrice(). "<br>"  ?></td>

                                         <td> <a class="btn btn-primary btn-block btn-lg" href=<?php echo FRONT_ROOT ?>Books\delete?code=<?php echo $code ?> role="button">Delete</a>   
                                         </td>      
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>