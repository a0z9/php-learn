<?php
//анонимный класс

$size =
new class(20,2){
   public $h;
   public $v;

   public function __toString()
   {
    return "h=".$this->h.", v=".$this->v;
   }

   public function __construct($h=1,$v=10)
   {
    $this->h = $h;
    $this->v =$v;
   }

 };

 var_dump($size);
 echo $size;