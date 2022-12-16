<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Examen Final Laboratorio IV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body class="signup-page">

    <main>
        <div class="form-wrapper shadow-sm">
            <i class="bi bi-bag-check-fill text-primary" style="font-size: 80px"></i>
            <h1 class="title">Registro</h1>

            <form action="<?php echo FRONT_ROOT?>Auth/signup" method = 'post' class="form mt-4">
         
                <div class="form-group mb-4">
                    <label for="" class="mb-2">Email</label>
                    <input type="email" name='email' class="form-control shadow-sm" required/>
                </div>
                <div class="form-group mb-4">
                    <label for="" class="mb-2">Password</label>
                    <input type="password" name='password' class="form-control shadow-sm" required/>
                </div>
                <button class="btn btn-primary mb-4 m-auto" type="submit">Crear cuenta</button>
            </form>
            <div>
                <a href="<?php echo FRONT_ROOT?>Auth/Login" class="text-primary">¿Ya tenes cuenta?</a>
            </div>
        </div>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>