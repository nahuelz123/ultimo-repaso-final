<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - Examen Final Laboratorio IV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body class="store-page">

    <header class="bg-primary">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div class="logo d-flex align-items-center">
                        <i class="bi bi-bag-check-fill text-white" style="font-size: 50px"></i>
                        <h3 class="text-white ms-4 mt-3">Laboratorio IV</h3>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLabIV" aria-controls="navbarLabIV" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarLabIV">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo FRONT_ROOT?>Store/Store">Tienda</a>
                        </li>
                        <?php if(isset($_SESSION['idUser'])){ ?>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo FRONT_ROOT?>Store/AddProduct">Agregar producto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo FRONT_ROOT?>Auth/logOut">Cerrar sesi??n</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo FRONT_ROOT?>Auth/showSession">Iniciar sesi??n</a>
                            </li>
                        <?php }?>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php foreach($storeList as $prod){?>
                        <div class="card mb-4">
                        <img src="./assets/images/default.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $prod->getName()?></h5>
                          <p class="card-text"> $ <?php echo $prod->getPrice() ?></p>
                          <a href="<?php echo FRONT_ROOT?>Store/Detail/ <?php echo $prod->getIdProducto()?>" class="btn btn-primary">Ver producto</a>
                          <?php if(isset($_SESSION['idUser']) && $_SESSION['idUser']== $prod->getIdSeller()) {?>
                          <a href="<?php echo FRONT_ROOT?>Store/Delete/<?php echo $prod->getIdProducto()?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar producto</a>
                          <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-center text-white p-3">
        UTN - Laboratorio 2022 - Examen Final
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>