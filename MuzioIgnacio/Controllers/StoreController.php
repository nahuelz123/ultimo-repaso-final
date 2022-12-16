<?php

    namespace Controllers;

    use Models\Producto;
    use DAO\ProductoDAO;
    use FFI\Exception;

    class StoreController {

        private $productoDAO;

        public function __construct(){
            $this->productoDAO = new ProductoDAO();
        }

        public function Store(){
            $storeList = array();

            try{
                $storeList = $this->productoDAO->GetAllStock();
                if(count($storeList)==0){
                    $alert = [
                        "type" => "error",
                        "text" => 'No hay productos disponibles'
                    ]; 
                }
                require_once(VIEWS_PATH.'store.php');
            }catch (Exception $e) {
                $alert = [
                    "type" => "error",
                    "text" => $e->getMessage()
                ]; 
            }
        }

        public function Detail ($idProducto) {
            try{
                $prod = $this->productoDAO->GetProductoById($idProducto);
                require_once(VIEWS_PATH.'product-detail.php');
            }catch (Exception $e){
                $alert = [
                    "type" => "error",
                    "text" => $e->getMessage()
                ]; 
                $this->Store($alert);
            }
        }

        public function Delete ($idProducto) {
            try{
                $prod = $this->productoDAO->DeleteById($idProducto);
                $alert = [
                    "type" => "success",
                    "text" => 'producto eliminado con exito'
                ];
                $this->Store($alert);
            }catch (Exception $e){
                $alert = [
                    "type" => "error",
                    "text" => $e->getMessage()
                ]; 
                $this->Store($alert);
            }
        }

        public function Buy ($idProducto){
            try{
                $prod = $this->productoDAO->ReduceStockById($idProducto);
                $alert = [
                    "type" => "success",
                    "text" => 'producto comprado con exito'
                ];
                $this->Store($alert);
            }catch (Exception $e){
                $alert = [
                    "type" => "error",
                    "text" => $e->getMessage()
                ]; 
                $this->Store($alert);
            }
        }

        public function AddProduct ($name = '', $price = '', $stock = '', $detail = '', $state = ''){
            if(isset($_SESSION)){
                if($name != '' && $price != '' && $stock != '' && $detail != '' && $state != ''){
                    $prod = new Producto();
                    $prod->setName($name);
                    $prod->setPrice($price);
                    $prod->setStock($stock);
                    $prod->setDetail($detail);
                    $prod->setState($state);
                    $prod->setIdSeller($_SESSION['idUser']);
                    try{
                        $this->productoDAO->Add($prod);
                        $alert = [
                            "type" => "success",
                            "text" => 'producto agregado con exito'
                        ];
                        $this->Store($alert);
                    } catch (Exception $e) {
                        $alert = [
                            "type" => "error",
                            "text" => 'Hubo un error al agregar el producto'
                        ];
                        $this->Store($alert);
                    }
                }else {
                    require_once(VIEWS_PATH.'add-product.php');
                }
            }else {
                require_once(VIEWS_PATH.'login.php');
            }
        }
    }


?>