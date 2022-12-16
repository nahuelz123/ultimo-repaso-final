<?php

namespace DAO;

use \Exception as Exception;

use Models\Producto as Producto;
use DAO\Connection as Connection;
use Models\Book;

class BooksDAO
{
    private $companytList = array();

    private $connection;
    private $tableName = "books";


    public function Add($book)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (title,price) VALUES (:title,:price);";

            $valuesArray["title"] = $book->getTitle();
            $valuesArray["price"] = $book->getPrice();

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $booksList = array();

        try {


            $query = "SELECT * FROM ".$this->tableName;
            
            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
           
            foreach ($resultSet as $valuesArray) {
                $book = new Book();
                $book->setCode($valuesArray['code']);


                $book->setTitle($valuesArray["title"]);


                $book->setPrice($valuesArray['price']);;
                array_push($booksList, $book);
            }
            //var_dump($booksList);
            return $booksList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }


    //para eliminar el producto 
    public function deleDeleteByIdte($code)
    {
        $this->connection = Connection::GetInstance();

        $consulta = "DELETE From .$this->tableName WHERE code = '$code'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
