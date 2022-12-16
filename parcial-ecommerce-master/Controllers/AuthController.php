<?php
namespace Controllers;

use Controllers\StoreController as StoreController;

class AuthController
{
    public function __construct()
    {
       $this->storeCon = new SessionController();
       
    }/*
    public function Store($alert = "")
    {
        $this->storeCon->ShowListView($alert);
      
    }*/
    public function Store()
    {
       // $this->storeCon->ShowLogin($alert="");
        require_once (VIEWS_PATH .'login.php');
    }
}
