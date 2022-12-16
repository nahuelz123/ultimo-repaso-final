<?php

    namespace Models;

    class Producto {
        private $name;
        private $price;
        private $stock;
        private $detail;
        private $state;
        private $status;
        private $idProducto;
        private $idSeller;

        public function __construct(){

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

        public function getDetail()
        {
                return $this->detail;
        }

        public function setDetail($detail)
        {
                $this->detail = $detail;

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
 
        public function getIdProducto()
        {
                return $this->idProducto;
        }

        public function setIdProducto($idProducto)
        {
                $this->idProducto = $idProducto;

                return $this;
        }

        public function getIdSeller()
        {
                return $this->idSeller;
        }

        public function setIdSeller($idSeller)
        {
                $this->idSeller = $idSeller;

                return $this;
        }

        public function getStatus()
        {
                return $this->status;
        }

        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
    }

?>