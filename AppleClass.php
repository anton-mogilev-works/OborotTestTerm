<?php
namespace Oborot;
require_once('Classes.php');

use Oborot\Fruit;

class Apple extends Fruit
{
    function __construct()
    {
        $this->weight = rand(150, 180) / 1000;
    }

}

?>