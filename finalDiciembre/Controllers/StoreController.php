<?php

namespace Controllers;

use DAO\ProductoDAO as ProductoDAO;
use Models\Producto as Producto;
use \Exception as Exception; 
class StoreController
{
    private $productoDAO;


    public function __construct()
    {
        $this->productoDAO = new ProductoDAO();
    }

    public function ShowAddView()
    {
     
     if(isset($_SESSION["idUser"])){
        require_once(VIEWS_PATH . "add-product.php");
     }else
     { $alert = [
        "type" => "error",
        "text" => "debe iniciar sesion"
    ];
    require_once(VIEWS_PATH . "login.php");
}
    }

    public function ShowListView($alert = "")
    {
     
            
            $storeList = array();
            try{
                $storeList = $this->productoDAO->GetAllStock();
                if(count($storeList)==0){
                    $alert = [
                        "type" => "error",
                        "text" => 'No hay productos disponibles'
                    ]; 
                }
                require_once(VIEWS_PATH . "store.php");
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
            $alert = [
                "type" => "success",
                "text" => 'producto eliminado con exito'
            ];
            require_once(VIEWS_PATH.'product-detail.php');
        }catch (Exception $e){
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ]; 
            $this->ShowListView($alert);
        }
    }




    public function NewAdd($title,$description,$price,$stock,$state)
    {
        $produc = new Producto();
        $produc->setIdUser($_SESSION['idUser']);
        $produc->setTitle($title);
        $produc->setDescription($description);
        $produc->setPrice($price);
        $produc->setStock($stock);
        $produc->setState($state);

        return $produc;
    }


    public function Add($title,$description,$price,$stock,$state)
    {
       
            $produc = $this->NewAdd($title,$description,$price,$stock,$state);
      try{
            $this->productoDAO->Add($produc);
            $alert = [
                "type" => "success",
                "text" => 'producto agregado con exito'
            ];
            $this->ShowListView($alert);
         }
         catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => 'Hubo un error al agregar el producto'
            ];
            $this->ShowListView($alert);
        }
        }
    
    public function delete($code)
    {

        try{
            $prod = $this->productoDAO->deleDeleteByIdte($code);
            $alert = [
                "type" => "success",
                "text" => 'producto eliminado con exito'
            ];
            $this->ShowListView($alert);
        }catch (Exception $e){
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ]; 
            $this->ShowListView($alert);
        }
    }
    
    public function Buy($code){
        try{
            $prod = $this->productoDAO->comprar($code);
            $alert = [
                "type" => "success",
                "text" => 'producto comprado con exito'
            ];
            $this->ShowListView($alert);
        }catch (Exception $e){
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ]; 
            $this->ShowListView($alert);
        }
    }
}
