<?php
namespace Oborot;

require_once('Classes.php');
use Oborot\Pear;

class PearTree extends Tree
{
    public function GropFruits()
    {
        $count = rand(0, 20);
        $this->fruits = [];
        for($i = 1; $i <= $count; $i++)
        {
            $this->fruits[] = new Pear();
        }
    }

}

?>