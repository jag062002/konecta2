<?php

class VentasModel extends Mysql
{
    public $productId;
    public $cantidad;
    public $total;
    public $fecha_venta;
    public $stockNuevo;


    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos()
    {
        $query = "SELECT
        productos.id,
        productos.nombre,
        productos.referencia,
        productos.precio,
        productos.peso,
        productos.stock,
        productos.fecha_creacion,
        categorias.nombre AS 'categoria',
        categorias.id AS 'idCategoria'
        FROM
        productos
        INNER JOIN categorias ON productos.categoria = categorias.id";
        return $this->select_all($query);
    }

    public function insertVenta($productId,$cantidad,$total,$fecha_venta)
    {
        $this->productId = $productId;
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->fecha_venta = $fecha_venta;

        $query = "INSERT INTO ventas(id_producto,cantidad,total,fecha_venta) VALUES(?,?,?,?)";
        $arrData = array($this->productId,$this->cantidad,$this->total,$this->fecha_venta);

        return $this->insert($query,$arrData);
    }
    public function updateStock($productId,$stockNuevo)
    {
        $this->productId = $productId;
        $this->stockNuevo = $stockNuevo;

        $query = "UPDATE productos SET stock = ? WHERE id = {$this->productId}";
        $arrData = array($this->stockNuevo);

        return $this->update($query,$arrData);
    }
}