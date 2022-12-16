<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use Controllers\BooksController as BooksController;

class SessionController
{


  public function __construct()
  {

    $this->userDAO = new UserDAO();
   
  }

  public function Login($email, $password)
  {
    $user=$this->userDAO->GetAll($email);
    if($user)
    {
      if($user->getPassword()==$password)
      {
        $_SESSION["email"]=$user->getEmail();
        $alert = [
          "type" => "success",
          "text" => "Sesion iniciada con exito"
      ];
      
      $this->booksController= new BooksController;
      $this->booksController->ShowListView($alert);
      }else{
        $alert = [
            "type" => "error",
            "text" => "Error al iniciar sesion, contraseña incorrecta"
        ];
      
       $this->ShowIndex($alert);
    }
    }  else {
      $alert = [
          "type" => "error",
          "text" => "error al iniciar sesion, datos invalidos"
      ];
      $this->ShowIndex($alert);
  }
  }
public function ShowIndex($alert="")
{
  require_once (VIEWS_PATH .'index.php');
}
 
public function logout()
{
  session_start();
  session_destroy();
  header("location: ../index.php");
}
}
