<?php

namespace istu\rockets;

final class HeavyRocket extends BaseRocket
{
   public int $subEngines;
   public function __construct(float $m=10033.6, float $p=20000.2, int $subEngines=4)
   {
    parent::__construct($m,$p);
    $this->subEngines = $subEngines;
    echo "+++ ctor " . __CLASS__ . ", obj->" . spl_object_id($this) . "\n";  
    
   }

   

}