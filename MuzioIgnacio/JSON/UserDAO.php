<?php 
   namespace JSON;

   use Models\User;

   class UserDAO
   {
     private $list = array();
     private $filename;
     private $maxId;

     public function __construct()
     {
       $this->filename = dirname(__DIR__)."/Data/Users.json";
       $this->maxId = 0;
     }

     public function GetAll()
     {
       $this->loadData();
       return $this->list;
     }

     public function GetByEmail($email){
       $this->LoadData();
       foreach($this->list as $user){
           if(strcmp($user->getEmail(),$email)==0){
             return $user;
           }
       }
     }

     private function LoadData() 
     {
       $this->list = array();

       if(file_exists($this->filename)) 
       {
         $jsonContent = file_get_contents($this->filename);
         $array = ($jsonContent) ? json_decode($jsonContent, true) : array();
         
         foreach($array as $item) 
         {
           $user = new User();
           
           $user->setName($item["name"]);
           $user->setLastName($item["lastName"]);
           $user->setEmail($item["email"]);
           $user->setPassword($item["password"]);
           $user->setIdUser($item["idUser"]);
           array_push($this->list, $user);
           if($user->getIdUser()>$this->maxId){
               $this->maxId = $user->getIdUser();
           }
         }
       }
     }

     public function Add($user)
     {
           $this->loadData();
           $this->maxId++;
           $user->setId($this->maxId);
           array_push($this->list, $user);
           $this->SaveData();
     }

     private function SaveData() 
     {
           $toEncode = array();
           foreach($this->list as $item) {
               array_push($toEncode, $item->toArray());
           }
           $json = json_encode($toEncode, JSON_PRETTY_PRINT);
           file_put_contents($this->filename, $json);
     }
   
   }
?>