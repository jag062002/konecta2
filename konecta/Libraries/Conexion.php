<?php

class Conexion
{

    private $connect;

    public function __construct()
    {
        $strConnection = "mysql:host=" . DB_HOST_MYSQLI . ";dbname=" . DB_NAME_MYSQLI . "; charset=". DB_CHARSET;

        try {
            $this->connect = new PDO($strConnection, DB_USER_MYSQLI, DB_PASSWORD_MYSQLI);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->connect = 'Error de conexion';
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->connect;
    }

}