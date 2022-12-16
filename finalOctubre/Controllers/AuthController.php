<?php
namespace Controllers;
 
use DAO\UserDAO as UserDAO;
use Models\User as User;
use Controllers\BooksController as BooksController;
use \Exception as Exception;

class AuthController {

    public function __construct()
  {
    $this->userDAO = new UserDAO();
  // $this->Controller = new BooksController();
   
  }

  public function toIndex ($alert="") {
  //  $alert;
    require_once(VIEWS_PATH.'login.php'); 
}

   
    public function Login($email, $password)
    {
         $user= $this->userDAO->GetByEmail($email);
      
         if($user)
         {
            if($user->getPassword()==$password)
            {     
                $_SESSION["userId"]=$user->getIdUser();
                $alert = [
                    "type" => "success",
                    "text" => "Sesion iniciada con exito"
                ];
               
                $this->Controller = new BooksController();
                $this->Controller->ShowListView($alert);
            }else
            {
                $alert = [
                    "type" => "success",
                    "text" => "contraseña incorrecta"
                ];
                $this->toIndex($alert);
            }
         }  else{
            $alert = [
                "type" => "success",
                "text" => "datos incorrectos intente denuevo"
            ];
            $this->toIndex($alert);
         }
    }
    public function signup($email,$password)
    {
      try {
        $this->verificarEmail($email);
        $user = new User();
   
        $user->setEmail($email);
        $user->setPassword($password);
        $this->userDAO->add($user);
        $alert = [
          "type" => "success",
          "text" => "Pefil creado con exito!"
      ];
      $this->toIndex($alert);
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
