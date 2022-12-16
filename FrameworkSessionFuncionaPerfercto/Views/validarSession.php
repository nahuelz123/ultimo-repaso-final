<?php

if(!isset($_SESSION['email']))
{
    header("location: ../index.php");
//    require_once(VIEWS_PATH . "index.php");
}
?>