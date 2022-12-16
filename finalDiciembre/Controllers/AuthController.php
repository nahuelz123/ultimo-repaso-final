<?php
namespace Controllers;

use Controllers\StoreController as StoreController;

class AuthController
{
    public function __construct()
    {
       $this->storeCon = new StoreController();
       
    }
    public function Store($alert = "")
    {
        $this->storeCon->ShowListView($alert);
      
    }
}
