<?php
namespace Models;
class User{

   private $userId;
    private $email; 
   private $PASSWORD; 
	
 
   public function getUserId()
   {
      return $this->userId;
   }

  
   public function setUserId($userId)
   {
      $this->userId = $userId;

      return $this;
   }

    public function getEmail()
    {
        return $this->email;
    }

 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

   /**
    * Get the value of PASSWORD
    */ 
   public function getPASSWORD()
   {
      return $this->PASSWORD;
   }

 
   public function setPASSWORD($PASSWORD)
   {
      $this->PASSWORD = $PASSWORD;

      return $this;
   }
}

?>