<?php
namespace Oborot;
require_once('Classes.php');

use TreeType;
use Oborot\AppleTree;
use Oborot\PearTree;

/*
 * Класс сборщика фруктов. Получает в управление экземпляр класса Garden (Сад)
 * Ведет посадку деревьев и сбор урожая и выдачу отчётов.
 */

class FruitPicker
{
    public Garden $garden;

    public array $freeTrees = [];

    private array $harvest = [];

    function __construct()
    {
        echo "\r\nСборщик фруктов готов...\r\n";
        $this->garden = new Garden();
    }

    public function GetTrees(int $count, TreeType $treeType)
    {
        echo "\r\nПриобретаем деревья " . $count . " шт. ...\r\n";
        if ($treeType == TreeType::APPLE) {
            for ($i = 0; $i < $count; $i++) {
                $this->freeTrees[] = new AppleTree();
            }
        }
        if ($treeType == TreeType::PEAR) {
            for ($i = 0; $i < $count; $i++) {
                $this->freeTrees[] = new PearTree();
            }
        }
    }

    public function SeedFreeTreesInGarden()
    {
        echo "\r\nСажаем свободные деревья ...\r\n";
        if (count($this->freeTrees) > 0) {
            foreach ($this->freeTrees as $key => $freeTree) {
                $this->garden->SeedTree($freeTree);
                unset($this->freeTrees[$key]);
            }
        }
    }

    public function WaitHarvest()
    {
        echo "\r\nОжидаем созревания урожая...\r\n";
        $this->garden->GropHarvest();
    }

    public function GetHarvest()
    {
        echo "\r\nСобираем урожай...\r\n";
        foreach($this->garden->trees as $j => &$tree)
        {
            foreach($tree->fruits as $k => &$fruit)
            {
                $this->harvest[] = $fruit;
                unset($tree->fruits[$k]);
            }
        }
    }

    public function CalculateTreesInGarden() : string
    {
        $report = '';
        $appleTreesQuantity = 0;
        $pearTreesQuantity = 0;

        $appleTreesNumbers = [];
        $pearTreesNumbers = [];

        foreach($this->garden->trees as $tree)
        {
            if($tree instanceof AppleTree)
            {
                $appleTreesQuantity++;
                $appleTreesNumbers[] = $tree->uniqueNumber;

            }

            if($tree instanceof PearTree)
            {
                $pearTreesQuantity++;
                $pearTreesNumbers[] = $tree->uniqueNumber;
            }
        }

        $report .= "\tЯблонь : " . $appleTreesQuantity . "\r\n";
        $report .= "\t------------------------------------------\r\n";
        foreach($appleTreesNumbers as $num)
        {
            $report .= "\tРег. номер : " . $num . "\r\n";
        }
        $report .= "\tГруш   : " . $pearTreesQuantity . "\r\n";
        $report .= "\t------------------------------------------\r\n";
        foreach($pearTreesNumbers as $num)
        {
            $report .= "\tPег. номер : " . $num . "\r\n";
        }

        return $report;
    }

    public function CalculateFruitsOnTrees()
    {

    }

    public function CalculateHarvest() : string
    {
        $report = '';

        $apples = 0;
        $pears = 0;
        $summ_weight = 0;

        foreach($this->harvest as $fruit)
        {
            if($fruit instanceof Apple)
            {
                $apples++;
            }

            if($fruit instanceof Pear)
            {
                $pears++;
            }

            $summ_weight += $fruit->weight;
        }

        $report .= "\tЯблок : " . $apples . "шт.\r\n";
        $report .= "\tГруш  : " . $pears . "шт.\r\n";
        $report .= "\t---------------------------\r\n";
        $report .= "\tСуммарный вес  : " . $summ_weight . " кг.\r\n";

        return $report;

    }

    public function GetStatus()
    {
        $status = "\r\n";
        $status .= "Отчёт сборщика фруктов \r\n";
        $status .= "----------------------------------------------------: \r\n";
        $status .= "Свободных деревьев        : " . count($this->freeTrees) . "\r\n";
        $status .= "Посаженных деревьев в саду: \r\n" . $this->CalculateTreesInGarden() . "\r\n";
        $status .= "Урожай: \r\n" . $this->CalculateHarvest();

        $status .= "\r\n";

        echo $status;
    }
}

?>