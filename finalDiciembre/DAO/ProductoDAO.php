<?php

namespace DAO;

use \Exception as Exception;

use Models\Producto as Producto;
use DAO\Connection as Connection;

class ProductoDAO 
{
    private $companytList = array();

    private $connection;
    private $tableName = "producto";


    public function Add($produc)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (idUser,title,description,price,stock,state) VALUES (:idUser,:title,:description,:price,:stock,:state);";
         
            $valuesArray["idUser"] = $produc->getIdUser();
            $valuesArray["title"] = $produc->getTitle();
            $valuesArray["description"] = $produc->getDescription();
            $valuesArray["price"] = $produc->getPrice();
            $valuesArray["stock"] = $produc->getStock();
            $valuesArray["state"] = $produc->getState();

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetProductoById($idProducto)
    {
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE idProducto = '$idProducto'";;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $produc = new Producto();
                $produc->setIdProducto($valuesArray['idProducto']);
                $produc->setIdUser($valuesArray["idUser"]);

                $produc->setTitle($valuesArray["title"]);

                $produc->setDescription($valuesArray['description']);
                $produc->setPrice($valuesArray['price']);
                $produc->setStock($valuesArray['stock']);
                $produc->setState($valuesArray['state']);
               
            }

            return $produc;
        } catch (Exception $e) {
            throw new Exception('Error al cargar la base de datos'.$e->getMessage());
        }
    }

    public function GetAllStock()
    {
        $productoList= array();
       
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE stock > '0'";;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $produc = new Producto();
                $produc->setIdProducto($valuesArray['idProducto']);
                $produc->setIdUser($valuesArray["idUser"]);

                $produc->setTitle($valuesArray["title"]);

                $produc->setDescription($valuesArray['description']);
                $produc->setPrice($valuesArray['price']);
                $produc->setStock($valuesArray['stock']);
                $produc->setState($valuesArray['state']);
                array_push($productoList, $produc);
            }

            return $productoList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }

///para realizar la compra 
    public function comprar($idProducto)
    {
        
        $prod=$this->GetProductoById($idProducto);
        
        $this->connection = Connection::GetInstance();
         $stock=$prod->getStock()-1;
        
        $consulta = "UPDATE producto
        SET stock = '$stock'
        WHERE idProducto = '$idProducto'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
//para eliminar el producto 
    public function deleDeleteByIdte($idProducto)
    {
        $this->connection = Connection::GetInstance();
    
        $consulta = "DELETE From producto WHERE idProducto = '$idProducto'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
