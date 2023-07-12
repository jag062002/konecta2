<?php
class Errors extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notFound()
    {
        require_once("Views/Errors/error.php");
    }
}
$notFound = new Errors();
$notFound->notFound();