<?php

    namespace DAO;

    use Models\User;
    use FFI\Exception;

    class UserDAO {
        
       
            private $connection;
            private $tableName = "users";
        

        public function GetByEmail ($email){
            
            $user=0;
            try {
               
                
                $query = "SELECT * FROM .$this->tableName WHERE email = '$email'";;
    
                $this->connection = Connection::GetInstance();
    
                $resultSet = $this->connection->Execute($query);
    
                foreach ($resultSet as $valuesArray) {
                    $user = new User();
                    $user->setIdUser($valuesArray["userId"]);
                    $user->setEmail($valuesArray['email']);
                    $user->setPassword($valuesArray['password']);
                   
                }
    
                return $user;
            } catch (Exception $ex) {
                throw new Exception('Error al cargar la base de datos');
            }
           
        }

        public function Add ($user){
            try {
                $query = "INSERT INTO " . $this->tableName . " (email,password ) VALUES (:email,:password);";
             
               
                $valuesArray["email"] = $user->getEmail();
                $valuesArray["password"] = $user->getPassword();
    
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $valuesArray);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        
    }

?>