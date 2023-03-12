<?php
namespace istu\rockets;


require_once "abstractrocket.php";

class BaseRocket extends AbstractRocket
{
//   protected float $m; //mass
//   protected float $p;
//   protected string $rocketType;

  public function ignit(){
   echo "Engine ignited!! On rocket " .  spl_object_id($this) . "\n";
  }

  public function __construct(float $m=10033.6, float $p=20000.2)
  {
   $this->m = $m;
   $this->p = $p;
   echo "+++ ctor " . __CLASS__ . ", obj->" . spl_object_id($this) . "\n";  
  }

  public function __destruct()
  {
    echo "--- dtor " . __CLASS__ . ", obj->" . spl_object_id($this) . "\n"; 
  }

  public function __toString() : string
  {
    return "Rocket p=" .$this->p . ", m=" . $this->m;
  }

}


