<?php 

if (isset($_SESSION['email']))
{
     
          require_once(VIEWS_PATH . "nav.php");
     
}else 
{
     require_once(VIEWS_PATH . "index.php");
}
  
?>
<!doctype html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

     <title>repaso final lab4</title>
</head>
<body>
