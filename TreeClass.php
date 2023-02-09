<?php
namespace Oborot;

/*
 * Абстрактный класс Tree (Дерево) от которого наследуются классы AppleTree и PearTree (Яблоня и Груша)
 * Содержит поле с номером дерева и массивом фруктов
 */
abstract class Tree
{
    public array $fruits = [];
    public int $uniqueNumber;
    /*
    * Вырастить фрукты
    */
    abstract public function GropFruits();
}

?>