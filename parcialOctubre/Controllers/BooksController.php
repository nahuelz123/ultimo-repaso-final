<?php

namespace Controllers;

use DAO\BooksDAO as BooksDAO;
use Models\Book as Book;
use \Exception as Exception;

class BooksController
{
    private $booksDAO;


    public function __construct()
    {
        $this->booksDAO = new BooksDAO();
    }

    public function ShowAddView($alert = "")
    {
        require_once(VIEWS_PATH . "validarSession.php");

        require_once(VIEWS_PATH . "book-add.php");
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
                require_once(VIEWS_PATH . "book-list.php");
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
         
           require_once(VIEWS_PATH . "index.php");
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

        $books = $this->booksDAO->GetByTitle($title);
        if ($books) {
            $alert = [
                "type" => "success",
                "text" => 'el libro ya existe'
            ];
            $this->ShowAddView($alert);
        } else {
            try {
                $book = $this->NewAdd($title, $price);
                $this->booksDAO->Add($book);
                $alert = [
                    "type" => "success",
                    "text" => 'producto agregado con exito'
                ];
                $this->ShowListView($alert);
            } catch (Exception $e) {
                $alert = [
                    "type" => "error",
                    "text" => 'Hubo un error al agregar el producto'
                ];
                $this->ShowAddView($alert);
            }
        }
    }
    public function delete($code)
    {
        try {
            $this->booksDAO->deleteByCode($code);
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
