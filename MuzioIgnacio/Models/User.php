<?php

    namespace Models;

    class User {

        private $name;
        private $lastName;
        private $email;
        private $password;
        private $idUser;

        public function __construct (){
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

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

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
 
        public function getIdUser()
        {
                return $this->idUser;
        }

        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }
 
        public function getLastName()
        {
                return $this->lastName;
        }

        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        public function toArray (){
                $me['name'] = $this->name;
                $me['lastName'] = $this->lastName;
                $me['email'] = $this->email;
                $me['password'] = $this->password;
                $me['idUser'] = $this->idUser;
                return $me;
        }
    }


?>