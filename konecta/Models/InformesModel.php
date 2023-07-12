<?php

class InformesModel extends Mysql
{
    public $productId;
    public $nombre;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $referencia;
    public $fecha_creacion;

    public function __construct()
    {
        parent::__construct();
    }

    public function getStock()
    {
        $query = "SELECT
        productos.id,
        productos.nombre,
        productos.referencia,
        productos.stock
        FROM productos";
        return $this->select_all($query);
    }
    public function getMaxStock()
    {
        $query = "SELECT * FROM productos ORDER BY stock DESC LIMIT 1";
        return $this->select_all($query);
    }

    public function maxVentas()
    {
        $query = "SELECT
        productos.nombre,
        SUM(ventas.cantidad) AS 'cantidad',
        SUM(ventas.total) AS 'total'
        FROM
        ventas
        INNER JOIN productos ON ventas.id_producto = productos.id
        GROUP BY productos.nombre
        ORDER BY 2 DESC 
        LIMIT 1";
         return $this->select_all($query);
    }
}
