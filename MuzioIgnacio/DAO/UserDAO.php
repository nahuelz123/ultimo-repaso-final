<?php

    namespace DAO;

    use Models\User;
    use FFI\Exception;

    class UserDAO {
        
        public function __construct()
        {
            
        }

        public function GetByEmail ($email){
            $query = 'CALL User_GetByEmail()';
            $parameters['email'] = $email;

            try{
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query,$parameters, QueryType::StoredProcedure);

                foreach($result as $row){
                   $user = new User();
                   $user->setName($row['name']);
                   $user->setName($row['lastName']);
                   $user->setEmail($row['email']);
                   $user->setPassword($row['password']);
                   $user->setIdUser($row['idUser']);
                }
                return $user;
            }catch (Exception $e){
                throw new Exception('Error al cargar la base de datos');
            }
        }

        public function Add (User $user){
            $query = 'CALL User_Add(?,?,?,?)';
            $parameters['nameS'] = $user->getName();
            $parameters['lastNameS'] = $user->getName();
            $parameters['emailS'] = $user->getEmail();
            $parameters['passwordS'] = $user->getPassword();

            try{
                $this->connection = Connection::GetInstance();
                $this->connection->Execute($query,$parameters, QueryType::StoredProcedure);
            }catch (Exception $e){
                throw new Exception('Error al cargar la base de datos');
            }
        }
        
    }

?>