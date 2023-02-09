<?php
namespace Oborot;
require_once('Classes.php');

use Oborot\Tree;
use Oborot\Apple;

class AppleTree extends Tree
{
    public function GropFruits()
    {
        $count = rand(40, 50);
        $this->fruits = [];
        for($i = 1; $i <= $count; $i++)
        {
            $this->fruits[] = new Apple();
        }
    }

}

?>