<?php

class Informes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function stock()
    {
        $result = $this->model->getStock();  
        $result2 = $this->model->getMaxStock();  

        for ($j = 0; $j < count($result2); $j++) {

            $idMax = $result2[$j]['id'];
            $nombreMax = $result2[$j]['nombre'];
            $referenciaMax = $result2[$j]['referencia'];
            $stockMax = $result2[$j]['stock'];
        }

        require_once("Templates/header.php");
        require_once("Views/Informes/stock.php");
        require_once("Templates/footer.php");
    }

    public function ventas()
    {
        $result = $this->model->maxVentas(); 
        for ($j = 0; $j < count($result); $j++) {

            $nombreMax = $result[$j]['nombre'];
            $cantidadMax = $result[$j]['cantidad'];
            $totalMax = $result[$j]['total'];    
        }
        require_once("Templates/header.php");
        require_once("Views/Informes/ventas.php");
        require_once("Templates/footer.php");
    }
}
