<?php
namespace Oborot;

require_once('Classes.php');
use Oborot\Fruit;

class Pear extends Fruit
{
    function __construct()
    {
        $this->weight = rand(130, 170) / 1000;
    }

}
?>