<?php

namespace Controllers;

use DAO\UserDAO as UserDAO;
use Controllers\AuthController as AuthController;
use Models\User;
use \Exception as Exception; 
//use JSON\UserDAO as UserDAO;

class SessionController
{


  public function __construct()
  {

    $this->userDAO = new UserDAO();
    $this->auth = new AuthController();
  }

  public function Login($email, $password)
  {
    $user=$this->userDAO->GetByEmail($email);
    if($user)
    {
      if($user->getPassword()==$password)
      {
        $_SESSION["idUser"]=$user->getIdUser();
        $alert = [
          "type" => "success",
          "text" => "Sesion iniciada con exito"
      ];
      
      $this->auth->Store($alert);
      }else{
        $alert = [
            "type" => "error",
            "text" => "Error al iniciar sesion, contraseña incorrecta"
        ];
      
        require_once (VIEWS_PATH .'login.php');
    }
    }  else {
      $alert = [
          "type" => "error",
          "text" => "error al iniciar sesion, datos invalidos"
      ];
      require_once (VIEWS_PATH .'login.php');
  }
   


  }
  public function signup($name,$lastName,$email,$password)
  {
    try {
      $this->verificarEmail($email);
      $user = new User();
      $user->setName($name);
      $user->setLastName($lastName);
      $user->setEmail($email);
      $user->setPassword($password);
      $this->userDAO->add($user);
      $alert = [
        "type" => "success",
        "text" => "Pefil creado con exito!"
    ];
    $this->ShowLogin($alert);
  }
  catch (Exception $e){
      $alert = [
          "type" => "error",
          "text" => $e->getMessage()
      ];
      require_once(VIEWS_PATH.'signup.php');
  }
  } 
  public function verificarEmail($email)
  {
     $user=$this->userDAO->GetByEmail($email);
     if($user)
     {
      throw new Exception ('Mail ya registrado');
     }
  }

  public function ShowLogin($alert="")
  {
    require_once(VIEWS_PATH . "login.php");
  }

  public function ShowAddUser()
  {
    require_once(VIEWS_PATH . "signup.php");
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header("location: ../index.php");
  }
}
