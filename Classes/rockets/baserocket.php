<?php

namespace istu\rockets;

class BaseRocket
{
  public float $m; //mass
  public float $p;

  public function ignit(){
   echo "Engine ignited!!";
  }

  public function __construct(float $m=10033.6, float $p=20000.2)
  {
   $this->m = $m;
   $this->p = $p;  
  }

  public function __toString() : string
  {
    return "Rocket p=" .$this->p . ", m=" . $this->m;
  }

}


