<?php

namespace istu\rockets;

final class LightRocket extends BaseRocket
{
   public int $wings;
   public function __construct(float $m=10033.6, float $p=20000.2, int $wings=0)
   {
    parent::__construct($m,$p);
    $this->wings = $wings;
    echo "+++ ctor " . __CLASS__ . ", obj->" . spl_object_id($this) . "\n";  
    
   }

   

}