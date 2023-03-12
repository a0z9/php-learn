<?php
namespace istu\rockets;

require_once "ignitable.php";

abstract class AbstractRocket implements Ignitable
{
  protected float $m; //mass
  protected float $p;
  protected string $rocketType;

  public function pre_ignit(){
  echo "Pre ignit procedures ok!! Ready to ignit!\n";
  }
  //public  abstract function ignit();


}


