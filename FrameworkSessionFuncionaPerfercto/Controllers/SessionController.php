<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;


class SessionController
{


  public function __construct()
  {

    $this->userDAO = new UserDAO();
  }

  public function Login($email, $password)
  {
    $i = 0;
    $userList = $this->userDAO->GetAll();
    foreach ($userList as $user) {

      if ($user->getEmail() == $email) {
        $i = 1;
        if ($password == $user->getPassword()) {

          $_SESSION['email'] = $email;

          header("location: ../Books/ShowListView");
        } else {
          echo "<script> if(confirm('password incorrecta !'));";
          echo "window.location = '../index.php'; </script>";
        }
      }
    }
    if ($i == 0) {
      require_once(VIEWS_PATH . "index.php");
    }
  }



  public function comprobarApi($email)
  {

    $students = $this->studentDAO->checkApi();


    foreach ($students as $student) {

      if ($student["email"] == $email) {
        if ($student["active"] == true) {


          $_SESSION['email'] = $email;
        }
      }
    }

    if (is_null($_SESSION['email'])) {
      echo "<script> if(confirm('su datos no son validos o no se encuentra registrado en el sistema  , comuniquese con la facultad!'));";
      echo "window.location = '../index.php'; </script>";
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header("location: ../index.php");
  }
}
