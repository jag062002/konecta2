<?php

class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function productos()
    {
        $result = $this->model->getProductos();
        $result2 = $this->model->getCategorias();
        require_once("Templates/header.php");
        require_once("Views/Productos/productos.php");
        require_once("Templates/footer.php");
    }

    public function setProducto()
    {
        $nombre = strClean($_POST['nombre']);
        $precio = strClean(str_replace(".", "", $_POST['precio']));
        $peso = strClean($_POST['peso']);
        $categoria = strClean($_POST['categoria']);
        $stock = strClean($_POST['stock']);

        if ($_POST['productId']) {
            $productId = strClean($_POST['productId']);
            $result = $this->model->updateProducto($nombre, $precio, $peso, $categoria, $stock, $productId);
            if ($result) {
                $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error actualizando el producto');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        } else {


            $result_existencias = $this->model->getProducto($nombre);


            if($result_existencias['existencias'] == 0)
            {
                $referencia = rand();
                $fecha_creacion = date('Y-m-d H:i:s');
                $result = $this->model->insertProducto($nombre, $precio, $peso, $categoria, $stock, $referencia, $fecha_creacion);
                if ($result == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Error guardando el producto');
                }
            }else{
                $arrResponse = array('status' => false, 'msg' => 'El producto ya existe!'); 
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function eliminarProducto()
    {
        $productId = $_GET['productId'];
        $result = $this->model->deleteProducto($productId);
        if ($result) {
            $arrResponse = array('status' => true, 'msg' => 'Producto borrado correctamente');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
