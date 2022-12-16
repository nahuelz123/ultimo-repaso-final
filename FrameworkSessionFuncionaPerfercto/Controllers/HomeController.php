<?php

namespace Controllers;

use DAO\BooksDAO;
use DAO\UserDAO as UserDAO;

class HomeController
{
    public function __construct()
    {

        $this->userDAO = new UserDAO();
        $this->booksDAO = new BooksDAO();
    }
    public function Index()
    {
       
        if (isset($_SESSION['email'])) {
            $userList = $this->userDAO->GetAll();
            $booksList = $this->booksDAO->GetAll();
            foreach ($userList as $user) {
                if ($_SESSION['email'] == $user->getEmail()) {
                    $booksList;
                    require_once(VIEWS_PATH . "book-list.php");
                }
            }
        } else {
            require_once(VIEWS_PATH . "index.php");
        }
    }
}
