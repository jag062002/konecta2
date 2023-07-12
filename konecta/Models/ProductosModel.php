<?php

class ProductosModel extends Mysql
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
    public function getProducto($nombre)
    {
        $query = "SELECT COUNT(*) AS 'existencias' FROM productos WHERE nombre = '$nombre'";
        return $this->select($query);
    }
    public function getCategorias()
    {
        $query = "SELECT * FROM categorias";
        return $this->select_all($query);
    }

    public function insertProducto($nombre,$precio,$peso,$categoria,$stock,$referencia,$fecha_creacion)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->peso = $peso;
        $this->categoria = $categoria;
        $this->stock = $stock;
        $this->referencia = $referencia;
        $this->fecha_creacion = $fecha_creacion;

        $query = "INSERT INTO productos(nombre,referencia,precio,peso,categoria,stock,fecha_creacion) VALUES(?,?,?,?,?,?,?)";
        $arrData = array($this->nombre,$this->referencia,$this->precio,$this->peso,$this->categoria,$this->stock,$this->fecha_creacion);
        return $this->insert($query,$arrData);
    }

    public function deleteProducto($productId)
    {
        $this->productId = $productId;
        $query = "DELETE FROM productos WHERE id = {$this->productId}";
        return $this->delete($query);
    }

    public function updateProducto($nombre,$precio,$peso,$categoria,$stock,$productId)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->peso = $peso;
        $this->categoria = $categoria;
        $this->stock = $stock;
        $this->productId = $productId;

        $query = "UPDATE productos SET nombre=?,precio=?,peso=?,categoria=?,stock=? WHERE id = {$this->productId}";
        $arrData = array($this->nombre,$this->precio,$this->peso,$this->categoria,$this->stock);
        return $this->update($query,$arrData);
    }
}