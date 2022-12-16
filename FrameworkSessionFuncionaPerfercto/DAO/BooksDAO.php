<?php

namespace DAO;
use \Exception as Exception;
use DAO\IViews as IViews;
use Models\Book as Book;
use DAO\Connection as Connection;
class BooksDAO implements IViews
{
    private $booksList = array();
  
    private $connection;
    private $tableName = "books";


public function Add($book)
{    
    try
    {
        $query = "INSERT INTO ".$this->tableName." (title,price ) VALUES (:title,:price);";
    
     
        $valuesArray["title"] = $book->getTitle();
       
        $valuesArray["price"]= $book->getPrice();
     
    $this->connection = Connection::GetInstance();
   $this->connection->ExecuteNonQuery($query, $valuesArray);
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
}
     
  public function GetAll()
{
    try
    {
        $booksList = array();

        $query = "SELECT * FROM ".$this->tableName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $valuesArray)
        {                
            $book = new Book();
            $book->setCode($valuesArray["code"]);
            $book->setTitle($valuesArray["title"]);
     
            $book->setPrice($valuesArray["price"]);
          
           

            array_push($booksList, $book);
        }

        return $booksList;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
}



    public function delete($code)
    {
      
        //$this->connection = Connection::GetInstance();
    
        $consulta= "DELETE From books WHERE code = '$code'";
      $connection = $this->connection;
        $connection->Execute($consulta);
    }


    


}
