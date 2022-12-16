<?php

namespace Controllers;

use DAO\BooksDAO as BooksDAO;
use Models\Book as Book;

class BooksController
{
    private $booksDAO;


    public function __construct()
    {
        $this->booksDAO = new BooksDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "validarSession.php");
        
        require_once(VIEWS_PATH . "book-add.php");
    }

    public function ShowListView()
    {
     
            require_once(VIEWS_PATH . "validarSession.php");
    
            $booksList = $this->booksDAO->GetAll();

            require_once(VIEWS_PATH . "book-list.php");
    
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
        $booksList = $this->booksDAO->GetAll();

        $i = 0;

        foreach ($booksList as $book) {
            if ($book->getTitle() == $title) {
                $i = 1;

                echo "<script> if(confirm('el book con ese nombre ya existe !'));";
                echo "window.location = '../index.php'; </script>";
            }
        }

        if ($i == 0) {

            $book = $this->NewAdd($title, $price);

            $this->booksDAO->Add($book);
            $this->ShowListView();
        }
    }
    public function delete($code)
    {

        $booksList = $this->booksDAO->GetAll();

        foreach ($booksList as $books) {
            if ($code == $books->getCode()) {

                $this->booksDAO->delete($code);

                $this->ShowListView();
            }
        }
    }
}
