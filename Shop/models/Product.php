<?php

namespace shop\models;
require_once "BaseModel.php";

class Product 
{
   public $id;
   public $name;
   public $price;
   public $qty;

   public function __construct($id, $name, $qty, $price)
   {
    $this->name = $name;
    $this->id = $id;
    $this->price = $price;
    $this->qty = $qty;
   }


}