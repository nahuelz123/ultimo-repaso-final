<?php

namespace DAO;
use \Exception as Exception;
use DAO\IViews as IViews;
use Models\User as User;
use DAO\Connection as Connection;
class UserDAO implements IViews
{
    private $companytList = array();
  
    private $connection;
    private $tableName = "users";


public function Add($user)
{    
    try
    {
        $query = "INSERT INTO ".$this->tableName." (email,password ) VALUES (:email,:password);";
    
     
        $valuesArray["email"] = $user->getEmail();
       
        $valuesArray["password"]= $user->getPassword();
     
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
        $userList = array();

        $query = "SELECT * FROM ".$this->tableName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $valuesArray)
        {                
            $user = new User();
            $user->setUserId($valuesArray["userId"]);
     
            $user->setEmail($valuesArray["email"]);
          
            $user->setPassword($valuesArray['password']);

            array_push($userList, $user);
        }

        return $userList;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
}


    public function Modify( $CompanyName, $BusinessName, $CompanyAdress,$id_company, $telephone, $email, $web,$cuil,$password)
    {   
       
        $this->connection = Connection::GetInstance();
        
        $consulta= "UPDATE company
        SET CompanyName = '$CompanyName', BusinessName = '$BusinessName', CompanyAdress = '$CompanyAdress',cuil = '$cuil', telephone = $telephone, email = '$email', web = '$web', password ='$password'
        WHERE id_company = '$id_company'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    

    }

    public function delete($CompanyName)
    {
      
        //$this->connection = Connection::GetInstance();
    
        $consulta= "DELETE From company WHERE CompanyName = '$CompanyName'";
      $connection = $this->connection;
        $connection->Execute($consulta);
    }


    


}
