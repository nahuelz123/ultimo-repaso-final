<?php
    namespace Controllers;
    use Models\User as User;
    use DAO\UserDAO as UserDAO;
//  use JSON\UserDAO as UserDAO;
    use Controllers\StoreController as StoreController;
    use FFI\Exception;

    class AuthController
    {
        private $userDAO;
        private $controller;

        function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->controller = new StoreController();
        }

        public function Login($email, $password) 
        {
            $user = $this->userDAO->getByEmail($email);
            if($user){
                if($user->getPassword() == $password){
                    $_SESSION['idUser'] = $user->getId();
                    $alert = [
                        "type" => "success",
                        "text" => "Sesion iniciada con exito"
                    ];
                    $this->controller->Store($alert);
                }else{
                    $alert = [
                        "type" => "error",
                        "text" => "Error al iniciar sesion, contraseña incorrecta"
                    ];
                    require_once (VIEWS_PATH .'login.php');
                }
            }
            else {
                $alert = [
                    "type" => "error",
                    "text" => "error al iniciar sesion, datos invalidos"
                ];
                require_once (VIEWS_PATH .'login.php');
            }
        }

        public function logOut (){
            session_destroy();
            $alert = [
                "type" => "success",
                "text" => "Sesion cerrada con exito"
            ];
            $this->controller->Store();
        }

        public function signUp($name = '',$lastName='', $email = '', $password = ''){
            if ($name != '' && $email != '' && $lastName != '' && $password != ''){
                try {
                    $this->verifyEmail($email);
                    $user = new User();
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setLastName($lastName);
                    $user->setPassword($password);
                    $this->userDAO->Add($user);
                    $alert = [
                        "type" => "success",
                        "text" => "Pefil creado con exito!"
                    ];
                    require_once(VIEWS_PATH.'login.php');
                }
                catch (Exception $e){
                    $alert = [
                        "type" => "error",
                        "text" => $e->getMessage()
                    ];
                    require_once(VIEWS_PATH.'signup.php');
                }
            }else {
                require_once(VIEWS_PATH.'signup.php');
            }
        }

        public function verifyEmail($email){
            $user = $this->userDAO->GetByEmail($email);
            if($user){
                throw new Exception ('Mail ya registrado');
            }
        }

        public function Store (){
            $this->controller->Store();
        }
        public function showSession()
        {
            require_once(VIEWS_PATH.'login.php');
        }
    }


?>