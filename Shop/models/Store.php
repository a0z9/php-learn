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

   public function getBasketOrderId($login_id) : ?int
   {
     // получить id незавершённого заказа
     $stmt = ($this->con)->prepare(
      "select id from orders where status=:status and login_id=:login_id");
  $status=0;
  $stmt->bindParam(':status', $status, \PDO::PARAM_BOOL);
  $stmt->bindParam(':login_id', $login_id, \PDO::PARAM_INT);
  $stmt->execute();     
  $res = $stmt->fetch(\PDO::FETCH_ASSOC);
  if(!$res) return null;
  return $res['id'];
 }

 public function getBasket($login_id){
  try{
  $order_id = $this->getBasketOrderId($login_id);
  $stmt = ($this->con)->prepare(
    "select s.id, s.name, p.qty, s.price from store s " .
    "join order_details p on p.store_id = s.id " . 
    "where p.order_id=:order_id");
  $stmt->bindParam(':order_id',$order_id,\PDO::PARAM_INT);
  $stmt->execute();    
  $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  $products_in_basket = [];
  if(!$res) return null;
        foreach($res as $row)
        {
            extract($row);
            $products_in_basket[] = new Product($id,$name,$qty,$price);
        }
  return $products_in_basket;
      }
      catch(\PDOException $ex)
      {
          // log it!!!
          echo $ex->getMessage();
      }
      finally{ $stmt=null; }
   
      return [];    
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
