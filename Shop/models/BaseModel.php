<?php
namespace shop\models;
//require_once "../db/dbo.php";

abstract class BaseModel{
     
    protected $con;
    
     
    public function __construct($con)
    {
       $this->con = $con;
    }

    public abstract function getId();
}