<?php

namespace Controllers;

use DAO\BooksDAO as BooksDAO;
use Models\Book as Book;
//use Controllers\AuthController as AuthController;
use \Exception as Exception;

class BooksController
{
    private $booksDAO;


    public function __construct()
    {
        $this->booksDAO = new BooksDAO();
        //$this->authController = new AuthController();
    }

    public function ShowAddView()
    {

        if (isset($_SESSION["userId"])) {
            require_once(VIEWS_PATH . "add-book.php");
        } else {
            $alert = [
                "type" => "error",
                "text" => "debe iniciar sesion"
            ];
            $this->authController = new AuthController();
            $this->authController->toIndex($alert);
          // require_once(VIEWS_PATH . "login.php");
        }
    }

    public function ShowListView($alert = "")
    {
        if (isset($_SESSION["userId"])) {
            $booksList = array();
            try {
                $booksList = $this->booksDAO->GetAll();
           
                if (!isset($booksList)) {
                    $alert = [
                        "type" => "error",
                        "text" => 'No hay productos disponibles'
                    ];
                }
                require_once(VIEWS_PATH . "booksList.php");
            } catch (Exception $e) {
                $alert = [
                    "type" => "error",
                    "text" => $e->getMessage()
                ];
            }
        } else {
            $alert = [
                "type" => "error",
                "text" => "debe iniciar sesion"
            ];
            $this->authController = new AuthController();
            $this->authController->toIndex($alert);
         //  require_once(VIEWS_PATH . "login.php");
        }
  
    }




    public function NewAdd($title, $price)
    {
        $book = new Book();

        $book->setTitle($title);
        $book->setPrice($price);


        return $book;
    }


    public function Add($title, $price)
    {
        $book = $this->NewAdd($title, $price);

        try {

            $this->booksDAO->Add($book);
            $alert = [
                "type" => "success",
                "text" => 'book agregado con exito'
            ];
            $this->ShowListView($alert);
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => 'Hubo un error al agregar el book'
            ];
            $this->ShowListView($alert);
        }
    }

    public function delete($code)
    {

        try {
            $this->booksDAO->deleDeleteByIdte($code);
            $alert = [
                "type" => "success",
                "text" => 'producto eliminado con exito'
            ];
            $this->ShowListView($alert);
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
            $this->ShowListView($alert);
        }
    }
}
