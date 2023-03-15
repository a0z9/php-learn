<?php

namespace shop\models;
require_once "BaseModel.php";
require_once "Product.php";


class Store extends BaseModel
{
 
   private  $products = [];
   
   public function __construct($con)
   {
     parent::__construct($con);
     $this->updateProducts();
   }

   public function getAllProducts()
   {
    return $this->products;
   }

   public function updateProducts(){
    $this->products = [];    
    try{
        $stmt = ($this->con)->prepare(
            "select id, name, qty, price from store");
        $stmt->execute();    
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(!$res) return null;
        foreach($res as $row)
        {
            extract($row);
            $this->products[] = new Product($id,$name,$qty,$price);
        }
      }
    catch(\PDOException $ex)
    {
        // log it!!!
        echo $ex->getMessage();
    }
    finally{ $stmt=null; }
  }


   public function getProductById($id) : Product
   {
        try{
            $stmt = ($this->con)->prepare(
                "select id, name, qty, price from store where id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();     
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            if(!$res) return null;
            extract($res);
            return new Product($id,$name,$qty,$price);
          }
        catch(\PDOException $ex)
        {
            // log it!!!
            echo $ex->getMessage();
        }
        finally{ $stmt=null; }
     
        return null; 
        
       }
   
   

   public function getId(){}

}
