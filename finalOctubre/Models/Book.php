<?php

    namespace Models;

    class Book {
       private $code;
       private $title;
       private $price;

        

    
       public function getCode()
       {
              return $this->code;
       }

  
       public function setCode($code)
       {
              $this->code = $code;

              return $this;
       }

    
       public function getTitle()
       {
              return $this->title;
       }

    
       public function setTitle($title)
       {
              $this->title = $title;

              return $this;
       }

       public function getPrice()
       {
              return $this->price;
       }

     
       public function setPrice($price)
       {
              $this->price = $price;

              return $this;
       }
    }

?>