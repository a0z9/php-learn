<?php

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
         echo "+++ ctor " . __CLASS__ . "\n";
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

}


$a = new A;
//$a = new A("Data");
//echo $a->data . "\n";
echo $a->getData() . "\n";
echo "Version: " . A::VERSION . "\n";
echo "Object a: " . (new A) . "\n";
echo "Counter: " .  A::getCounter() . "\n";


//$a -> d = 100; // динамич. св-ва будут отменены в  php9!!!
//$a -> c = 100;

$a = null;


$a = new A;
