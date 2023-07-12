<?php

class Home extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        require_once("Templates/header.php");
        require_once("Views/home.php");
        require_once("Templates/footer.php");
    }

}