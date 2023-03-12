<?php

namespace istu\rockets;

class HeavyRocket extends BaseRocket
{
   public int $subEngines;
   public function __construct(float $m=10033.6, float $p=20000.2, int $subEngines=4)
   {
    parent::__construct($m,$p);
    echo "+++ ctor " . __CLASS__ . ", obj->" . spl_object_id($this) . "\n";  
   }

}