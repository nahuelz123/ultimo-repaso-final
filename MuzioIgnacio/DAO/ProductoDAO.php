<?php 

    namespace DAO;

    use Models\Producto;
    use FFI\Exception;

    class ProductoDAO {

        public function __construct()
        {           
        }

        public function GetAllStock () {

            $productoList = array();
            $query = 'CALL Producto_GetAllStock()';

            try{
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query, array(), QueryType::StoredProcedure);

                foreach($result as $row){
                   if($row['stock']>0){
                        $producto = new Producto();
                        $producto->setName($row['name']);
                        $producto->setPrice($row['price']);
                        $producto->setStock($row['stock']);
                        $producto->setDetail($row['detail']);
                        $producto->setState($row['state']);
                        $producto->setStatus($row['status']);
                        $producto->setIdProducto($row['idProducto']);
                      //  $producto->setIdSeller($row['idSeller']);
                   array_push($productoList,$producto);
                   }
                }
                return $productoList;
            }catch (Exception $e){
                throw new Exception('Error al cargar la base de datos'.$e->getMessage());
            }
        }


        public function Add (Producto $producto){

            $query = 'CALL Producto_Add(?,?,?,?,?,?,?)';
            $parameters['nameS'] = $producto->getName();
            $parameters['priceS'] = $producto->getPrice();
            $parameters['stockS'] = $producto->getStock();
            $parameters['detailS'] = $producto->getDetail();
            $parameters['stateS'] = $producto->getState();
            $parameters['statusS'] = 1;
            $parameters['idSellerS'] = $_SESSION['idUser'];

            try{
                $this->connection = Connection::GetInstance();
                $this->connection->Execute($query,$parameters, QueryType::StoredProcedure);
            }catch (Exception $e){
                throw new Exception('Error al cargar la base de datos');
            }
        }

        public function ReduceStockById ($idProd){
            $query = "CALL Producto_ReduceStockById(?)";

            $parameters["idProdS"] =  $idProd;

            try{
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            }catch(Exception $error){
                throw new Exception("No se pudo comprar el producto".$error->getMessage());
            }
        }

        public function GetProductoById ($idProd){
            $query = 'CALL Producto_GetProductoById(?)';
            $parameters['idProd'] = $idProd;

            try{
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query, $parameters, QueryType::StoredProcedure);

                foreach($result as $row){
                
                    $producto = new Producto();
                    $producto->setName($row['name']);
                    $producto->setPrice($row['price']);
                    $producto->setStock($row['stock']);
                    $producto->setDetail($row['detail']);
                    $producto->setState($row['state']);
                    $producto->setStatus($row['status']);
                    $producto->setIdProducto($row['idProducto']);
                 //   $producto->setIdSeller($row['idSeller']);
                    return  $producto;
                
                }
            }catch (Exception $e){
                throw new Exception('Error al cargar la base de datos'.$e->getMessage());
            }
        }

        public function DeleteById ($idProducto){
            $query = 'CALL Producto_DeleteById(?)';
            $parameters['idProd'] = $idProducto;

            try{
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            }catch (Exception $e){
                throw new Exception('Error al eliminar el producto'.$e->getMessage());
            }
        }



    }


?>