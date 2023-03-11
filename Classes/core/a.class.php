<?php

namespace core\data;

class A {
  
  //public $data;
  const VERSION=1.01;
  private $data;
  // public static $counter = 0;
  private static $counter = 0;

/**
* @version 1.22
* @author a.e.s
* 
*/
  public function __construct($data="Data")
  {
       $this -> data = $data;
       static::$counter++;
       echo "++++ ctor " . __CLASS__ . "\n";
  }
  
  public static function getCounter(){
    return static::$counter;

  }
  
  public function getData(){
   return $this->data;
  }

  public function setData($data){
     $this->data = $data;
  }

  public function __destruct()
  {
      static::$counter--;
      echo "--- dtor " . __CLASS__ . "\n";
  }

 public function __toString()
 {
   return "Class: " . __CLASS__ . 
          ", data=" . $this->data . 
          ", Version: " . self::VERSION; 
 }

 // hooks

 public function __get($name)
 {
    echo "get undefined " . $name;
 }

 public function __set($name, $value)
 {
    echo "set " . $name . " to value $value";
 }

 public function __call($name, $arguments)
 {
    echo "function $name  with args: $arguments called.";
 }

}
