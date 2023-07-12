<?php

class Ventas extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function compra()
    {
        $result = $this->model->getProductos();

        require_once("Templates/header.php");
        require_once("Views/Ventas/compra.php");
        require_once("Templates/footer.php");
    }

    public function setVenta()
    {
        $productId = $_POST['productId'];
        $stock = $_POST['stock'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['precio'] * $cantidad;
        $fecha_venta = date('Y-m-d H:i:s');

        $result = $this->model->insertVenta($productId, $cantidad, $total, $fecha_venta);

        if ($result == 1) {
            $nuevoStock = $stock - $cantidad;
            $result = $this->model->updateStock($productId, $nuevoStock);
            if (!$result) {
                $arrResponse = array('status' => false, 'msg' => 'Hubo un error actualizando el stock');
            }
            $arrResponse = array('status' => true, 'msg' => 'Compra procesada con éxito');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Hubo un error procesando la compra');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
