<?php
namespace Oborot;

/*
 * Класс Garden (Сад) имеет в себе только поле с массивом посаженных деревьев и ведет счетчик для выдачи уникальных номеров каждому дереву
 */
class Garden
{
    public array $trees = [];
    private int $treesNumerator = 0;

    function __construct()
    {
        echo "\r\nСад создан...\r\n";

    }

    public function SeedTree(Tree $tree): void
    {
        $this->treesNumerator++;
        $tree->uniqueNumber = $this->treesNumerator;
        $this->trees[] = $tree;
    }

    /*
     * Вырастить урожай на деревьях
     */
    public function GropHarvest()
    {
        foreach ($this->trees as &$tree) {
            if ($tree instanceof Tree) {
                $tree->GropFruits();
            }
        }
    }
}

?>