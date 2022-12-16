<?php

namespace Models;

class Producto
{
        private $idProducto;
        private $idUser;
        private $title;
        private $description;
        private $price;
        private $stock;
        private $state;


        public function getIdProducto()
        {
                return $this->idProducto;
        }


        public function setIdProducto($idProducto)
        {
                $this->idProducto = $idProducto;

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


        public function getTitle()
        {
                return $this->title;
        }

        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }


        public function getDescription()
        {
                return $this->description;
        }


        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }


        public function getPrice()
        {
                return $this->price;
        }


        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }


        public function getStock()
        {
                return $this->stock;
        }


        public function setStock($stock)
        {
                $this->stock = $stock;

                return $this;
        }


        public function getState()
        {
                return $this->state;
        }


        public function setState($state)
        {
                $this->state = $state;

                return $this;
        }
}
