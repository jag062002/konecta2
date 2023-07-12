<?php

class Mysql extends Conexion
{
    private $conexion;
    private $strQuery;
    private $arrValues;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }

    public function insert($query, $arrValues)
    {
        $this->strQuery = $query;
        $this->arrValues = $arrValues;
        $insert = $this->conexion->prepare($this->strQuery);

        $restInsert = $insert->execute($this->arrValues);
        if($restInsert){
            $lastInsert = 1;
        }else{
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    public function select($query)
    {
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function select_all($query)
    {
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update($query, $arrValues)
    {
        $this->strQuery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strQuery);
        $restExecute = $update->execute($this->arrValues);
        return $restExecute;
    }

    public function delete($query)
    {
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $restDel = $result->execute();
        return $restDel;
    }

    public function rowNumber($query)
    {
        $this->strQuery = $query;
        $result = $this->conexion->prepare($this->strQuery);
        $resp = $result->fetchColumn();
        return $resp;
    }
}